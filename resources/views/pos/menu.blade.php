<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Original Digman Halo-Halo POS</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        body { display: flex; height: 100vh; background-color: #2e2d32; color: #fff; overflow: hidden; }

        /* Left Navigation Panel */
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

        .side-nav .nav-title {
            color: #aaa;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .side-nav a {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 90px;
            height: 80px;
            text-decoration: none;
            color: #fff;
            border-radius: 12px;
            font-size: 12px;
            font-weight: bold;
            gap: 8px;
            transition: all 0.2s ease;
        }

        .side-nav a .icon-box {
            width: 36px;
            height: 36px;
            background: #3e3b47;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

        .side-nav a.active {
            background-color: #6a1b9a;
        }

        .side-nav a.active .icon-box {
            background: #ffffff;
            color: #6a1b9a;
        }

        /* Right Container Layout */
        .app-container {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        /* Top Header Banner - Increased Size */
        .top-header-bar {
            height: 110px; /* Increased height from 75px */
            background-color: #e5e5e5;
            display: flex;
            align-items: center;
            justify-content: center;
            border-bottom: 2px solid #ccc;
            padding: 10px;
        }

        .top-header-bar img {
            max-height: 90px; /* Increased logo max height from 55px */
            width: auto;
            object-fit: contain;
        }

        /* Main Workspace Area */
        .workspace {
            flex: 1;
            display: flex;
            overflow: hidden;
        }

        /* Menu Grid Section */
        .menu-section {
            flex: 1;
            background-color: #5c5760;
            padding: 20px 30px;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        /* Categories Bar */
        .category-tabs {
            display: flex;
            gap: 30px;
            border-bottom: 1px solid #77727c;
            padding-bottom: 10px;
        }

        .cat-tab {
            background: none;
            border: none;
            color: #ddd;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            padding-bottom: 5px;
        }

        .cat-tab.active {
            color: #ffd600;
            border-bottom: 3px solid #ffd600;
        }

        /* Products Grid */
        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
        }

        .product-card {
            background-color: #e3e3e3;
            border-radius: 6px;
            padding: 10px;
            color: #000;
            display: flex;
            flex-direction: column;
            gap: 8px;
            cursor: pointer;
        }

        .product-image {
            width: 100%;
            height: 130px;
            background-color: #7d7d7d;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-weight: bold;
            font-size: 14px;
            border-radius: 4px;
        }

        .product-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .product-title {
            font-size: 14px;
            font-weight: bold;
            color: #4a148c;
        }

        .product-price {
            font-size: 13px;
            font-weight: bold;
            color: #4a148c;
        }

        .product-qty-control {
            display: flex;
            align-items: center;
            gap: 5px;
            font-weight: bold;
            font-size: 14px;
        }

        .product-qty-control button {
            background: none;
            border: none;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            padding: 0 4px;
        }

        /* Sidebar Cart Section */
        .cart-section {
            width: 360px;
            background-color: #e5e5e5;
            color: #000;
            padding: 20px;
            display: flex;
            flex-direction: column;
            gap: 15px;
            border-left: 2px solid #ccc;
        }

        .order-type-btn {
            width: 100%;
            padding: 12px;
            background-color: #d1d1d1;
            border: none;
            border-radius: 4px;
            font-weight: bold;
            color: #333;
            cursor: pointer;
            text-align: left;
            font-size: 14px;
        }

        .table-input {
            width: 100%;
            padding: 10px;
            background-color: #d1d1d1;
            border: none;
            border-radius: 4px;
            font-size: 13px;
            color: #555;
            outline: none;
        }

        .order-details-title {
            font-size: 16px;
            font-weight: bold;
            margin-top: 5px;
        }

        .order-items-list {
            flex: 1;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
            gap: 10px;
            border-bottom: 1px solid #ccc;
            padding-bottom: 10px;
        }

        .order-item-row {
            display: flex;
            justify-content: space-between;
            font-size: 14px;
            font-weight: 600;
        }

        .summary-totals {
            display: flex;
            flex-direction: column;
            gap: 6px;
            font-size: 14px;
            font-weight: bold;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
        }

        .cash-input-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #d1d1d1;
            padding: 6px 12px;
            border-radius: 4px;
        }

        .cash-input-row input {
            background: transparent;
            border: none;
            outline: none;
            font-weight: bold;
            font-size: 14px;
            width: 100px;
            text-align: right;
        }

        /* Numpad Keypad */
        .keypad-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 8px;
            margin-top: 10px;
        }

        .keypad-btn {
            padding: 14px 0;
            background-color: #d1d1d1;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            color: #000;
        }

        .keypad-btn.action-cancel { background-color: #90caf9; color: #000; }
        .keypad-btn.action-delete { background-color: #ff8a80; color: #000; }
        .keypad-btn.action-checkout { background-color: #a5d6a7; color: #000; grid-column: span 1; }

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

    <!-- LEFT SIDE NAVIGATION -->
    <nav class="side-nav">
        <span class="nav-title">Navigation</span>
        <a href="/menu" class="active">
            <div class="icon-box">::</div>
            MENU
        </a>
        <a href="/kitchen">
            <div class="icon-box">::</div>
            KITCHEN
        </a>
        <a href="/dashboard">
            <div class="icon-box">::</div>
            DASHBOARD
        </a>
    </nav>

    <!-- RIGHT CONTAINER -->
    <div class="app-container">
        
        <!-- TOP BANNER -->
        <div class="top-header-bar">
            <img src="{{ asset('images/header-banner.png') }}" alt="Original Digman Halo-Halo and Home Made Siopao">
        </div>

        <!-- WORKSPACE AREA -->
        <div class="workspace">
            
            <!-- MENU PRODUCTS -->
            <div class="menu-section">
                <div class="category-tabs">
                    <button class="cat-tab" onclick="filterCategory('Silog')">Silog Dishes</button>
                    <button class="cat-tab" onclick="filterCategory('Noodles')">Noodle Dishes</button>
                    <button class="cat-tab" onclick="filterCategory('Single')">Single Dishes</button>
                    <button class="cat-tab active" onclick="filterCategory('Dessert')">Dessert</button>
                </div>

                <div class="products-grid" id="products-grid">
                    <!-- Populated via Javascript -->
                </div>
            </div>

            <!-- CART / ORDER DETAILS -->
            <div class="cart-section">
                <button class="order-type-btn" id="order-type-toggle" onclick="toggleOrderType()">Take Out</button>
                <input type="text" class="table-input" placeholder="Table Number" id="table-num">

                <div class="order-details-title">Order Details</div>

                <div class="order-items-list" id="cart-list">
                    <!-- Items rendered here -->
                </div>

                <div class="summary-totals">
                    <div class="summary-row"><span>Sub Total:</span><span id="subtotal">₱0.00</span></div>
                    <div class="summary-row"><span>Total:</span><span id="total">₱0.00</span></div>
                    <div class="cash-input-row">
                        <span>Cash:</span>
                        <input type="text" id="cash-input" placeholder="₱0.00" readonly>
                    </div>
                </div>

                <!-- KEYPAD -->
                <div class="keypad-grid">
                    <button class="keypad-btn" onclick="pressKey('1')">1</button>
                    <button class="keypad-btn" onclick="pressKey('2')">2</button>
                    <button class="keypad-btn" onclick="pressKey('3')">3</button>
                    <button class="keypad-btn action-cancel" onclick="clearCart()">Cancel</button>

                    <button class="keypad-btn" onclick="pressKey('4')">4</button>
                    <button class="keypad-btn" onclick="pressKey('5')">5</button>
                    <button class="keypad-btn" onclick="pressKey('6')">6</button>
                    <button class="keypad-btn action-delete" onclick="pressKey('DEL')">Delete</button>

                    <button class="keypad-btn" onclick="pressKey('7')">7</button>
                    <button class="keypad-btn" onclick="pressKey('8')">8</button>
                    <button class="keypad-btn" onclick="pressKey('9')">9</button>
                    <button class="keypad-btn action-checkout" onclick="checkout()">Checkout</button>

                    <button class="keypad-btn" onclick="pressKey('0')">0</button>
                    <button class="keypad-btn" onclick="pressKey('00')">00</button>
                    <button class="keypad-btn" onclick="pressKey('.')">.</button>
                    <button class="keypad-btn" onclick="pressKey('000')">000</button>
                </div>
            </div>

        </div>

    </div>

    <script>
        const catalog = [
            { id: 1, name: 'Halo-Halo', category: 'Dessert', price: 90, prep_time: 180 },
            { id: 2, name: 'Halo-Halo Special', category: 'Dessert', price: 120, prep_time: 240 },
            { id: 3, name: 'Mais Con Yelo', category: 'Dessert', price: 90, prep_time: 120 }
        ];

        let selectedOrderType = 'Take Out';
        let cart = JSON.parse(localStorage.getItem('pos_cart')) || [];
        let cashInputValue = '';

        renderMenu('Dessert');
        renderCart();

        function toggleOrderType() {
            selectedOrderType = selectedOrderType === 'Take Out' ? 'Dine-In' : 'Take Out';
            document.getElementById('order-type-toggle').innerText = selectedOrderType;
        }

        function filterCategory(cat) {
            document.querySelectorAll('.cat-tab').forEach(b => b.classList.remove('active'));
            event.target.classList.add('active');
            renderMenu(cat);
        }

        function renderMenu(category) {
            const grid = document.getElementById('products-grid');
            grid.innerHTML = '';
            
            const filtered = catalog.filter(i => i.category === category);

            filtered.forEach(item => {
                const inCart = cart.find(c => c.name === item.name);
                const qty = inCart ? inCart.quantity : 0;

                grid.innerHTML += `
                    <div class="product-card" onclick="addToCart('${item.name}', ${item.price}, ${item.prep_time})">
                        <div class="product-image">IMAGE HERE</div>
                        <div class="product-info">
                            <div>
                                <div class="product-title">${item.name}</div>
                                <div class="product-price">₱${item.price}</div>
                            </div>
                            <div class="product-qty-control">
                                <button onclick="event.stopPropagation(); updateQuantityByName('${item.name}', 1)">+</button>
                                <span>${qty}</span>
                                <button onclick="event.stopPropagation(); updateQuantityByName('${item.name}', -1)">-</button>
                            </div>
                        </div>
                    </div>
                `;
            });
        }

        function addToCart(name, price, prepTime) {
            let existing = cart.find(i => i.name === name);
            if (existing) {
                existing.quantity += 1;
            } else {
                cart.push({ name: name, price: price, quantity: 1, prep_time_seconds: prepTime });
            }
            saveCart();
        }

        function updateQuantityByName(name, change) {
            let existing = cart.find(i => i.name === name);
            if (existing) {
                existing.quantity += change;
                if (existing.quantity <= 0) {
                    cart = cart.filter(i => i.name !== name);
                }
                saveCart();
            }
        }

        function saveCart() {
            localStorage.setItem('pos_cart', JSON.stringify(cart));
            renderCart();
            renderMenu('Dessert');
        }

        function clearCart() {
            cart = [];
            cashInputValue = '';
            document.getElementById('cash-input').value = '';
            localStorage.removeItem('pos_cart');
            renderCart();
            renderMenu('Dessert');
        }

        function renderCart() {
            const list = document.getElementById('cart-list');
            list.innerHTML = '';
            let subtotal = 0;

            cart.forEach(item => {
                let total = item.price * item.quantity;
                subtotal += total;
                list.innerHTML += `
                    <div class="order-item-row">
                        <span>${item.quantity}x ${item.name}</span>
                        <span>₱${total}</span>
                    </div>
                `;
            });

            document.getElementById('subtotal').innerText = `₱${subtotal.toFixed(2)}`;
            document.getElementById('total').innerText = `₱${subtotal.toFixed(2)}`;
        }

        function pressKey(key) {
            if (key === 'DEL') {
                cashInputValue = cashInputValue.slice(0, -1);
            } else {
                cashInputValue += key;
            }
            document.getElementById('cash-input').value = cashInputValue ? `₱${cashInputValue}` : '';
        }

        function checkout() {
            if (cart.length === 0) return alert('Cart is empty!');
            const total = parseFloat(document.getElementById('total').innerText.replace('₱', ''));
            const cash = parseFloat(cashInputValue);

            if (!cash || cash < total) {
                return alert('Please enter sufficient cash tendered!');
            }

            fetch('/api/orders/store', {
                method: 'POST',
                headers: { 
                    'Content-Type': 'application/json', 
                    'X-CSRF-TOKEN': '{{ csrf_token() }}' 
                },
                body: JSON.stringify({
                    order_type: selectedOrderType,
                    table_number: document.getElementById('table-num').value,
                    items: cart,
                    subtotal: total,
                    total: total,
                    cash: cash
                })
            })
            .then(res => res.json())
            .then(data => {
                if(data.success) {
                    alert(`Order ${data.order_number} processed!\nChange: ₱${(cash - total).toFixed(2)}`);
                    clearCart();
                }
            });
        }
    </script>
</body>
</html>