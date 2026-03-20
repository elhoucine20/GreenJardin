@extends('layout.client')
@section('title')
    <title>Products - GardenApp</title>
@endsection    

@section('style')
<link rel="stylesheet" href="{{asset('css/client/produits.css')}}">
@endsection
    <!-- ========================================
         PAGE HEADER
         ======================================== -->
@section('page-header',true) 
@section('icon', 'box-seam') 
@section('title-h1', 'All Products') 
@section('description-p', 'Browse our collection of plants, seeds, and gardening tools') 

@section('sections')    
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
@endsection