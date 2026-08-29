<!DOCTYPE html>
<html lang="en" class="h-full overflow-hidden">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>POS Menu</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-[#cac4c4] font-sans antialiased text-slate-800 h-screen w-screen overflow-hidden p-2 lg:p-3 box-border">
    <div class="w-full h-full flex flex-col lg:flex-row bg-slate-100 rounded-xl overflow-hidden shadow-2xl border border-slate-300">
        
        @include('pos.partials.sidebar')

        <!-- Main Workspace -->
        <main class="flex-1 flex flex-col p-3 lg:p-4 overflow-hidden h-full bg-slate-100">
            
            <!-- Brand Header Banner -->
            <div class="bg-[#dcd8d8] rounded-xl py-2 px-4 mb-3 text-center shadow-md border border-slate-700/60 flex items-center justify-between shrink-0">
                <img src="{{ asset('images/header-banner.png') }}" alt="Original Digman Banner" class="max-h-10 w-auto object-contain">
                <div class="flex items-center gap-2">
                    <span class="text-xs font-extrabold text-slate-700 bg-slate-200/80 px-3 py-1 rounded-full border border-slate-300 shadow-sm">
                        <i class="fa-solid fa-utensils mr-1"></i> Point of Sale
                    </span>
                </div>
            </div>

            <!-- Category Navigation Bar -->
            <div class="flex items-center gap-8 border-b border-slate-300 mb-3 px-2 pb-1 shrink-0 font-bold text-xs">
                <button onclick="switchCategory('silog')" id="cat-silog" class="category-btn text-amber-600 border-b-2 border-amber-500 font-extrabold pb-1 transition">
                    Silog Dishes
                </button>
                <button onclick="switchCategory('noodle')" id="cat-noodle" class="category-btn text-slate-600 hover:text-slate-900 pb-1 border-b-2 border-transparent transition">
                    Noodle Dishes
                </button>
                <button onclick="switchCategory('snacks')" id="cat-snacks" class="category-btn text-slate-600 hover:text-slate-900 pb-1 border-b-2 border-transparent transition">
                    Snacks
                </button>
                <button onclick="switchCategory('dessert')" id="cat-dessert" class="category-btn text-slate-600 hover:text-slate-900 pb-1 border-b-2 border-transparent transition">
                    Dessert
                </button>
            </div>

            <!-- Menu Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-3 overflow-y-auto" id="menu-grid"></div>
        </main>

        <!-- Cashier Panel -->
        <aside class="w-full lg:w-80 bg-[#e0dede] p-3 lg:p-4 flex flex-col justify-between shadow-xl shrink-0 border-t lg:border-t-0 lg:border-l border-slate-300 h-full overflow-y-auto">
            <div>
                <select id="order-type-select" class="w-full p-2 rounded bg-[#dcd8d8] border border-slate-300 text-slate-800 font-bold text-xs mb-2 focus:outline-none">
                    <option value="Take Out">Take Out</option>
                    <option value="Dine-In">Dine In</option>
                </select>

                <input type="text" id="table-number-input" placeholder="Table Number" class="w-full p-2 rounded bg-[#dcd8d8] border border-slate-300 text-slate-700 font-medium text-xs mb-3 focus:outline-none">

                <h2 class="font-extrabold text-slate-900 text-xs mb-1.5 border-b border-slate-300 pb-1">Order Details</h2>
                
                <div id="order-summary-list" class="space-y-1 text-xs text-slate-800 font-medium mb-3 min-h-[40px] max-h-[100px] overflow-y-auto">
                    <p class="text-slate-400 italic text-center py-2">No items added yet</p>
                </div>

                <div class="space-y-1 text-xs text-slate-800 font-semibold border-t border-slate-300 pt-2 mb-2">
                    <div class="flex justify-between">
                        <span>Sub Total:</span>
                        <span id="subtotal">P0.00</span>
                    </div>

                    <div class="flex justify-between items-center text-slate-700">
                        <span>Discount:</span>
                        <select id="discount-select" onchange="recalculateTotals()" class="px-1 py-0.5 bg-[#dcd8d8] border border-slate-300 rounded text-[11px] font-bold focus:outline-none">
                            <option value="0">None (0%)</option>
                            <option value="0.05">5%</option>
                            <option value="0.10">10%</option>
                            <option value="0.20">20% (Senior/PWD)</option>
                        </select>
                    </div>

                    <div class="flex justify-between font-extrabold text-slate-900 text-xs pt-1 border-t border-slate-200">
                        <span>Total:</span>
                        <span id="total">P0.00</span>
                    </div>

                    <div class="flex justify-between items-center pt-1">
                        <span>Cash:</span>
                        <div class="flex items-center bg-[#dcd8d8] px-2 py-0.5 rounded border border-slate-300 font-bold text-xs w-28 justify-between">
                            <span>P</span>
                            <span id="cash-rendered">0</span>
                        </div>
                    </div>

                    <div class="flex justify-between items-center font-bold text-emerald-700 bg-emerald-100/60 px-2 py-0.5 rounded border border-emerald-300 mt-1">
                        <span>Change:</span>
                        <span id="change-rendered">P0.00</span>
                    </div>
                </div>
            </div>

            <!-- Keypad -->
            <div class="mt-1">
                <div class="grid grid-cols-4 gap-1 text-xs font-bold">
                    <button onclick="pressKey('1')" class="py-2 rounded bg-slate-200 text-slate-900 shadow hover:bg-slate-300 active:scale-95 transition">1</button>
                    <button onclick="pressKey('2')" class="py-2 rounded bg-slate-200 text-slate-900 shadow hover:bg-slate-300 active:scale-95 transition">2</button>
                    <button onclick="pressKey('3')" class="py-2 rounded bg-slate-200 text-slate-900 shadow hover:bg-slate-300 active:scale-95 transition">3</button>
                    <button onclick="clearOrder()" class="py-2 rounded bg-[#6cb2eb] text-white shadow hover:opacity-90 active:scale-95 transition">Cancel</button>

                    <button onclick="pressKey('4')" class="py-2 rounded bg-slate-200 text-slate-900 shadow hover:bg-slate-300 active:scale-95 transition">4</button>
                    <button onclick="pressKey('5')" class="py-2 rounded bg-slate-200 text-slate-900 shadow hover:bg-slate-300 active:scale-95 transition">5</button>
                    <button onclick="pressKey('6')" class="py-2 rounded bg-slate-200 text-slate-900 shadow hover:bg-slate-300 active:scale-95 transition">6</button>
                    <button onclick="deleteCash()" class="py-2 rounded bg-[#f66d9b] text-white shadow hover:opacity-90 active:scale-95 transition">Delete</button>

                    <button onclick="pressKey('7')" class="py-2 rounded bg-slate-200 text-slate-900 shadow hover:bg-slate-300 active:scale-95 transition">7</button>
                    <button onclick="pressKey('8')" class="py-2 rounded bg-slate-200 text-slate-900 shadow hover:bg-slate-300 active:scale-95 transition">8</button>
                    <button onclick="pressKey('9')" class="py-2 rounded bg-slate-200 text-slate-900 shadow hover:bg-slate-300 active:scale-95 transition">9</button>
                    <button onclick="submitCheckout()" class="py-2 rounded bg-[#38c172] text-white shadow hover:opacity-90 active:scale-95 transition">Checkout</button>

                    <button onclick="pressKey('0')" class="py-2 rounded bg-slate-200 text-slate-900 shadow hover:bg-slate-300 active:scale-95 transition">0</button>
                    <button onclick="pressKey('00')" class="py-2 rounded bg-slate-200 text-slate-900 shadow hover:bg-slate-300 active:scale-95 transition">00</button>
                    <button onclick="pressKey('.')" class="py-2 rounded bg-slate-200 text-slate-900 shadow hover:bg-slate-300 active:scale-95 transition">.</button>
                    <button onclick="pressKey('000')" class="py-2 rounded bg-slate-200 text-slate-900 shadow hover:bg-slate-300 active:scale-95 transition">000</button>
                </div>
            </div>
        </aside>
    </div>
    <!-- RECEIPT MODAL -->
    <div id="receipt-modal" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50">

        <div class="bg-white rounded-lg shadow-xl p-5 w-80">

            <div id="receipt-print-area"
                class="text-center font-mono text-xs">

                <h2 class="font-extrabold text-lg">
                    DIGMAN ORIGINAL HALO-HALO & HOME MADE SIOPAO
                </h2>

                <p>Official Receipt</p>

                <hr class="my-2">

                <div id="receipt-content"></div>

                <hr class="my-2">

                <p class="font-bold">
                    THANK YOU!
                </p>

            </div>


            <div class="flex gap-2 mt-4">

                <button onclick="printReceipt()"
                class="flex-1 bg-green-500 text-white py-2 rounded">
                    PRINT
                </button>


                <button onclick="closeReceipt()"
                class="flex-1 bg-gray-400 text-white py-2 rounded">
                    CLOSE
                </button>

            </div>

        </div>

    </div>

    <script>
    const menuItems = {
        silog: [
            { id: 'silog-1', name: 'Tapsilog', price: 125 },
            { id: 'silog-2', name: 'Porksilog', price: 125 },
            { id: 'silog-3', name: 'Tapsi', price: 110 },
            { id: 'silog-4', name: 'Porksi', price: 110 }
        ],
        noodle: [
            { id: 'noodle-1', name: 'Pancit', price: 70 },
            { id: 'noodle-2', name: 'Spaghetti', price: 70 },
            { id: 'noodle-3', name: 'Palabok', price: 70 },
            { id: 'noodle-4', name: 'Chicken Mami', price: 70 }
        ],
        snacks: [
            { id: 'snacks-1', name: 'Siopao', price: 35 },
            { id: 'snacks-2', name: 'Empanada', price: 55 },
            { id: 'snacks-3', name: 'Tahong Chips', price: 65 },
            { id: 'snacks-4', name: 'BBQ', price: 35 },
            { id: 'snacks-5', name: 'Hotdog', price: 20 }
        ],
        dessert: [
            { id: 'dessert-1', name: 'Halo-Halo Special (With Ube Ice Cream)', price: 130 },
            { id: 'dessert-2', name: 'Halo-Halo', price: 120 },
            { id: 'dessert-3', name: 'Mais Con Yelo', price: 100 }
        ]
    };

    let quantities = {};
    let itemPrices = {};
    let itemNames = {};
    let currentCategory = 'silog';
    let rawCash = '';

    let currentReceipt = null;

    // Initialize items
    Object.keys(menuItems).forEach(cat => {
        menuItems[cat].forEach(item => {
            quantities[item.id] = 0;
            itemPrices[item.id] = item.price;
            itemNames[item.id] = item.name;
        });
    });

    function renderMenu(category) {
        const grid = document.getElementById('menu-grid');
        grid.innerHTML = '';
        
        menuItems[category].forEach(item => {
            const html = `
                <div class="bg-[#e0dede] p-3 rounded-xl shadow border border-slate-300 text-center flex flex-col justify-between items-center">
                    <div class="w-full flex flex-col items-center">
                        <h3 class="font-extrabold text-slate-800 text-sm">${item.name}</h3>
                        <p class="text-purple-800 font-extrabold text-xs my-0.5">P${item.price.toFixed(2)}</p>
                    </div>
                    <div class="flex justify-center items-center gap-3 mt-2 w-full">
                        <button onclick="updateQty('${item.id}', -1)" class="w-8 h-8 rounded bg-slate-200 font-bold hover:bg-slate-300 shadow active:scale-95 transition text-xs">-</button>
                        <span id="qty-${item.id}" class="font-extrabold text-slate-900 text-xs">0</span>
                        <button onclick="updateQty('${item.id}', 1)" class="w-8 h-8 rounded bg-slate-200 font-bold hover:bg-slate-300 shadow active:scale-95 transition text-xs">+</button>
                    </div>
                </div>
            `;
            grid.innerHTML += html;
        });
    }

    function switchCategory(catKey) {
        currentCategory = catKey;
        document.querySelectorAll('.category-btn').forEach(btn => {
            btn.className = 'category-btn text-slate-600 hover:text-slate-900 pb-1 border-b-2 border-transparent transition';
        });
        const activeBtn = document.getElementById(`cat-${catKey}`);
        if(activeBtn) {
            activeBtn.className = 'category-btn text-amber-600 border-b-2 border-amber-500 font-extrabold pb-1 transition';
        }
        renderMenu(catKey);
    }

    function updateQty(itemId, change) {
        if (!quantities[itemId]) quantities[itemId] = 0;
        quantities[itemId] = Math.max(0, quantities[itemId] + change);
        const elem = document.getElementById(`qty-${itemId}`);
        if (elem) elem.innerText = quantities[itemId];
        recalculateTotals();
    }

    function recalculateTotals() {
        let subtotal = 0;
        let summaryHtml = '';
        let itemCount = 0;

        for (let id in quantities) {
            if (quantities[id] > 0) {
                let itemTotal = quantities[id] * itemPrices[id];
                subtotal += itemTotal;
                itemCount++;
                summaryHtml += `<div class="flex justify-between py-0.5"><span>${quantities[id]}x ${itemNames[id]}</span><span>P${itemTotal.toFixed(2)}</span></div>`;
            }
        }

        const summaryList = document.getElementById('order-summary-list');
        summaryList.innerHTML = itemCount === 0 ? `<p class="text-slate-400 italic text-center py-2">No items added yet</p>` : summaryHtml;

        let discountRate = parseFloat(document.getElementById('discount-select').value) || 0;
        let grandTotal = subtotal * (1 - discountRate);

        document.getElementById('subtotal').innerText = `P${subtotal.toFixed(2)}`;
        document.getElementById('total').innerText = `P${grandTotal.toFixed(2)}`;

        calculateChange(grandTotal);
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

    function updateCashDisplay() {
        document.getElementById('cash-rendered').innerText = rawCash || '0';
        recalculateTotals();
    }

    function calculateChange(grandTotal) {
        let cash = parseFloat(rawCash) || 0;
        let changeElement = document.getElementById('change-rendered');

        if (cash >= grandTotal && grandTotal > 0) {
            let change = cash - grandTotal;
            changeElement.innerText = `P${change.toFixed(2)}`;
            changeElement.className = 'font-bold text-emerald-700';
        } else if (cash < grandTotal && grandTotal > 0 && cash > 0) {
            changeElement.innerText = 'Insufficient';
            changeElement.className = 'font-bold text-red-600';
        } else {
            changeElement.innerText = 'P0.00';
            changeElement.className = 'font-bold text-emerald-700';
        }
    }

    function clearOrder() {
        rawCash = '';
        for (let id in quantities) {
            quantities[id] = 0;
            const elem = document.getElementById(`qty-${id}`);
            if (elem) elem.innerText = '0';
        }
        document.getElementById('discount-select').value = '0';
        updateCashDisplay();
    }

    function submitCheckout() {
        let subtotal = 0;
        let itemsToSubmit = [];

        for (let id in quantities) {
            if (quantities[id] > 0) {
                let itemTotal = quantities[id] * itemPrices[id];
                subtotal += itemTotal;
                itemsToSubmit.push({
                    name: itemNames[id],
                    quantity: quantities[id],
                    price: itemPrices[id]
                });
            }
        }

        if (itemsToSubmit.length === 0) {
            alert('Please add at least one item before checking out!');
            return;
        }

        let discountRate = parseFloat(document.getElementById('discount-select').value) || 0;
        let grandTotal = subtotal * (1 - discountRate);
        let cash = parseFloat(rawCash) || 0;

        if (cash < grandTotal) {
            alert(`Insufficient Cash!\n\nTotal: P${grandTotal.toFixed(2)}\nCash Rendered: P${cash.toFixed(2)}`);
            return;
        }

        let change = cash - grandTotal;

        const payload = {
            order_type: document.getElementById('order-type-select').value,
            table_number: document.getElementById('table-number-input').value,
            subtotal: subtotal,
            discount: subtotal * discountRate,
            total: grandTotal,
            cash: cash,
            change: change,
            items: itemsToSubmit
        };

        fetch("{{ route('order.checkout') }}", {
            method: "POST",
            credentials: "same-origin",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') ?? "{{ csrf_token() }}"
            },
            body: JSON.stringify(payload)
        })
        .then(async res => {
            const text = await res.text();

            if (!res.ok) {
                let message = `HTTP ${res.status}`;

                try {
                    const json = JSON.parse(text);
                    if (json && json.message) message = json.message;
                    else if (json && json.errors) message = Object.values(json.errors).flat().join('\n');
                } catch (e) {
                    if (text) message = text;
                }

                throw new Error(message);
            }

            return text ? JSON.parse(text) : {};
        })
        .then(data => {

            console.log(data);

            if(data.success){

                if(data.receipt){

                    showReceipt(data.receipt);

                } else {

                    alert(
                        `Checkout processed successfully!\n\nOrder ${data.order_number}`
                    );

                }

                clearOrder();

            }
            else {

                alert('Database Error while saving order.');

            }

        })
    }

    function showReceipt(receipt){

        currentReceipt = receipt;

        let itemsHTML = "";

        receipt.items.forEach(item => {

            itemsHTML += `
            <div class="flex justify-between">
                <span>
                    ${item.quantity}x ${item.name}
                </span>

                <span>
                    P${(item.price * item.quantity).toFixed(2)}
                </span>
            </div>
            `;

        });


        document.getElementById("receipt-content").innerHTML = `

            <p>
            Order #: ${receipt.order_number}
            </p>

            <p>
            ${receipt.order_type}
            ${receipt.table_number ? " - Table "+receipt.table_number : ""}
            </p>


            <hr class="my-2">


            ${itemsHTML}


            <hr class="my-2">


            <div class="flex justify-between">
                <span>Subtotal</span>
                <span>P${receipt.subtotal.toFixed(2)}</span>
            </div>


            <div class="flex justify-between">
                <span>Discount</span>
                <span>P${receipt.discount.toFixed(2)}</span>
            </div>


            <div class="flex justify-between font-bold">
                <span>TOTAL</span>
                <span>P${receipt.total.toFixed(2)}</span>
            </div>


            <br>


            <div class="flex justify-between">
                <span>Cash</span>
                <span>P${receipt.cash.toFixed(2)}</span>
            </div>


            <div class="flex justify-between">
                <span>Change</span>
                <span>P${receipt.change.toFixed(2)}</span>
            </div>

        `;


        document
        .getElementById("receipt-modal")
        .classList.remove("hidden");

    }



    function closeReceipt(){

        document
        .getElementById("receipt-modal")
        .classList.add("hidden");

    }



    function printReceipt(){

        // SEND TO FUN PRINT (future Android/tablet printing)
        if (window.Android && currentReceipt) {

            sendToPrinter(currentReceipt);

            return;

        }


        // NORMAL WINDOWS TEST PRINT
        let printContents = document.getElementById(
            "receipt-print-area"
        ).innerHTML;


        let printWindow = window.open(
            '',
            'PRINT_RECEIPT',
            'width=400,height=600'
        );


        printWindow.document.write(`
        <html>

        <head>

        <title>Receipt</title>

        <style>

            @page {
                size: 58mm auto;
                margin: 5mm;
            }


            body {

                width:58mm;
                font-family: "Courier New", monospace;
                font-size:12px;
                color:#000;

            }


            .flex {
                display:flex;
                justify-content:space-between;
            }


            hr {
                border:0;
                border-top:1px dashed #000;
            }


        </style>


        </head>


        <body>

        ${printContents}


        </body>


        </html>
        `);


        printWindow.document.close();


        setTimeout(function(){

            printWindow.focus();

            printWindow.print();

        },500);

    }

    // Initialize menu on page load
    document.addEventListener('DOMContentLoaded', () => {
        renderMenu('silog');
    });
    
    </script>
</body>
</html>