<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GardenApp - Your Gardening Platform</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.min.css">
    <!-- <link rel="stylesheet" href="{{asset('css/admin_dashbord.css')}}"> -->

    
    <style>
        /* ========================================
           CUSTOM CSS VARIABLES
           ======================================== */
        :root {
            --primary-green: #2d6a4f;
            --secondary-green: #52b788;
            --light-green: #95d5b2;
            --pale-green: #d8f3dc;
            --dark-green: #1b4332;
            --white: #ffffff;
            --light-gray: #f8f9fa;
            --text-dark: #2c3e50;
            --shadow-sm: 0 2px 8px rgba(0,0,0,0.08);
            --shadow-md: 0 4px 16px rgba(0,0,0,0.12);
            --shadow-lg: 0 8px 24px rgba(0,0,0,0.15);
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* ========================================
           GLOBAL STYLES
           ======================================== */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: var(--text-dark);
            line-height: 1.6;
            overflow-x: hidden;
        }

        html {
            scroll-behavior: smooth;
        }

        section {
            padding: 80px 0;
        }

        /* ========================================
           NAVBAR STYLES
           ======================================== */
        .navbar {
            background-color: var(--white);
            box-shadow: var(--shadow-sm);
            padding: 1rem 0;
            transition: var(--transition);
        }

        .navbar.scrolled {
            box-shadow: var(--shadow-md);
        }

        .navbar-brand {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--primary-green) !important;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: var(--transition);
        }

        .navbar-brand:hover {
            transform: scale(1.05);
            color: var(--secondary-green) !important;
        }

        .navbar-brand i {
            font-size: 2.2rem;
        }

        .navbar-nav .nav-link {
            color: var(--text-dark) !important;
            font-weight: 500;
            margin: 0 0.75rem;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            transition: var(--transition);
            position: relative;
        }

        .navbar-nav .nav-link:hover {
            color: var(--secondary-green) !important;
            background-color: var(--pale-green);
        }

        .navbar-nav .nav-link.active {
            color: var(--primary-green) !important;
            background-color: var(--pale-green);
        }

        .cart-badge {
            position: relative;
        }

        .cart-badge .badge {
            position: absolute;
            top: -8px;
            right: -8px;
            background-color: var(--secondary-green);
            color: var(--white);
            border-radius: 50%;
            padding: 4px 8px;
            font-size: 0.75rem;
            font-weight: 700;
        }

        .navbar-toggler {
            border: none;
            padding: 0.5rem;
        }

        .navbar-toggler:focus {
            box-shadow: none;
        }

        /* ========================================
           HERO SECTION
           ======================================== */
        .hero-section {
            position: relative;
            height: 90vh;
            min-height: 600px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, rgba(45, 106, 79, 0.95), rgba(82, 183, 136, 0.9)), 
                        url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 800"><rect fill="%23d8f3dc" width="1200" height="800"/><g fill-opacity="0.2"><path fill="%2395d5b2" d="M0 400c100-50 200-50 300 0s200 50 300 0 200-50 300 0 200 50 300 0v400H0V400z"/><path fill="%2352b788" d="M0 500c100-30 200-30 300 0s200 30 300 0 200-30 300 0 200 30 300 0v300H0V500z"/></g></svg>');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: var(--white);
            text-align: center;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(circle at 30% 50%, rgba(149, 213, 178, 0.2), transparent);
        }

        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 800px;
            padding: 2rem;
            animation: fadeInUp 1s ease-out;
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

        .hero-section h1 {
            font-size: 4rem;
            font-weight: 800;
            margin-bottom: 1.5rem;
            text-shadow: 2px 2px 8px rgba(0,0,0,0.3);
            letter-spacing: -1px;
        }

        .hero-section p {
            font-size: 1.5rem;
            margin-bottom: 2.5rem;
            opacity: 0.95;
            font-weight: 300;
        }

        .btn-hero {
            background: var(--white);
            color: var(--primary-green);
            padding: 16px 48px;
            font-size: 1.2rem;
            font-weight: 700;
            border: none;
            border-radius: 50px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
            transition: var(--transition);
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .btn-hero:hover {
            transform: translateY(-4px) scale(1.05);
            box-shadow: 0 12px 28px rgba(0,0,0,0.3);
            background: var(--pale-green);
        }

        /* ========================================
           SEARCH SECTION
           ======================================== */
        .search-section {
            background-color: var(--light-gray);
            padding: 3rem 0;
        }

        .search-container {
            max-width: 700px;
            margin: 0 auto;
        }

        .search-wrapper {
            position: relative;
        }

        .search-wrapper input {
            width: 100%;
            padding: 18px 60px 18px 24px;
            border: 2px solid var(--light-green);
            border-radius: 50px;
            font-size: 1.1rem;
            transition: var(--transition);
            box-shadow: var(--shadow-sm);
        }

        .search-wrapper input:focus {
            outline: none;
            border-color: var(--secondary-green);
            box-shadow: 0 0 0 4px rgba(82, 183, 136, 0.1);
        }

        .search-wrapper i {
            position: absolute;
            right: 24px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 1.5rem;
            color: var(--primary-green);
        }

        /* ========================================
           CATEGORIES SECTION
           ======================================== */
        .categories-section {
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
            height: 4px;
            background: linear-gradient(90deg, var(--primary-green), var(--secondary-green));
            border-radius: 2px;
        }

        .category-card {
            background: var(--white);
            border-radius: 20px;
            padding: 3rem 2rem;
            text-align: center;
            box-shadow: var(--shadow-sm);
            transition: var(--transition);
            cursor: pointer;
            border: 2px solid transparent;
            height: 100%;
        }

        .category-card:hover {
            transform: translateY(-12px) scale(1.02);
            box-shadow: var(--shadow-lg);
            border-color: var(--light-green);
        }

        .category-icon {
            font-size: 5rem;
            margin-bottom: 1.5rem;
            transition: var(--transition);
        }

        .category-card:hover .category-icon {
            transform: scale(1.15) rotate(5deg);
        }

        .category-card h3 {
            font-size: 1.8rem;
            font-weight: 600;
            color: var(--dark-green);
            margin-bottom: 0.75rem;
        }

        .category-card p {
            color: #666;
            font-size: 1rem;
            margin: 0;
        }

        /* ========================================
           PRODUCTS SECTION
           ======================================== */
        .products-section {
            background-color: var(--light-gray);
        }

        .product-card {
            background: var(--white);
            border-radius: 16px;
            overflow: hidden;
            box-shadow: var(--shadow-sm);
            transition: var(--transition);
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-lg);
        }

        .product-image {
            position: relative;
            height: 280px;
            background: linear-gradient(135deg, var(--pale-green), var(--light-green));
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .product-image i {
            font-size: 6rem;
            color: var(--primary-green);
            transition: var(--transition);
        }

        .product-card:hover .product-image i {
            transform: scale(1.15) rotate(5deg);
        }

        .product-badge {
            position: absolute;
            top: 16px;
            right: 16px;
            background-color: var(--secondary-green);
            color: var(--white);
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 700;
            text-transform: uppercase;
        }

        .product-content {
            padding: 1.75rem;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .product-card h4 {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--dark-green);
            margin-bottom: 0.75rem;
        }

        .product-card p {
            color: #666;
            font-size: 1rem;
            margin-bottom: 1.5rem;
            flex: 1;
        }

        .product-price {
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--secondary-green);
            margin-bottom: 1.25rem;
        }

        .product-buttons {
            display: flex;
            gap: 0.75rem;
        }

        .btn-view {
            flex: 1;
            background-color: transparent;
            color: var(--primary-green);
            border: 2px solid var(--primary-green);
            padding: 12px 24px;
            border-radius: 10px;
            font-weight: 600;
            transition: var(--transition);
        }

        .btn-view:hover {
            background-color: var(--primary-green);
            color: var(--white);
            transform: translateY(-2px);
        }

        .btn-cart {
            flex: 1;
            background-color: var(--secondary-green);
            color: var(--white);
            border: none;
            padding: 12px 24px;
            border-radius: 10px;
            font-weight: 600;
            transition: var(--transition);
        }

        .btn-cart:hover {
            background-color: var(--primary-green);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(45, 106, 79, 0.3);
        }

        /* ========================================
           TOAST NOTIFICATION
           ======================================== */
        .toast-container {
            position: fixed;
            top: 100px;
            right: 20px;
            z-index: 9999;
        }

        .custom-toast {
            background: var(--white);
            border-left: 4px solid var(--secondary-green);
            box-shadow: var(--shadow-lg);
            border-radius: 12px;
            padding: 1.25rem 1.5rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            min-width: 320px;
            transform: translateX(400px);
            opacity: 0;
            transition: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        }

        .custom-toast.show {
            transform: translateX(0);
            opacity: 1;
        }

        .toast-icon {
            font-size: 2rem;
            color: var(--secondary-green);
        }

        .toast-content {
            flex: 1;
        }

        .toast-title {
            font-weight: 700;
            color: var(--dark-green);
            margin-bottom: 0.25rem;
        }

        .toast-message {
            color: #666;
            font-size: 0.9rem;
        }

        .toast-close {
            background: none;
            border: none;
            color: #999;
            font-size: 1.5rem;
            cursor: pointer;
            padding: 0;
            line-height: 1;
            transition: var(--transition);
        }

        .toast-close:hover {
            color: var(--dark-green);
        }

        /* ========================================
           NO RESULTS
           ======================================== */
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
            font-size: 2rem;
            color: var(--dark-green);
            margin-bottom: 0.75rem;
        }

        .no-results p {
            color: #666;
            font-size: 1.1rem;
        }

        /* ========================================
           FOOTER
           ======================================== */
        .footer {
            background-color: var(--dark-green);
            color: var(--white);
            padding: 3rem 0 2rem;
        }

        .footer-content {
            text-align: center;
        }

        .footer h5 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            font-weight: 700;
        }

        .social-icons {
            display: flex;
            justify-content: center;
            gap: 1.5rem;
            margin: 1.5rem 0;
        }

        .social-icons a {
            color: var(--white);
            font-size: 1.75rem;
            transition: var(--transition);
        }

        .social-icons a:hover {
            color: var(--light-green);
            transform: translateY(-4px);
        }

        .footer-bottom {
            text-align: center;
            padding-top: 2rem;
            border-top: 1px solid rgba(255,255,255,0.1);
            margin-top: 2rem;
            color: rgba(255,255,255,0.7);
        }

        /* ========================================
           RESPONSIVE DESIGN
           ======================================== */
        @media (max-width: 991px) {
            .hero-section h1 {
                font-size: 3rem;
            }

            .hero-section p {
                font-size: 1.2rem;
            }

            .section-title {
                font-size: 2.5rem;
            }
        }

        @media (max-width: 768px) {
            section {
                padding: 60px 0;
            }

            .hero-section {
                height: 70vh;
                min-height: 500px;
            }

            .hero-section h1 {
                font-size: 2.5rem;
            }

            .hero-section p {
                font-size: 1.1rem;
            }

            .btn-hero {
                padding: 14px 36px;
                font-size: 1rem;
            }

            .section-title {
                font-size: 2rem;
            }

            .category-card {
                margin-bottom: 1.5rem;
            }

            .product-card {
                margin-bottom: 1.5rem;
            }

            .custom-toast {
                min-width: 280px;
            }
        }

        /* ========================================
           SMOOTH ANIMATIONS
           ======================================== */
        .fade-in {
            animation: fadeIn 0.6s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Product card stagger animation */
        .product-card:nth-child(1) { animation-delay: 0.1s; }
        .product-card:nth-child(2) { animation-delay: 0.2s; }
        .product-card:nth-child(3) { animation-delay: 0.3s; }
        .product-card:nth-child(4) { animation-delay: 0.4s; }
        .product-card:nth-child(5) { animation-delay: 0.5s; }
        .product-card:nth-child(6) { animation-delay: 0.6s; }
        .product-card:nth-child(7) { animation-delay: 0.7s; }
        .product-card:nth-child(8) { animation-delay: 0.8s; }
    </style>
</head>
<body>

    <!-- ========================================
         NAVBAR
         ======================================== -->
    <nav class="navbar navbar-expand-lg navbar-light sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#home">
                <i class="bi bi-flower1"></i>
                GardenApp
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link active" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#products">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#favorites">Favorites</a>
                    </li>
                    <li class="nav-item cart-badge">
                        <a class="nav-link" href="#cart">
                            <i class="bi bi-cart3"></i> Cart
                            <span class="badge" id="cartCount">0</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#login">Login / Register</a>
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
            <p>Discover plants, seeds, and gardening tools بسهولة</p>
            <button class="btn btn-hero" onclick="scrollToProducts()">
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
                        placeholder="Search for plants, seeds, tools..."
                        autocomplete="off"
                    >
                    <i class="bi bi-search"></i>
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
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="category-card" onclick="filterByCategory('plants')">
                        <div class="category-icon">🌱</div>
                        <h3>Plants</h3>
                        <p>Beautiful indoor and outdoor plants</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="category-card" onclick="filterByCategory('seeds')">
                        <div class="category-icon">🌾</div>
                        <h3>Seeds</h3>
                        <p>Premium quality organic seeds</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="category-card" onclick="filterByCategory('tools')">
                        <div class="category-icon">🛠</div>
                        <h3>Tools</h3>
                        <p>Professional gardening equipment</p>
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
                
                <!-- Product 1 -->
                <div class="col-lg-3 col-md-6 mb-4 product-item fade-in" data-name="Rose Plant Premium" data-category="plants">
                    <div class="product-card">
                        <div class="product-image">
                            <i class="bi bi-flower1"></i>
                            <span class="product-badge">New</span>
                        </div>
                        <div class="product-content">
                            <h4>Rose Plant Premium</h4>
                            <p>Beautiful red roses perfect for your garden</p>
                            <div class="product-price">$29.99</div>
                            <div class="product-buttons">
                                <button class="btn-view" onclick="viewDetails('Rose Plant Premium')">
                                    View Details
                                </button>
                                <button class="btn-cart" onclick="addToCart('Rose Plant Premium', 29.99)">
                                    <i class="bi bi-cart-plus"></i> Add
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product 2 -->
                <div class="col-lg-3 col-md-6 mb-4 product-item fade-in" data-name="Organic Tomato Seeds" data-category="seeds">
                    <div class="product-card">
                        <div class="product-image">
                            <i class="bi bi-droplet-fill"></i>
                            <span class="product-badge">Best Seller</span>
                        </div>
                        <div class="product-content">
                            <h4>Organic Tomato Seeds</h4>
                            <p>Premium quality organic tomato seeds</p>
                            <div class="product-price">$12.99</div>
                            <div class="product-buttons">
                                <button class="btn-view" onclick="viewDetails('Organic Tomato Seeds')">
                                    View Details
                                </button>
                                <button class="btn-cart" onclick="addToCart('Organic Tomato Seeds', 12.99)">
                                    <i class="bi bi-cart-plus"></i> Add
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product 3 -->
                <div class="col-lg-3 col-md-6 mb-4 product-item fade-in" data-name="Garden Pruning Shears" data-category="tools">
                    <div class="product-card">
                        <div class="product-image">
                            <i class="bi bi-scissors"></i>
                        </div>
                        <div class="product-content">
                            <h4>Garden Pruning Shears</h4>
                            <p>Professional-grade pruning shears</p>
                            <div class="product-price">$45.99</div>
                            <div class="product-buttons">
                                <button class="btn-view" onclick="viewDetails('Garden Pruning Shears')">
                                    View Details
                                </button>
                                <button class="btn-cart" onclick="addToCart('Garden Pruning Shears', 45.99)">
                                    <i class="bi bi-cart-plus"></i> Add
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product 4 -->
                <div class="col-lg-3 col-md-6 mb-4 product-item fade-in" data-name="Lavender Plant" data-category="plants">
                    <div class="product-card">
                        <div class="product-image">
                            <i class="bi bi-flower3"></i>
                        </div>
                        <div class="product-content">
                            <h4>Lavender Plant</h4>
                            <p>Fragrant lavender for your garden</p>
                            <div class="product-price">$24.99</div>
                            <div class="product-buttons">
                                <button class="btn-view" onclick="viewDetails('Lavender Plant')">
                                    View Details
                                </button>
                                <button class="btn-cart" onclick="addToCart('Lavender Plant', 24.99)">
                                    <i class="bi bi-cart-plus"></i> Add
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product 5 -->
                <div class="col-lg-3 col-md-6 mb-4 product-item fade-in" data-name="Sunflower Seeds Pack" data-category="seeds">
                    <div class="product-card">
                        <div class="product-image">
                            <i class="bi bi-sun-fill"></i>
                            <span class="product-badge">Popular</span>
                        </div>
                        <div class="product-content">
                            <h4>Sunflower Seeds Pack</h4>
                            <p>Grow stunning sunflowers up to 6 feet tall</p>
                            <div class="product-price">$9.99</div>
                            <div class="product-buttons">
                                <button class="btn-view" onclick="viewDetails('Sunflower Seeds Pack')">
                                    View Details
                                </button>
                                <button class="btn-cart" onclick="addToCart('Sunflower Seeds Pack', 9.99)">
                                    <i class="bi bi-cart-plus"></i> Add
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product 6 -->
                <div class="col-lg-3 col-md-6 mb-4 product-item fade-in" data-name="Watering Can Deluxe" data-category="tools">
                    <div class="product-card">
                        <div class="product-image">
                            <i class="bi bi-moisture"></i>
                        </div>
                        <div class="product-content">
                            <h4>Watering Can Deluxe</h4>
                            <p>Large capacity with comfortable handle</p>
                            <div class="product-price">$34.99</div>
                            <div class="product-buttons">
                                <button class="btn-view" onclick="viewDetails('Watering Can Deluxe')">
                                    View Details
                                </button>
                                <button class="btn-cart" onclick="addToCart('Watering Can Deluxe', 34.99)">
                                    <i class="bi bi-cart-plus"></i> Add
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product 7 -->
                <div class="col-lg-3 col-md-6 mb-4 product-item fade-in" data-name="Succulent Collection" data-category="plants">
                    <div class="product-card">
                        <div class="product-image">
                            <i class="bi bi-brightness-high"></i>
                        </div>
                        <div class="product-content">
                            <h4>Succulent Collection</h4>
                            <p>Assorted succulents for indoor decoration</p>
                            <div class="product-price">$19.99</div>
                            <div class="product-buttons">
                                <button class="btn-view" onclick="viewDetails('Succulent Collection')">
                                    View Details
                                </button>
                                <button class="btn-cart" onclick="addToCart('Succulent Collection', 19.99)">
                                    <i class="bi bi-cart-plus"></i> Add
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product 8 -->
                <div class="col-lg-3 col-md-6 mb-4 product-item fade-in" data-name="Gardening Gloves Pro" data-category="tools">
                    <div class="product-card">
                        <div class="product-image">
                            <i class="bi bi-hand-thumbs-up"></i>
                        </div>
                        <div class="product-content">
                            <h4>Gardening Gloves Pro</h4>
                            <p>Durable and comfortable gardening gloves</p>
                            <div class="product-price">$16.99</div>
                            <div class="product-buttons">
                                <button class="btn-view" onclick="viewDetails('Gardening Gloves Pro')">
                                    View Details
                                </button>
                                <button class="btn-cart" onclick="addToCart('Gardening Gloves Pro', 16.99)">
                                    <i class="bi bi-cart-plus"></i> Add
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- No Results Message -->
            <div id="noResults" class="no-results">
                <i class="bi bi-search"></i>
                <h3>No products found</h3>
                <p>Try searching with different keywords</p>
            </div>
        </div>
    </section>

    <!-- ========================================
         FOOTER
         ======================================== -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <h5><i class="bi bi-flower1"></i> GardenApp</h5>
                <p>Your trusted partner in gardening</p>
                <div class="social-icons">
                    <a href="#" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                    <a href="#" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
                    <a href="#" aria-label="Twitter"><i class="bi bi-twitter"></i></a>
                    <a href="#" aria-label="YouTube"><i class="bi bi-youtube"></i></a>
                </div>
            </div>
            <div class="footer-bottom">
                <p>© 2026 GardenApp - All rights reserved</p>
            </div>
        </div>
    </footer>

    <!-- Toast Notification Container -->
    <div class="toast-container" id="toastContainer"></div>


</body>
    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom JavaScript -->
    <script>
        // ========================================
        // GLOBAL VARIABLES
        // ========================================
        let cartCount = 0;
        const cartItems = [];

        // ========================================
        // SMOOTH SCROLL TO PRODUCTS
        // ========================================
        function scrollToProducts() {
            document.getElementById('products').scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }

        // ========================================
        // SEARCH FUNCTIONALITY
        // ========================================
        const searchInput = document.getElementById('searchInput');
        const productItems = document.querySelectorAll('.product-item');
        const noResults = document.getElementById('noResults');

        searchInput.addEventListener('keyup', function(e) {
            const searchTerm = e.target.value.toLowerCase().trim();
            console.log('Searching for:', searchTerm);
            
            let visibleCount = 0;

            productItems.forEach(function(item) {
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
        // FILTER BY CATEGORY
        // ========================================
        function filterByCategory(category) {
            console.log('Filtering by category:', category);
            
            let visibleCount = 0;

            productItems.forEach(function(item) {
                const productCategory = item.getAttribute('data-category');
                
                if (productCategory === category) {
                    item.style.display = 'block';
                    visibleCount++;
                } else {
                    item.style.display = 'none';
                }
            });

            // Scroll to products
            scrollToProducts();

            // Update search input
            searchInput.value = '';
        }

        // ========================================
        // ADD TO CART
        // ========================================
        function addToCart(productName, price) {
            // Increment cart count
            cartCount++;
            document.getElementById('cartCount').textContent = cartCount;

            // Add to cart array
            cartItems.push({
                name: productName,
                price: price,
                timestamp: new Date()
            });

            // Show toast notification
            showToast('Success!', `${productName} added to cart`);

            // Animate cart badge
            const badge = document.getElementById('cartCount');
            badge.style.transform = 'scale(1.3)';
            setTimeout(() => {
                badge.style.transform = 'scale(1)';
            }, 200);

            // Log to console
            console.log('Cart items:', cartItems);
            console.log('Total items:', cartCount);
        }

        // ========================================
        // VIEW DETAILS
        // ========================================
        function viewDetails(productName) {
            console.log('Viewing details for:', productName);
            alert(`Product Details\n\nProduct: ${productName}\n\nThis would normally open a detailed product page.`);
        }

        // ========================================
        // TOAST NOTIFICATION SYSTEM
        // ========================================
        function showToast(title, message) {
            const toastContainer = document.getElementById('toastContainer');
            
            // Create toast element
            const toast = document.createElement('div');
            toast.className = 'custom-toast';
            toast.innerHTML = `
                <i class="bi bi-check-circle-fill toast-icon"></i>
                <div class="toast-content">
                    <div class="toast-title">${title}</div>
                    <div class="toast-message">${message}</div>
                </div>
                <button class="toast-close" onclick="this.parentElement.remove()">
                    <i class="bi bi-x"></i>
                </button>
            `;
            
            toastContainer.appendChild(toast);
            
            // Show toast with animation
            setTimeout(() => {
                toast.classList.add('show');
            }, 100);
            
            // Auto remove after 3 seconds
            setTimeout(() => {
                toast.classList.remove('show');
                setTimeout(() => {
                    toast.remove();
                }, 400);
            }, 3000);
        }

        // ========================================
        // NAVBAR SCROLL EFFECT
        // ========================================
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

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
                
                if (window.pageYOffset >= (sectionTop - 150)) {
                    current = section.getAttribute('id');
                }
            });
            
            navLinks.forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('href') === `#${current}`) {
                    link.classList.add('active');
                }
            });
        });

        // ========================================
        // RESET ALL FILTERS
        // ========================================
        function resetFilters() {
            productItems.forEach(item => {
                item.style.display = 'block';
            });
            searchInput.value = '';
            noResults.style.display = 'none';
        }

        // ========================================
        // KEYBOARD SHORTCUTS
        // ========================================
        document.addEventListener('keydown', function(e) {
            // Ctrl/Cmd + K to focus search
            if ((e.ctrlKey || e.metaKey) && e.key === 'k') {
                e.preventDefault();
                searchInput.focus();
            }
            
            // Escape to clear search
            if (e.key === 'Escape') {
                searchInput.value = '';
                resetFilters();
            }
        });

        // ========================================
        // PAGE LOAD
        // ========================================
        console.log('🌿 GardenApp loaded successfully!');
        console.log('Features enabled:');
        console.log('- Search filtering');
        console.log('- Cart management');
        console.log('- Category filtering');
        console.log('- Smooth scrolling');
        console.log('- Toast notifications');
    </script>
</html>