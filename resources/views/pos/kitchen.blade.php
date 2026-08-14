<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kitchen Display System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-[#cac4c4] font-sans antialiased text-slate-800 p-2 lg:p-4">
    <div class="w-full h-full min-h-full flex flex-col lg:flex-row bg-slate-100 rounded-xl overflow-hidden shadow-2xl border border-slate-300">
        
        @include('pos.partials.sidebar')

        <!-- Main Workspace -->
        <main class="flex-1 flex flex-col p-4 overflow-y-auto bg-slate-100">
            
            <!-- Brand Header Banner -->
            <div class="bg-[#dcd8d8] rounded-xl py-2 px-4 mb-4 text-center shadow-md border border-slate-700/60 flex items-center justify-between">
                <img src="{{ asset('images/header-banner.png') }}" alt="original Digman Banner" class="max-h-12 w-auto object-contain">
                <div class="flex items-center gap-2">
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-amber-100 text-amber-800 border border-amber-300">
                        <span class="w-2 h-2 rounded-full bg-amber-500 mr-2 animate-pulse"></span>
                        {{ count($pendingOrders ?? []) }} Pending Orders
                    </span>
                </div>
            </div>

            <!-- Dynamic Kitchen Orders Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @forelse($pendingOrders ?? [] as $order)
                    <div class="bg-[#e0dede] rounded-xl p-4 shadow-lg border border-slate-400 flex flex-col justify-between">
                        <div>
                            <div class="flex justify-between items-center border-b border-slate-300 pb-2 mb-3">
                                <div>
                                    <h3 class="font-black text-slate-900 text-base">Order {{ $order->order_number ?? '#'.$order->id }}</h3>
                                    <p class="text-xs text-slate-600 font-semibold">{{ $order->order_type }} • Table {{ $order->table_number ?? '--' }}</p>
                                </div>
                                <span class="class=px-2.5 py-1 rounded bg-amber-100 text-amber-800 font-extrabold text-xs border border-amber-300">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </div>

                            <ul class="space-y-2 mb-4 text-xs font-semibold text-slate-800">
                                @foreach($order->items as $item)
                                    <li class="flex justify-between items-center bg-[#dcd8d8] p-2 rounded border border-slate-300">
                                        <span><strong class="text-purple-800 font-extrabold">{{ $item->quantity }}x</strong> {{ $item->item_name }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div>
                            @if($order->status !== 'Completed')
                                <button onclick="updateOrderStatus({{ $order->id }}, 'Completed')" class="w-full py-2 bg-[#38c172] hover:bg-emerald-600 text-white font-extrabold text-xs rounded shadow transition active:scale-95 flex items-center justify-center gap-2">
                                    <i class="fa-solid fa-check"></i> Mark as Completed
                                </button>
                            @else
                                <button disabled class="w-full py-2 bg-slate-400 text-slate-200 font-bold text-xs rounded cursor-not-allowed">
                                    Served
                                </button>
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-16 text-slate-500 font-extrabold text-sm">
                        No active pending orders in the kitchen.
                    </div>
                @endforelse
            </div>
        </main>
    </div>

    <script>
    function updateOrderStatus(orderId, status) {
        fetch(`/kitchen/status/${orderId}`, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: JSON.stringify({ status: status })
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                location.reload();
            } else {
                alert('Failed to update order status.');
            }
        })
        .catch(err => {
            console.error(err);
            alert('Error updating order status.');
        });
    }

    // Auto-refresh the kitchen view every 15 seconds for live orders
    setInterval(() => {
        location.reload();
    }, 15000);
    </script>
</body>
</html>