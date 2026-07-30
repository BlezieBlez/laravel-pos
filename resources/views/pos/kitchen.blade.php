<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POS Kitchen - Original Digman</title>
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

                    <a href="/kitchen" class="flex flex-col items-center justify-center w-20 h-20 rounded-2xl bg-[#712bb1] text-white font-bold text-xs shadow-lg transition transform hover:scale-105 shrink-0 mx-auto">
                        <div class="w-8 h-8 rounded-full bg-white/20 flex items-center justify-center mb-1">
                            <i class="fa-solid fa-kitchen-set text-sm"></i>
                        </div>
                        <span>KITCHEN</span>
                    </a>

                    <a href="/dashboard" class="flex flex-col items-center justify-center w-20 h-20 rounded-2xl bg-[#322a40] hover:bg-[#712bb1] text-slate-300 hover:text-white font-bold text-xs transition transform hover:scale-105 shrink-0 mx-auto">
                        <div class="w-8 h-8 rounded-full bg-white/10 flex items-center justify-center mb-1">
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
                <div class="flex items-center gap-2">
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-amber-500/20 text-amber-300 border border-amber-500/30">
                        <span class="w-2 h-2 rounded-full bg-amber-400 mr-2 animate-pulse"></span> 3 Pending Orders
                    </span>
                </div>
            </div>

            <!-- Orders Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">

                <!-- Kitchen Order Ticket 1 -->
                <div class="bg-[#e0dede] rounded-xl p-4 shadow-lg border border-slate-400 flex flex-col justify-between">
                    <div>
                        <div class="flex justify-between items-center border-b border-slate-300 pb-2 mb-3">
                            <div>
                                <h3 class="font-black text-slate-900 text-base">Order #101</h3>
                                <p class="text-xs text-slate-600 font-semibold">Take Out • Table --</p>
                            </div>
                            <span class="px-2.5 py-1 rounded bg-amber-100 text-amber-800 font-extrabold text-xs border border-amber-300">
                                Preparing
                            </span>
                        </div>

                        <!-- Ticket Items -->
                        <ul class="space-y-2 mb-4 text-xs font-semibold text-slate-800">
                            <li class="flex justify-between items-center bg-[#dcd8d8] p-2 rounded border border-slate-300">
                                <span><strong class="text-purple-800 font-extrabold">2x</strong> Halo-Halo Special</span>
                                <span class="text-slate-500 text-[10px]">No Ube</span>
                            </li>
                            <li class="flex justify-between items-center bg-[#dcd8d8] p-2 rounded border border-slate-300">
                                <span><strong class="text-purple-800 font-extrabold">1x</strong> Mais Con Yelo</span>
                            </li>
                        </ul>
                    </div>

                    <button class="w-full py-2 bg-[#38c172] hover:bg-emerald-600 text-white font-extrabold text-xs rounded shadow transition active:scale-95 flex items-center justify-center gap-2">
                        <i class="fa-solid fa-check"></i> Mark as Ready
                    </button>
                </div>

                <!-- Kitchen Order Ticket 2 -->
                <div class="bg-[#e0dede] rounded-xl p-4 shadow-lg border border-slate-400 flex flex-col justify-between">
                    <div>
                        <div class="flex justify-between items-center border-b border-slate-300 pb-2 mb-3">
                            <div>
                                <h3 class="font-black text-slate-900 text-base">Order #102</h3>
                                <p class="text-xs text-slate-600 font-semibold">Dine In • Table 04</p>
                            </div>
                            <span class="px-2.5 py-1 rounded bg-amber-100 text-amber-800 font-extrabold text-xs border border-amber-300">
                                Preparing
                            </span>
                        </div>

                        <!-- Ticket Items -->
                        <ul class="space-y-2 mb-4 text-xs font-semibold text-slate-800">
                            <li class="flex justify-between items-center bg-[#dcd8d8] p-2 rounded border border-slate-300">
                                <span><strong class="text-purple-800 font-extrabold">1x</strong> Pancit Palabok</span>
                            </li>
                            <li class="flex justify-between items-center bg-[#dcd8d8] p-2 rounded border border-slate-300">
                                <span><strong class="text-purple-800 font-extrabold">2x</strong> Pork Siomai</span>
                            </li>
                        </ul>
                    </div>

                    <button class="w-full py-2 bg-[#38c172] hover:bg-emerald-600 text-white font-extrabold text-xs rounded shadow transition active:scale-95 flex items-center justify-center gap-2">
                        <i class="fa-solid fa-check"></i> Mark as Ready
                    </button>
                </div>

                <!-- Kitchen Order Ticket 3 -->
                <div class="bg-[#e0dede] rounded-xl p-4 shadow-lg border border-slate-400 flex flex-col justify-between opacity-80">
                    <div>
                        <div class="flex justify-between items-center border-b border-slate-300 pb-2 mb-3">
                            <div>
                                <h3 class="font-black text-slate-900 text-base">Order #100</h3>
                                <p class="text-xs text-slate-600 font-semibold">Dine In • Table 01</p>
                            </div>
                            <span class="px-2.5 py-1 rounded bg-emerald-100 text-emerald-800 font-extrabold text-xs border border-emerald-300">
                                Completed
                            </span>
                        </div>

                        <!-- Ticket Items -->
                        <ul class="space-y-2 mb-4 text-xs font-semibold text-slate-800">
                            <li class="flex justify-between items-center bg-[#dcd8d8] p-2 rounded border border-slate-300 line-through text-slate-500">
                                <span><strong>3x</strong> Halo-Halo</span>
                            </li>
                        </ul>
                    </div>

                    <button disabled class="w-full py-2 bg-slate-400 text-slate-200 font-bold text-xs rounded cursor-not-allowed">
                        Served
                    </button>
                </div>

            </div>
        </main>
    </div>

</body>
</html>