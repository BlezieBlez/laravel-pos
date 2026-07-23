<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Original Digman</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
                <a href="/kitchen" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-400 hover:bg-slate-800 hover:text-white font-medium transition">
                    <i class="fa-solid fa-kitchen-set text-lg"></i>
                    <span>Kitchen Queue</span>
                </a>
                <a href="/dashboard" class="flex items-center gap-3 px-4 py-3 rounded-xl bg-purple-600 text-white font-semibold shadow-md transition">
                    <i class="fa-solid fa-chart-line text-lg"></i>
                    <span>Dashboard</span>
                </a>
            </nav>
        </div>
        <div class="p-3 bg-slate-800/60 rounded-lg text-xs text-slate-400 flex items-center justify-between">
            <span>System: <strong class="text-emerald-400">Active</strong></span>
            <i class="fa-solid fa-circle text-emerald-400 text-[10px]"></i>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-6 overflow-y-auto">
        <div class="mb-6">
            <h1 class="text-2xl font-extrabold text-slate-900">Sales Dashboard</h1>
            <p class="text-sm text-slate-500 mt-0.5">Today is Thursday, July 23, 2026</p>
        </div>

        <!-- 4 Metric Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-2xl p-5 shadow-sm border border-slate-200/80">
                <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Pending Orders</p>
                <h2 class="text-3xl font-extrabold text-amber-500 mt-2">0</h2>
            </div>
            <div class="bg-white rounded-2xl p-5 shadow-sm border border-slate-200/80">
                <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Finished Orders</p>
                <h2 class="text-3xl font-extrabold text-emerald-500 mt-2">0</h2>
            </div>
            <div class="bg-white rounded-2xl p-5 shadow-sm border border-slate-200/80">
                <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Total Orders Today</p>
                <h2 class="text-3xl font-extrabold text-purple-600 mt-2">0</h2>
            </div>
            <div class="bg-white rounded-2xl p-5 shadow-sm border border-slate-200/80">
                <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Total Orders This Month</p>
                <h2 class="text-3xl font-extrabold text-slate-900 mt-2">0</h2>
            </div>
        </div>

        <!-- Order Summary Chart Container -->
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-200/80">
            <div class="flex items-center justify-between mb-6">
                <h2 class="font-bold text-slate-800 text-lg">Order Summary</h2>
                <div class="flex gap-2">
                    <button class="px-3 py-1.5 text-xs font-bold rounded-lg bg-slate-100 text-slate-600 hover:bg-slate-200">Yearly</button>
                    <button class="px-3 py-1.5 text-xs font-bold rounded-lg bg-purple-600 text-white shadow-sm">Monthly</button>
                    <button class="px-3 py-1.5 text-xs font-bold rounded-lg bg-slate-100 text-slate-600 hover:bg-slate-200">Today</button>
                </div>
            </div>
            <!-- Canvas for Chart.js or existing chart renderer -->
            <div class="h-64 flex items-center justify-center text-slate-400 bg-slate-50 rounded-xl border border-dashed border-slate-200">
                <p class="text-sm font-medium">Chart data container</p>
            </div>
        </div>
    </main>

</body>
</html>