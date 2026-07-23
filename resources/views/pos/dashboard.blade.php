<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Dashboard - Original Digman</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-slate-100 font-sans antialiased text-slate-800 min-h-screen lg:h-screen flex flex-col lg:flex-row overflow-y-auto lg:overflow-hidden">

    <!-- Sidebar Navigation -->
    <aside class="w-full lg:w-64 bg-slate-900 text-white flex flex-col justify-between p-4 shadow-xl shrink-0">
        <div>
            <!-- Brand Header -->
            <div class="px-2 py-3 lg:py-4 mb-3 lg:mb-6 border-b border-slate-800 text-center">
                <h1 class="font-extrabold text-lg lg:text-xl text-amber-400 tracking-wide uppercase">Original Digman</h1>
                <p class="text-xs text-slate-400 mt-0.5">Halo-Halo & Siopao</p>
            </div>

            <!-- Nav Links -->
            <nav class="flex lg:flex-col gap-2 overflow-x-auto pb-2 lg:pb-0">
                <a href="/menu" class="flex-1 lg:flex-none flex items-center justify-center lg:justify-start gap-3 px-4 py-3 rounded-xl text-slate-400 hover:bg-slate-800 hover:text-white font-medium transition whitespace-nowrap">
                    <i class="fa-solid fa-utensils text-lg"></i>
                    <span>Menu / Order</span>
                </a>
                <a href="/kitchen" class="flex-1 lg:flex-none flex items-center justify-center lg:justify-start gap-3 px-4 py-3 rounded-xl text-slate-400 hover:bg-slate-800 hover:text-white font-medium transition whitespace-nowrap">
                    <i class="fa-solid fa-kitchen-set text-lg"></i>
                    <span>Kitchen Queue</span>
                </a>
                <a href="/dashboard" class="flex-1 lg:flex-none flex items-center justify-center lg:justify-start gap-3 px-4 py-3 rounded-xl bg-purple-600 text-white font-semibold shadow-md whitespace-nowrap">
                    <i class="fa-solid fa-chart-line text-lg"></i>
                    <span>Dashboard</span>
                </a>
            </nav>
        </div>

        <!-- Status Bar -->
        <div class="hidden lg:flex p-3 bg-slate-800/60 rounded-lg text-xs text-slate-400 items-center justify-between mt-4">
            <span>System: <strong class="text-emerald-400">Online</strong></span>
            <i class="fa-solid fa-circle text-emerald-400 text-[10px]"></i>
        </div>
    </aside>

    <!-- Main Content Area -->
    <main class="flex-1 p-4 lg:p-6 overflow-y-auto w-full">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 mb-6">
            <div>
                <h1 class="text-2xl font-extrabold text-slate-900">Sales Dashboard</h1>
                <p class="text-xs sm:text-sm text-slate-500 mt-0.5">Live store overview & analytics</p>
            </div>
            <div class="bg-white px-4 py-2 rounded-xl border border-slate-200 shadow-sm text-xs font-bold text-slate-600 self-start sm:self-auto">
                <i class="fa-regular fa-calendar-check text-purple-600 mr-2"></i>
                <span id="current-date-display">Today</span>
            </div>
        </div>

        <!-- 4 Metric Cards Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-6 mb-6">
            <div class="bg-white rounded-2xl p-5 shadow-sm border border-slate-200/80">
                <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Pending Orders</p>
                <h2 id="dash-pending" class="text-2xl lg:text-3xl font-extrabold text-amber-500 mt-2">2</h2>
            </div>
            <div class="bg-white rounded-2xl p-5 shadow-sm border border-slate-200/80">
                <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Finished Orders Today</p>
                <h2 id="dash-finished" class="text-2xl lg:text-3xl font-extrabold text-emerald-500 mt-2">14</h2>
            </div>
            <div class="bg-white rounded-2xl p-5 shadow-sm border border-slate-200/80">
                <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Total Sales Today</p>
                <h2 id="dash-revenue" class="text-2xl lg:text-3xl font-extrabold text-purple-600 mt-2">₱2,450</h2>
            </div>
            <div class="bg-white rounded-2xl p-5 shadow-sm border border-slate-200/80">
                <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Total Orders This Month</p>
                <h2 id="dash-monthly" class="text-2xl lg:text-3xl font-extrabold text-slate-900 mt-2">342</h2>
            </div>
        </div>

        <!-- Chart Container Card -->
        <div class="bg-white rounded-2xl p-4 lg:p-6 shadow-sm border border-slate-200/80">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
                <h2 class="font-bold text-slate-800 text-lg">Order Analytics</h2>
                
                <!-- Filter Buttons -->
                <div class="flex bg-slate-100 p-1 rounded-xl border border-slate-200 self-start sm:self-auto">
                    <button id="filter-today" onclick="setChartFilter('today')" class="px-4 py-1.5 text-xs font-bold rounded-lg text-slate-600 hover:text-slate-900 transition cursor-pointer">Today</button>
                    <button id="filter-monthly" onclick="setChartFilter('monthly')" class="px-4 py-1.5 text-xs font-bold rounded-lg bg-purple-600 text-white shadow-sm transition cursor-pointer">Monthly</button>
                    <button id="filter-yearly" onclick="setChartFilter('yearly')" class="px-4 py-1.5 text-xs font-bold rounded-lg text-slate-600 hover:text-slate-900 transition cursor-pointer">Yearly</button>
                </div>
            </div>

            <!-- Canvas element for dynamic rendering -->
            <div class="relative w-full h-72 lg:h-80">
                <canvas id="salesChart"></canvas>
            </div>
        </div>
    </main>

    <!-- Chart.js Logic -->
    <script>
        // Set Current Date Display
        const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        document.getElementById('current-date-display').innerText = new Date().toLocaleDateString('en-US', options);

        // Chart Data Sets
        const chartData = {
            today: {
                labels: ['8 AM', '10 AM', '12 PM', '2 PM', '4 PM', '6 PM', '8 PM'],
                data: [3, 8, 22, 14, 18, 25, 12]
            },
            monthly: {
                labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
                data: [85, 110, 95, 140]
            },
            yearly: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                data: [320, 290, 410, 380, 450, 520, 480, 0, 0, 0, 0, 0]
            }
        };

        // Initialize Chart.js
        const ctx = document.getElementById('salesChart').getContext('2d');
        let salesChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: chartData.monthly.labels,
                datasets: [{
                    label: 'Orders',
                    data: chartData.monthly.data,
                    backgroundColor: '#9333ea',
                    borderRadius: 8,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    y: { beginAtZero: true, grid: { color: '#f1f5f9' } },
                    x: { grid: { display: false } }
                }
            }
        });

        // Filter Switching Function
        function setChartFilter(filter) {
            const activeClass = "px-4 py-1.5 text-xs font-bold rounded-lg bg-purple-600 text-white shadow-sm transition cursor-pointer";
            const inactiveClass = "px-4 py-1.5 text-xs font-bold rounded-lg text-slate-600 hover:text-slate-900 transition cursor-pointer";

            document.getElementById('filter-today').className = filter === 'today' ? activeClass : inactiveClass;
            document.getElementById('filter-monthly').className = filter === 'monthly' ? activeClass : inactiveClass;
            document.getElementById('filter-yearly').className = filter === 'yearly' ? activeClass : inactiveClass;

            // Update Chart Data
            salesChart.data.labels = chartData[filter].labels;
            salesChart.data.datasets[0].data = chartData[filter].data;
            salesChart.update();
        }
    </script>
</body>
</html>