<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products - GardenApp</title>
    
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
            background-color: var(--gray-light);
            overflow-x: hidden;
        }

        html {
            scroll-behavior: smooth;
        }

        /* ========================================
           NAVBAR (Same as Home Page)
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

        .page-header p {
            font-size: 1.3rem;
            opacity: 0.95;
            max-width: 700px;
            margin: 0 auto;
        }

        /* ========================================
           SEARCH & FILTER SECTION
           ======================================== */
        .search-filter-section {
            padding: 2rem 0 3rem;
            background-color: var(--white);
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            margin-bottom: 3rem;
            border-radius: 20px;
        }

        .search-wrapper {
            position: relative;
            max-width: 600px;
            margin: 0 auto 2rem;
        }

        .search-input {
            width: 100%;
            padding: 16px 60px 16px 24px;
            border: 3px solid var(--light-green);
            border-radius: 50px;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            background-color: var(--white);
        }

        .search-input:focus {
            outline: none;
            border-color: var(--secondary-green);
            box-shadow: 0 0 0 5px rgba(82, 183, 136, 0.1);
        }

        .search-icon {
            position: absolute;
            right: 24px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 1.5rem;
            color: var(--primary-green);
            pointer-events: none;
        }

        /* Category Filter Buttons */
        .category-filters {
            display: flex;
            justify-content: center;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .category-btn {
            padding: 12px 28px;
            background-color: var(--white);
            color: var(--primary-green);
            border: 2px solid var(--primary-green);
            border-radius: 25px;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .category-btn::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) scale(0);
            width: 100%;
            height: 100%;
            background-color: var(--primary-green);
            border-radius: 25px;
            transition: transform 0.3s ease;
            z-index: -1;
        }

        .category-btn:hover::before,
        .category-btn.active::before {
            transform: translate(-50%, -50%) scale(1);
        }

        .category-btn:hover,
        .category-btn.active {
            color: var(--white);
            box-shadow: 0 5px 15px rgba(45, 106, 79, 0.3);
            transform: translateY(-2px);
        }

        .category-btn i {
            margin-right: 0.5rem;
        }

        /* ========================================
           PRODUCTS SECTION
           ======================================== */
        .products-section {
            padding: 0 0 4rem;
        }

        .products-count {
            text-align: center;
            margin-bottom: 2.5rem;
            font-size: 1.2rem;
            color: var(--gray-dark);
        }

        .products-count strong {
            color: var(--primary-green);
            font-size: 1.4rem;
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
            padding: 5rem 0;
            display: none;
        }

        .no-results i {
            font-size: 6rem;
            color: var(--light-green);
            margin-bottom: 1.5rem;
        }

        .no-results h3 {
            color: var(--dark-green);
            font-size: 2rem;
            margin-bottom: 1rem;
        }

        .no-results p {
            color: var(--gray-dark);
            font-size: 1.2rem;
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

            .page-header p {
                font-size: 1.1rem;
            }

            .category-filters {
                gap: 0.5rem;
            }

            .category-btn {
                padding: 10px 20px;
                font-size: 0.9rem;
            }

            .product-buttons {
                flex-direction: column;
            }
        }

        @media (max-width: 576px) {
            .navbar-brand {
                font-size: 1.4rem;
            }

            .page-header h1 {
                font-size: 2rem;
            }

            .category-btn {
                padding: 8px 16px;
                font-size: 0.85rem;
            }
        }

        /* Animation for products */
        .product-card {
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
        .product-card:nth-child(1) { animation-delay: 0.05s; }
        .product-card:nth-child(2) { animation-delay: 0.1s; }
        .product-card:nth-child(3) { animation-delay: 0.15s; }
        .product-card:nth-child(4) { animation-delay: 0.2s; }
        .product-card:nth-child(5) { animation-delay: 0.25s; }
        .product-card:nth-child(6) { animation-delay: 0.3s; }
        .product-card:nth-child(7) { animation-delay: 0.35s; }
        .product-card:nth-child(8) { animation-delay: 0.4s; }
        .product-card:nth-child(9) { animation-delay: 0.45s; }
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
                        <a class="nav-link active" href="products.html">
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
         PAGE HEADER
         ======================================== -->
    <section class="page-header">
        <div class="container">
            <h1>All Products</h1>
            <p>Browse our collection of plants, seeds, and gardening tools</p>
        </div>
    </section>

    <!-- ========================================
         SEARCH & FILTER SECTION
         ======================================== -->
    <div class="container">
        <div class="search-filter-section">
            <!-- Search Bar -->
            <div class="search-wrapper">
                <input 
                    type="text" 
                    id="searchInput" 
                    class="search-input" 
                    placeholder="Search for products..."
                >
                <i class="bi bi-search search-icon"></i>
            </div>

            <!-- Category Filter Buttons -->
            <div class="category-filters">
                <button class="category-btn active" onclick="filterByCategory('all')">
                    <i class="bi bi-grid-3x3-gap"></i> All Products
                </button>
                <button class="category-btn" onclick="filterByCategory('plant')">
                    <i class="bi bi-flower2"></i> Plants
                </button>
                <button class="category-btn" onclick="filterByCategory('seed')">
                    <i class="bi bi-circle-fill"></i> Seeds
                </button>
                <button class="category-btn" onclick="filterByCategory('tool')">
                    <i class="bi bi-tools"></i> Tools
                </button>
            </div>
        </div>
    </div>

    <!-- ========================================
         PRODUCTS SECTION
         ======================================== -->
    <section class="products-section">
        <div class="container">
            <div class="products-count">
                Showing <strong id="productCount">9</strong> products
            </div>

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

                <!-- Product 7: Succulent Collection -->
                <div class="col-lg-4 col-md-6 product-item" data-name="Succulent Collection" data-category="plant">
                    <div class="product-card">
                        <div class="product-image-wrapper">
                            <img src="https://images.unsplash.com/photo-1459411621453-7b03977f4bfc?w=600&h=400&fit=crop" 
                                 alt="Succulent Collection" 
                                 class="product-image">
                            <span class="product-badge">New</span>
                        </div>
                        <div class="product-body">
                            <h4>Succulent Collection</h4>
                            <p>Assorted succulent plants in decorative pots. Perfect for indoor decoration.</p>
                            <div class="product-buttons">
                                <button class="btn btn-view" onclick="viewDetails('Succulent Collection')">
                                    <i class="bi bi-eye"></i> View Details
                                </button>
                                <button class="btn btn-cart" onclick="addToCart('Succulent Collection')">
                                    <i class="bi bi-cart-plus"></i> Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product 8: Carrot Seeds -->
                <div class="col-lg-4 col-md-6 product-item" data-name="Carrot Seeds" data-category="seed">
                    <div class="product-card">
                        <div class="product-image-wrapper">
                            <img src="https://images.unsplash.com/photo-1598170845058-32b9d6a5da37?w=600&h=400&fit=crop" 
                                 alt="Carrot Seeds" 
                                 class="product-image">
                            <span class="product-badge">Organic</span>
                        </div>
                        <div class="product-body">
                            <h4>Carrot Seeds</h4>
                            <p>Premium organic carrot seeds. Grow sweet and crunchy carrots in your garden.</p>
                            <div class="product-buttons">
                                <button class="btn btn-view" onclick="viewDetails('Carrot Seeds')">
                                    <i class="bi bi-eye"></i> View Details
                                </button>
                                <button class="btn btn-cart" onclick="addToCart('Carrot Seeds')">
                                    <i class="bi bi-cart-plus"></i> Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product 9: Garden Gloves -->
                <div class="col-lg-4 col-md-6 product-item" data-name="Garden Gloves" data-category="tool">
                    <div class="product-card">
                        <div class="product-image-wrapper">
                            <img src="https://images.unsplash.com/photo-1617953141905-b27fb1f17d88?w=600&h=400&fit=crop" 
                                 alt="Garden Gloves" 
                                 class="product-image">
                            <span class="product-badge">Best Value</span>
                        </div>
                        <div class="product-body">
                            <h4>Garden Gloves</h4>
                            <p>Comfortable and durable gardening gloves. Protect your hands while working.</p>
                            <div class="product-buttons">
                                <button class="btn btn-view" onclick="viewDetails('Garden Gloves')">
                                    <i class="bi bi-eye"></i> View Details
                                </button>
                                <button class="btn btn-cart" onclick="addToCart('Garden Gloves')">
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
                <p>Try adjusting your search or filter criteria</p>
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
            
            // Visual feedback on button
            const btn = event.target.closest('.btn-cart');
            const originalText = btn.innerHTML;
            btn.innerHTML = '<i class="bi bi-check2"></i> Added!';
            btn.style.background = 'linear-gradient(135deg, #28a745, #20c997)';
            
            setTimeout(() => {
                btn.innerHTML = originalText;
                btn.style.background = '';
            }, 1500);
            
            // Alert message
            alert(`Product added to cart: ${productName}`);
            
            console.log(`Added to cart: ${productName}`);
            console.log(`Current cart count: ${cartCount}`);
        }

        function updateCartBadge() {
            const badge = document.getElementById('cartCount');
            badge.textContent = cartCount;
            badge.style.transform = 'scale(1.3)';
            badge.style.transition = 'transform 0.3s ease';
            setTimeout(() => {
                badge.style.transform = 'scale(1)';
            }, 300);
        }

        // ========================================
        // VIEW DETAILS
        // ========================================
        function viewDetails(productName) {
            alert(`Product Details\n\n${productName}\n\nThis would normally navigate to the product details page with full information, pricing, reviews, and specifications.`);
            console.log(`View details clicked for: ${productName}`);
        }

        // ========================================
        // SEARCH FUNCTIONALITY
        // ========================================
        const searchInput = document.getElementById('searchInput');
        const productItems = document.querySelectorAll('.product-item');
        const noResults = document.getElementById('noResults');
        const productCountElement = document.getElementById('productCount');

        searchInput.addEventListener('keyup', function(e) {
            const searchTerm = e.target.value.toLowerCase().trim();
            
            console.log('Search term:', searchTerm);
            
            filterProducts(searchTerm, currentCategory);
        });

        // ========================================
        // CATEGORY FILTER
        // ========================================
        let currentCategory = 'all';

        function filterByCategory(category) {
            currentCategory = category;
            const searchTerm = searchInput.value.toLowerCase().trim();
            
            // Update active button
            const categoryButtons = document.querySelectorAll('.category-btn');
            categoryButtons.forEach(btn => btn.classList.remove('active'));
            event.target.classList.add('active');
            
            console.log('Category filter:', category);
            
            filterProducts(searchTerm, category);
        }

        // ========================================
        // COMBINED FILTER FUNCTION
        // ========================================
        function filterProducts(searchTerm = '', category = 'all') {
            let visibleCount = 0;

            productItems.forEach(item => {
                const productName = item.getAttribute('data-name').toLowerCase();
                const productCategory = item.getAttribute('data-category');
                
                const matchesSearch = searchTerm === '' || productName.includes(searchTerm);
                const matchesCategory = category === 'all' || productCategory === category;
                
                if (matchesSearch && matchesCategory) {
                    item.style.display = 'block';
                    visibleCount++;
                } else {
                    item.style.display = 'none';
                }
            });

            // Update product count
            productCountElement.textContent = visibleCount;

            // Show/hide no results message
            if (visibleCount === 0) {
                noResults.style.display = 'block';
            } else {
                noResults.style.display = 'none';
            }
        }

        // ========================================
        // CONSOLE LOG ON PAGE LOAD
        // ========================================
        console.log('🌿 GardenApp Products Page loaded successfully!');
        console.log('Features: Search filtering, Category filtering, Cart system');
        console.log('Total products:', productItems.length);
    </script>

</body>
</html>