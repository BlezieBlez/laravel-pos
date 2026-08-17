<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analytics & Dashboard</title>
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
                    <span class="text-xs font-extrabold text-slate-700 bg-slate-200/80 px-3 py-1.5 rounded-full border border-slate-300 shadow-sm">
                        <i class="fa-solid fa-calendar-day mr-1"></i> Today: {{ \Carbon\Carbon::now()->format('M d, Y') }}
                    </span>
                </div>
            </div>

            <!-- Dashboard Analytics Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
                
                <!-- Pending Orders -->
                <div class="bg-[#e0dede] p-5 rounded-xl shadow-lg border border-slate-400 flex items-center justify-between">
                    <div>
                        <p class="text-xs font-black text-slate-600 uppercase tracking-wide">Pending Orders</p>
                        <h3 class="text-3xl font-black text-amber-600 mt-1">{{ $pendingCount ?? 0 }}</h3>
                    </div>
                    <div class="w-12 h-12 rounded-lg bg-amber-100 text-amber-700 border border-amber-300 flex items-center justify-center text-xl shadow-sm">
                        <i class="fa-solid fa-clock"></i>
                    </div>
                </div>

                <!-- Completed Today -->
                <div class="bg-[#e0dede] p-5 rounded-xl shadow-lg border border-slate-400 flex items-center justify-between">
                    <div>
                        <p class="text-xs font-black text-slate-600 uppercase tracking-wide">Completed Today</p>
                        <h3 class="text-3xl font-black text-emerald-600 mt-1">{{ $finishedCount ?? 0 }}</h3>
                    </div>
                    <div class="w-12 h-12 rounded-lg bg-emerald-100 text-emerald-700 border border-emerald-300 flex items-center justify-center text-xl shadow-sm">
                        <i class="fa-solid fa-circle-check"></i>
                    </div>
                </div>

                <!-- Total Orders Today -->
                <div class="bg-[#e0dede] p-5 rounded-xl shadow-lg border border-slate-400 flex items-center justify-between">
                    <div>
                        <p class="text-xs font-black text-slate-600 uppercase tracking-wide">Total Today</p>
                        <h3 class="text-3xl font-black text-purple-700 mt-1">{{ $totalToday ?? 0 }}</h3>
                    </div>
                    <div class="w-12 h-12 rounded-lg bg-purple-100 text-purple-800 border border-purple-300 flex items-center justify-center text-xl shadow-sm">
                        <i class="fa-solid fa-receipt"></i>
                    </div>
                </div>

                <!-- Total Orders This Month -->
                <div class="bg-[#e0dede] p-5 rounded-xl shadow-lg border border-slate-400 flex items-center justify-between">
                    <div>
                        <p class="text-xs font-black text-slate-600 uppercase tracking-wide">This Month</p>
                        <h3 class="text-3xl font-black text-blue-600 mt-1">{{ $totalMonth ?? 0 }}</h3>
                    </div>
                    <div class="w-12 h-12 rounded-lg bg-blue-100 text-blue-700 border border-blue-300 flex items-center justify-center text-xl shadow-sm">
                        <i class="fa-solid fa-calendar-days"></i>
                    </div>
                </div>

            </div>

            <!-- Completion Trend Chart -->
            <div class="bg-[#e0dede] rounded-xl p-5 shadow-lg border border-slate-400 mt-6">
                <div class="flex items-start justify-between mb-4">
                    <div>
                        <h2 class="font-extrabold text-slate-800 text-2xl">Completed Orders</h2>
                        <p class="text-xs text-slate-500 mt-1" id="chart-subtitle">30-day completion trend</p>
                    </div>

                    <div class="flex items-center gap-2 text-xs font-bold text-slate-500">
                        <button type="button" class="period-btn px-3 py-1.5 rounded-md border border-slate-300 bg-purple-200 text-purple-900 shadow-sm transition hover:bg-purple-300" data-period="monthly">Monthly</button>
                        <button type="button" class="period-btn px-3 py-1.5 rounded-md border border-transparent text-slate-500 hover:text-purple-900 transition" data-period="weekly">Weekly</button>
                    </div>
                </div>

                <div class="h-64 flex items-end gap-3 px-2 pt-4 pb-2" id="chart-container">
                        @foreach ($dailyChart as $entry)
                            <div class="flex-1 flex flex-col items-center justify-end h-full chart-bar" data-period="monthly">
                                <div class="w-full flex justify-center items-end h-44">
                                    <div class="w-3 rounded-t-md bg-gradient-to-t from-purple-700 to-purple-400 shadow-sm" style="height: {{ max(12, ($entry['count'] / max(1, max(array_column($dailyChart, 'count')))) * 100) }}%"></div>
                                </div>
                                <span class="mt-2 text-[10px] font-bold text-slate-500">{{ $entry['label'] }}</span>
                            </div>
                        @endforeach
                        @foreach ($weeklyChart as $entry)
                            <div class="flex-1 flex flex-col items-center justify-end h-full chart-bar hidden" data-period="weekly">
                                <div class="w-full flex justify-center items-end h-44">
                                    <div class="w-6 rounded-t-md bg-gradient-to-t from-purple-700 to-purple-400 shadow-sm" style="height: {{ max(12, ($entry['count'] / max(1, max(array_column($weeklyChart, 'count')))) * 100) }}%"></div>
                                </div>
                                <span class="mt-2 text-[10px] font-bold text-slate-500">{{ $entry['label'] }}</span>
                            </div>
                        @endforeach
                    </div>
            </div>

            <script>
                document.querySelectorAll('.period-btn').forEach(btn => {
                    btn.addEventListener('click', function(e) {
                        e.preventDefault();
                        const period = this.getAttribute('data-period');
                        
                        // Update active button styling
                        document.querySelectorAll('.period-btn').forEach(b => {
                            b.classList.remove('bg-purple-200', 'text-purple-900', 'shadow-sm');
                            b.classList.add('text-slate-500');
                        });
                        this.classList.add('bg-purple-200', 'text-purple-900', 'shadow-sm');
                        this.classList.remove('text-slate-500');
                        
                        // Toggle chart bars
                        document.querySelectorAll('.chart-bar').forEach(bar => {
                            if (bar.getAttribute('data-period') === period) {
                                bar.classList.remove('hidden');
                            } else {
                                bar.classList.add('hidden');
                            }
                        });
                        
                        // Update subtitle
                        const subtitle = period === 'monthly' ? '30-day completion trend' : '7-day completion trend';
                        document.getElementById('chart-subtitle').textContent = subtitle;
                    });
                });
            </script>

            <!-- Status Indicator Panel -->
            <div class="bg-[#e0dede] rounded-xl p-5 shadow-lg border border-slate-400 mt-6">
                <h2 class="font-extrabold text-slate-800 text-sm mb-2 border-b border-slate-300 pb-2 flex items-center gap-2">
                    <i class="fa-solid fa-chart-line text-purple-700"></i> System Operations Status
                </h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-xs font-bold text-slate-700">
                    <div class="bg-[#dcd8d8] p-3 rounded border border-slate-300 flex justify-between items-center">
                        <span>Database Connection:</span>
                        <span class="px-2 py-0.5 rounded bg-emerald-100 text-emerald-800 border border-emerald-300 font-black">Connected (pos_db)</span>
                    </div>
                    <div class="bg-[#dcd8d8] p-3 rounded border border-slate-300 flex justify-between items-center">
                        <span>Queue Algorithm:</span>
                        <span class="px-2 py-0.5 rounded bg-purple-100 text-purple-800 border border-purple-300 font-black">AA-SPT Active</span>
                    </div>
                </div>
            </div>

        </main>
    </div>

    <!-- Include Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</body>
</html>