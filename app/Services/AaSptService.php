<?php

namespace App\Services;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class AaSptService
{
    /**
     * Calculates AA-SPT priority score for pending orders.
     * Score = Total Prep Time (s) - (Alpha * Wait Time in Seconds)
     * Lower Score = Higher Priority in Kitchen Queue.
     */
    public static function getPrioritizedOrders(float $alpha = 0.5): Collection
    {
        $now = Carbon::now();

        $orders = Order::with('items')
            ->where('status', 'Pending')
            ->get();

        return $orders->sortBy(function ($order) use ($now, $alpha) {
            $totalPrepTimeSeconds = $order->items->sum('prep_time_seconds');

            $arrivalTime = Carbon::parse($order->arrival_time ?? $order->created_at);
            $waitTimeSeconds = $now->diffInSeconds($arrivalTime);

            $score = $totalPrepTimeSeconds - ($alpha * $waitTimeSeconds);

            $order->total_prep_seconds = $totalPrepTimeSeconds;
            $order->wait_time_seconds = $waitTimeSeconds;
            $order->priority_score = round($score, 2);

            return $score;
        })->values();
    }
}