<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details - GardenApp</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.min.css">

    <!-- <link rel="stylesheet" href="{{asset('css/admin_dashbord.css')}}"> -->


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
           NAVBAR
           ======================================== */
        .navbar {
            background-color: var(--primary-green);
            padding: 1rem 0;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
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
           BREADCRUMB
           ======================================== */
        .breadcrumb-section {
            background: var(--white);
            padding: 1.5rem 0;
            border-bottom: 1px solid var(--gray-light);
        }

        .breadcrumb {
            margin: 0;
            background: transparent;
        }

        .breadcrumb-item a {
            color: var(--primary-green);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .breadcrumb-item a:hover {
            color: var(--secondary-green);
        }

        .breadcrumb-item.active {
            color: var(--gray-dark);
        }

        /* ========================================
           PRODUCT DETAILS SECTION
           ======================================== */
        .product-details-section {
            padding: 3rem 0;
        }

        .product-image-container {
            background: var(--white);
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            position: sticky;
            top: 100px;
        }

        .product-main-image {
            width: 100%;
            height: 500px;
            border-radius: 15px;
            overflow: hidden;
            background: linear-gradient(135deg, var(--pale-green), var(--light-green));
        }

        .product-main-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .product-main-image:hover img {
            transform: scale(1.1);
        }

        .product-info-container {
            background: var(--white);
            border-radius: 20px;
            padding: 2.5rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        }

        .product-badge {
            display: inline-block;
            background: linear-gradient(135deg, var(--secondary-green), var(--primary-green));
            color: var(--white);
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 700;
            text-transform: uppercase;
            margin-bottom: 1rem;
        }

        .product-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--dark-green);
            margin-bottom: 1rem;
        }

        .product-rating {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 1.5rem;
        }

        .stars {
            color: #ffc107;
            font-size: 1.2rem;
        }

        .rating-count {
            color: var(--gray-dark);
            font-size: 0.95rem;
        }

        .product-price {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary-green);
            margin-bottom: 1.5rem;
        }

        .product-meta {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            margin-bottom: 2rem;
            padding: 1.5rem;
            background: var(--gray-light);
            border-radius: 12px;
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .meta-item i {
            font-size: 1.3rem;
            color: var(--primary-green);
        }

        .meta-label {
            font-weight: 600;
            color: var(--dark-green);
            min-width: 80px;
        }

        .meta-value {
            color: var(--gray-dark);
        }

        .stock-badge {
            background: linear-gradient(135deg, #28a745, #20c997);
            color: var(--white);
            padding: 0.4rem 1rem;
            border-radius: 20px;
            font-weight: 700;
            font-size: 0.9rem;
        }

        .product-description-short {
            font-size: 1.1rem;
            color: var(--gray-dark);
            line-height: 1.8;
            margin-bottom: 2rem;
        }

        /* Quantity Selector */
        .quantity-selector {
            margin-bottom: 2rem;
        }

        .quantity-label {
            font-weight: 600;
            color: var(--dark-green);
            margin-bottom: 0.75rem;
            font-size: 1.1rem;
        }

        .quantity-controls {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .quantity-btn {
            width: 50px;
            height: 50px;
            background: var(--primary-green);
            color: var(--white);
            border: none;
            border-radius: 12px;
            font-size: 1.5rem;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .quantity-btn:hover {
            background: var(--dark-green);
            transform: scale(1.1);
        }

        .quantity-input {
            width: 100px;
            height: 50px;
            text-align: center;
            font-size: 1.3rem;
            font-weight: 700;
            border: 3px solid var(--light-green);
            border-radius: 12px;
            color: var(--dark-green);
        }

        /* Action Buttons */
        .action-buttons {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .btn-add-cart {
            background: linear-gradient(135deg, var(--secondary-green), var(--primary-green));
            color: var(--white);
            border: none;
            padding: 1rem 2rem;
            border-radius: 15px;
            font-size: 1.2rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.4s ease;
            box-shadow: 0 6px 20px rgba(45, 106, 79, 0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
        }

        .btn-add-cart:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(45, 106, 79, 0.4);
        }

        .btn-secondary-action {
            background: transparent;
            color: var(--primary-green);
            border: 3px solid var(--primary-green);
            padding: 1rem 2rem;
            border-radius: 15px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
        }

        .btn-secondary-action:hover {
            background: var(--primary-green);
            color: var(--white);
            transform: translateY(-3px);
        }

        .btn-buy-now {
            background: linear-gradient(135deg, #ffc107, #ff9800);
            color: var(--dark-green);
            border: none;
            padding: 1rem 2rem;
            border-radius: 15px;
            font-size: 1.1rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
        }

        .btn-buy-now:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(255, 152, 0, 0.4);
        }

        /* ========================================
           DESCRIPTION SECTION
           ======================================== */
        .description-section {
            background: var(--white);
            border-radius: 20px;
            padding: 2.5rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            margin-top: 3rem;
        }

        .section-title {
            font-size: 2rem;
            font-weight: 700;
            color: var(--dark-green);
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .description-content {
            font-size: 1.1rem;
            line-height: 1.8;
            color: var(--gray-dark);
        }

        /* ========================================
           RELATED PRODUCTS
           ======================================== */
        .related-products-section {
            padding: 4rem 0 2rem;
        }

        .product-card {
            background: var(--white);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            transition: all 0.4s ease;
            margin-bottom: 2rem;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 35px rgba(45, 106, 79, 0.18);
        }

        .product-card-image {
            height: 250px;
            overflow: hidden;
            background: linear-gradient(135deg, var(--pale-green), var(--light-green));
        }

        .product-card-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .product-card:hover .product-card-image img {
            transform: scale(1.15);
        }

        .product-card-body {
            padding: 1.5rem;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .product-card-title {
            font-size: 1.3rem;
            font-weight: 700;
            color: var(--dark-green);
            margin-bottom: 0.75rem;
        }

        .product-card-price {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary-green);
            margin-bottom: 1rem;
        }

        .btn-view-product {
            background: var(--primary-green);
            color: var(--white);
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: auto;
        }

        .btn-view-product:hover {
            background: var(--dark-green);
            transform: translateY(-2px);
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
        @media (max-width: 992px) {
            .product-image-container {
                position: static;
                margin-bottom: 2rem;
            }

            .product-main-image {
                height: 400px;
            }
        }

        @media (max-width: 768px) {
            .product-title {
                font-size: 2rem;
            }

            .product-price {
                font-size: 2rem;
            }

            .action-buttons {
                gap: 0.75rem;
            }

            .product-main-image {
                height: 300px;
            }
        }

        @media (max-width: 576px) {
            .navbar-brand {
                font-size: 1.4rem;
            }

            .product-info-container,
            .description-section {
                padding: 1.5rem;
            }

            .quantity-controls {
                justify-content: center;
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
                        <a class="nav-link active" href="products.html">
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
         BREADCRUMB
         ======================================== -->
    <section class="breadcrumb-section">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="home.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="products.html">Products</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Rose Plant Premium</li>
                </ol>
            </nav>
        </div>
    </section>

    <!-- ========================================
         PRODUCT DETAILS SECTION
         ======================================== -->
    <section class="product-details-section">
        <div class="container">
            <div class="row">
                <!-- Product Image Column -->
                <div class="col-lg-6">
                    <div class="product-image-container">
                        <div class="product-main-image">
                            <img src="https://images.unsplash.com/photo-1518709268805-4e9042af9f23?w=800&h=800&fit=crop"
                                alt="Rose Plant Premium">
                        </div>
                    </div>
                </div>

                <!-- Product Info Column -->
                <div class="col-lg-6">
                    <div class="product-info-container">
                        <span class="product-badge">Best Seller</span>

                        <h1 class="product-title">Rose Plant Premium</h1>

                        <div class="product-rating">
                            <span class="stars">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                            </span>
                            <span class="rating-count">(342 reviews)</span>
                        </div>

                        <div class="product-price">$12.90</div>

                        <p class="product-description-short">
                            Beautiful red roses perfect for your garden. Hardy and fragrant blooms all season long.
                            Perfect for beginners and experienced gardeners alike.
                        </p>

                        <div class="product-meta">
                            <div class="meta-item">
                                <i class="bi bi-tag"></i>
                                <span class="meta-label">Category:</span>
                                <span class="meta-value">Plants & Flowers</span>
                            </div>
                            <div class="meta-item">
                                <i class="bi bi-box-seam"></i>
                                <span class="meta-label">Stock:</span>
                                <span class="stock-badge">
                                    <i class="bi bi-check-circle"></i> In Stock
                                </span>
                            </div>
                            <div class="meta-item">
                                <i class="bi bi-truck"></i>
                                <span class="meta-label">Shipping:</span>
                                <span class="meta-value">Free delivery on orders over $50</span>
                            </div>
                        </div>

                        <!-- Quantity Selector -->
                        <div class="quantity-selector">
                            <div class="quantity-label">Quantity:</div>
                            <div class="quantity-controls">
                                <button class="quantity-btn" onclick="decreaseQuantity()">
                                    <i class="bi bi-dash"></i>
                                </button>
                                <input type="number" class="quantity-input" id="quantityInput" value="1" min="1" max="99" readonly>
                                <button class="quantity-btn" onclick="increaseQuantity()">
                                    <i class="bi bi-plus"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="action-buttons">
                            <button class="btn-add-cart" onclick="addToCart()">
                                <i class="bi bi-cart-plus"></i>
                                Add to Cart
                            </button>

                            <button class="btn-secondary-action" onclick="addToFavorites()">
                                <i class="bi bi-heart"></i>
                                Add to Favorites
                            </button>

                            <button class="btn-buy-now" onclick="buyNow()">
                                <i class="bi bi-lightning-fill"></i>
                                Buy Now
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Description Section -->
            <div class="row mt-5">
                <div class="col-12">
                    <div class="description-section">
                        <h2 class="section-title">
                            <i class="bi bi-file-text"></i>
                            Product Description
                        </h2>
                        <div class="description-content">
                            <p>
                                Our Premium Rose Plant is a stunning addition to any garden. This exceptional variety features
                                vibrant red blooms that are both beautiful and fragrant. Each plant is carefully selected and grown
                                to ensure the highest quality and health.
                            </p>
                            <p>
                                <strong>Key Features:</strong>
                            </p>
                            <ul>
                                <li>Hardy and disease-resistant variety</li>
                                <li>Blooms continuously from spring through fall</li>
                                <li>Strong, pleasant fragrance</li>
                                <li>Low maintenance requirements</li>
                                <li>Suitable for zones 5-9</li>
                                <li>Mature height: 3-4 feet</li>
                                <li>Full sun to partial shade</li>
                            </ul>
                            <p>
                                <strong>Care Instructions:</strong><br>
                                Water regularly, especially during dry periods. Fertilize monthly during the growing season with
                                a balanced rose fertilizer. Prune in early spring to maintain shape and encourage new growth.
                                Apply mulch around the base to retain moisture and suppress weeds.
                            </p>
                            <p>
                                Perfect for borders, containers, or as a stunning focal point in your garden. This rose plant
                                will bring years of beauty and enjoyment to your outdoor space.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================
         RELATED PRODUCTS
         ======================================== -->
    <section class="related-products-section">
        <div class="container">
            <h2 class="section-title text-center mb-5">
                <i class="bi bi-grid"></i>
                Related Products
            </h2>

            <div class="row">
                <!-- Related Product 1 -->
                <div class="col-lg-3 col-md-6">
                    <div class="product-card">
                        <div class="product-card-image">
                            <img src="https://images.unsplash.com/photo-1499002238440-d264edd596ec?w=400&h=400&fit=crop"
                                alt="Lavender Plant">
                        </div>
                        <div class="product-card-body">
                            <h3 class="product-card-title">Lavender Plant</h3>
                            <div class="product-card-price">$17.90</div>
                            <button class="btn-view-product" onclick="viewProduct('lavender')">
                                View Product
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Related Product 2 -->
                <div class="col-lg-3 col-md-6">
                    <div class="product-card">
                        <div class="product-card-image">
                            <img src="https://images.unsplash.com/photo-1597848212624-e530501dfcda?w=400&h=400&fit=crop"
                                alt="Sunflower Seeds">
                        </div>
                        <div class="product-card-body">
                            <h3 class="product-card-title">Sunflower Seeds</h3>
                            <div class="product-card-price">$8.50</div>
                            <button class="btn-view-product" onclick="viewProduct('sunflower')">
                                View Product
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Related Product 3 -->
                <div class="col-lg-3 col-md-6">
                    <div class="product-card">
                        <div class="product-card-image">
                            <img src="https://images.unsplash.com/photo-1459411621453-7b03977f4bfc?w=400&h=400&fit=crop"
                                alt="Succulent Collection">
                        </div>
                        <div class="product-card-body">
                            <h3 class="product-card-title">Succulent Collection</h3>
                            <div class="product-card-price">$24.90</div>
                            <button class="btn-view-product" onclick="viewProduct('succulent')">
                                View Product
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Related Product 4 -->
                <div class="col-lg-3 col-md-6">
                    <div class="product-card">
                        <div class="product-card-image">
                            <img src="https://images.unsplash.com/photo-1592841200221-a6898f307baa?w=400&h=400&fit=crop"
                                alt="Tomato Seeds">
                        </div>
                        <div class="product-card-body">
                            <h3 class="product-card-title">Tomato Seeds</h3>
                            <div class="product-card-price">$6.50</div>
                            <button class="btn-view-product" onclick="viewProduct('tomato')">
                                View Product
                            </button>
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


</body>
    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom JavaScript -->
    <script>
        // ========================================
        // CART COUNT
        // ========================================
        let cartCount = 0;

        // ========================================
        // QUANTITY CONTROLS
        // ========================================
        function increaseQuantity() {
            const input = document.getElementById('quantityInput');
            let currentValue = parseInt(input.value);
            if (currentValue < 99) {
                input.value = currentValue + 1;
                console.log('Quantity increased to:', input.value);
            }
        }

        function decreaseQuantity() {
            const input = document.getElementById('quantityInput');
            let currentValue = parseInt(input.value);
            if (currentValue > 1) {
                input.value = currentValue - 1;
                console.log('Quantity decreased to:', input.value);
            }
        }

        // ========================================
        // ADD TO CART
        // ========================================
        function addToCart() {
            const quantity = document.getElementById('quantityInput').value;
            const productName = 'Rose Plant Premium';
            const price = '$12.90';

            // Update cart count
            cartCount += parseInt(quantity);
            updateCartBadge();

            // Show success message
            alert(`Product added to cart!\n\n${productName}\nQuantity: ${quantity}\nPrice: ${price}`);

            console.log(`Added to cart: ${productName}, Quantity: ${quantity}`);
        }

        // ========================================
        // ADD TO FAVORITES
        // ========================================
        function addToFavorites() {
            const productName = 'Rose Plant Premium';

            alert(`Added to favorites!\n\n${productName} has been added to your favorites list.`);

            console.log(`Added to favorites: ${productName}`);
        }

        // ========================================
        // BUY NOW
        // ========================================
        function buyNow() {
            const quantity = document.getElementById('quantityInput').value;
            const productName = 'Rose Plant Premium';

            alert(`Redirecting to checkout...\n\nProduct: ${productName}\nQuantity: ${quantity}`);

            console.log('Buy now clicked, redirecting to checkout...');

            // Optional: Redirect to checkout page
            // setTimeout(() => {
            //     window.location.href = 'checkout.html';
            // }, 1000);
        }

        // ========================================
        // UPDATE CART BADGE
        // ========================================
        function updateCartBadge() {
            const badge = document.getElementById('cartCount');
            badge.textContent = cartCount;

            // Animation
            badge.style.transform = 'scale(1.3)';
            setTimeout(() => {
                badge.style.transform = 'scale(1)';
            }, 300);
        }

        // ========================================
        // VIEW RELATED PRODUCT
        // ========================================
        function viewProduct(productType) {
            console.log(`Viewing product: ${productType}`);
            alert(`Viewing ${productType} product details...\n\nThis would navigate to the product details page.`);

            // Optional: Navigate to product details
            // window.location.href = `product-details.html?product=${productType}`;
        }

        // ========================================
        // INITIALIZE ON PAGE LOAD
        // ========================================
        document.addEventListener('DOMContentLoaded', function() {
            console.log('🌿 GardenApp Product Details Page loaded successfully!');
            console.log('Product: Rose Plant Premium');
            console.log('Price: $12.90');
        });
    </script>

</html>