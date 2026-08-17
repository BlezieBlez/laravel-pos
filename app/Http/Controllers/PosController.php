<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

    // Save Order to MySQL (pos_db)
    // Save Order to MySQL (pos_db)
    public function storeOrder(Request $request)
    {
        $validated = $request->validate([
            'order_type'   => 'required|in:Dine-In,Take Out',
            'table_number' => 'nullable|string',
            'items'        => 'required|array',
            'subtotal'     => 'required|numeric',
            'discount'     => 'nullable|numeric',
            'total'        => 'required|numeric',
            'cash'         => 'required|numeric',
            'change'       => 'nullable|numeric',
        ]);

        return DB::transaction(function () use ($validated) {
            $latestOrder = Order::latest()->first();
            $nextNum = $latestOrder ? ($latestOrder->id + 1) : 1;
            $orderNumber = '#' . str_pad($nextNum, 4, '0', STR_PAD_LEFT);

            $order = Order::create([
                'order_number'  => $orderNumber,
                'order_type'    => $validated['order_type'],
                'table_number'  => $validated['table_number'] ?? null,
                'status'        => 'Pending',
                'subtotal'      => $validated['subtotal'],
                'discount'      => $validated['discount'] ?? 0,
                'total'         => $validated['total'],
                'cash_tendered' => $validated['cash'],
                'change_amount' => $validated['change'] ?? ($validated['cash'] - $validated['total']),
                'arrival_time'  => Carbon::now(),
            ]);

            $menuPrepTimes = [
                // Desserts
                'Mais Con Yelo'      => 120,
                'Halo-Halo'          => 124,
                'Halo-Halo Speci'    => 160,
                'Halo-Halo Special'  => 160,

                // Snacks
                'Siopao'             => 60,
                'Tahong Chips'       => 60,
                'Empanada'           => 180,
                'Hotdog'             => 360,
                'BBQ'                => 750,

                // Noodle Dishes
                'Spaghetti'          => 390,
                'Chicken Mami'       => 390,
                'Palabok'            => 480,
                'Pancit'             => 600,

                // Silog Dishes
                'Tapsi'              => 1020,
                'Tapsilog'           => 1110,
                'Porksi'             => 1080,
                'Porksilog'          => 1350,
            ];

            foreach ($validated['items'] as $item) {
                $prepTime = $item['prep_time_seconds'] 
                    ?? ($menuPrepTimes[$item['name']] ?? 180);

                OrderItem::create([
                    'order_id'          => $order->id,
                    'item_name'         => $item['name'],
                    'quantity'          => $item['quantity'],
                    'price'             => $item['price'],
                    'prep_time_seconds' => $prepTime,
                ]);
            }

            return response()->json([
                'success'      => true, 
                'order_number' => $orderNumber,
                'change'       => $order->change_amount
            ]);
        });
    }

    // Kitchen Live Display View sorted by AA-SPT
    public function kitchenView()
    {
        // Fetches orders sorted by aging-adjusted score
        $pendingOrders = AaSptService::getPrioritizedOrders(0.5); 
        $completedOrders = Order::where('status', 'Completed')->latest()->take(10)->get();

        return view('pos.kitchen', compact('pendingOrders', 'completedOrders'));
    }

    // API Endpoint for AJAX/Polling Live Kitchen Refresh
    public function getLiveQueue()
    {
        $pendingOrders = AaSptService::getPrioritizedOrders(0.5);

        return response()->json([
            'success' => true,
            'orders'  => $pendingOrders
        ]);
    }

    // Update Status (Complete / In-Prep)
    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $status = $request->status;

        if ($status === 'In-Preparation' && !$order->preparation_start_time) {
            $order->preparation_start_time = Carbon::now();
        } elseif ($status === 'Completed') {
            $order->completion_time = Carbon::now();
        }

        $order->status = $status;
        $order->save();

        return response()->json(['success' => true]);
    }

    // Analytics Dashboard Screen
    public function dashboardView()
    {
        $today = Carbon::today();

        $pendingCount  = Order::where('status', 'Pending')->count();
        $finishedCount = Order::where('status', 'Completed')->whereDate('created_at', $today)->count();
        $totalToday    = Order::whereDate('created_at', $today)->count();
        $totalMonth    = Order::whereMonth('created_at', Carbon::now()->month)->count();

        $completedByDate = Order::where('status', 'Completed')
            ->whereBetween('created_at', [
                Carbon::now()->subDays(29)->startOfDay(),
                Carbon::now()->endOfDay(),
            ])
            ->selectRaw('DATE(created_at) as date, COUNT(*) as total')
            ->groupBy('date')
            ->pluck('total', 'date')
            ->toArray();

        $dailyChart = [];
        for ($i = 29; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i)->startOfDay();
            $dateKey = $date->format('Y-m-d');
            $dailyChart[] = [
                'label' => $date->format('j'),
                'count' => (int) ($completedByDate[$dateKey] ?? 0),
            ];
        }

        $weeklyChart = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i)->startOfDay();
            $dateKey = $date->format('Y-m-d');
            $weeklyChart[] = [
                'label' => $date->shortDayName,
                'count' => (int) ($completedByDate[$dateKey] ?? 0),
            ];
        }

        $todayChart = [
            ['label' => 'AM', 'count' => Order::where('status', 'Completed')->whereDate('created_at', $today)->whereTime('created_at', '>=', '00:00:00')->whereTime('created_at', '<', '12:00:00')->count()],
            ['label' => 'PM', 'count' => Order::where('status', 'Completed')->whereDate('created_at', $today)->whereTime('created_at', '>=', '12:00:00')->count()],
        ];

        return view('pos.dashboard', compact('pendingCount', 'finishedCount', 'totalToday', 'totalMonth', 'dailyChart', 'weeklyChart', 'todayChart'));
    }
}