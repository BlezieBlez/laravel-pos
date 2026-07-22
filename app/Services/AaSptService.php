<?php
namespace App\Services;

use App\Models\Order;
use Carbon\Carbon;

class AaSptService
{
    /**
     * Calculate AA-SPT priority score for an order
     */
    public static function calculatePriority(Order $order): float
    {
        // Total estimated prep time (Ts) in seconds
        $ts = $order->items->sum(function ($item) {
            return $item->estimated_prep_time_seconds * $item->quantity;
        });

        if ($ts <= 0) {
            $ts = 60; // fallback default
        }

        // Live waiting time (Wq) in seconds
        $wq = Carbon::parse($order->arrival_time)->diffInSeconds(Carbon::now());

        // Priority Score = (Wq + Ts) / Ts
        return ($wq + $ts) / $ts;
    }

    /**
     * Get orders sorted by highest AA-SPT priority
     */
    public static function getPrioritizedOrders()
    {
        return Order::with('items')
            ->where('status', 'Pending')
            ->get()
            ->map(function ($order) {
                $order->priority_score = self::calculatePriority($order);
                return $order;
            })
            ->sortByDesc('priority_score') // Higher score = higher priority
            ->values();
    }
}