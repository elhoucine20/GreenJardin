<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Cart - GardenApp</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.min.css">
    
    <style>
        :root {
            --primary-green: #2d6a4f;
            --secondary-green: #52b788;
            --light-green: #95d5b2;
            --pale-green: #d8f3dc;
            --dark-green: #1b4332;
            --white: #ffffff;
            --gray-light: #f8f9fa;
            --gray-dark: #6c757d;
            --danger: #dc3545;
            --success: #28a745;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
            background-color: var(--gray-light);
            overflow-x: hidden;
        }

        html {
            scroll-behavior: smooth;
        }

        /* ========================================
           NAVBAR (Same as other pages)
           ======================================== */
        .navbar {
            background-color: var(--primary-green);
            padding: 1rem 0;
            box-shadow: 0 2px 15px rgba(0,0,0,0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .navbar-brand {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--white) !important;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .navbar-brand i {
            font-size: 2rem;
            color: var(--light-green);
        }

        .navbar-nav .nav-link {
            color: rgba(255, 255, 255, 0.9) !important;
            font-weight: 500;
            margin: 0 0.75rem;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .navbar-nav .nav-link:hover {
            color: var(--white) !important;
            background-color: rgba(255, 255, 255, 0.1);
            transform: translateY(-2px);
        }

        .navbar-nav .nav-link.active {
            background-color: rgba(255, 255, 255, 0.15);
        }

        .cart-link {
            position: relative;
        }

        .cart-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background-color: #dc3545;
            color: white;
            border-radius: 50%;
            width: 22px;
            height: 22px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.75rem;
            font-weight: 700;
            border: 2px solid var(--primary-green);
            transition: transform 0.3s ease;
        }

        .navbar-toggler {
            border-color: rgba(255, 255, 255, 0.5);
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba(255, 255, 255, 0.9)' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }

        /* ========================================
           PAGE HEADER
           ======================================== */
        .page-header {
            background: linear-gradient(135deg, var(--primary-green) 0%, var(--secondary-green) 100%);
            padding: 4rem 0 3rem;
            text-align: center;
            color: var(--white);
            margin-bottom: 3rem;
        }

        .page-header h1 {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
        }

        .page-header h1 i {
            color: var(--pale-green);
            margin-right: 1rem;
        }

        .page-header p {
            font-size: 1.3rem;
            opacity: 0.95;
            max-width: 700px;
            margin: 0 auto;
        }

        /* ========================================
           CART SECTION
           ======================================== */
        .cart-section {
            padding: 0 0 4rem;
            min-height: 400px;
        }

        .cart-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        /* Cart Items */
        .cart-items {
            background: var(--white);
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
            margin-bottom: 2rem;
        }

        .cart-item {
            display: flex;
            align-items: center;
            padding: 1.5rem;
            border: 2px solid var(--gray-light);
            border-radius: 15px;
            margin-bottom: 1.5rem;
            transition: all 0.3s ease;
            background: var(--white);
        }

        .cart-item:hover {
            border-color: var(--light-green);
            box-shadow: 0 5px 20px rgba(45, 106, 79, 0.1);
            transform: translateY(-3px);
        }

        .cart-item-image {
            width: 120px;
            height: 120px;
            border-radius: 12px;
            overflow: hidden;
            flex-shrink: 0;
            margin-right: 1.5rem;
            background: linear-gradient(135deg, var(--pale-green), var(--light-green));
        }

        .cart-item-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .cart-item:hover .cart-item-image img {
            transform: scale(1.1);
        }

        .cart-item-details {
            flex: 1;
            margin-right: 1.5rem;
        }

        .cart-item-name {
            font-size: 1.4rem;
            font-weight: 700;
            color: var(--dark-green);
            margin-bottom: 0.5rem;
        }

        .cart-item-description {
            color: var(--gray-dark);
            font-size: 0.95rem;
            margin-bottom: 0.75rem;
        }

        .cart-item-price {
            font-size: 1.1rem;
            color: var(--primary-green);
            font-weight: 600;
        }

        .cart-item-quantity {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-right: 1.5rem;
        }

        .quantity-label {
            font-size: 0.9rem;
            color: var(--gray-dark);
            font-weight: 600;
        }

        .quantity-controls {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .quantity-btn {
            width: 36px;
            height: 36px;
            background-color: var(--primary-green);
            color: var(--white);
            border: none;
            border-radius: 8px;
            font-size: 1.2rem;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .quantity-btn:hover {
            background-color: var(--dark-green);
            transform: scale(1.1);
        }

        .quantity-input {
            width: 60px;
            text-align: center;
            font-size: 1.1rem;
            font-weight: 700;
            border: 2px solid var(--light-green);
            border-radius: 8px;
            padding: 0.5rem;
        }

        .cart-item-total {
            text-align: center;
            min-width: 100px;
            margin-right: 1.5rem;
        }

        .total-label {
            font-size: 0.85rem;
            color: var(--gray-dark);
            margin-bottom: 0.25rem;
        }

        .total-price {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary-green);
        }

        .cart-item-remove {
            flex-shrink: 0;
        }

        .btn-remove {
            background: linear-gradient(135deg, var(--danger), #c82333);
            color: var(--white);
            border: none;
            padding: 12px 20px;
            border-radius: 10px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-remove:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(220, 53, 69, 0.3);
        }

        /* Cart Summary */
        .cart-summary {
            background: linear-gradient(135deg, var(--pale-green) 0%, var(--light-green) 100%);
            border-radius: 20px;
            padding: 2.5rem;
            box-shadow: 0 6px 25px rgba(45, 106, 79, 0.15);
            position: sticky;
            top: 100px;
        }

        .summary-title {
            font-size: 2rem;
            font-weight: 700;
            color: var(--dark-green);
            margin-bottom: 1.5rem;
            text-align: center;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 0;
            border-bottom: 2px solid rgba(45, 106, 79, 0.2);
        }

        .summary-row:last-child {
            border-bottom: none;
            padding-top: 1.5rem;
            margin-top: 0.5rem;
            border-top: 3px solid var(--primary-green);
        }

        .summary-label {
            font-size: 1.1rem;
            color: var(--dark-green);
            font-weight: 600;
        }

        .summary-value {
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--primary-green);
        }

        .summary-row.total .summary-label {
            font-size: 1.4rem;
        }

        .summary-row.total .summary-value {
            font-size: 2rem;
            color: var(--dark-green);
        }

        .btn-checkout {
            width: 100%;
            background: linear-gradient(135deg, var(--secondary-green), var(--primary-green));
            color: var(--white);
            border: none;
            padding: 18px;
            border-radius: 15px;
            font-size: 1.3rem;
            font-weight: 700;
            margin-top: 1.5rem;
            cursor: pointer;
            transition: all 0.4s ease;
            box-shadow: 0 6px 20px rgba(45, 106, 79, 0.3);
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .btn-checkout:hover {
            transform: translateY(-5px) scale(1.02);
            box-shadow: 0 10px 30px rgba(45, 106, 79, 0.4);
        }

        .continue-shopping {
            text-align: center;
            margin-top: 1.5rem;
        }

        .continue-shopping a {
            color: var(--primary-green);
            text-decoration: none;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .continue-shopping a:hover {
            color: var(--dark-green);
            gap: 1rem;
        }

        /* Empty Cart State */
        .empty-cart {
            text-align: center;
            padding: 6rem 2rem;
            background: var(--white);
            border-radius: 20px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
            display: none;
        }

        .empty-cart.show {
            display: block;
        }

        .empty-cart-icon {
            font-size: 8rem;
            color: var(--light-green);
            margin-bottom: 2rem;
            animation: pulse 2s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% {
                transform: scale(1);
                opacity: 0.7;
            }
            50% {
                transform: scale(1.05);
                opacity: 1;
            }
        }

        .empty-cart h2 {
            color: var(--dark-green);
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .empty-cart p {
            color: var(--gray-dark);
            font-size: 1.2rem;
            margin-bottom: 2.5rem;
        }

        .btn-browse {
            background: linear-gradient(135deg, var(--secondary-green), var(--primary-green));
            color: var(--white);
            padding: 16px 48px;
            font-size: 1.2rem;
            font-weight: 700;
            border: none;
            border-radius: 50px;
            box-shadow: 0 6px 20px rgba(45, 106, 79, 0.3);
            transition: all 0.4s ease;
            text-decoration: none;
            display: inline-block;
        }

        .btn-browse:hover {
            transform: translateY(-5px) scale(1.05);
            box-shadow: 0 10px 30px rgba(45, 106, 79, 0.4);
            color: var(--white);
        }

        /* ========================================
           FOOTER
           ======================================== */
        .footer {
            background-color: var(--dark-green);
            color: var(--white);
            text-align: center;
            padding: 2.5rem 0;
            margin-top: 4rem;
        }

        .footer p {
            margin: 0;
            font-size: 1rem;
            opacity: 0.9;
        }

        /* ========================================
           REMOVAL ANIMATION
           ======================================== */
        @keyframes fadeOut {
            0% {
                opacity: 1;
                transform: translateX(0) scale(1);
            }
            50% {
                transform: translateX(-20px) scale(0.95);
            }
            100% {
                opacity: 0;
                transform: translateX(-100px) scale(0.8);
            }
        }

        .removing {
            animation: fadeOut 0.5s ease-out forwards;
        }

        /* ========================================
           RESPONSIVE
           ======================================== */
        @media (max-width: 992px) {
            .cart-summary {
                position: static;
                margin-top: 2rem;
            }
        }

        @media (max-width: 768px) {
            .page-header h1 {
                font-size: 2.5rem;
            }

            .cart-item {
                flex-direction: column;
                text-align: center;
            }

            .cart-item-image {
                margin-right: 0;
                margin-bottom: 1rem;
            }

            .cart-item-details {
                margin-right: 0;
                margin-bottom: 1rem;
            }

            .cart-item-quantity,
            .cart-item-total {
                margin-right: 0;
                margin-bottom: 1rem;
            }

            .empty-cart h2 {
                font-size: 2rem;
            }

            .empty-cart-icon {
                font-size: 6rem;
            }
        }

        @media (max-width: 576px) {
            .navbar-brand {
                font-size: 1.4rem;
            }

            .page-header h1 {
                font-size: 2rem;
            }

            .cart-items {
                padding: 1rem;
            }

            .cart-item {
                padding: 1rem;
            }

            .quantity-controls {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>

    <!-- ========================================
         NAVBAR
         ======================================== -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="home.html">
                <i class="bi bi-flower1"></i>
                GardenApp
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="home.html">
                            <i class="bi bi-house-door"></i> Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="products.html">
                            <i class="bi bi-box-seam"></i> Products
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="favorites.html">
                            <i class="bi bi-heart"></i> Favorites
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active cart-link" href="cart.html">
                            <i class="bi bi-cart3"></i> Cart
                            <span class="cart-badge" id="cartCount">3</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#login">
                            <i class="bi bi-person-circle"></i> Login / Register
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- ========================================
         PAGE HEADER
         ======================================== -->
    <section class="page-header">
        <div class="container">
            <h1><i class="bi bi-cart-check"></i>My Cart</h1>
            <p>Review the products you added to your cart</p>
        </div>
    </section>

    <!-- ========================================
         CART SECTION
         ======================================== -->
    <section class="cart-section">
        <div class="container cart-container">
            <div class="row">
                <!-- Cart Items Column -->
                <div class="col-lg-8">
                    <div class="cart-items" id="cartItemsContainer">
                        <!-- Cart Item 1 -->
                        <div class="cart-item" data-id="1" data-price="12.90">
                            <div class="cart-item-image">
                                <img src="https://images.unsplash.com/photo-1518709268805-4e9042af9f23?w=200&h=200&fit=crop" 
                                     alt="Rose Plant">
                            </div>
                            <div class="cart-item-details">
                                <h3 class="cart-item-name">Rose Plant</h3>
                                <p class="cart-item-description">Beautiful red rose perfect for your garden</p>
                                <p class="cart-item-price">$12.90 per unit</p>
                            </div>
                            <div class="cart-item-quantity">
                                <div class="quantity-label">Quantity:</div>
                                <div class="quantity-controls">
                                    <button class="quantity-btn" onclick="decreaseQuantity(1)">
                                        <i class="bi bi-dash"></i>
                                    </button>
                                    <input type="number" class="quantity-input" id="qty-1" value="2" min="1" 
                                           onchange="updateQuantity(1)" readonly>
                                    <button class="quantity-btn" onclick="increaseQuantity(1)">
                                        <i class="bi bi-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="cart-item-total">
                                <div class="total-label">Total:</div>
                                <div class="total-price" id="total-1">$25.80</div>
                            </div>
                            <div class="cart-item-remove">
                                <button class="btn-remove" onclick="removeFromCart(1)">
                                    <i class="bi bi-trash"></i> Remove
                                </button>
                            </div>
                        </div>

                        <!-- Cart Item 2 -->
                        <div class="cart-item" data-id="2" data-price="45.00">
                            <div class="cart-item-image">
                                <img src="https://images.unsplash.com/photo-1617576683096-00fc8eecb3af?w=200&h=200&fit=crop" 
                                     alt="Garden Shovel">
                            </div>
                            <div class="cart-item-details">
                                <h3 class="cart-item-name">Garden Shovel</h3>
                                <p class="cart-item-description">Durable steel shovel with ergonomic handle</p>
                                <p class="cart-item-price">$45.00 per unit</p>
                            </div>
                            <div class="cart-item-quantity">
                                <div class="quantity-label">Quantity:</div>
                                <div class="quantity-controls">
                                    <button class="quantity-btn" onclick="decreaseQuantity(2)">
                                        <i class="bi bi-dash"></i>
                                    </button>
                                    <input type="number" class="quantity-input" id="qty-2" value="1" min="1" 
                                           onchange="updateQuantity(2)" readonly>
                                    <button class="quantity-btn" onclick="increaseQuantity(2)">
                                        <i class="bi bi-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="cart-item-total">
                                <div class="total-label">Total:</div>
                                <div class="total-price" id="total-2">$45.00</div>
                            </div>
                            <div class="cart-item-remove">
                                <button class="btn-remove" onclick="removeFromCart(2)">
                                    <i class="bi bi-trash"></i> Remove
                                </button>
                            </div>
                        </div>

                        <!-- Cart Item 3 -->
                        <div class="cart-item" data-id="3" data-price="8.50">
                            <div class="cart-item-image">
                                <img src="https://images.unsplash.com/photo-1597848212624-e530501dfcda?w=200&h=200&fit=crop" 
                                     alt="Sunflower Seeds">
                            </div>
                            <div class="cart-item-details">
                                <h3 class="cart-item-name">Sunflower Seeds</h3>
                                <p class="cart-item-description">Grow stunning sunflowers up to 8 feet tall</p>
                                <p class="cart-item-price">$8.50 per unit</p>
                            </div>
                            <div class="cart-item-quantity">
                                <div class="quantity-label">Quantity:</div>
                                <div class="quantity-controls">
                                    <button class="quantity-btn" onclick="decreaseQuantity(3)">
                                        <i class="bi bi-dash"></i>
                                    </button>
                                    <input type="number" class="quantity-input" id="qty-3" value="3" min="1" 
                                           onchange="updateQuantity(3)" readonly>
                                    <button class="quantity-btn" onclick="increaseQuantity(3)">
                                        <i class="bi bi-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="cart-item-total">
                                <div class="total-label">Total:</div>
                                <div class="total-price" id="total-3">$25.50</div>
                            </div>
                            <div class="cart-item-remove">
                                <button class="btn-remove" onclick="removeFromCart(3)">
                                    <i class="bi bi-trash"></i> Remove
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Empty Cart State -->
                    <div class="empty-cart" id="emptyCart">
                        <i class="bi bi-cart-x empty-cart-icon"></i>
                        <h2>Your cart is empty</h2>
                        <p>Start shopping and add products to your cart!</p>
                        <a href="products.html" class="btn-browse">
                            <i class="bi bi-search"></i> Browse Products
                        </a>
                    </div>
                </div>

                <!-- Cart Summary Column -->
                <div class="col-lg-4">
                    <div class="cart-summary" id="cartSummary">
                        <h2 class="summary-title">Order Summary</h2>
                        
                        <div class="summary-row">
                            <span class="summary-label">Subtotal:</span>
                            <span class="summary-value" id="subtotal">$96.30</span>
                        </div>
                        
                        <div class="summary-row">
                            <span class="summary-label">Shipping:</span>
                            <span class="summary-value">$5.00</span>
                        </div>
                        
                        <div class="summary-row">
                            <span class="summary-label">Tax (10%):</span>
                            <span class="summary-value" id="tax">$9.63</span>
                        </div>
                        
                        <div class="summary-row total">
                            <span class="summary-label">Total:</span>
                            <span class="summary-value" id="grandTotal">$110.93</span>
                        </div>
                        
                        <button class="btn-checkout" onclick="proceedToCheckout()">
                            <i class="bi bi-credit-card"></i> Proceed to Checkout
                        </button>
                        
                        <div class="continue-shopping">
                            <a href="products.html">
                                <i class="bi bi-arrow-left"></i> Continue Shopping
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================
         FOOTER
         ======================================== -->
    <footer class="footer">
        <div class="container">
            <p>© 2026 GardenApp - All rights reserved</p>
        </div>
    </footer>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom JavaScript -->
    <script>
        // ========================================
        // CONSTANTS
        // ========================================
        const SHIPPING_COST = 5.00;
        const TAX_RATE = 0.10;

        // ========================================
        // INCREASE QUANTITY
        // ========================================
        function increaseQuantity(itemId) {
            const qtyInput = document.getElementById(`qty-${itemId}`);
            let currentQty = parseInt(qtyInput.value);
            currentQty++;
            qtyInput.value = currentQty;
            updateQuantity(itemId);
        }

        // ========================================
        // DECREASE QUANTITY
        // ========================================
        function decreaseQuantity(itemId) {
            const qtyInput = document.getElementById(`qty-${itemId}`);
            let currentQty = parseInt(qtyInput.value);
            if (currentQty > 1) {
                currentQty--;
                qtyInput.value = currentQty;
                updateQuantity(itemId);
            }
        }

        // ========================================
        // UPDATE QUANTITY
        // ========================================
        function updateQuantity(itemId) {
            const qtyInput = document.getElementById(`qty-${itemId}`);
            const quantity = parseInt(qtyInput.value);
            
            // Get price from data attribute
            const cartItem = document.querySelector(`[data-id="${itemId}"]`);
            const price = parseFloat(cartItem.getAttribute('data-price'));
            
            // Calculate and update total
            const total = price * quantity;
            document.getElementById(`total-${itemId}`).textContent = `$${total.toFixed(2)}`;
            
            console.log(`Updated item ${itemId}: Qty=${quantity}, Total=$${total.toFixed(2)}`);
            
            // Update cart totals
            updateCartTotals();
        }

        // ========================================
        // UPDATE CART TOTALS
        // ========================================
        function updateCartTotals() {
            const cartItems = document.querySelectorAll('.cart-item');
            let subtotal = 0;
            
            cartItems.forEach(item => {
                const itemId = item.getAttribute('data-id');
                const totalElement = document.getElementById(`total-${itemId}`);
                if (totalElement) {
                    const itemTotal = parseFloat(totalElement.textContent.replace('$', ''));
                    subtotal += itemTotal;
                }
            });
            
            const tax = subtotal * TAX_RATE;
            const grandTotal = subtotal + SHIPPING_COST + tax;
            
            // Update display
            document.getElementById('subtotal').textContent = `$${subtotal.toFixed(2)}`;
            document.getElementById('tax').textContent = `$${tax.toFixed(2)}`;
            document.getElementById('grandTotal').textContent = `$${grandTotal.toFixed(2)}`;
            
            console.log(`Cart totals updated: Subtotal=$${subtotal.toFixed(2)}, Tax=$${tax.toFixed(2)}, Total=$${grandTotal.toFixed(2)}`);
        }

        // ========================================
        // REMOVE FROM CART
        // ========================================
        function removeFromCart(itemId) {
            const cartItem = document.querySelector(`[data-id="${itemId}"]`);
            const productName = cartItem.querySelector('.cart-item-name').textContent;
            
            // Confirmation
            if (!confirm(`Remove "${productName}" from cart?`)) {
                return;
            }
            
            console.log(`Removing item ${itemId}: ${productName}`);
            
            // Add removal animation
            cartItem.classList.add('removing');
            
            // Remove element after animation
            setTimeout(() => {
                cartItem.remove();
                updateCartCount();
                updateCartTotals();
                checkEmptyCart();
                
                // Show notification
                alert(`Product removed from cart: ${productName}`);
                showNotification(`${productName} removed from cart`);
            }, 500);
        }

        // ========================================
        // UPDATE CART COUNT
        // ========================================
        function updateCartCount() {
            const cartItems = document.querySelectorAll('.cart-item');
            const count = cartItems.length;
            
            const badge = document.getElementById('cartCount');
            badge.textContent = count;
            
            // Animation
            badge.style.transform = 'scale(1.3)';
            setTimeout(() => {
                badge.style.transform = 'scale(1)';
            }, 300);
            
            console.log(`Cart count updated: ${count} items`);
        }

        // ========================================
        // CHECK EMPTY CART
        // ========================================
        function checkEmptyCart() {
            const cartItems = document.querySelectorAll('.cart-item');
            const emptyCart = document.getElementById('emptyCart');
            const cartItemsContainer = document.getElementById('cartItemsContainer');
            const cartSummary = document.getElementById('cartSummary');
            
            if (cartItems.length === 0) {
                emptyCart.classList.add('show');
                cartItemsContainer.style.display = 'none';
                cartSummary.style.display = 'none';
            } else {
                emptyCart.classList.remove('show');
                cartItemsContainer.style.display = 'block';
                cartSummary.style.display = 'block';
            }
        }

        // ========================================
        // PROCEED TO CHECKOUT
        // ========================================
        function proceedToCheckout() {
            const grandTotal = document.getElementById('grandTotal').textContent;
            alert(`Proceeding to checkout!\n\nTotal Amount: ${grandTotal}\n\nThis would normally redirect to the checkout/payment page.`);
            console.log('Proceeding to checkout with total:', grandTotal);
        }

        // ========================================
        // NOTIFICATION SYSTEM
        // ========================================
        function showNotification(message) {
            const notification = document.createElement('div');
            notification.style.cssText = `
                position: fixed;
                top: 100px;
                right: 20px;
                background: linear-gradient(135deg, #28a745, #20c997);
                color: white;
                padding: 1rem 1.5rem;
                border-radius: 12px;
                box-shadow: 0 8px 20px rgba(0,0,0,0.2);
                z-index: 9999;
                animation: slideIn 0.3s ease;
                font-weight: 600;
                display: flex;
                align-items: center;
                gap: 0.75rem;
            `;
            
            notification.innerHTML = `
                <i class="bi bi-check-circle" style="font-size: 1.5rem;"></i>
                <span>${message}</span>
            `;
            
            document.body.appendChild(notification);
            
            setTimeout(() => {
                notification.style.animation = 'slideOut 0.3s ease';
                setTimeout(() => notification.remove(), 300);
            }, 3000);
        }

        // Add notification animations
        const style = document.createElement('style');
        style.textContent = `
            @keyframes slideIn {
                from {
                    transform: translateX(400px);
                    opacity: 0;
                }
                to {
                    transform: translateX(0);
                    opacity: 1;
                }
            }
            @keyframes slideOut {
                from {
                    transform: translateX(0);
                    opacity: 1;
                }
                to {
                    transform: translateX(400px);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);

        // ========================================
        // INITIALIZE ON PAGE LOAD
        // ========================================
        document.addEventListener('DOMContentLoaded', function() {
            updateCartTotals();
            checkEmptyCart();
            
            console.log('🌿 GardenApp Cart Page loaded successfully!');
            console.log('Features: Quantity management, Price calculation, Product removal');
            
            const cartItems = document.querySelectorAll('.cart-item');
            console.log(`Cart contains ${cartItems.length} items`);
        });
    </script>

</body>
</html>