@extends('layout.client')
@section('title')
    <title>My Cart - GardenApp</title>
@endsection    

@section('style')
<link rel="stylesheet" href="{{asset('css/client/payier.css')}}">
@endsection
    <!-- ========================================
         PAGE HEADER
         ======================================== -->
@section('page-header',true) 
@section('icon', 'cart-check') 
@section('title-h1', 'My Cart') 
@section('description-p', 'Review the products you added to your cart') 

@section('sections')    
    <!-- ========================================
         CART SECTION
         ======================================== -->
    <section class="cart-section">
        <div class="container cart-container">
            <div class="row">
                <!-- Cart Items Column -->
                <div class="col-lg-8">
                    <div class="cart-items" id="cartItemsContainer">
                        <!-- Cart Item 1 -->
                        <div class="cart-item" data-id="1" data-price="12.90">
                            <div class="cart-item-image">
                                <img src="https://images.unsplash.com/photo-1518709268805-4e9042af9f23?w=200&h=200&fit=crop" 
                                     alt="Rose Plant">
                            </div>
                            <div class="cart-item-details">
                                <h3 class="cart-item-name">Rose Plant</h3>
                                <p class="cart-item-description">Beautiful red rose perfect for your garden</p>
                                <p class="cart-item-price">$12.90 per unit</p>
                            </div>
                            <div class="cart-item-quantity">
                                <div class="quantity-label">Quantity:</div>
                                <div class="quantity-controls">
                                    <button class="quantity-btn" onclick="decreaseQuantity(1)">
                                        <i class="bi bi-dash"></i>
                                    </button>
                                    <input type="number" class="quantity-input" id="qty-1" value="2" min="1" 
                                           onchange="updateQuantity(1)" readonly>
                                    <button class="quantity-btn" onclick="increaseQuantity(1)">
                                        <i class="bi bi-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="cart-item-total">
                                <div class="total-label">Total:</div>
                                <div class="total-price" id="total-1">$25.80</div>
                            </div>
                            <div class="cart-item-remove">
                                <button class="btn-remove" onclick="removeFromCart(1)">
                                    <i class="bi bi-trash"></i> Remove
                                </button>
                            </div>
                        </div>

                        <!-- Cart Item 2 -->
                        <div class="cart-item" data-id="2" data-price="45.00">
                            <div class="cart-item-image">
                                <img src="https://images.unsplash.com/photo-1617576683096-00fc8eecb3af?w=200&h=200&fit=crop" 
                                     alt="Garden Shovel">
                            </div>
                            <div class="cart-item-details">
                                <h3 class="cart-item-name">Garden Shovel</h3>
                                <p class="cart-item-description">Durable steel shovel with ergonomic handle</p>
                                <p class="cart-item-price">$45.00 per unit</p>
                            </div>
                            <div class="cart-item-quantity">
                                <div class="quantity-label">Quantity:</div>
                                <div class="quantity-controls">
                                    <button class="quantity-btn" onclick="decreaseQuantity(2)">
                                        <i class="bi bi-dash"></i>
                                    </button>
                                    <input type="number" class="quantity-input" id="qty-2" value="1" min="1" 
                                           onchange="updateQuantity(2)" readonly>
                                    <button class="quantity-btn" onclick="increaseQuantity(2)">
                                        <i class="bi bi-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="cart-item-total">
                                <div class="total-label">Total:</div>
                                <div class="total-price" id="total-2">$45.00</div>
                            </div>
                            <div class="cart-item-remove">
                                <button class="btn-remove" onclick="removeFromCart(2)">
                                    <i class="bi bi-trash"></i> Remove
                                </button>
                            </div>
                        </div>

                        <!-- Cart Item 3 -->
                        <div class="cart-item" data-id="3" data-price="8.50">
                            <div class="cart-item-image">
                                <img src="https://images.unsplash.com/photo-1597848212624-e530501dfcda?w=200&h=200&fit=crop" 
                                     alt="Sunflower Seeds">
                            </div>
                            <div class="cart-item-details">
                                <h3 class="cart-item-name">Sunflower Seeds</h3>
                                <p class="cart-item-description">Grow stunning sunflowers up to 8 feet tall</p>
                                <p class="cart-item-price">$8.50 per unit</p>
                            </div>
                            <div class="cart-item-quantity">
                                <div class="quantity-label">Quantity:</div>
                                <div class="quantity-controls">
                                    <button class="quantity-btn" onclick="decreaseQuantity(3)">
                                        <i class="bi bi-dash"></i>
                                    </button>
                                    <input type="number" class="quantity-input" id="qty-3" value="3" min="1" 
                                           onchange="updateQuantity(3)" readonly>
                                    <button class="quantity-btn" onclick="increaseQuantity(3)">
                                        <i class="bi bi-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="cart-item-total">
                                <div class="total-label">Total:</div>
                                <div class="total-price" id="total-3">$25.50</div>
                            </div>
                            <div class="cart-item-remove">
                                <button class="btn-remove" onclick="removeFromCart(3)">
                                    <i class="bi bi-trash"></i> Remove
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Empty Cart State -->
                    <div class="empty-cart" id="emptyCart">
                        <i class="bi bi-cart-x empty-cart-icon"></i>
                        <h2>Your cart is empty</h2>
                        <p>Start shopping and add products to your cart!</p>
                        <a href="products.html" class="btn-browse">
                            <i class="bi bi-search"></i> Browse Products
                        </a>
                    </div>
                </div>

                <!-- Cart Summary Column -->
                <div class="col-lg-4">
                    <div class="cart-summary" id="cartSummary">
                        <h2 class="summary-title">Order Summary</h2>
                        
                        <div class="summary-row">
                            <span class="summary-label">Subtotal:</span>
                            <span class="summary-value" id="subtotal">$96.30</span>
                        </div>
                        
                        <div class="summary-row">
                            <span class="summary-label">Shipping:</span>
                            <span class="summary-value">$5.00</span>
                        </div>
                        
                        <div class="summary-row">
                            <span class="summary-label">Tax (10%):</span>
                            <span class="summary-value" id="tax">$9.63</span>
                        </div>
                        
                        <div class="summary-row total">
                            <span class="summary-label">Total:</span>
                            <span class="summary-value" id="grandTotal">$110.93</span>
                        </div>
                        
                        <button class="btn-checkout" onclick="proceedToCheckout()">
                            <i class="bi bi-credit-card"></i> Proceed to Checkout
                        </button>
                        
                        <div class="continue-shopping">
                            <a href="products.html">
                                <i class="bi bi-arrow-left"></i> Continue Shopping
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <!-- Custom JavaScript -->
    <script>
        // ========================================
        // CONSTANTS
        // ========================================
        const SHIPPING_COST = 5.00;
        const TAX_RATE = 0.10;

        // ========================================
        // INCREASE QUANTITY
        // ========================================
        function increaseQuantity(itemId) {
            const qtyInput = document.getElementById(`qty-${itemId}`);
            let currentQty = parseInt(qtyInput.value);
            currentQty++;
            qtyInput.value = currentQty;
            updateQuantity(itemId);
        }

        // ========================================
        // DECREASE QUANTITY
        // ========================================
        function decreaseQuantity(itemId) {
            const qtyInput = document.getElementById(`qty-${itemId}`);
            let currentQty = parseInt(qtyInput.value);
            if (currentQty > 1) {
                currentQty--;
                qtyInput.value = currentQty;
                updateQuantity(itemId);
            }
        }

        // ========================================
        // UPDATE QUANTITY
        // ========================================
        function updateQuantity(itemId) {
            const qtyInput = document.getElementById(`qty-${itemId}`);
            const quantity = parseInt(qtyInput.value);
            
            // Get price from data attribute
            const cartItem = document.querySelector(`[data-id="${itemId}"]`);
            const price = parseFloat(cartItem.getAttribute('data-price'));
            
            // Calculate and update total
            const total = price * quantity;
            document.getElementById(`total-${itemId}`).textContent = `$${total.toFixed(2)}`;
            
            console.log(`Updated item ${itemId}: Qty=${quantity}, Total=$${total.toFixed(2)}`);
            
            // Update cart totals
            updateCartTotals();
        }

        // ========================================
        // UPDATE CART TOTALS
        // ========================================
        function updateCartTotals() {
            const cartItems = document.querySelectorAll('.cart-item');
            let subtotal = 0;
            
            cartItems.forEach(item => {
                const itemId = item.getAttribute('data-id');
                const totalElement = document.getElementById(`total-${itemId}`);
                if (totalElement) {
                    const itemTotal = parseFloat(totalElement.textContent.replace('$', ''));
                    subtotal += itemTotal;
                }
            });
            
            const tax = subtotal * TAX_RATE;
            const grandTotal = subtotal + SHIPPING_COST + tax;
            
            // Update display
            document.getElementById('subtotal').textContent = `$${subtotal.toFixed(2)}`;
            document.getElementById('tax').textContent = `$${tax.toFixed(2)}`;
            document.getElementById('grandTotal').textContent = `$${grandTotal.toFixed(2)}`;
            
            console.log(`Cart totals updated: Subtotal=$${subtotal.toFixed(2)}, Tax=$${tax.toFixed(2)}, Total=$${grandTotal.toFixed(2)}`);
        }

        // ========================================
        // REMOVE FROM CART
        // ========================================
        function removeFromCart(itemId) {
            const cartItem = document.querySelector(`[data-id="${itemId}"]`);
            const productName = cartItem.querySelector('.cart-item-name').textContent;
            
            // Confirmation
            if (!confirm(`Remove "${productName}" from cart?`)) {
                return;
            }
            
            console.log(`Removing item ${itemId}: ${productName}`);
            
            // Add removal animation
            cartItem.classList.add('removing');
            
            // Remove element after animation
            setTimeout(() => {
                cartItem.remove();
                updateCartCount();
                updateCartTotals();
                checkEmptyCart();
                
                // Show notification
                alert(`Product removed from cart: ${productName}`);
                showNotification(`${productName} removed from cart`);
            }, 500);
        }

        // ========================================
        // UPDATE CART COUNT
        // ========================================
        function updateCartCount() {
            const cartItems = document.querySelectorAll('.cart-item');
            const count = cartItems.length;
            
            const badge = document.getElementById('cartCount');
            badge.textContent = count;
            
            // Animation
            badge.style.transform = 'scale(1.3)';
            setTimeout(() => {
                badge.style.transform = 'scale(1)';
            }, 300);
            
            console.log(`Cart count updated: ${count} items`);
        }

        // ========================================
        // CHECK EMPTY CART
        // ========================================
        function checkEmptyCart() {
            const cartItems = document.querySelectorAll('.cart-item');
            const emptyCart = document.getElementById('emptyCart');
            const cartItemsContainer = document.getElementById('cartItemsContainer');
            const cartSummary = document.getElementById('cartSummary');
            
            if (cartItems.length === 0) {
                emptyCart.classList.add('show');
                cartItemsContainer.style.display = 'none';
                cartSummary.style.display = 'none';
            } else {
                emptyCart.classList.remove('show');
                cartItemsContainer.style.display = 'block';
                cartSummary.style.display = 'block';
            }
        }

        // ========================================
        // PROCEED TO CHECKOUT
        // ========================================
        function proceedToCheckout() {
            const grandTotal = document.getElementById('grandTotal').textContent;
            alert(`Proceeding to checkout!\n\nTotal Amount: ${grandTotal}\n\nThis would normally redirect to the checkout/payment page.`);
            console.log('Proceeding to checkout with total:', grandTotal);
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
                background: linear-gradient(135deg, #28a745, #20c997);
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
            updateCartTotals();
            checkEmptyCart();
            
            console.log('🌿 GardenApp Cart Page loaded successfully!');
            console.log('Features: Quantity management, Price calculation, Product removal');
            
            const cartItems = document.querySelectorAll('.cart-item');
            console.log(`Cart contains ${cartItems.length} items`);
        });
    </script>
@endsection