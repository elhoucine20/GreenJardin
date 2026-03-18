<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Favorites - GardenApp</title>
    
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
           NAVBAR (Same as Home & Products Page)
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
           FAVORITES COUNT
           ======================================== */
        .favorites-count {
            text-align: center;
            margin-bottom: 2.5rem;
            font-size: 1.2rem;
            color: var(--gray-dark);
        }

        .favorites-count strong {
            color: var(--primary-green);
            font-size: 1.4rem;
        }

        /* ========================================
           FAVORITES SECTION
           ======================================== */
        .favorites-section {
            padding: 0 0 4rem;
            min-height: 400px;
        }

        .favorite-card {
            background: var(--white);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            margin-bottom: 2.5rem;
            border: 2px solid transparent;
            height: 100%;
            display: flex;
            flex-direction: column;
            position: relative;
        }

        .favorite-card:hover {
            transform: translateY(-12px) scale(1.02);
            box-shadow: 0 12px 35px rgba(45, 106, 79, 0.18);
            border-color: var(--light-green);
        }

        .product-image-wrapper {
            position: relative;
            overflow: hidden;
            height: 280px;
            background: linear-gradient(135deg, var(--pale-green), var(--light-green));
        }

        .product-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .favorite-card:hover .product-image {
            transform: scale(1.15) rotate(2deg);
        }

        .favorite-badge {
            position: absolute;
            top: 15px;
            left: 15px;
            background: linear-gradient(135deg, #dc3545, #c82333);
            color: var(--white);
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 700;
            box-shadow: 0 4px 10px rgba(0,0,0,0.2);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .favorite-badge i {
            font-size: 1rem;
        }

        .product-body {
            padding: 2rem;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .product-body h4 {
            font-size: 1.6rem;
            font-weight: 700;
            color: var(--dark-green);
            margin-bottom: 1rem;
        }

        .product-body p {
            color: var(--gray-dark);
            font-size: 1rem;
            margin-bottom: 1.5rem;
            flex: 1;
        }

        .product-buttons {
            display: flex;
            gap: 1rem;
            margin-top: auto;
        }

        .btn-view {
            flex: 1;
            background-color: transparent;
            color: var(--primary-green);
            border: 2px solid var(--primary-green);
            padding: 12px 20px;
            border-radius: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-view:hover {
            background-color: var(--primary-green);
            color: var(--white);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(45, 106, 79, 0.3);
        }

        .btn-remove {
            flex: 1;
            background: linear-gradient(135deg, #dc3545, #c82333);
            color: var(--white);
            border: none;
            padding: 12px 20px;
            border-radius: 12px;
            font-weight: 700;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .btn-remove::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) scale(0);
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            transition: transform 0.5s ease;
        }

        .btn-remove:hover::before {
            transform: translate(-50%, -50%) scale(2);
        }

        .btn-remove:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(220, 53, 69, 0.4);
        }

        /* ========================================
           EMPTY STATE
           ======================================== */
        .empty-state {
            text-align: center;
            padding: 6rem 2rem;
            display: none;
        }

        .empty-state.show {
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

        .empty-state h2 {
            color: var(--dark-green);
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .empty-state p {
            color: var(--gray-dark);
            font-size: 1.2rem;
            margin-bottom: 2.5rem;
            max-width: 500px;
            margin-left: auto;
            margin-right: auto;
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
                transform: scale(1);
            }
            50% {
                transform: scale(0.9);
            }
            100% {
                opacity: 0;
                transform: scale(0.8);
            }
        }

        .removing {
            animation: fadeOut 0.5s ease-out forwards;
        }

        /* ========================================
           RESPONSIVE
           ======================================== */
        @media (max-width: 768px) {
            .page-header h1 {
                font-size: 2.5rem;
            }

            .page-header p {
                font-size: 1.1rem;
            }

            .product-buttons {
                flex-direction: column;
            }

            .empty-state h2 {
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

            .btn-browse {
                padding: 14px 36px;
                font-size: 1rem;
            }
        }

        /* Animation for cards */
        .favorite-card {
            animation: fadeIn 0.5s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Staggered animation */
        .favorite-card:nth-child(1) { animation-delay: 0.05s; }
        .favorite-card:nth-child(2) { animation-delay: 0.1s; }
        .favorite-card:nth-child(3) { animation-delay: 0.15s; }
        .favorite-card:nth-child(4) { animation-delay: 0.2s; }
        .favorite-card:nth-child(5) { animation-delay: 0.25s; }
        .favorite-card:nth-child(6) { animation-delay: 0.3s; }
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
                        <a class="nav-link active" href="favorites.html">
                            <i class="bi bi-heart-fill"></i> Favorites
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link cart-link" href="#cart">
                            <i class="bi bi-cart3"></i> Cart
                            <span class="cart-badge" id="cartCount">0</span>
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
            <h1><i class="bi bi-heart-fill"></i>My Favorites</h1>
            <p>All your favorite plants, seeds, and tools in one place</p>
        </div>
    </section>

    <!-- ========================================
         FAVORITES SECTION
         ======================================== -->
    <section class="favorites-section">
        <div class="container">
            <div class="favorites-count" id="favoritesCount">
                You have <strong id="favoriteNumber">5</strong> favorite products
            </div>

            <div class="row" id="favoritesContainer">
                <!-- Favorite 1: Rose Plant -->
                <div class="col-lg-4 col-md-6 favorite-item" data-id="1" data-name="Rose Plant">
                    <div class="favorite-card">
                        <div class="product-image-wrapper">
                            <img src="https://images.unsplash.com/photo-1518709268805-4e9042af9f23?w=600&h=400&fit=crop" 
                                 alt="Rose Plant" 
                                 class="product-image">
                            <span class="favorite-badge">
                                <i class="bi bi-heart-fill"></i> Favorite
                            </span>
                        </div>
                        <div class="product-body">
                            <h4>Rose Plant</h4>
                            <p>Beautiful red rose perfect for your garden. Hardy and fragrant blooms all season long.</p>
                            <div class="product-buttons">
                                <button class="btn btn-view" onclick="viewDetails('Rose Plant')">
                                    <i class="bi bi-eye"></i> View Details
                                </button>
                                <button class="btn btn-remove" onclick="removeFromFavorites(1)">
                                    <i class="bi bi-heart-slash"></i> Remove
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Favorite 2: Lavender Plant -->
                <div class="col-lg-4 col-md-6 favorite-item" data-id="2" data-name="Lavender Plant">
                    <div class="favorite-card">
                        <div class="product-image-wrapper">
                            <img src="https://images.unsplash.com/photo-1499002238440-d264edd596ec?w=600&h=400&fit=crop" 
                                 alt="Lavender Plant" 
                                 class="product-image">
                            <span class="favorite-badge">
                                <i class="bi bi-heart-fill"></i> Favorite
                            </span>
                        </div>
                        <div class="product-body">
                            <h4>Lavender Plant</h4>
                            <p>Fragrant lavender plant that attracts bees and butterflies. Low maintenance beauty.</p>
                            <div class="product-buttons">
                                <button class="btn btn-view" onclick="viewDetails('Lavender Plant')">
                                    <i class="bi bi-eye"></i> View Details
                                </button>
                                <button class="btn btn-remove" onclick="removeFromFavorites(2)">
                                    <i class="bi bi-heart-slash"></i> Remove
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Favorite 3: Tomato Seeds -->
                <div class="col-lg-4 col-md-6 favorite-item" data-id="3" data-name="Tomato Seeds">
                    <div class="favorite-card">
                        <div class="product-image-wrapper">
                            <img src="https://images.unsplash.com/photo-1592841200221-a6898f307baa?w=600&h=400&fit=crop" 
                                 alt="Tomato Seeds" 
                                 class="product-image">
                            <span class="favorite-badge">
                                <i class="bi bi-heart-fill"></i> Favorite
                            </span>
                        </div>
                        <div class="product-body">
                            <h4>Tomato Seeds</h4>
                            <p>Organic tomato seeds for healthy homegrown produce. High germination rate guaranteed.</p>
                            <div class="product-buttons">
                                <button class="btn btn-view" onclick="viewDetails('Tomato Seeds')">
                                    <i class="bi bi-eye"></i> View Details
                                </button>
                                <button class="btn btn-remove" onclick="removeFromFavorites(3)">
                                    <i class="bi bi-heart-slash"></i> Remove
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Favorite 4: Sunflower Seeds -->
                <div class="col-lg-4 col-md-6 favorite-item" data-id="4" data-name="Sunflower Seeds">
                    <div class="favorite-card">
                        <div class="product-image-wrapper">
                            <img src="https://images.unsplash.com/photo-1597848212624-e530501dfcda?w=600&h=400&fit=crop" 
                                 alt="Sunflower Seeds" 
                                 class="product-image">
                            <span class="favorite-badge">
                                <i class="bi bi-heart-fill"></i> Favorite
                            </span>
                        </div>
                        <div class="product-body">
                            <h4>Sunflower Seeds</h4>
                            <p>Grow stunning sunflowers up to 8 feet tall. Bright and cheerful garden addition.</p>
                            <div class="product-buttons">
                                <button class="btn btn-view" onclick="viewDetails('Sunflower Seeds')">
                                    <i class="bi bi-eye"></i> View Details
                                </button>
                                <button class="btn btn-remove" onclick="removeFromFavorites(4)">
                                    <i class="bi bi-heart-slash"></i> Remove
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Favorite 5: Garden Shovel -->
                <div class="col-lg-4 col-md-6 favorite-item" data-id="5" data-name="Garden Shovel">
                    <div class="favorite-card">
                        <div class="product-image-wrapper">
                            <img src="https://images.unsplash.com/photo-1617576683096-00fc8eecb3af?w=600&h=400&fit=crop" 
                                 alt="Garden Shovel" 
                                 class="product-image">
                            <span class="favorite-badge">
                                <i class="bi bi-heart-fill"></i> Favorite
                            </span>
                        </div>
                        <div class="product-body">
                            <h4>Garden Shovel</h4>
                            <p>Durable steel shovel with ergonomic handle. Perfect for digging and planting tasks.</p>
                            <div class="product-buttons">
                                <button class="btn btn-view" onclick="viewDetails('Garden Shovel')">
                                    <i class="bi bi-eye"></i> View Details
                                </button>
                                <button class="btn btn-remove" onclick="removeFromFavorites(5)">
                                    <i class="bi bi-heart-slash"></i> Remove
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Favorite 6: Succulent Collection -->
                <div class="col-lg-4 col-md-6 favorite-item" data-id="6" data-name="Succulent Collection">
                    <div class="favorite-card">
                        <div class="product-image-wrapper">
                            <img src="https://images.unsplash.com/photo-1459411621453-7b03977f4bfc?w=600&h=400&fit=crop" 
                                 alt="Succulent Collection" 
                                 class="product-image">
                            <span class="favorite-badge">
                                <i class="bi bi-heart-fill"></i> Favorite
                            </span>
                        </div>
                        <div class="product-body">
                            <h4>Succulent Collection</h4>
                            <p>Assorted succulent plants in decorative pots. Perfect for indoor decoration.</p>
                            <div class="product-buttons">
                                <button class="btn btn-view" onclick="viewDetails('Succulent Collection')">
                                    <i class="bi bi-eye"></i> View Details
                                </button>
                                <button class="btn btn-remove" onclick="removeFromFavorites(6)">
                                    <i class="bi bi-heart-slash"></i> Remove
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Empty State -->
            <div id="emptyState" class="empty-state">
                <i class="bi bi-heart empty-icon"></i>
                <h2>You have no favorite products yet.</h2>
                <p>Start adding products to your favorites and they will appear here!</p>
                <a href="products.html" class="btn-browse">
                    <i class="bi bi-search"></i> Browse Products
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
        // REMOVE FROM FAVORITES
        // ========================================
        function removeFromFavorites(productId) {
            const productElement = document.querySelector(`[data-id="${productId}"]`);
            const productName = productElement.getAttribute('data-name');
            
            // Confirmation
            if (!confirm(`Remove "${productName}" from favorites?`)) {
                return;
            }
            
            console.log(`Removing from favorites: ${productName} (ID: ${productId})`);
            
            // Add removal animation
            productElement.classList.add('removing');
            
            // Remove element after animation completes
            setTimeout(() => {
                productElement.remove();
                updateFavoritesCount();
                checkEmptyState();
                
                // Show notification
                showNotification(`${productName} removed from favorites`);
            }, 500);
        }

        // ========================================
        // UPDATE FAVORITES COUNT
        // ========================================
        function updateFavoritesCount() {
            const favoriteItems = document.querySelectorAll('.favorite-item');
            const count = favoriteItems.length;
            
            document.getElementById('favoriteNumber').textContent = count;
            
            const countText = document.getElementById('favoritesCount');
            if (count === 0) {
                countText.textContent = 'You have no favorite products';
            } else if (count === 1) {
                countText.innerHTML = 'You have <strong>1</strong> favorite product';
            } else {
                countText.innerHTML = `You have <strong>${count}</strong> favorite products`;
            }
            
            console.log(`Favorites count updated: ${count}`);
        }

        // ========================================
        // CHECK EMPTY STATE
        // ========================================
        function checkEmptyState() {
            const favoriteItems = document.querySelectorAll('.favorite-item');
            const emptyState = document.getElementById('emptyState');
            const favoritesContainer = document.getElementById('favoritesContainer');
            const favoritesCount = document.getElementById('favoritesCount');
            
            if (favoriteItems.length === 0) {
                emptyState.classList.add('show');
                favoritesContainer.style.display = 'none';
                favoritesCount.style.display = 'none';
            } else {
                emptyState.classList.remove('show');
                favoritesContainer.style.display = 'flex';
                favoritesCount.style.display = 'block';
            }
        }

        // ========================================
        // VIEW DETAILS
        // ========================================
        function viewDetails(productName) {
            alert(`Product Details\n\n${productName}\n\nThis would normally navigate to the product details page with full information, pricing, reviews, and specifications.`);
            console.log(`View details clicked for: ${productName}`);
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
                background: linear-gradient(135deg, #dc3545, #c82333);
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
            updateFavoritesCount();
            checkEmptyState();
            
            console.log('🌿 GardenApp Favorites Page loaded successfully!');
            console.log('Features: Remove from favorites, Empty state, Animations');
            
            const favoriteItems = document.querySelectorAll('.favorite-item');
            console.log(`Total favorite items: ${favoriteItems.length}`);
        });

        // ========================================
        // OPTIONAL: CART FUNCTIONALITY
        // ========================================
        let cartCount = 0;

        // This function can be called from "Add to Cart" button if added
        function addToCart(productName) {
            cartCount++;
            updateCartBadge();
            alert(`Product added to cart: ${productName}`);
            console.log(`Added to cart: ${productName}`);
        }

        function updateCartBadge() {
            const badge = document.getElementById('cartCount');
            badge.textContent = cartCount;
            badge.style.transform = 'scale(1.3)';
            setTimeout(() => {
                badge.style.transform = 'scale(1)';
            }, 300);
        }
    </script>

</body>
</html>