<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POS Dashboard - Original Digman</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-[#cac4c4] font-sans antialiased text-slate-800 min-h-screen lg:h-screen flex flex-col lg:flex-row overflow-y-auto lg:overflow-hidden p-2 lg:p-4">

    <!-- Container Frame -->
    <div class="w-full h-full flex flex-col lg:flex-row bg-slate-100 rounded-xl overflow-hidden shadow-2xl border border-slate-300">

        @include('pos.partials.sidebar')
        <!-- Main Workspace -->
        <main class="flex-1 flex flex-col p-4 overflow-y-auto bg-slate-100">

            <!-- Brand Header Banner Image -->
            <div class="bg-[#dcd8d8] rounded-xl py-2 px-4 mb-4 text-center shadow-md border border-slate-700/60 flex items-center justify-between">
                <img src="{{ asset('images/header-banner.png') }}" alt="Original Digman Banner" class="max-h-12 w-auto object-contain">
                <span class="text-xs font-bold text-slate-300"><i class="fa-solid fa-calendar-day mr-1"></i> Today's Overview</span>
            </div>

            <!-- Dynamic Analytics Cards Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">
                <div class="bg-[#e0dede] p-4 rounded-xl shadow border border-slate-400">
                    <p class="text-xs font-extrabold text-slate-600 uppercase">Total Sales</p>
                    <h3 class="text-2xl font-black text-purple-900 mt-1">P{{ number_format($totalSales ?? 0, 2) }}</h3>
                </div>
                <div class="bg-[#e0dede] p-4 rounded-xl shadow border border-slate-400">
                    <p class="text-xs font-extrabold text-slate-600 uppercase">Orders Served</p>
                    <h3 class="text-2xl font-black text-slate-900 mt-1">{{ $ordersServedCount ?? 0 }}</h3>
                </div>
                <div class="bg-[#e0dede] p-4 rounded-xl shadow border border-slate-400">
                    <p class="text-xs font-extrabold text-slate-600 uppercase">Top Item</p>
                    <h3 class="text-2xl font-black text-slate-900 mt-1">{{ $topItem ?? 'N/A' }}</h3>
                </div>
                <div class="bg-[#e0dede] p-4 rounded-xl shadow border border-slate-400">
                    <p class="text-xs font-extrabold text-slate-600 uppercase">Average Ticket</p>
                    <h3 class="text-2xl font-black text-slate-900 mt-1">P{{ number_format($avgTicket ?? 0, 2) }}</h3>
                </div>
            </div>

            <!-- Dynamic Recent Transactions Table -->
            <div class="bg-[#e0dede] rounded-xl p-4 shadow-lg border border-slate-400 flex-1 flex flex-col">
                <h3 class="font-black text-slate-900 text-sm mb-3">Recent Completed Transactions</h3>
                <div class="overflow-x-auto flex-1">
                    <table class="w-full text-left text-xs font-semibold text-slate-800">
                        <thead>
                            <tr class="border-b border-slate-400 text-slate-600 uppercase text-[10px]">
                                <th class="pb-2">Order ID</th>
                                <th class="pb-2">Type</th>
                                <th class="pb-2">Items</th>
                                <th class="pb-2">Total</th>
                                <th class="pb-2">Time</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-300">
                            @forelse($recentTransactions ?? [] as $transaction)
                                <tr>
                                    <td class="py-2.5 font-bold">#{{ $transaction->id }}</td>
                                    <td class="py-2.5">{{ $transaction->type }}</td>
                                    <td class="py-2.5">{{ $transaction->summary_items }}</td>
                                    <td class="py-2.5 font-extrabold text-purple-800">P{{ number_format($transaction->total, 2) }}</td>
                                    <td class="py-2.5 text-slate-600">{{ $transaction->created_at->format('h:i A') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="py-6 text-center text-slate-500 font-bold">No completed transactions recorded today.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </main>
    </div>

</body>
</html>