<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POS Menu - Original Digman Halo-Halo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-slate-100 font-sans antialiased text-slate-800 h-screen flex overflow-hidden">

    <!-- Sidebar Navigation -->
    <aside class="w-64 bg-slate-900 text-white flex flex-col justify-between p-4 shadow-xl">
        <div>
            <!-- Brand Header -->
            <div class="px-2 py-4 mb-6 border-b border-slate-800 text-center">
                <h1 class="font-extrabold text-xl text-amber-400 tracking-wide uppercase">Original Digman</h1>
                <p class="text-xs text-slate-400 mt-1">Halo-Halo & Siopao</p>
            </div>

            <!-- Nav Links -->
            <nav class="space-y-2">
                <a href="/menu" class="flex items-center gap-3 px-4 py-3 rounded-xl bg-purple-600 text-white font-semibold shadow-md transition">
                    <i class="fa-solid fa-utensils text-lg"></i>
                    <span>Menu / Order</span>
                </a>
                <a href="/kitchen" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-400 hover:bg-slate-800 hover:text-white font-medium transition">
                    <i class="fa-solid fa-kitchen-set text-lg"></i>
                    <span>Kitchen Queue</span>
                </a>
                <a href="/dashboard" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-400 hover:bg-slate-800 hover:text-white font-medium transition">
                    <i class="fa-solid fa-chart-line text-lg"></i>
                    <span>Dashboard</span>
                </a>
            </nav>
        </div>

        <!-- Footer / Status -->
        <div class="p-3 bg-slate-800/60 rounded-lg text-xs text-slate-400 flex items-center justify-between">
            <span>Status: <strong class="text-emerald-400">Online</strong></span>
            <i class="fa-solid fa-circle text-emerald-400 text-[10px]"></i>
        </div>
    </aside>

    <!-- Main Content Area -->
    <main class="flex-1 flex overflow-hidden">
        
        <!-- Left Section: Menu Items -->
        <section class="flex-1 flex flex-col p-6 overflow-y-auto">
            
            <!-- Category Navigation Bar -->
            <div class="flex items-center gap-3 mb-6 overflow-x-auto pb-2">
                <button class="px-5 py-2.5 rounded-full bg-purple-600 text-white font-semibold shadow-sm hover:bg-purple-700 transition whitespace-nowrap">
                    Dessert
                </button>
                <button class="px-5 py-2.5 rounded-full bg-white text-slate-600 font-medium hover:bg-slate-200 transition shadow-sm border border-slate-200 whitespace-nowrap">
                    Silog Dishes
                </button>
                <button class="px-5 py-2.5 rounded-full bg-white text-slate-600 font-medium hover:bg-slate-200 transition shadow-sm border border-slate-200 whitespace-nowrap">
                    Noodle Dishes
                </button>
                <button class="px-5 py-2.5 rounded-full bg-white text-slate-600 font-medium hover:bg-slate-200 transition shadow-sm border border-slate-200 whitespace-nowrap">
                    Single Dishes
                </button>
            </div>

            <!-- Food Items Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                
                <!-- Item Card 1 -->
                <div class="bg-white rounded-2xl p-4 shadow-sm border border-slate-200/80 flex flex-col justify-between hover:shadow-md transition">
                    <div>
                        <div class="w-full h-40 bg-slate-100 rounded-xl mb-3 flex items-center justify-center text-slate-400 overflow-hidden">
                            <i class="fa-solid fa-bowl-food text-4xl"></i>
                        </div>
                        <h3 class="font-bold text-slate-800 text-lg">Halo-Halo</h3>
                        <p class="text-purple-600 font-extrabold text-xl mt-1">₱90.00</p>
                    </div>
                    <!-- Touch-friendly Quantity Selector -->
                    <div class="flex items-center justify-between mt-4 bg-slate-50 p-1.5 rounded-xl border border-slate-200">
                        <button class="w-10 h-10 rounded-lg bg-white shadow-sm border border-slate-200 text-slate-700 font-bold text-lg flex items-center justify-center hover:bg-slate-100 active:scale-95 transition">-</button>
                        <span class="font-bold text-slate-800 text-lg">0</span>
                        <button class="w-10 h-10 rounded-lg bg-purple-600 shadow-sm text-white font-bold text-lg flex items-center justify-center hover:bg-purple-700 active:scale-95 transition">+</button>
                    </div>
                </div>

                <!-- Item Card 2 -->
                <div class="bg-white rounded-2xl p-4 shadow-sm border border-slate-200/80 flex flex-col justify-between hover:shadow-md transition">
                    <div>
                        <div class="w-full h-40 bg-slate-100 rounded-xl mb-3 flex items-center justify-center text-slate-400 overflow-hidden">
                            <i class="fa-solid fa-ice-cream text-4xl"></i>
                        </div>
                        <h3 class="font-bold text-slate-800 text-lg">Halo-Halo Special</h3>
                        <p class="text-purple-600 font-extrabold text-xl mt-1">₱120.00</p>
                    </div>
                    <div class="flex items-center justify-between mt-4 bg-slate-50 p-1.5 rounded-xl border border-slate-200">
                        <button class="w-10 h-10 rounded-lg bg-white shadow-sm border border-slate-200 text-slate-700 font-bold text-lg flex items-center justify-center hover:bg-slate-100 active:scale-95 transition">-</button>
                        <span class="font-bold text-slate-800 text-lg">0</span>
                        <button class="w-10 h-10 rounded-lg bg-purple-600 shadow-sm text-white font-bold text-lg flex items-center justify-center hover:bg-purple-700 active:scale-95 transition">+</button>
                    </div>
                </div>

                <!-- Item Card 3 -->
                <div class="bg-white rounded-2xl p-4 shadow-sm border border-slate-200/80 flex flex-col justify-between hover:shadow-md transition">
                    <div>
                        <div class="w-full h-40 bg-slate-100 rounded-xl mb-3 flex items-center justify-center text-slate-400 overflow-hidden">
                            <i class="fa-solid fa-glass-water text-4xl"></i>
                        </div>
                        <h3 class="font-bold text-slate-800 text-lg">Mais Con Yelo</h3>
                        <p class="text-purple-600 font-extrabold text-xl mt-1">₱90.00</p>
                    </div>
                    <div class="flex items-center justify-between mt-4 bg-slate-50 p-1.5 rounded-xl border border-slate-200">
                        <button class="w-10 h-10 rounded-lg bg-white shadow-sm border border-slate-200 text-slate-700 font-bold text-lg flex items-center justify-center hover:bg-slate-100 active:scale-95 transition">-</button>
                        <span class="font-bold text-slate-800 text-lg">0</span>
                        <button class="w-10 h-10 rounded-lg bg-purple-600 shadow-sm text-white font-bold text-lg flex items-center justify-center hover:bg-purple-700 active:scale-95 transition">+</button>
                    </div>
                </div>

            </div>
        </section>

        <!-- Right Section: Order Summary & Cashier Keypad -->
        <aside class="w-96 bg-white border-l border-slate-200 flex flex-col justify-between p-6 shadow-lg">
            <div>
                <!-- Order Type Options -->
                <div class="grid grid-cols-2 gap-3 mb-4">
                    <button class="py-2.5 rounded-xl border-2 border-purple-600 bg-purple-50 text-purple-700 font-bold text-sm">Take Out</button>
                    <button class="py-2.5 rounded-xl border border-slate-200 bg-white text-slate-600 font-semibold text-sm hover:bg-slate-50">Dine In</button>
                </div>

                <input type="text" placeholder="Table Number / Customer Name" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 bg-slate-50 text-sm focus:outline-none focus:ring-2 focus:ring-purple-600 mb-6">

                <!-- Order Totals -->
                <h2 class="font-bold text-slate-800 text-lg mb-3 border-b border-slate-100 pb-2">Order Details</h2>
                <div class="space-y-2 text-sm text-slate-600 mb-4">
                    <div class="flex justify-between">
                        <span>Sub Total:</span>
                        <span class="font-semibold text-slate-800">₱0.00</span>
                    </div>
                    <div class="flex justify-between text-base font-bold text-slate-900 border-t border-slate-100 pt-2">
                        <span>Total:</span>
                        <span class="text-purple-600 text-xl">₱0.00</span>
                    </div>
                    <div class="flex justify-between items-center bg-slate-50 p-2.5 rounded-xl border border-slate-200 mt-2">
                        <span class="font-medium text-slate-700">Cash Rendered:</span>
                        <span class="font-mono font-extrabold text-slate-900 text-lg">₱0.00</span>
                    </div>
                </div>
            </div>

            <!-- Tactile Cashier Keypad -->
            <div>
                <div class="grid grid-cols-4 gap-2 mb-3">
                    <button class="h-12 rounded-xl bg-slate-100 font-bold text-slate-800 text-lg hover:bg-slate-200 active:bg-slate-300">1</button>
                    <button class="h-12 rounded-xl bg-slate-100 font-bold text-slate-800 text-lg hover:bg-slate-200 active:bg-slate-300">2</button>
                    <button class="h-12 rounded-xl bg-slate-100 font-bold text-slate-800 text-lg hover:bg-slate-200 active:bg-slate-300">3</button>
                    <button class="h-12 rounded-xl bg-sky-100 text-sky-700 font-bold text-sm hover:bg-sky-200 active:bg-sky-300">Cancel</button>

                    <button class="h-12 rounded-xl bg-slate-100 font-bold text-slate-800 text-lg hover:bg-slate-200 active:bg-slate-300">4</button>
                    <button class="h-12 rounded-xl bg-slate-100 font-bold text-slate-800 text-lg hover:bg-slate-200 active:bg-slate-300">5</button>
                    <button class="h-12 rounded-xl bg-slate-100 font-bold text-slate-800 text-lg hover:bg-slate-200 active:bg-slate-300">6</button>
                    <button class="h-12 rounded-xl bg-rose-100 text-rose-700 font-bold text-sm hover:bg-rose-200 active:bg-rose-300">Delete</button>

                    <button class="h-12 rounded-xl bg-slate-100 font-bold text-slate-800 text-lg hover:bg-slate-200 active:bg-slate-300">7</button>
                    <button class="h-12 rounded-xl bg-slate-100 font-bold text-slate-800 text-lg hover:bg-slate-200 active:bg-slate-300">8</button>
                    <button class="h-12 rounded-xl bg-slate-100 font-bold text-slate-800 text-lg hover:bg-slate-200 active:bg-slate-300">9</button>
                    
                    <!-- Primary Action Button -->
                    <button class="row-span-2 h-full rounded-xl bg-emerald-600 text-white font-extrabold text-sm shadow-md hover:bg-emerald-700 active:bg-emerald-800 flex flex-col items-center justify-center gap-1">
                        <i class="fa-solid fa-check text-lg"></i>
                        <span>Checkout</span>
                    </button>

                    <button class="h-12 rounded-xl bg-slate-100 font-bold text-slate-800 text-lg hover:bg-slate-200 active:bg-slate-300">0</button>
                    <button class="h-12 rounded-xl bg-slate-100 font-bold text-slate-800 text-lg hover:bg-slate-200 active:bg-slate-300">00</button>
                    <button class="h-12 rounded-xl bg-slate-100 font-bold text-slate-800 text-lg hover:bg-slate-200 active:bg-slate-300">.</button>
                </div>
            </div>
        </aside>

    </main>

</body>
</html>