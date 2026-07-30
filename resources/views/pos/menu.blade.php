<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POS Menu - Original Digman</title>
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
                    <a href="/menu" class="flex flex-col items-center justify-center w-20 h-20 rounded-2xl bg-[#712bb1] text-white font-bold text-xs shadow-lg transition transform hover:scale-105 shrink-0 mx-auto">
                        <div class="w-8 h-8 rounded-full bg-white/20 flex items-center justify-center mb-1">
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
        <main class="flex-1 flex flex-col lg:flex-row overflow-y-auto lg:overflow-hidden bg-[#4a444a]">

            <!-- Center Content Area -->
            <section class="flex-1 flex flex-col p-4 overflow-y-auto">
                
                <!-- Brand Header Banner Image -->
                <div class="bg-[#4a444a] rounded-xl py-2 px-4 mb-4 text-center shadow-md border border-slate-700/60 flex items-center justify-center overflow-hidden">
                    <img src="{{ asset('images/header-banner.png') }}" alt="Original Digman Halo-Halo Banner" class="max-h-16 w-auto object-contain">
                </div>

                <!-- Category Navigation Tabs -->
                <div class="flex items-center justify-around gap-2 mb-4 overflow-x-auto pb-1 text-sm font-semibold text-slate-300 border-b border-slate-600/50">
                    <button class="pb-2 px-3 hover:text-white transition whitespace-nowrap">Silog Dishes</button>
                    <button class="pb-2 px-3 hover:text-white transition whitespace-nowrap">Noodle Dishes</button>
                    <button class="pb-2 px-3 hover:text-white transition whitespace-nowrap">Single Dishes</button>
                    <button class="pb-2 px-3 text-amber-300 font-extrabold border-b-2 border-amber-300 whitespace-nowrap">Dessert</button>
                </div>

                <!-- Food Items Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    
                    <!-- Item Card 1 -->
                    <div class="bg-[#dcd8d8] rounded-lg p-3 shadow-md flex flex-col justify-between border border-slate-300">
                        <div>
                            <div class="w-full h-36 bg-[#8c888c] rounded flex items-center justify-center text-slate-200 font-bold text-sm mb-2 shadow-inner">
                                IMAGE HERE
                            </div>
                            <h3 class="font-extrabold text-slate-900 text-sm">Halo-Halo</h3>
                            <p class="text-purple-800 font-extrabold text-xs">P90</p>
                        </div>
                        <div class="flex items-center justify-end gap-1 mt-2 bg-slate-200 p-1 rounded border border-slate-300 text-xs font-bold">
                            <button onclick="updateQty('halo-1', -1)" class="px-1.5 py-0.5 bg-white rounded border border-slate-400 hover:bg-slate-100 active:scale-95 transition">-</button>
                            <span id="qty-halo-1" class="px-2">0</span>
                            <button onclick="updateQty('halo-1', 1)" class="px-1.5 py-0.5 bg-white rounded border border-slate-400 hover:bg-slate-100 active:scale-95 transition">+</button>
                        </div>
                    </div>

                    <!-- Item Card 2 -->
                    <div class="bg-[#dcd8d8] rounded-lg p-3 shadow-md flex flex-col justify-between border border-slate-300">
                        <div>
                            <div class="w-full h-36 bg-[#8c888c] rounded flex items-center justify-center text-slate-200 font-bold text-sm mb-2 shadow-inner">
                                IMAGE HERE
                            </div>
                            <h3 class="font-extrabold text-slate-900 text-sm">Halo-Halo Special</h3>
                            <p class="text-purple-800 font-extrabold text-xs">P120</p>
                        </div>
                        <div class="flex items-center justify-end gap-1 mt-2 bg-slate-200 p-1 rounded border border-slate-300 text-xs font-bold">
                            <button onclick="updateQty('halo-2', -1)" class="px-1.5 py-0.5 bg-white rounded border border-slate-400 hover:bg-slate-100 active:scale-95 transition">-</button>
                            <span id="qty-halo-2" class="px-2">0</span>
                            <button onclick="updateQty('halo-2', 1)" class="px-1.5 py-0.5 bg-white rounded border border-slate-400 hover:bg-slate-100 active:scale-95 transition">+</button>
                        </div>
                    </div>

                    <!-- Item Card 3 -->
                    <div class="bg-[#dcd8d8] rounded-lg p-3 shadow-md flex flex-col justify-between border border-slate-300">
                        <div>
                            <div class="w-full h-36 bg-[#8c888c] rounded flex items-center justify-center text-slate-200 font-bold text-sm mb-2 shadow-inner">
                                IMAGE HERE
                            </div>
                            <h3 class="font-extrabold text-slate-900 text-sm">Mais Con Yelo</h3>
                            <p class="text-purple-800 font-extrabold text-xs">P90</p>
                        </div>
                        <div class="flex items-center justify-end gap-1 mt-2 bg-slate-200 p-1 rounded border border-slate-300 text-xs font-bold">
                            <button onclick="updateQty('halo-3', -1)" class="px-1.5 py-0.5 bg-white rounded border border-slate-400 hover:bg-slate-100 active:scale-95 transition">-</button>
                            <span id="qty-halo-3" class="px-2">0</span>
                            <button onclick="updateQty('halo-3', 1)" class="px-1.5 py-0.5 bg-white rounded border border-slate-400 hover:bg-slate-100 active:scale-95 transition">+</button>
                        </div>
                    </div>

                </div>
            </section>

            <!-- Right Cashier Panel -->
            <aside class="w-full lg:w-80 bg-[#e0dede] p-4 flex flex-col justify-between shadow-xl shrink-0 border-t lg:border-t-0 lg:border-l border-slate-400">
                <div>
                    <select class="w-full p-2 rounded bg-[#dcd8d8] border border-slate-300 text-slate-800 font-semibold text-xs mb-2 focus:outline-none">
                        <option>Take Out</option>
                        <option>Dine In</option>
                    </select>

                    <input type="text" placeholder="Table Number" class="w-full p-2 rounded bg-[#dcd8d8] border border-slate-300 text-slate-700 text-xs mb-4 focus:outline-none">

                    <h2 class="font-bold text-slate-900 text-sm mb-2 border-b border-slate-300 pb-1">Order Details</h2>
                    <div id="order-summary-list" class="space-y-1 text-xs text-slate-800 font-medium mb-4 min-h-[60px]">
                        <div class="flex justify-between">
                            <span>10x Halo-Halo</span>
                            <span>P900</span>
                        </div>
                    </div>

                    <div class="space-y-1 text-xs text-slate-800 font-semibold border-t border-slate-300 pt-2 mb-3">
                        <div class="flex justify-between">
                            <span>Sub Total:</span>
                            <span id="subtotal">P900</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Discount:</span>
                            <span>P0.00</span>
                        </div>
                        <div class="flex justify-between font-extrabold text-slate-900 text-sm pt-1">
                            <span>Total:</span>
                            <span id="total">P900</span>
                        </div>
                        <div class="flex justify-between items-center pt-1">
                            <span>Cash:</span>
                            <div class="flex items-center bg-[#dcd8d8] px-2 py-1 rounded border border-slate-300 font-bold text-xs w-28 justify-between">
                                <span>P</span>
                                <span id="cash-rendered">0</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Cashier Keypad -->
                <div class="mt-2">
                    <div class="grid grid-cols-4 gap-1.5 text-xs font-bold">
                        <button onclick="pressKey('1')" class="py-2.5 rounded bg-slate-200 text-slate-900 shadow hover:bg-slate-300 active:scale-95 transition">1</button>
                        <button onclick="pressKey('2')" class="py-2.5 rounded bg-slate-200 text-slate-900 shadow hover:bg-slate-300 active:scale-95 transition">2</button>
                        <button onclick="pressKey('3')" class="py-2.5 rounded bg-slate-200 text-slate-900 shadow hover:bg-slate-300 active:scale-95 transition">3</button>
                        <button onclick="clearCash()" class="py-2.5 rounded bg-[#6cb2eb] text-white shadow hover:opacity-90 active:scale-95 transition">Cancel</button>

                        <button onclick="pressKey('4')" class="py-2.5 rounded bg-slate-200 text-slate-900 shadow hover:bg-slate-300 active:scale-95 transition">4</button>
                        <button onclick="pressKey('5')" class="py-2.5 rounded bg-slate-200 text-slate-900 shadow hover:bg-slate-300 active:scale-95 transition">5</button>
                        <button onclick="pressKey('6')" class="py-2.5 rounded bg-slate-200 text-slate-900 shadow hover:bg-slate-300 active:scale-95 transition">6</button>
                        <button onclick="deleteCash()" class="py-2.5 rounded bg-[#f66d9b] text-white shadow hover:opacity-90 active:scale-95 transition">Delete</button>

                        <button onclick="pressKey('7')" class="py-2.5 rounded bg-slate-200 text-slate-900 shadow hover:bg-slate-300 active:scale-95 transition">7</button>
                        <button onclick="pressKey('8')" class="py-2.5 rounded bg-slate-200 text-slate-900 shadow hover:bg-slate-300 active:scale-95 transition">8</button>
                        <button onclick="pressKey('9')" class="py-2.5 rounded bg-slate-200 text-slate-900 shadow hover:bg-slate-300 active:scale-95 transition">9</button>
                        <button onclick="submitCheckout()" class="py-2.5 rounded bg-[#38c172] text-white shadow hover:opacity-90 active:scale-95 transition">Checkout</button>

                        <button onclick="pressKey('0')" class="py-2.5 rounded bg-slate-200 text-slate-900 shadow hover:bg-slate-300 active:scale-95 transition">0</button>
                        <button onclick="pressKey('00')" class="py-2.5 rounded bg-slate-200 text-slate-900 shadow hover:bg-slate-300 active:scale-95 transition">00</button>
                        <button onclick="pressKey('.')" class="py-2.5 rounded bg-slate-200 text-slate-900 shadow hover:bg-slate-300 active:scale-95 transition">.</button>
                        <button onclick="pressKey('000')" class="py-2.5 rounded bg-slate-200 text-slate-900 shadow hover:bg-slate-300 active:scale-95 transition">000</button>
                    </div>
                </div>
            </aside>

        </main>
    </div>

    <!-- JS Interactivity -->
    <script>
        let quantities = {'halo-1': 10};
        let rawCash = '';

        function updateQty(itemId, change) {
            if (!quantities[itemId]) quantities[itemId] = 0;
            quantities[itemId] = Math.max(0, quantities[itemId] + change);
            document.getElementById(`qty-${itemId}`).innerText = quantities[itemId];
            recalculateTotals();
        }

        function recalculateTotals() {
            const prices = {'halo-1': 90, 'halo-2': 120, 'halo-3': 90};
            let total = 0;
            for (let id in quantities) {
                total += quantities[id] * (prices[id] || 0);
            }
            document.getElementById('subtotal').innerText = `P${total}`;
            document.getElementById('total').innerText = `P${total}`;
        }

        function pressKey(key) {
            if (key === '.' && rawCash.includes('.')) return;
            rawCash += key;
            document.getElementById('cash-rendered').innerText = rawCash || '0';
        }

        function deleteCash() {
            rawCash = rawCash.slice(0, -1);
            document.getElementById('cash-rendered').innerText = rawCash || '0';
        }

        function clearCash() {
            rawCash = '';
            document.getElementById('cash-rendered').innerText = '0';
        }

        function submitCheckout() {
            alert('Checkout processed successfully!');
        }
    </script>
</body>
</html>