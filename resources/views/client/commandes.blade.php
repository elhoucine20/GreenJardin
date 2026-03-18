<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders - GardenApp</title>
    
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
            --warning: #ffc107;
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
           NAVBAR
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
            margin: 0 0.5rem;
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
           ORDERS SECTION
           ======================================== */
        .orders-section {
            padding: 0 0 4rem;
            min-height: 400px;
        }

        .orders-count {
            text-align: center;
            margin-bottom: 2.5rem;
            font-size: 1.2rem;
            color: var(--gray-dark);
        }

        .orders-count strong {
            color: var(--primary-green);
            font-size: 1.4rem;
        }

        /* Order Card */
        .order-card {
            background: var(--white);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
            margin-bottom: 2rem;
            border: 2px solid transparent;
            transition: all 0.3s ease;
        }

        .order-card:hover {
            border-color: var(--light-green);
            box-shadow: 0 8px 25px rgba(45, 106, 79, 0.15);
            transform: translateY(-5px);
        }

        .order-header {
            background: linear-gradient(135deg, var(--pale-green), var(--light-green));
            padding: 1.5rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .order-id {
            font-size: 1.4rem;
            font-weight: 700;
            color: var(--dark-green);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .order-date {
            font-size: 0.95rem;
            color: var(--gray-dark);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .order-body {
            padding: 1.5rem 2rem;
        }

        .order-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .order-total {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary-green);
        }

        .order-status {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .status-badge {
            padding: 0.5rem 1.25rem;
            border-radius: 25px;
            font-weight: 700;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .status-badge.paid {
            background: linear-gradient(135deg, #28a745, #20c997);
            color: var(--white);
        }

        .status-badge.pending {
            background: linear-gradient(135deg, #ffc107, #ff9800);
            color: var(--dark-green);
        }

        .status-badge.cancelled {
            background: linear-gradient(135deg, #dc3545, #c82333);
            color: var(--white);
        }

        .order-actions {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .btn-view-details {
            background: linear-gradient(135deg, var(--secondary-green), var(--primary-green));
            color: var(--white);
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-view-details:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(45, 106, 79, 0.3);
        }

        .btn-view-details i {
            transition: transform 0.3s ease;
        }

        .btn-view-details.expanded i {
            transform: rotate(180deg);
        }

        /* Order Details */
        .order-details {
            display: none;
            margin-top: 1.5rem;
            padding-top: 1.5rem;
            border-top: 2px solid var(--gray-light);
        }

        .order-details.show {
            display: block;
            animation: slideDown 0.4s ease;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .details-title {
            font-size: 1.3rem;
            font-weight: 700;
            color: var(--dark-green);
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .product-item {
            display: flex;
            align-items: center;
            gap: 1.5rem;
            padding: 1rem;
            background: var(--gray-light);
            border-radius: 12px;
            margin-bottom: 1rem;
            transition: all 0.3s ease;
        }

        .product-item:hover {
            background: var(--pale-green);
            transform: translateX(5px);
        }

        .product-image {
            width: 80px;
            height: 80px;
            border-radius: 10px;
            overflow: hidden;
            flex-shrink: 0;
        }

        .product-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .product-info {
            flex: 1;
        }

        .product-name {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--dark-green);
            margin-bottom: 0.25rem;
        }

        .product-quantity {
            font-size: 0.9rem;
            color: var(--gray-dark);
        }

        .product-price {
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--primary-green);
        }

        /* Empty State */
        .empty-orders {
            text-align: center;
            padding: 6rem 2rem;
            background: var(--white);
            border-radius: 20px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
            display: none;
        }

        .empty-orders.show {
            display: block;
        }

        .empty-icon {
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

        .empty-orders h2 {
            color: var(--dark-green);
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .empty-orders p {
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
           RESPONSIVE
           ======================================== */
        @media (max-width: 768px) {
            .page-header h1 {
                font-size: 2.5rem;
            }

            .order-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .order-info {
                flex-direction: column;
                align-items: flex-start;
            }

            .product-item {
                flex-direction: column;
                text-align: center;
            }

            .empty-orders h2 {
                font-size: 2rem;
            }

            .empty-icon {
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

            .order-header,
            .order-body {
                padding: 1rem;
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
                        <a class="nav-link cart-link" href="cart.html">
                            <i class="bi bi-cart3"></i> Cart
                            <span class="cart-badge" id="cartCount">3</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="orders.html">
                            <i class="bi bi-bag-check"></i> My Orders
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#logout">
                            <i class="bi bi-box-arrow-right"></i> Logout
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
            <h1><i class="bi bi-bag-check"></i>My Orders</h1>
            <p>Track and manage your orders</p>
        </div>
    </section>

    <!-- ========================================
         ORDERS SECTION
         ======================================== -->
    <section class="orders-section">
        <div class="container">
            <div class="orders-count" id="ordersCount">
                You have <strong id="orderNumber">3</strong> orders
            </div>

            <div id="ordersContainer">
                <!-- Order 1 -->
                <div class="order-card">
                    <div class="order-header">
                        <div class="order-id">
                            <i class="bi bi-receipt"></i>
                            Order #ORD-2025-001
                        </div>
                        <div class="order-date">
                            <i class="bi bi-calendar3"></i>
                            January 15, 2025
                        </div>
                    </div>
                    <div class="order-body">
                        <div class="order-info">
                            <div class="order-total">Total: $96.30</div>
                            <div class="order-status">
                                <span class="status-badge paid">
                                    <i class="bi bi-check-circle"></i> Paid
                                </span>
                            </div>
                        </div>
                        <div class="order-actions">
                            <button class="btn-view-details" onclick="toggleOrderDetails(1)">
                                <i class="bi bi-chevron-down"></i>
                                View Details
                            </button>
                        </div>
                        
                        <!-- Order Details -->
                        <div class="order-details" id="details-1">
                            <h3 class="details-title">
                                <i class="bi bi-box-seam"></i> Order Items
                            </h3>
                            
                            <div class="product-item">
                                <div class="product-image">
                                    <img src="https://images.unsplash.com/photo-1518709268805-4e9042af9f23?w=150&h=150&fit=crop" 
                                         alt="Rose Plant">
                                </div>
                                <div class="product-info">
                                    <div class="product-name">Rose Plant</div>
                                    <div class="product-quantity">Quantity: 2</div>
                                </div>
                                <div class="product-price">$25.80</div>
                            </div>

                            <div class="product-item">
                                <div class="product-image">
                                    <img src="https://images.unsplash.com/photo-1617576683096-00fc8eecb3af?w=150&h=150&fit=crop" 
                                         alt="Garden Shovel">
                                </div>
                                <div class="product-info">
                                    <div class="product-name">Garden Shovel</div>
                                    <div class="product-quantity">Quantity: 1</div>
                                </div>
                                <div class="product-price">$45.00</div>
                            </div>

                            <div class="product-item">
                                <div class="product-image">
                                    <img src="https://images.unsplash.com/photo-1597848212624-e530501dfcda?w=150&h=150&fit=crop" 
                                         alt="Sunflower Seeds">
                                </div>
                                <div class="product-info">
                                    <div class="product-name">Sunflower Seeds</div>
                                    <div class="product-quantity">Quantity: 3</div>
                                </div>
                                <div class="product-price">$25.50</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Order 2 -->
                <div class="order-card">
                    <div class="order-header">
                        <div class="order-id">
                            <i class="bi bi-receipt"></i>
                            Order #ORD-2025-002
                        </div>
                        <div class="order-date">
                            <i class="bi bi-calendar3"></i>
                            January 20, 2025
                        </div>
                    </div>
                    <div class="order-body">
                        <div class="order-info">
                            <div class="order-total">Total: $53.40</div>
                            <div class="order-status">
                                <span class="status-badge pending">
                                    <i class="bi bi-clock-history"></i> Pending
                                </span>
                            </div>
                        </div>
                        <div class="order-actions">
                            <button class="btn-view-details" onclick="toggleOrderDetails(2)">
                                <i class="bi bi-chevron-down"></i>
                                View Details
                            </button>
                        </div>
                        
                        <!-- Order Details -->
                        <div class="order-details" id="details-2">
                            <h3 class="details-title">
                                <i class="bi bi-box-seam"></i> Order Items
                            </h3>
                            
                            <div class="product-item">
                                <div class="product-image">
                                    <img src="https://images.unsplash.com/photo-1499002238440-d264edd596ec?w=150&h=150&fit=crop" 
                                         alt="Lavender Plant">
                                </div>
                                <div class="product-info">
                                    <div class="product-name">Lavender Plant</div>
                                    <div class="product-quantity">Quantity: 2</div>
                                </div>
                                <div class="product-price">$35.80</div>
                            </div>

                            <div class="product-item">
                                <div class="product-image">
                                    <img src="https://images.unsplash.com/photo-1592841200221-a6898f307baa?w=150&h=150&fit=crop" 
                                         alt="Tomato Seeds">
                                </div>
                                <div class="product-info">
                                    <div class="product-name">Tomato Seeds</div>
                                    <div class="product-quantity">Quantity: 1</div>
                                </div>
                                <div class="product-price">$8.50</div>
                            </div>

                            <div class="product-item">
                                <div class="product-image">
                                    <img src="https://images.unsplash.com/photo-1563636619-e9143da7973b?w=150&h=150&fit=crop" 
                                         alt="Watering Can">
                                </div>
                                <div class="product-info">
                                    <div class="product-name">Watering Can</div>
                                    <div class="product-quantity">Quantity: 1</div>
                                </div>
                                <div class="product-price">$9.10</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Order 3 -->
                <div class="order-card">
                    <div class="order-header">
                        <div class="order-id">
                            <i class="bi bi-receipt"></i>
                            Order #ORD-2025-003
                        </div>
                        <div class="order-date">
                            <i class="bi bi-calendar3"></i>
                            January 10, 2025
                        </div>
                    </div>
                    <div class="order-body">
                        <div class="order-info">
                            <div class="order-total">Total: $28.50</div>
                            <div class="order-status">
                                <span class="status-badge cancelled">
                                    <i class="bi bi-x-circle"></i> Cancelled
                                </span>
                            </div>
                        </div>
                        <div class="order-actions">
                            <button class="btn-view-details" onclick="toggleOrderDetails(3)">
                                <i class="bi bi-chevron-down"></i>
                                View Details
                            </button>
                        </div>
                        
                        <!-- Order Details -->
                        <div class="order-details" id="details-3">
                            <h3 class="details-title">
                                <i class="bi bi-box-seam"></i> Order Items
                            </h3>
                            
                            <div class="product-item">
                                <div class="product-image">
                                    <img src="https://images.unsplash.com/photo-1459411621453-7b03977f4bfc?w=150&h=150&fit=crop" 
                                         alt="Succulent Collection">
                                </div>
                                <div class="product-info">
                                    <div class="product-name">Succulent Collection</div>
                                    <div class="product-quantity">Quantity: 1</div>
                                </div>
                                <div class="product-price">$15.90</div>
                            </div>

                            <div class="product-item">
                                <div class="product-image">
                                    <img src="https://images.unsplash.com/photo-1617953141905-b27fb1f17d88?w=150&h=150&fit=crop" 
                                         alt="Garden Gloves">
                                </div>
                                <div class="product-info">
                                    <div class="product-name">Garden Gloves</div>
                                    <div class="product-quantity">Quantity: 2</div>
                                </div>
                                <div class="product-price">$12.60</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Empty State -->
            <div id="emptyOrders" class="empty-orders">
                <i class="bi bi-bag-x empty-icon"></i>
                <h2>You have no orders yet</h2>
                <p>Start shopping and your orders will appear here!</p>
                <a href="products.html" class="btn-browse">
                    <i class="bi bi-search"></i> Go to Products
                </a>
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
        // TOGGLE ORDER DETAILS
        // ========================================
        function toggleOrderDetails(orderId) {
            const detailsElement = document.getElementById(`details-${orderId}`);
            const button = event.currentTarget;
            
            // Toggle show class
            detailsElement.classList.toggle('show');
            
            // Toggle button icon
            button.classList.toggle('expanded');
            
            // Update button text
            if (detailsElement.classList.contains('show')) {
                button.innerHTML = '<i class="bi bi-chevron-up"></i> Hide Details';
            } else {
                button.innerHTML = '<i class="bi bi-chevron-down"></i> View Details';
            }
            
            console.log(`Toggled details for order ${orderId}`);
        }

        // ========================================
        // CHECK EMPTY STATE
        // ========================================
        function checkEmptyState() {
            const ordersContainer = document.getElementById('ordersContainer');
            const orderCards = ordersContainer.querySelectorAll('.order-card');
            const emptyOrders = document.getElementById('emptyOrders');
            const ordersCount = document.getElementById('ordersCount');
            
            if (orderCards.length === 0) {
                emptyOrders.classList.add('show');
                ordersContainer.style.display = 'none';
                ordersCount.style.display = 'none';
            } else {
                emptyOrders.classList.remove('show');
                ordersContainer.style.display = 'block';
                ordersCount.style.display = 'block';
            }
        }

        // ========================================
        // UPDATE ORDER COUNT
        // ========================================
        function updateOrderCount() {
            const orderCards = document.querySelectorAll('.order-card');
            const count = orderCards.length;
            
            document.getElementById('orderNumber').textContent = count;
            
            const countText = document.getElementById('ordersCount');
            if (count === 0) {
                countText.textContent = 'You have no orders';
            } else if (count === 1) {
                countText.innerHTML = 'You have <strong>1</strong> order';
            } else {
                countText.innerHTML = `You have <strong>${count}</strong> orders`;
            }
            
            console.log(`Order count updated: ${count}`);
        }

        // ========================================
        // INITIALIZE ON PAGE LOAD
        // ========================================
        document.addEventListener('DOMContentLoaded', function() {
            updateOrderCount();
            checkEmptyState();
            
            console.log('🌿 GardenApp My Orders Page loaded successfully!');
            console.log('Features: Order list, Expandable details, Status badges');
            
            const orderCards = document.querySelectorAll('.order-card');
            console.log(`Total orders: ${orderCards.length}`);
        });
    </script>

</body>
</html>