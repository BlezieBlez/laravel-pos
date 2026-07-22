<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Services\AaSptService;
use Carbon\Carbon;

class PosController extends Controller
{
    // Render Main Menu / POS Input Screen
    public function index()
    {
        return view('pos.menu');
    }

    // Save Order to MySQL
    public function storeOrder(Request $request)
    {
        $validated = $request->validate([
            'order_type' => 'required|in:Dine-In,Take Out',
            'items' => 'required|array',
            'subtotal' => 'required|numeric',
            'discount' => 'numeric',
            'total' => 'required|numeric',
            'cash' => 'required|numeric',
        ]);

        $latestOrder = Order::latest()->first();
        $nextNum = $latestOrder ? ($latestOrder->id + 1) : 1;
        $orderNumber = '#' . str_pad($nextNum, 4, '0', STR_PAD_LEFT); 

        $order = Order::create([
            'order_number' => $orderNumber,
            'order_type' => $validated['order_type'],
            'status' => 'Pending',
            'subtotal' => $validated['subtotal'],
            'discount' => $validated['discount'] ?? 0,
            'total' => $validated['total'],
            'cash_tendered' => $validated['cash'],
            'arrival_time' => Carbon::now(), // Ta timestamp
        ]);

        foreach ($validated['items'] as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'item_name' => $item['name'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
                'estimated_prep_time_seconds' => $item['prep_time_seconds'] ?? 180,
            ]);
        }

        return response()->json(['success' => true, 'order_number' => $orderNumber]);
    }

    // Kitchen Live Display View sorted by AA-SPT[cite: 1, 2]
    public function kitchenView()
    {
        $pendingOrders = AaSptService::getPrioritizedOrders();
        $completedOrders = Order::where('status', 'Completed')->latest()->take(10)->get();

        return view('pos.kitchen', compact('pendingOrders', 'completedOrders'));
    }

    // Update Status (Complete / In-Prep)
    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $status = $request->status;

        if ($status === 'In-Preparation' && !$order->preparation_start_time) {
            $order->preparation_start_time = Carbon::now(); // Ts timestamp
        } elseif ($status === 'Completed') {
            $order->completion_time = Carbon::now(); // Tc timestamp
        }

        $order->status = $status;
        $order->save();

        return response()->json(['success' => true]);
    }

    // Analytics Dashboard Screen
    public function dashboardView()
    {
        $today = Carbon::today();
        
        $pendingCount = Order::where('status', 'Pending')->count();
        $finishedCount = Order::where('status', 'Completed')->whereDate('created_at', $today)->count();
        $totalToday = Order::whereDate('created_at', $today)->count();
        $totalMonth = Order::whereMonth('created_at', Carbon::now()->month)->count();

        return view('pos.dashboard', compact('pendingCount', 'finishedCount', 'totalToday', 'totalMonth'));
    }
}
