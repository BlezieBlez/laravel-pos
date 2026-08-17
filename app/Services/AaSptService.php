<?php

namespace App\Services;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class AaSptService
{
    /**
     * Aging-Adjusted Shortest Processing Time
     *
     * Score = Processing Time - (Alpha × Waiting Time)
     *
     * Lower score = Higher priority
     *
     * Only PENDING orders are ranked.
     */
    public static function getPrioritizedOrders(float $alpha = 0.5): Collection
    {
        $now = Carbon::now();

        $orders = Order::with('items')
            ->where('status', 'Pending')
            ->get();

        $orders = $orders->map(function ($order) use ($now, $alpha) {

            /*
             * Calculate total processing time.
             */
            $totalPrepTimeSeconds = $order->items->sum(function ($item) {

                $quantity = max(1, (int) $item->quantity);
                $prepTime = max(0, (int) $item->prep_time_seconds);

                return $prepTime * $quantity;
            });

            /*
             * Determine when the order entered the queue.
             */
            $arrivalTime = Carbon::parse(
                $order->arrival_time ?? $order->created_at
            );

            /*
             * Timestamp subtraction guarantees that an older
             * order receives a positive waiting time.
             */
            $waitTimeSeconds = max(
                0,
                $now->getTimestamp() - $arrivalTime->getTimestamp()
            );

            /*
             * AA-SPT Formula
             *
             * Lower score = higher priority
             */
            $score = $totalPrepTimeSeconds -
                     ($alpha * $waitTimeSeconds);

            /*
             * Temporary calculated properties.
             * These are NOT saved to the database.
             */
            $order->total_prep_seconds = $totalPrepTimeSeconds;
            $order->wait_time_seconds = $waitTimeSeconds;
            $order->priority_score = round($score, 2);

            return $order;
        });

        /*
         * Sort:
         *
         * 1. Lowest AA-SPT score
         * 2. Older order
         * 3. Lower order ID
         */
        return $orders->sort(function ($a, $b) {

            // First compare AA-SPT score
            if ($a->priority_score != $b->priority_score) {
                return $a->priority_score <=> $b->priority_score;
            }

            // If scores are equal, older order wins
            $aArrival = Carbon::parse(
                $a->arrival_time ?? $a->created_at
            )->getTimestamp();

            $bArrival = Carbon::parse(
                $b->arrival_time ?? $b->created_at
            )->getTimestamp();

            if ($aArrival != $bArrival) {
                return $aArrival <=> $bArrival;
            }

            // Final tie breaker
            return $a->id <=> $b->id;

        })->values();
    }
}