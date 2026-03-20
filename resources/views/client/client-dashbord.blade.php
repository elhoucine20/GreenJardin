@extends('layout.client')
@section('title')
    <title>GardenApp - Home</title>
@endsection    

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.min.css">

@section('style')    
    <link rel="stylesheet" href="{{asset('css/client/dashbord.css')}}">
@endsection    

@section('sections')
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
                        placeholder="Search for plants, seeds, tools...">
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

@endsection    

@section('script')
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
@endsection
