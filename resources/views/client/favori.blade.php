@extends('layout.client')
@section('title')
    <title>My Favorites - GardenApp</title>
@endsection    

@section('style')
<link rel="stylesheet" href="{{asset('css/client/favorites.css')}}">
@endsection
    <!-- ========================================
         PAGE HEADER
         ======================================== -->
@section('page-header',true) 
@section('icon', 'heart-fill') 
@section('title-h1', 'My Favorites') 
@section('description-p', 'All your favorite plants, seeds, and tools in one place') 

    <!-- ========================================
         FAVORITES SECTION
         ======================================== -->
@section('sections')         
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
@endsection

@section('script')
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
@endsection