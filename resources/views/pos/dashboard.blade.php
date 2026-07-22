<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Original Digman Halo-Halo POS</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        body { display: flex; height: 100vh; background-color: #2e2d32; color: #fff; overflow: hidden; }

        /* Navigation */
        .side-nav {
            width: 130px;
            background-color: #1f1e24;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-top: 20px;
            gap: 25px;
            border-right: 1px solid #333;
        }

        .side-nav .nav-title { color: #aaa; font-size: 11px; font-weight: 700; letter-spacing: 1px; text-transform: uppercase; }

        .side-nav a {
            display: flex; flex-direction: column; align-items: center; justify-content: center;
            width: 90px; height: 80px; text-decoration: none; color: #fff; border-radius: 12px;
            font-size: 12px; font-weight: bold; gap: 8px; transition: all 0.2s ease;
        }

        .side-nav a .icon-box {
            width: 36px; height: 36px; background: #3e3b47; border-radius: 50%;
            display: flex; align-items: center; justify-content: center; font-size: 18px;
        }

        .side-nav a.active { background-color: #6a1b9a; }
        .side-nav a.active .icon-box { background: #ffffff; color: #6a1b9a; }

        /* Main Container */
        .app-container { flex: 1; display: flex; flex-direction: column; }

        .top-header-bar {
            height: 110px;
            background-color: #e5e5e5;
            display: flex;
            align-items: center;
            justify-content: center;
            border-bottom: 2px solid #ccc;
            padding: 10px;
        }

        .top-header-bar img { max-height: 90px; width: auto; object-fit: contain; }

        .workspace { flex: 1; background-color: #5c5c63; padding: 25px 30px; overflow-y: auto; display: flex; flex-direction: column; gap: 15px; }

        .date-display { font-size: 16px; font-weight: 700; color: #fff; }

        /* Metrics Row */
        .metrics-row { display: flex; gap: 20px; }

        .metric-card {
            background-color: #d8d8d8;
            color: #1f1e24;
            border-radius: 10px;
            padding: 18px 20px;
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .metric-card h3 { font-size: 16px; font-weight: 700; }

        .metric-value-box { display: flex; align-items: center; gap: 12px; }

        .metric-dot { width: 28px; height: 28px; border-radius: 50%; display: inline-block; }
        .dot-pending { background-color: #e8865d; }
        .dot-finished { background-color: #3bb262; }
        .dot-total { background-color: #5c83e6; }

        .metric-num { font-size: 32px; font-weight: 800; color: #1f1e24; }

        /* Summary Graph Section */
        .chart-card {
            background-color: #d8d8d8;
            color: #1f1e24;
            border-radius: 12px;
            padding: 20px 25px;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .chart-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px; }
        .chart-header h2 { font-size: 24px; font-weight: 800; }

        .filter-tabs { display: flex; gap: 20px; }

        .tab-btn {
            background: none;
            border: none;
            font-size: 15px;
            font-weight: 700;
            color: #1f1e24;
            cursor: pointer;
        }

        .tab-btn.active { color: #6a1b9a; }

        .chart-wrapper { flex: 1; position: relative; width: 100%; min-height: 280px; }

                /* Mobile & Small Tablet Adjustments */
        @media (max-width: 900px) {
            body {
                flex-direction: column; /* Stack side navigation on top or bottom */
                overflow-y: auto;
            }

            .side-nav {
                width: 100%;
                height: 60px;
                flex-direction: row;
                justify-content: space-around;
                padding-top: 0;
                border-right: none;
                border-bottom: 1px solid #333;
            }

            .side-nav a {
                width: auto;
                height: 50px;
                flex-direction: row;
            }

            .workspace {
                flex-direction: column; /* Stack Menu and Cart vertically */
            }

            .cart-section {
                width: 100%; /* Full width cart on mobile */
                border-left: none;
                border-top: 2px solid #ccc;
            }

            .top-header-bar {
                height: 70px; /* Reduce banner size on phones */
            }

            .top-header-bar img {
                max-height: 50px;
            }
        }
    </style>
</head>
<body>

    <nav class="side-nav">
        <span class="nav-title">Navigation</span>
        <a href="/menu">
            <div class="icon-box">::</div>
            MENU
        </a>
        <a href="/kitchen">
            <div class="icon-box">::</div>
            KITCHEN
        </a>
        <a href="/dashboard" class="active">
            <div class="icon-box">::</div>
            DASHBOARD
        </a>
    </nav>

    <div class="app-container">
        <div class="top-header-bar">
            <img src="{{ asset('images/header-banner.png') }}" alt="Original Digman Halo-Halo and Home Made Siopao">
        </div>

        <div class="workspace">
            <div class="date-display" id="current-date">Loading date...</div>

            <div class="metrics-row">
                <div class="metric-card">
                    <h3>Pending Orders</h3>
                    <div class="metric-value-box">
                        <span class="metric-dot dot-pending"></span>
                        <span class="metric-num" id="dash-pending">0</span>
                    </div>
                </div>
                <div class="metric-card">
                    <h3>Finished Orders</h3>
                    <div class="metric-value-box">
                        <span class="metric-dot dot-finished"></span>
                        <span class="metric-num" id="dash-finished">0</span>
                    </div>
                </div>
                <div class="metric-card">
                    <h3>Total Orders Today</h3>
                    <div class="metric-value-box">
                        <span class="metric-dot dot-total"></span>
                        <span class="metric-num" id="dash-today">0</span>
                    </div>
                </div>
                <div class="metric-card">
                    <h3>Total Orders This Month</h3>
                    <div class="metric-value-box">
                        <span class="metric-num" id="dash-month">0</span>
                    </div>
                </div>
            </div>

            <div class="chart-card">
                <div class="chart-header">
                    <h2>Order Summary</h2>
                    <div class="filter-tabs">
                        <button class="tab-btn">Yearly</button>
                        <button class="tab-btn active">Monthly</button>
                        <button class="tab-btn">Today</button>
                    </div>
                </div>
                <div class="chart-wrapper">
                    <canvas id="orderChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Realtime Date string update
        const now = new Date();
        const options = { weekday: 'long', day: 'numeric', month: 'long', year: 'numeric' };
        document.getElementById('current-date').innerText = `Today is ${now.toLocaleDateString('en-US', options)}.`;

        // Chart.js initialization
        const ctx = document.getElementById('orderChart').getContext('2d');
        const daysInMonth = Array.from({length: 30}, (_, i) => i + 1);

        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: daysInMonth,
                datasets: [{
                    data: new Array(30).fill(0),
                    backgroundColor: '#8a2be2',
                    borderRadius: 4,
                    barThickness: 6
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    x: {
                        grid: { display: false },
                        ticks: { color: '#1f1e24', font: { weight: 'bold' } }
                    },
                    y: {
                        beginAtZero: true,
                        grid: { color: '#bebebe' },
                        ticks: { color: '#1f1e24', font: { weight: 'bold' }, stepSize: 20 }
                    }
                }
            }
        });

        // Live Dashboard Data Fetcher
        function fetchDashboardMetrics() {
            fetch('/api/orders/analytics')
                .then(res => res.json())
                .then(data => {
                    document.getElementById('dash-pending').innerText = data.pending_count || 0;
                    document.getElementById('dash-finished').innerText = data.finished_count || 0;
                    document.getElementById('dash-today').innerText = data.today_count || 0;
                    document.getElementById('dash-month').innerText = data.month_count || 0;

                    // Dynamically update Chart dataset
                    if (data.daily_chart_data) {
                        myChart.data.datasets[0].data = data.daily_chart_data;
                        myChart.update();
                    }
                })
                .catch(err => console.error("Error fetching analytics:", err));
        }

        fetchDashboardMetrics();
        setInterval(fetchDashboardMetrics, 5000); // refresh every 5s
    </script>
</body>
</html>