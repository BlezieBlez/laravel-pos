<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POS Menu - Original Digman Halo-Halo</title>
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
                <a href="/menu" class="flex-1 lg:flex-none flex items-center justify-center lg:justify-start gap-3 px-4 py-3 rounded-xl bg-purple-600 text-white font-semibold shadow-md whitespace-nowrap">
                    <i class="fa-solid fa-utensils text-lg"></i>
                    <span>Menu / Order</span>
                </a>
                <a href="/kitchen" class="flex-1 lg:flex-none flex items-center justify-center lg:justify-start gap-3 px-4 py-3 rounded-xl text-slate-400 hover:bg-slate-800 hover:text-white font-medium transition whitespace-nowrap">
                    <i class="fa-solid fa-kitchen-set text-lg"></i>
                    <span>Kitchen Queue</span>
                </a>
                <a href="/dashboard" class="flex-1 lg:flex-none flex items-center justify-center lg:justify-start gap-3 px-4 py-3 rounded-xl text-slate-400 hover:bg-slate-800 hover:text-white font-medium transition whitespace-nowrap">
                    <i class="fa-solid fa-chart-line text-lg"></i>
                    <span>Dashboard</span>
                </a>
            </nav>
        </div>

        <!-- Footer / Status -->
        <div class="hidden lg:flex p-3 bg-slate-800/60 rounded-lg text-xs text-slate-400 items-center justify-between mt-4">
            <span>Status: <strong class="text-emerald-400">Online</strong></span>
            <i class="fa-solid fa-circle text-emerald-400 text-[10px]"></i>
        </div>
    </aside>

    <!-- Main Content Area -->
    <main class="flex-1 flex flex-col lg:flex-row overflow-y-auto lg:overflow-hidden w-full">
        
        <!-- Left Section: Menu Items -->
        <section class="flex-1 flex flex-col p-4 lg:p-6 overflow-y-auto">
            
            <!-- Category Navigation Bar -->
            <div class="flex items-center gap-2 lg:gap-3 mb-6 overflow-x-auto pb-2 scrollbar-none">
                <button class="px-5 py-2.5 rounded-full bg-purple-600 text-white font-semibold shadow-sm hover:bg-purple-700 active:scale-95 transition whitespace-nowrap">
                    Dessert
                </button>
                <button class="px-5 py-2.5 rounded-full bg-white text-slate-600 font-medium hover:bg-slate-200 active:scale-95 transition shadow-sm border border-slate-200 whitespace-nowrap">
                    Silog Dishes
                </button>
                <button class="px-5 py-2.5 rounded-full bg-white text-slate-600 font-medium hover:bg-slate-200 active:scale-95 transition shadow-sm border border-slate-200 whitespace-nowrap">
                    Noodle Dishes
                </button>
                <button class="px-5 py-2.5 rounded-full bg-white text-slate-600 font-medium hover:bg-slate-200 active:scale-95 transition shadow-sm border border-slate-200 whitespace-nowrap">
                    Single Dishes
                </button>
            </div>

            <!-- Food Items Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-4 lg:gap-6">
                
                <!-- Item Card 1 -->
                <div class="bg-white rounded-2xl p-4 shadow-sm border border-slate-200/80 flex flex-col justify-between hover:shadow-md transition" data-price="90">
                    <div>
                        <div class="w-full h-36 lg:h-40 bg-slate-100 rounded-xl mb-3 flex items-center justify-center text-slate-400 overflow-hidden">
                            <i class="fa-solid fa-bowl-food text-4xl"></i>
                        </div>
                        <h3 class="font-bold text-slate-800 text-lg">Halo-Halo</h3>
                        <p class="text-purple-600 font-extrabold text-xl mt-1">₱90.00</p>
                    </div>
                    <div class="flex items-center justify-between mt-4 bg-slate-50 p-1.5 rounded-xl border border-slate-200">
                        <button onclick="updateQty('halo-1', -1, 90)" class="w-11 h-11 rounded-lg bg-white shadow-sm border border-slate-200 text-slate-700 font-bold text-xl flex items-center justify-center hover:bg-slate-100 active:scale-90 transition cursor-pointer">-</button>
                        <span id="qty-halo-1" class="font-bold text-slate-800 text-lg">0</span>
                        <button onclick="updateQty('halo-1', 1, 90)" class="w-11 h-11 rounded-lg bg-purple-600 shadow-sm text-white font-bold text-xl flex items-center justify-center hover:bg-purple-700 active:scale-90 transition cursor-pointer">+</button>
                    </div>
                </div>

                <!-- Item Card 2 -->
                <div class="bg-white rounded-2xl p-4 shadow-sm border border-slate-200/80 flex flex-col justify-between hover:shadow-md transition" data-price="120">
                    <div>
                        <div class="w-full h-36 lg:h-40 bg-slate-100 rounded-xl mb-3 flex items-center justify-center text-slate-400 overflow-hidden">
                            <i class="fa-solid fa-ice-cream text-4xl"></i>
                        </div>
                        <h3 class="font-bold text-slate-800 text-lg">Halo-Halo Special</h3>
                        <p class="text-purple-600 font-extrabold text-xl mt-1">₱120.00</p>
                    </div>
                    <div class="flex items-center justify-between mt-4 bg-slate-50 p-1.5 rounded-xl border border-slate-200">
                        <button onclick="updateQty('halo-2', -1, 120)" class="w-11 h-11 rounded-lg bg-white shadow-sm border border-slate-200 text-slate-700 font-bold text-xl flex items-center justify-center hover:bg-slate-100 active:scale-90 transition cursor-pointer">-</button>
                        <span id="qty-halo-2" class="font-bold text-slate-800 text-lg">0</span>
                        <button onclick="updateQty('halo-2', 1, 120)" class="w-11 h-11 rounded-lg bg-purple-600 shadow-sm text-white font-bold text-xl flex items-center justify-center hover:bg-purple-700 active:scale-90 transition cursor-pointer">+</button>
                    </div>
                </div>

                <!-- Item Card 3 -->
                <div class="bg-white rounded-2xl p-4 shadow-sm border border-slate-200/80 flex flex-col justify-between hover:shadow-md transition" data-price="90">
                    <div>
                        <div class="w-full h-36 lg:h-40 bg-slate-100 rounded-xl mb-3 flex items-center justify-center text-slate-400 overflow-hidden">
                            <i class="fa-solid fa-glass-water text-4xl"></i>
                        </div>
                        <h3 class="font-bold text-slate-800 text-lg">Mais Con Yelo</h3>
                        <p class="text-purple-600 font-extrabold text-xl mt-1">₱90.00</p>
                    </div>
                    <div class="flex items-center justify-between mt-4 bg-slate-50 p-1.5 rounded-xl border border-slate-200">
                        <button onclick="updateQty('halo-3', -1, 90)" class="w-11 h-11 rounded-lg bg-white shadow-sm border border-slate-200 text-slate-700 font-bold text-xl flex items-center justify-center hover:bg-slate-100 active:scale-90 transition cursor-pointer">-</button>
                        <span id="qty-halo-3" class="font-bold text-slate-800 text-lg">0</span>
                        <button onclick="updateQty('halo-3', 1, 90)" class="w-11 h-11 rounded-lg bg-purple-600 shadow-sm text-white font-bold text-xl flex items-center justify-center hover:bg-purple-700 active:scale-90 transition cursor-pointer">+</button>
                    </div>
                </div>

            </div>
        </section>

        <!-- Right Section: Order Summary & Cashier Keypad -->
        <aside class="w-full lg:w-96 bg-white border-t lg:border-t-0 lg:border-l border-slate-200 flex flex-col justify-between p-4 lg:p-6 shadow-lg shrink-0">
            <div>
                <!-- Order Type Options -->
                <div class="grid grid-cols-2 gap-3 mb-4">
                    <button id="btn-takeout" onclick="setOrderType('takeout')" class="py-2.5 rounded-xl border-2 border-purple-600 bg-purple-50 text-purple-700 font-bold text-sm cursor-pointer transition">Take Out</button>
                    <button id="btn-dinein" onclick="setOrderType('dinein')" class="py-2.5 rounded-xl border border-slate-200 bg-white text-slate-600 font-semibold text-sm hover:bg-slate-50 cursor-pointer transition">Dine In</button>
                </div>

                <input type="text" placeholder="Table Number / Customer Name" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 bg-slate-50 text-sm focus:outline-none focus:ring-2 focus:ring-purple-600 mb-4">

                <!-- Order Totals -->
                <h2 class="font-bold text-slate-800 text-lg mb-2 border-b border-slate-100 pb-2">Order Details</h2>
                <div class="space-y-2 text-sm text-slate-600 mb-4">
                    <div class="flex justify-between">
                        <span>Sub Total:</span>
                        <span id="subtotal" class="font-semibold text-slate-800">₱0.00</span>
                    </div>
                    <div class="flex justify-between text-base font-bold text-slate-900 border-t border-slate-100 pt-2">
                        <span>Total:</span>
                        <span id="total" class="text-purple-600 text-xl">₱0.00</span>
                    </div>
                    <div class="flex justify-between items-center bg-slate-50 p-2.5 rounded-xl border border-slate-200 mt-2">
                        <span class="font-medium text-slate-700">Cash Rendered:</span>
                        <span id="cash-rendered" class="font-mono font-extrabold text-slate-900 text-lg">₱0.00</span>
                    </div>
                </div>
            </div>

            <!-- Tactile Cashier Keypad -->
            <div class="mt-2">
                <div class="grid grid-cols-4 gap-2 mb-2">
                    <button onclick="pressKey('1')" class="h-12 rounded-xl bg-slate-100 font-bold text-slate-800 text-lg hover:bg-slate-200 active:scale-95 transition cursor-pointer">1</button>
                    <button onclick="pressKey('2')" class="h-12 rounded-xl bg-slate-100 font-bold text-slate-800 text-lg hover:bg-slate-200 active:scale-95 transition cursor-pointer">2</button>
                    <button onclick="pressKey('3')" class="h-12 rounded-xl bg-slate-100 font-bold text-slate-800 text-lg hover:bg-slate-200 active:scale-95 transition cursor-pointer">3</button>
                    <button onclick="clearCash()" class="h-12 rounded-xl bg-sky-100 text-sky-700 font-bold text-sm hover:bg-sky-200 active:scale-95 transition cursor-pointer">Cancel</button>

                    <button onclick="pressKey('4')" class="h-12 rounded-xl bg-slate-100 font-bold text-slate-800 text-lg hover:bg-slate-200 active:scale-95 transition cursor-pointer">4</button>
                    <button onclick="pressKey('5')" class="h-12 rounded-xl bg-slate-100 font-bold text-slate-800 text-lg hover:bg-slate-200 active:scale-95 transition cursor-pointer">5</button>
                    <button onclick="pressKey('6')" class="h-12 rounded-xl bg-slate-100 font-bold text-slate-800 text-lg hover:bg-slate-200 active:scale-95 transition cursor-pointer">6</button>
                    <button onclick="deleteCash()" class="h-12 rounded-xl bg-rose-100 text-rose-700 font-bold text-sm hover:bg-rose-200 active:scale-95 transition cursor-pointer">Delete</button>

                    <button onclick="pressKey('7')" class="h-12 rounded-xl bg-slate-100 font-bold text-slate-800 text-lg hover:bg-slate-200 active:scale-95 transition cursor-pointer">7</button>
                    <button onclick="pressKey('8')" class="h-12 rounded-xl bg-slate-100 font-bold text-slate-800 text-lg hover:bg-slate-200 active:scale-95 transition cursor-pointer">8</button>
                    <button onclick="pressKey('9')" class="h-12 rounded-xl bg-slate-100 font-bold text-slate-800 text-lg hover:bg-slate-200 active:scale-95 transition cursor-pointer">9</button>
                    
                    <!-- Checkout Button -->
                    <button onclick="submitCheckout()" class="row-span-2 h-full rounded-xl bg-emerald-600 text-white font-extrabold text-sm shadow-md hover:bg-emerald-700 active:scale-95 transition flex flex-col items-center justify-center gap-1 cursor-pointer">
                        <i class="fa-solid fa-check text-lg"></i>
                        <span>Checkout</span>
                    </button>

                    <button onclick="pressKey('0')" class="h-12 rounded-xl bg-slate-100 font-bold text-slate-800 text-lg hover:bg-slate-200 active:scale-95 transition cursor-pointer">0</button>
                    <button onclick="pressKey('00')" class="h-12 rounded-xl bg-slate-100 font-bold text-slate-800 text-lg hover:bg-slate-200 active:scale-95 transition cursor-pointer">00</button>
                    <button onclick="pressKey('.')" class="h-12 rounded-xl bg-slate-100 font-bold text-slate-800 text-lg hover:bg-slate-200 active:scale-95 transition cursor-pointer">.</button>
                </div>
            </div>
        </aside>

    </main>

    <!-- JavaScript Interactivity -->
    <script>
        let quantities = {};
        let rawCash = '';
        let totalAmount = 0;

        function updateQty(itemId, change, price) {
            if (!quantities[itemId]) quantities[itemId] = 0;
            
            // Adjust quantity
            quantities[itemId] = Math.max(0, quantities[itemId] + change);
            
            // Update quantity display
            document.getElementById(`qty-${itemId}`).innerText = quantities[itemId];
            
            // Recalculate totals
            recalculateTotals();
        }

        function recalculateTotals() {
            // Hardcoded map corresponding to the item prices
            const prices = {
                'halo-1': 90,
                'halo-2': 120,
                'halo-3': 90
            };

            totalAmount = 0;
            for (let id in quantities) {
                totalAmount += quantities[id] * (prices[id] || 0);
            }

            document.getElementById('subtotal').innerText = `₱${totalAmount.toFixed(2)}`;
            document.getElementById('total').innerText = `₱${totalAmount.toFixed(2)}`;
        }

        function pressKey(key) {
            if (key === '.' && rawCash.includes('.')) return;
            rawCash += key;
            updateCashDisplay();
        }

        function deleteCash() {
            rawCash = rawCash.slice(0, -1);
            updateCashDisplay();
        }

        function clearCash() {
            rawCash = '';
            updateCashDisplay();
        }

        function updateCashDisplay() {
            const displayVal = rawCash === '' ? '0.00' : rawCash;
            document.getElementById('cash-rendered').innerText = `₱${displayVal}`;
        }

        function setOrderType(type) {
            const takeoutBtn = document.getElementById('btn-takeout');
            const dineinBtn = document.getElementById('btn-dinein');

            if (type === 'takeout') {
                takeoutBtn.className = "py-2.5 rounded-xl border-2 border-purple-600 bg-purple-50 text-purple-700 font-bold text-sm cursor-pointer transition";
                dineinBtn.className = "py-2.5 rounded-xl border border-slate-200 bg-white text-slate-600 font-semibold text-sm hover:bg-slate-50 cursor-pointer transition";
            } else {
                dineinBtn.className = "py-2.5 rounded-xl border-2 border-purple-600 bg-purple-50 text-purple-700 font-bold text-sm cursor-pointer transition";
                takeoutBtn.className = "py-2.5 rounded-xl border border-slate-200 bg-white text-slate-600 font-semibold text-sm hover:bg-slate-50 cursor-pointer transition";
            }
        }

        function submitCheckout() {
            const cash = parseFloat(rawCash) || 0;
            if (totalAmount === 0) {
                alert('Please add at least one item to the order.');
                return;
            }
            if (cash < totalAmount) {
                alert(`Insufficient cash rendered! Total is ₱${totalAmount.toFixed(2)}.`);
                return;
            }
            
            const change = cash - totalAmount;
            alert(`Order placed successfully! Change: ₱${change.toFixed(2)}`);
            
            // Reset order state
            quantities = {};
            document.querySelectorAll('[id^="qty-"]').forEach(el => el.innerText = '0');
            clearCash();
            recalculateTotals();
        }
    </script>
</body>
</html>