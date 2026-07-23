<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kitchen Display - Original Digman</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-slate-100 font-sans antialiased text-slate-800 h-screen flex overflow-hidden">

    <!-- Sidebar Navigation -->
    <aside class="w-64 bg-slate-900 text-white flex flex-col justify-between p-4 shadow-xl">
        <div>
            <div class="px-2 py-4 mb-6 border-b border-slate-800 text-center">
                <h1 class="font-extrabold text-xl text-amber-400 tracking-wide uppercase">Original Digman</h1>
                <p class="text-xs text-slate-400 mt-1">Halo-Halo & Siopao</p>
            </div>
            <nav class="space-y-2">
                <a href="/menu" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-400 hover:bg-slate-800 hover:text-white font-medium transition">
                    <i class="fa-solid fa-utensils text-lg"></i>
                    <span>Menu / Order</span>
                </a>
                <a href="/kitchen" class="flex items-center gap-3 px-4 py-3 rounded-xl bg-purple-600 text-white font-semibold shadow-md transition">
                    <i class="fa-solid fa-kitchen-set text-lg"></i>
                    <span>Kitchen Queue</span>
                </a>
                <a href="/dashboard" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-400 hover:bg-slate-800 hover:text-white font-medium transition">
                    <i class="fa-solid fa-chart-line text-lg"></i>
                    <span>Dashboard</span>
                </a>
            </nav>
        </div>
        <div class="p-3 bg-slate-800/60 rounded-lg text-xs text-slate-400 flex items-center justify-between">
            <span>Status: <strong class="text-emerald-400">Live Queue</strong></span>
            <i class="fa-solid fa-circle text-emerald-400 text-[10px]"></i>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-6 overflow-y-auto">
        <!-- Top Metrics Row -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white rounded-2xl p-5 shadow-sm border border-slate-200/80 flex items-center justify-between">
                <div>
                    <p class="text-sm font-semibold text-slate-500">Pending Orders</p>
                    <h2 class="text-3xl font-extrabold text-amber-500 mt-1">3</h2>
                </div>
                <div class="w-12 h-12 rounded-xl bg-amber-100 text-amber-600 flex items-center justify-center text-xl">
                    <i class="fa-solid fa-clock"></i>
                </div>
            </div>

            <div class="bg-white rounded-2xl p-5 shadow-sm border border-slate-200/80 flex items-center justify-between">
                <div>
                    <p class="text-sm font-semibold text-slate-500">In Preparation</p>
                    <h2 class="text-3xl font-extrabold text-sky-500 mt-1">2</h2>
                </div>
                <div class="w-12 h-12 rounded-xl bg-sky-100 text-sky-600 flex items-center justify-center text-xl">
                    <i class="fa-solid fa-fire-burner"></i>
                </div>
            </div>

            <div class="bg-white rounded-2xl p-5 shadow-sm border border-slate-200/80 flex items-center justify-between">
                <div>
                    <p class="text-sm font-semibold text-slate-500">Completed Today</p>
                    <h2 class="text-3xl font-extrabold text-emerald-500 mt-1">18</h2>
                </div>
                <div class="w-12 h-12 rounded-xl bg-emerald-100 text-emerald-600 flex items-center justify-center text-xl">
                    <i class="fa-solid fa-circle-check"></i>
                </div>
            </div>
        </div>

        <!-- Kitchen Order Cards Grid -->
        <h2 class="text-xl font-bold text-slate-800 mb-4">Active Orders</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            
            <!-- Sample Order Card -->
            <div class="bg-white rounded-2xl border-2 border-amber-300 shadow-sm p-5 flex flex-col justify-between">
                <div>
                    <div class="flex items-center justify-between pb-3 border-b border-slate-100 mb-3">
                        <span class="font-extrabold text-lg text-slate-900">#ORD-104</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold bg-amber-100 text-amber-700">Take Out</span>
                    </div>
                    <ul class="space-y-2 text-slate-700 font-medium">
                        <li class="flex justify-between"><span>2x Halo-Halo Special</span></li>
                        <li class="flex justify-between"><span>1x Asado Siopao</span></li>
                    </ul>
                </div>
                <div class="mt-6 pt-3 border-t border-slate-100 flex gap-2">
                    <button class="flex-1 py-2.5 rounded-xl bg-emerald-600 text-white font-bold text-sm shadow-sm hover:bg-emerald-700 transition">
                        Mark Ready
                    </button>
                </div>
            </div>

        </div>
    </main>

</body>
</html>