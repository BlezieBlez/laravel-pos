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

    <!-- Container Frame matching Figma -->
    <div class="w-full h-full flex flex-col lg:flex-row bg-[#4a444a] rounded-xl overflow-hidden shadow-2xl border border-slate-700">

        <!-- Sidebar Navigation -->
        <aside class="w-full lg:w-44 bg-[#211e2b] text-white flex flex-col justify-between p-3 shrink-0 border-r border-slate-700/50">
            <div>
                <div class="py-2 mb-4 text-center border-b border-slate-800">
                    <span class="text-xs font-bold tracking-widest text-slate-400 uppercase">Navigation</span>
                </div>

                <nav class="flex lg:flex-col justify-center gap-4 overflow-x-auto">
                    <a href="/menu" class="flex flex-col items-center justify-center w-20 h-20 rounded-2xl bg-[#322a40] hover:bg-[#712bb1] text-slate-300 hover:text-white font-bold text-xs transition transform hover:scale-105 shrink-0 mx-auto">
                        <div class="w-8 h-8 rounded-full bg-white/10 flex items-center justify-center mb-1">
                            <i class="fa-solid fa-utensils text-sm"></i>
                        </div>
                        <span>MENU</span>
                    </a>

                    <a href="/kitchen" class="flex flex-col items-center justify-center w-20 h-20 rounded-2xl bg-[#322a40] hover:bg-[#712bb1] text-slate-300 hover:text-white font-bold text-xs transition transform hover:scale-105 shrink-0 mx-auto">
                        <div class="w-8 h-8 rounded-full bg-white/10 flex items-center justify-center mb-1">
                            <i class="fa-solid fa-kitchen-set text-sm"></i>
                        </div>
                        <span>KITCHEN</span>
                    </a>

                    <a href="/dashboard" class="flex flex-col items-center justify-center w-20 h-20 rounded-2xl bg-[#712bb1] text-white font-bold text-xs shadow-lg transition transform hover:scale-105 shrink-0 mx-auto">
                        <div class="w-8 h-8 rounded-full bg-white/20 flex items-center justify-center mb-1">
                            <i class="fa-solid fa-chart-line text-sm"></i>
                        </div>
                        <span>DASHBOARD</span>
                    </a>
                </nav>
            </div>
        </aside>

        <!-- Main Workspace -->
        <main class="flex-1 flex flex-col p-4 overflow-y-auto bg-[#4a444a]">

            <!-- Brand Header Banner Image -->
            <div class="bg-[#1e1b24] rounded-xl py-2 px-4 mb-4 text-center shadow-md border border-slate-700/60 flex items-center justify-between">
                <img src="{{ asset('images/header-banner.png') }}" alt="Original Digman Banner" class="max-h-12 w-auto object-contain">
                <span class="text-xs font-bold text-slate-300"><i class="fa-solid fa-calendar-day mr-1"></i> Today's Overview</span>
            </div>

            <!-- Analytics Cards Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">
                <div class="bg-[#e0dede] p-4 rounded-xl shadow border border-slate-400">
                    <p class="text-xs font-extrabold text-slate-600 uppercase">Total Sales</p>
                    <h3 class="text-2xl font-black text-purple-900 mt-1">P12,450</h3>
                </div>
                <div class="bg-[#e0dede] p-4 rounded-xl shadow border border-slate-400">
                    <p class="text-xs font-extrabold text-slate-600 uppercase">Orders Served</p>
                    <h3 class="text-2xl font-black text-slate-900 mt-1">48</h3>
                </div>
                <div class="bg-[#e0dede] p-4 rounded-xl shadow border border-slate-400">
                    <p class="text-xs font-extrabold text-slate-600 uppercase">Top Item</p>
                    <h3 class="text-2xl font-black text-slate-900 mt-1">Halo-Halo</h3>
                </div>
                <div class="bg-[#e0dede] p-4 rounded-xl shadow border border-slate-400">
                    <p class="text-xs font-extrabold text-slate-600 uppercase">Average Ticket</p>
                    <h3 class="text-2xl font-black text-slate-900 mt-1">P259</h3>
                </div>
            </div>

            <!-- Recent Transactions Table -->
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
                            <tr>
                                <td class="py-2.5 font-bold">#100</td>
                                <td class="py-2.5">Dine In</td>
                                <td class="py-2.5">3x Halo-Halo</td>
                                <td class="py-2.5 font-extrabold text-purple-800">P270</td>
                                <td class="py-2.5 text-slate-600">12:42 PM</td>
                            </tr>
                            <tr>
                                <td class="py-2.5 font-bold">#099</td>
                                <td class="py-2.5">Take Out</td>
                                <td class="py-2.5">1x Halo-Halo Special, 2x Siomai</td>
                                <td class="py-2.5 font-extrabold text-purple-800">P220</td>
                                <td class="py-2.5 text-slate-600">12:30 PM</td>
                            </tr>
                            <tr>
                                <td class="py-2.5 font-bold">#098</td>
                                <td class="py-2.5">Dine In</td>
                                <td class="py-2.5">2x Pancit Palabok</td>
                                <td class="py-2.5 font-extrabold text-purple-800">P180</td>
                                <td class="py-2.5 text-slate-600">12:15 PM</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </main>
    </div>

</body>
</html>