<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GardenApp - Home</title>
    
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
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
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
            margin: 0 0.75rem;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            transition: all 0.3s ease;
            position: relative;
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
           HERO SECTION
           ======================================== */
        .hero-section {
            position: relative;
            height: 600px;
            background-image: linear-gradient(rgba(29, 53, 87, 0.5), rgba(45, 106, 79, 0.6)), 
                              url('https://images.unsplash.com/photo-1466692476868-aef1dfb1e735?w=1600&h=900&fit=crop');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: var(--white);
        }

        .hero-content {
            max-width: 800px;
            padding: 2rem;
            animation: fadeInUp 1s ease-out;
        }

        .hero-section h1 {
            font-size: 4rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            text-shadow: 2px 2px 8px rgba(0,0,0,0.3);
            letter-spacing: -1px;
        }

        .hero-section p {
            font-size: 1.5rem;
            margin-bottom: 2.5rem;
            opacity: 0.95;
            text-shadow: 1px 1px 4px rgba(0,0,0,0.2);
        }

        .btn-explore {
            background-color: var(--white);
            color: var(--primary-green);
            padding: 16px 48px;
            font-size: 1.2rem;
            font-weight: 700;
            border: none;
            border-radius: 50px;
            box-shadow: 0 6px 20px rgba(0,0,0,0.2);
            transition: all 0.4s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .btn-explore:hover {
            background-color: var(--light-green);
            color: var(--dark-green);
            transform: translateY(-5px) scale(1.05);
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* ========================================
           SEARCH SECTION
           ======================================== */
        .search-section {
            padding: 3rem 0;
            background: linear-gradient(135deg, var(--pale-green) 0%, var(--light-green) 100%);
        }

        .search-container {
            max-width: 700px;
            margin: 0 auto;
        }

        .search-wrapper {
            position: relative;
            box-shadow: 0 8px 25px rgba(45, 106, 79, 0.15);
            border-radius: 50px;
            overflow: hidden;
        }

        .search-input {
            width: 100%;
            padding: 18px 60px 18px 28px;
            border: 3px solid var(--secondary-green);
            border-radius: 50px;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            background-color: var(--white);
        }

        .search-input:focus {
            outline: none;
            border-color: var(--primary-green);
            box-shadow: 0 0 0 5px rgba(45, 106, 79, 0.1);
        }

        .search-icon {
            position: absolute;
            right: 28px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 1.5rem;
            color: var(--primary-green);
            pointer-events: none;
        }

        /* ========================================
           CATEGORIES SECTION
           ======================================== */
        .categories-section {
            padding: 5rem 0;
            background-color: var(--white);
        }

        .section-title {
            text-align: center;
            font-size: 3rem;
            font-weight: 700;
            color: var(--dark-green);
            margin-bottom: 3.5rem;
            position: relative;
            padding-bottom: 1rem;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 5px;
            background: linear-gradient(90deg, var(--primary-green), var(--secondary-green));
            border-radius: 3px;
        }

        .category-card {
            background: var(--white);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            cursor: pointer;
            border: 2px solid transparent;
            margin-bottom: 2rem;
        }

        .category-card:hover {
            transform: translateY(-15px) scale(1.03);
            box-shadow: 0 15px 40px rgba(45, 106, 79, 0.2);
            border-color: var(--light-green);
        }

        .category-image {
            width: 100%;
            height: 280px;
            object-fit: cover;
            transition: transform 0.4s ease;
        }

        .category-card:hover .category-image {
            transform: scale(1.1);
        }

        .category-body {
            padding: 2rem;
            text-align: center;
            background: linear-gradient(180deg, var(--white) 0%, var(--gray-light) 100%);
        }

        .category-body h3 {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--dark-green);
            margin: 0;
        }

        /* ========================================
           PRODUCTS SECTION
           ======================================== */
        .products-section {
            padding: 5rem 0;
            background: linear-gradient(180deg, var(--gray-light) 0%, var(--white) 100%);
        }

        .product-card {
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
        }

        .product-card:hover {
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

        .product-card:hover .product-image {
            transform: scale(1.15) rotate(2deg);
        }

        .product-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: linear-gradient(135deg, var(--secondary-green), var(--primary-green));
            color: var(--white);
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 700;
            box-shadow: 0 4px 10px rgba(0,0,0,0.2);
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

        .btn-cart {
            flex: 1;
            background: linear-gradient(135deg, var(--secondary-green), var(--primary-green));
            color: var(--white);
            border: none;
            padding: 12px 20px;
            border-radius: 12px;
            font-weight: 700;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .btn-cart::before {
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

        .btn-cart:hover::before {
            transform: translate(-50%, -50%) scale(2);
        }

        .btn-cart:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(45, 106, 79, 0.4);
        }

        /* No Results */
        .no-results {
            text-align: center;
            padding: 4rem 0;
            display: none;
        }

        .no-results i {
            font-size: 5rem;
            color: var(--light-green);
            margin-bottom: 1.5rem;
        }

        .no-results h3 {
            color: var(--dark-green);
            margin-bottom: 1rem;
        }

        .no-results p {
            color: var(--gray-dark);
            font-size: 1.1rem;
        }

        /* ========================================
           FOOTER
           ======================================== */
        .footer {
            background-color: var(--dark-green);
            color: var(--white);
            text-align: center;
            padding: 2.5rem 0;
            margin-top: 3rem;
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
            .hero-section {
                height: 500px;
                background-attachment: scroll;
            }

            .hero-section h1 {
                font-size: 2.5rem;
            }

            .hero-section p {
                font-size: 1.2rem;
            }

            .section-title {
                font-size: 2.2rem;
            }

            .product-buttons {
                flex-direction: column;
            }
        }

        @media (max-width: 576px) {
            .navbar-brand {
                font-size: 1.4rem;
            }

            .hero-section h1 {
                font-size: 2rem;
            }

            .btn-explore {
                padding: 14px 36px;
                font-size: 1rem;
            }
        }

        /* Animation delays for products */
        .product-card:nth-child(1) { animation: fadeIn 0.5s ease 0.1s both; }
        .product-card:nth-child(2) { animation: fadeIn 0.5s ease 0.2s both; }
        .product-card:nth-child(3) { animation: fadeIn 0.5s ease 0.3s both; }
        .product-card:nth-child(4) { animation: fadeIn 0.5s ease 0.4s both; }
        .product-card:nth-child(5) { animation: fadeIn 0.5s ease 0.5s both; }
        .product-card:nth-child(6) { animation: fadeIn 0.5s ease 0.6s both; }

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
    </style>
</head>
<body>

    <!-- ========================================
         NAVBAR
         ======================================== -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="bi bi-flower1"></i>
                GardenApp
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#home">
                            <i class="bi bi-house-door"></i> Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#products">
                            <i class="bi bi-box-seam"></i> Products
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#favorites">
                            <i class="bi bi-heart"></i> Favorites
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
         HERO SECTION
         ======================================== -->
    <section id="home" class="hero-section">
        <div class="hero-content">
            <h1>Welcome to GardenApp</h1>
            <p>Discover plants, seeds and gardening tools</p>
            <button class="btn btn-explore" onclick="scrollToProducts()">
                Explore Products
            </button>
        </div>
    </section>

    <!-- ========================================
         SEARCH SECTION
         ======================================== -->
    <section class="search-section">
        <div class="container">
            <div class="search-container">
                <div class="search-wrapper">
                    <input 
                        type="text" 
                        id="searchInput" 
                        class="search-input" 
                        placeholder="Search for plants, seeds, tools..."
                    >
                    <i class="bi bi-search search-icon"></i>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================
         CATEGORIES SECTION
         ======================================== -->
    <section class="categories-section">
        <div class="container">
            <h2 class="section-title">Browse Categories</h2>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="category-card" onclick="filterCategory('plant')">
                        <img src="https://images.unsplash.com/photo-1466781783364-36c955e42a7f?w=600&h=400&fit=crop" 
                             alt="Plants" 
                             class="category-image">
                        <div class="category-body">
                            <h3>Plants</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="category-card" onclick="filterCategory('seed')">
                        <img src="https://images.unsplash.com/photo-1464226184884-fa280b87c399?w=600&h=400&fit=crop" 
                             alt="Seeds" 
                             class="category-image">
                        <div class="category-body">
                            <h3>Seeds</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="category-card" onclick="filterCategory('tool')">
                        <img src="https://images.unsplash.com/photo-1416879595882-3373a0480b5b?w=600&h=400&fit=crop" 
                             alt="Tools" 
                             class="category-image">
                        <div class="category-body">
                            <h3>Tools</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================
         PRODUCTS SECTION
         ======================================== -->
    <section id="products" class="products-section">
        <div class="container">
            <h2 class="section-title">Featured Products</h2>
            <div class="row" id="productsContainer">
                <!-- Product 1: Rose Plant -->
                <div class="col-lg-4 col-md-6 product-item" data-name="Rose Plant" data-category="plant">
                    <div class="product-card">
                        <div class="product-image-wrapper">
                            <img src="https://images.unsplash.com/photo-1518709268805-4e9042af9f23?w=600&h=400&fit=crop" 
                                 alt="Rose Plant" 
                                 class="product-image">
                            <span class="product-badge">Best Seller</span>
                        </div>
                        <div class="product-body">
                            <h4>Rose Plant</h4>
                            <p>Beautiful red rose perfect for your garden. Hardy and fragrant blooms all season long.</p>
                            <div class="product-buttons">
                                <button class="btn btn-view" onclick="viewDetails('Rose Plant')">
                                    <i class="bi bi-eye"></i> View Details
                                </button>
                                <button class="btn btn-cart" onclick="addToCart('Rose Plant')">
                                    <i class="bi bi-cart-plus"></i> Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product 2: Tomato Seeds -->
                <div class="col-lg-4 col-md-6 product-item" data-name="Tomato Seeds" data-category="seed">
                    <div class="product-card">
                        <div class="product-image-wrapper">
                            <img src="https://images.unsplash.com/photo-1592841200221-a6898f307baa?w=600&h=400&fit=crop" 
                                 alt="Tomato Seeds" 
                                 class="product-image">
                            <span class="product-badge">Organic</span>
                        </div>
                        <div class="product-body">
                            <h4>Tomato Seeds</h4>
                            <p>Organic tomato seeds for healthy homegrown produce. High germination rate guaranteed.</p>
                            <div class="product-buttons">
                                <button class="btn btn-view" onclick="viewDetails('Tomato Seeds')">
                                    <i class="bi bi-eye"></i> View Details
                                </button>
                                <button class="btn btn-cart" onclick="addToCart('Tomato Seeds')">
                                    <i class="bi bi-cart-plus"></i> Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product 3: Garden Shovel -->
                <div class="col-lg-4 col-md-6 product-item" data-name="Garden Shovel" data-category="tool">
                    <div class="product-card">
                        <div class="product-image-wrapper">
                            <img src="https://images.unsplash.com/photo-1617576683096-00fc8eecb3af?w=600&h=400&fit=crop" 
                                 alt="Garden Shovel" 
                                 class="product-image">
                            <span class="product-badge">Premium</span>
                        </div>
                        <div class="product-body">
                            <h4>Garden Shovel</h4>
                            <p>Durable steel shovel with ergonomic handle. Perfect for digging and planting tasks.</p>
                            <div class="product-buttons">
                                <button class="btn btn-view" onclick="viewDetails('Garden Shovel')">
                                    <i class="bi bi-eye"></i> View Details
                                </button>
                                <button class="btn btn-cart" onclick="addToCart('Garden Shovel')">
                                    <i class="bi bi-cart-plus"></i> Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product 4: Lavender Plant -->
                <div class="col-lg-4 col-md-6 product-item" data-name="Lavender Plant" data-category="plant">
                    <div class="product-card">
                        <div class="product-image-wrapper">
                            <img src="https://images.unsplash.com/photo-1499002238440-d264edd596ec?w=600&h=400&fit=crop" 
                                 alt="Lavender Plant" 
                                 class="product-image">
                            <span class="product-badge">Aromatic</span>
                        </div>
                        <div class="product-body">
                            <h4>Lavender Plant</h4>
                            <p>Fragrant lavender plant that attracts bees and butterflies. Low maintenance beauty.</p>
                            <div class="product-buttons">
                                <button class="btn btn-view" onclick="viewDetails('Lavender Plant')">
                                    <i class="bi bi-eye"></i> View Details
                                </button>
                                <button class="btn btn-cart" onclick="addToCart('Lavender Plant')">
                                    <i class="bi bi-cart-plus"></i> Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product 5: Sunflower Seeds -->
                <div class="col-lg-4 col-md-6 product-item" data-name="Sunflower Seeds" data-category="seed">
                    <div class="product-card">
                        <div class="product-image-wrapper">
                            <img src="https://images.unsplash.com/photo-1597848212624-e530501dfcda?w=600&h=400&fit=crop" 
                                 alt="Sunflower Seeds" 
                                 class="product-image">
                            <span class="product-badge">Popular</span>
                        </div>
                        <div class="product-body">
                            <h4>Sunflower Seeds</h4>
                            <p>Grow stunning sunflowers up to 8 feet tall. Bright and cheerful garden addition.</p>
                            <div class="product-buttons">
                                <button class="btn btn-view" onclick="viewDetails('Sunflower Seeds')">
                                    <i class="bi bi-eye"></i> View Details
                                </button>
                                <button class="btn btn-cart" onclick="addToCart('Sunflower Seeds')">
                                    <i class="bi bi-cart-plus"></i> Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product 6: Watering Can -->
                <div class="col-lg-4 col-md-6 product-item" data-name="Watering Can" data-category="tool">
                    <div class="product-card">
                        <div class="product-image-wrapper">
                            <img src="https://images.unsplash.com/photo-1563636619-e9143da7973b?w=600&h=400&fit=crop" 
                                 alt="Watering Can" 
                                 class="product-image">
                            <span class="product-badge">Essential</span>
                        </div>
                        <div class="product-body">
                            <h4>Watering Can</h4>
                            <p>Large capacity watering can with comfortable grip. Perfect for daily plant care.</p>
                            <div class="product-buttons">
                                <button class="btn btn-view" onclick="viewDetails('Watering Can')">
                                    <i class="bi bi-eye"></i> View Details
                                </button>
                                <button class="btn btn-cart" onclick="addToCart('Watering Can')">
                                    <i class="bi bi-cart-plus"></i> Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- No Results Message -->
            <div id="noResults" class="no-results">
                <i class="bi bi-search"></i>
                <h3>No Products Found</h3>
                <p>Try adjusting your search or browse our categories</p>
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
        // CART FUNCTIONALITY
        // ========================================
        let cartCount = 0;

        function addToCart(productName) {
            cartCount++;
            updateCartBadge();
            
            // Visual feedback
            const btn = event.target.closest('.btn-cart');
            const originalText = btn.innerHTML;
            btn.innerHTML = '<i class="bi bi-check2"></i> Added!';
            btn.style.background = 'linear-gradient(135deg, #28a745, #20c997)';
            
            setTimeout(() => {
                btn.innerHTML = originalText;
                btn.style.background = '';
            }, 1500);
            
            console.log(`Added to cart: ${productName}`);
            console.log(`Current cart count: ${cartCount}`);
            
            // Show alert
            showNotification(`${productName} added to cart!`);
        }

        function updateCartBadge() {
            const badge = document.getElementById('cartCount');
            badge.textContent = cartCount;
            badge.style.transform = 'scale(1.3)';
            setTimeout(() => {
                badge.style.transform = 'scale(1)';
            }, 300);
        }

        function showNotification(message) {
            // Simple notification (could be enhanced with toast library)
            const notification = document.createElement('div');
            notification.style.cssText = `
                position: fixed;
                top: 100px;
                right: 20px;
                background: linear-gradient(135deg, #52b788, #2d6a4f);
                color: white;
                padding: 1rem 1.5rem;
                border-radius: 12px;
                box-shadow: 0 8px 20px rgba(0,0,0,0.2);
                z-index: 9999;
                animation: slideIn 0.3s ease;
                font-weight: 600;
            `;
            notification.textContent = message;
            document.body.appendChild(notification);
            
            setTimeout(() => {
                notification.style.animation = 'slideOut 0.3s ease';
                setTimeout(() => notification.remove(), 300);
            }, 2500);
        }

        // ========================================
        // VIEW DETAILS
        // ========================================
        function viewDetails(productName) {
            alert(`Product: ${productName}\n\nThis would normally open the product details page with full information, pricing, and reviews.`);
            console.log(`View details clicked for: ${productName}`);
        }

        // ========================================
        // SEARCH FUNCTIONALITY
        // ========================================
        const searchInput = document.getElementById('searchInput');
        const productItems = document.querySelectorAll('.product-item');
        const noResults = document.getElementById('noResults');

        searchInput.addEventListener('keyup', function(e) {
            const searchTerm = e.target.value.toLowerCase().trim();
            
            console.log('Search term:', searchTerm);
            
            let visibleCount = 0;

            productItems.forEach(item => {
                const productName = item.getAttribute('data-name').toLowerCase();
                
                if (productName.includes(searchTerm)) {
                    item.style.display = 'block';
                    visibleCount++;
                } else {
                    item.style.display = 'none';
                }
            });

            // Show/hide no results message
            if (visibleCount === 0 && searchTerm !== '') {
                noResults.style.display = 'block';
            } else {
                noResults.style.display = 'none';
            }
        });

        // ========================================
        // CATEGORY FILTER
        // ========================================
        function filterCategory(category) {
            console.log('Category clicked:', category);
            
            productItems.forEach(item => {
                const productCategory = item.getAttribute('data-category');
                
                if (productCategory === category) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
            
            // Scroll to products
            scrollToProducts();
            
            // Update search input
            searchInput.value = '';
            noResults.style.display = 'none';
        }

        // ========================================
        // SMOOTH SCROLL
        // ========================================
        function scrollToProducts() {
            document.getElementById('products').scrollIntoView({ 
                behavior: 'smooth',
                block: 'start'
            });
        }

        // ========================================
        // ACTIVE NAV LINK ON SCROLL
        // ========================================
        window.addEventListener('scroll', function() {
            const sections = document.querySelectorAll('section[id]');
            const navLinks = document.querySelectorAll('.nav-link');
            
            let current = '';
            
            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                const sectionHeight = section.clientHeight;
                
                if (window.pageYOffset >= (sectionTop - 100)) {
                    current = section.getAttribute('id');
                }
            });
            
            navLinks.forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('href').slice(1) === current) {
                    link.classList.add('active');
                }
            });
        });

        // ========================================
        // ANIMATIONS FOR NOTIFICATION
        // ========================================
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
        // CONSOLE LOG ON PAGE LOAD
        // ========================================
        console.log('🌿 GardenApp loaded successfully!');
        console.log('Features: Search filtering, Cart system, Category filtering, Smooth scroll');
    </script>

</body>
</html>