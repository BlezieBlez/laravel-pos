<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kitchen Queue - Original Digman</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
                <a href="/kitchen" class="flex-1 lg:flex-none flex items-center justify-center lg:justify-start gap-3 px-4 py-3 rounded-xl bg-purple-600 text-white font-semibold shadow-md whitespace-nowrap">
                    <i class="fa-solid fa-kitchen-set text-lg"></i>
                    <span>Kitchen Queue</span>
                </a>
                <a href="/dashboard" class="flex-1 lg:flex-none flex items-center justify-center lg:justify-start gap-3 px-4 py-3 rounded-xl text-slate-400 hover:bg-slate-800 hover:text-white font-medium transition whitespace-nowrap">
                    <i class="fa-solid fa-chart-line text-lg"></i>
                    <span>Dashboard</span>
                </a>
            </nav>
        </div>

        <!-- Status Bar -->
        <div class="hidden lg:flex p-3 bg-slate-800/60 rounded-lg text-xs text-slate-400 items-center justify-between mt-4">
            <span>Status: <strong class="text-emerald-400">Live Queue</strong></span>
            <i class="fa-solid fa-circle text-emerald-400 text-[10px]"></i>
        </div>
    </aside>

    <!-- Main Content Area -->
    <main class="flex-1 p-4 lg:p-6 overflow-y-auto w-full">
        
        <!-- Live Metrics Row -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 lg:gap-6 mb-6">
            <div class="bg-white rounded-2xl p-5 shadow-sm border border-slate-200/80 flex items-center justify-between">
                <div>
                    <p class="text-xs lg:text-sm font-semibold text-slate-500 uppercase tracking-wider">Pending</p>
                    <h2 id="metric-pending" class="text-2xl lg:text-3xl font-extrabold text-amber-500 mt-1">2</h2>
                </div>
                <div class="w-12 h-12 rounded-xl bg-amber-100 text-amber-600 flex items-center justify-center text-xl shrink-0">
                    <i class="fa-solid fa-clock"></i>
                </div>
            </div>

            <div class="bg-white rounded-2xl p-5 shadow-sm border border-slate-200/80 flex items-center justify-between">
                <div>
                    <p class="text-xs lg:text-sm font-semibold text-slate-500 uppercase tracking-wider">Preparing</p>
                    <h2 id="metric-preparing" class="text-2xl lg:text-3xl font-extrabold text-sky-500 mt-1">1</h2>
                </div>
                <div class="w-12 h-12 rounded-xl bg-sky-100 text-sky-600 flex items-center justify-center text-xl shrink-0">
                    <i class="fa-solid fa-fire-burner"></i>
                </div>
            </div>

            <div class="bg-white rounded-2xl p-5 shadow-sm border border-slate-200/80 flex items-center justify-between">
                <div>
                    <p class="text-xs lg:text-sm font-semibold text-slate-500 uppercase tracking-wider">Completed Today</p>
                    <h2 id="metric-completed" class="text-2xl lg:text-3xl font-extrabold text-emerald-500 mt-1">14</h2>
                </div>
                <div class="w-12 h-12 rounded-xl bg-emerald-100 text-emerald-600 flex items-center justify-center text-xl shrink-0">
                    <i class="fa-solid fa-circle-check"></i>
                </div>
            </div>
        </div>

        <div class="flex items-center justify-between mb-4">
            <h2 class="text-xl font-bold text-slate-800">Active Orders Queue</h2>
            <span class="text-xs font-semibold text-slate-500 bg-slate-200 px-3 py-1 rounded-full">Auto-refresh Active</span>
        </div>

        <!-- Orders Grid -->
        <div id="orders-container" class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4 lg:gap-6">
            
            <!-- Order 1 -->
            <div id="order-card-101" class="bg-white rounded-2xl border-2 border-amber-300 shadow-sm p-5 flex flex-col justify-between transition hover:shadow-md">
                <div>
                    <div class="flex items-center justify-between pb-3 border-b border-slate-100 mb-3">
                        <div>
                            <span class="font-extrabold text-lg text-slate-900">#ORD-101</span>
                            <p class="text-xs text-slate-400">Take Out • Table --</p>
                        </div>
                        <span id="badge-101" class="px-3 py-1 rounded-full text-xs font-bold bg-amber-100 text-amber-700">Pending</span>
                    </div>
                    <ul class="space-y-2 text-slate-700 font-medium text-sm">
                        <li class="flex justify-between border-b border-slate-50 pb-1">
                            <span>2x Special Halo-Halo</span>
                            <span class="font-bold text-slate-900">₱240</span>
                        </li>
                        <li class="flex justify-between border-b border-slate-50 pb-1">
                            <span>1x Asado Siopao</span>
                            <span class="font-bold text-slate-900">₱45</span>
                        </li>
                    </ul>
                </div>
                <div class="mt-6 pt-3 border-t border-slate-100">
                    <button id="btn-101" onclick="advanceOrderStatus('101')" class="w-full py-3 rounded-xl bg-sky-600 hover:bg-sky-700 text-white font-bold text-sm shadow-sm active:scale-95 transition cursor-pointer flex items-center justify-center gap-2">
                        <i class="fa-solid fa-fire-burner"></i>
                        <span>Start Preparing</span>
                    </button>
                </div>
            </div>

            <!-- Order 2 -->
            <div id="order-card-102" class="bg-white rounded-2xl border-2 border-sky-300 shadow-sm p-5 flex flex-col justify-between transition hover:shadow-md">
                <div>
                    <div class="flex items-center justify-between pb-3 border-b border-slate-100 mb-3">
                        <div>
                            <span class="font-extrabold text-lg text-slate-900">#ORD-102</span>
                            <p class="text-xs text-slate-400">Dine In • Table 04</p>
                        </div>
                        <span id="badge-102" class="px-3 py-1 rounded-full text-xs font-bold bg-sky-100 text-sky-700">Preparing</span>
                    </div>
                    <ul class="space-y-2 text-slate-700 font-medium text-sm">
                        <li class="flex justify-between border-b border-slate-50 pb-1">
                            <span>1x Pancit Canton</span>
                            <span class="font-bold text-slate-900">₱110</span>
                        </li>
                        <li class="flex justify-between border-b border-slate-50 pb-1">
                            <span>2x Mais Con Yelo</span>
                            <span class="font-bold text-slate-900">₱180</span>
                        </li>
                    </ul>
                </div>
                <div class="mt-6 pt-3 border-t border-slate-100">
                    <button id="btn-102" onclick="advanceOrderStatus('102')" class="w-full py-3 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-sm shadow-sm active:scale-95 transition cursor-pointer flex items-center justify-center gap-2">
                        <i class="fa-solid fa-circle-check"></i>
                        <span>Mark Order Ready</span>
                    </button>
                </div>
            </div>

        </div>
    </main>

    <!-- JS Interactivity -->
    <script>
        const orderStates = {
            '101': 'pending',
            '102': 'preparing'
        };

        function advanceOrderStatus(orderId) {
            const card = document.getElementById(`order-card-${orderId}`);
            const badge = document.getElementById(`badge-${orderId}`);
            const btn = document.getElementById(`btn-${orderId}`);

            if (orderStates[orderId] === 'pending') {
                // Move from Pending -> Preparing
                orderStates[orderId] = 'preparing';
                card.className = "bg-white rounded-2xl border-2 border-sky-300 shadow-sm p-5 flex flex-col justify-between transition hover:shadow-md";
                badge.className = "px-3 py-1 rounded-full text-xs font-bold bg-sky-100 text-sky-700";
                badge.innerText = "Preparing";
                
                btn.className = "w-full py-3 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-sm shadow-sm active:scale-95 transition cursor-pointer flex items-center justify-center gap-2";
                btn.innerHTML = `<i class="fa-solid fa-circle-check"></i><span>Mark Order Ready</span>`;
            } else if (orderStates[orderId] === 'preparing') {
                // Move from Preparing -> Completed (remove from active view)
                orderStates[orderId] = 'completed';
                card.style.opacity = '0';
                card.style.transform = 'scale(0.95)';
                setTimeout(() => {
                    card.remove();
                    checkEmptyQueue();
                }, 300);
            }
            
            updateMetrics();
        }

        function updateMetrics() {
            let pending = 0, preparing = 0;
            for (let id in orderStates) {
                if (orderStates[id] === 'pending') pending++;
                if (orderStates[id] === 'preparing') preparing++;
            }
            document.getElementById('metric-pending').innerText = pending;
            document.getElementById('metric-preparing').innerText = preparing;
        }

        function checkEmptyQueue() {
            const container = document.getElementById('orders-container');
            if (container.children.length === 0) {
                container.innerHTML = `
                    <div class="col-span-full bg-white rounded-2xl p-12 text-center border border-slate-200">
                        <i class="fa-solid fa-circle-check text-5xl text-emerald-400 mb-3"></i>
                        <h3 class="text-lg font-bold text-slate-800">Queue is Clear!</h3>
                        <p class="text-sm text-slate-500 mt-1">There are no active kitchen orders at the moment.</p>
                    </div>
                `;
            }
        }
    </script>
</body>
</html>