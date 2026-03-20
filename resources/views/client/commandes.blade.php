@extends('layout.client')
@section('title')
    <title>My Orders - GardenApp</title>
@endsection    

@section('style')
<link rel="stylesheet" href="{{asset('css/client/commandes.css')}}">
@endsection
    <!-- ========================================
         PAGE HEADER
         ======================================== -->
@section('page-header',true) 
@section('icon', 'bag-check') 
@section('title-h1', 'My Orders') 
@section('description-p', 'Track and manage your orders') 


    <!-- ========================================
         ORDERS SECTION
         ======================================== -->
@section('sections')
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
@endsection

    <!-- Custom JavaScript -->
@section('script')     
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
@endsection