<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - GardenApp</title>
    
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
           NAVBAR (Same as other pages)
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
           CHECKOUT SECTION
           ======================================== */
        .checkout-section {
            padding: 0 0 4rem;
        }

        /* Order Summary */
        .order-summary {
            background: var(--white);
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
            margin-bottom: 2rem;
            position: sticky;
            top: 100px;
        }

        .summary-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--dark-green);
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .order-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1rem;
            border: 2px solid var(--gray-light);
            border-radius: 12px;
            margin-bottom: 1rem;
            transition: all 0.3s ease;
        }

        .order-item:hover {
            border-color: var(--light-green);
            box-shadow: 0 3px 10px rgba(45, 106, 79, 0.1);
        }

        .order-item-image {
            width: 70px;
            height: 70px;
            border-radius: 10px;
            overflow: hidden;
            flex-shrink: 0;
            background: linear-gradient(135deg, var(--pale-green), var(--light-green));
        }

        .order-item-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .order-item-details {
            flex: 1;
        }

        .order-item-name {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--dark-green);
            margin-bottom: 0.25rem;
        }

        .order-item-quantity {
            font-size: 0.9rem;
            color: var(--gray-dark);
        }

        .order-item-price {
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--primary-green);
        }

        .order-total {
            border-top: 3px solid var(--primary-green);
            padding-top: 1.5rem;
            margin-top: 1.5rem;
        }

        .total-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 0.75rem;
        }

        .total-label {
            font-size: 1.1rem;
            color: var(--dark-green);
            font-weight: 600;
        }

        .total-value {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--primary-green);
        }

        .total-row.grand-total {
            padding-top: 1rem;
            border-top: 2px solid var(--light-green);
            margin-top: 0.5rem;
        }

        .total-row.grand-total .total-label {
            font-size: 1.4rem;
        }

        .total-row.grand-total .total-value {
            font-size: 1.8rem;
            color: var(--dark-green);
        }

        /* Checkout Form */
        .checkout-form {
            background: var(--white);
            border-radius: 20px;
            padding: 2.5rem;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        }

        .section-title {
            font-size: 1.6rem;
            font-weight: 700;
            color: var(--dark-green);
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding-bottom: 1rem;
            border-bottom: 3px solid var(--pale-green);
        }

        .form-section {
            margin-bottom: 2.5rem;
        }

        .form-label {
            font-weight: 600;
            color: var(--dark-green);
            margin-bottom: 0.5rem;
            font-size: 1rem;
        }

        .form-control,
        .form-select {
            border: 2px solid var(--light-green);
            border-radius: 10px;
            padding: 0.75rem 1rem;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--secondary-green);
            box-shadow: 0 0 0 4px rgba(82, 183, 136, 0.1);
        }

        .form-control.is-invalid {
            border-color: var(--danger);
        }

        .form-control.is-valid {
            border-color: var(--success);
        }

        .invalid-feedback {
            font-size: 0.9rem;
            margin-top: 0.5rem;
        }

        /* Payment Methods */
        .payment-methods {
            display: flex;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .payment-option {
            flex: 1;
            border: 3px solid var(--light-green);
            border-radius: 15px;
            padding: 1.5rem;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            background: var(--white);
        }

        .payment-option:hover {
            border-color: var(--secondary-green);
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(45, 106, 79, 0.15);
        }

        .payment-option.active {
            border-color: var(--primary-green);
            background: linear-gradient(135deg, var(--pale-green), var(--light-green));
            transform: translateY(-5px);
            box-shadow: 0 5px 20px rgba(45, 106, 79, 0.2);
        }

        .payment-option i {
            font-size: 3rem;
            color: var(--primary-green);
            margin-bottom: 0.5rem;
        }

        .payment-option .payment-name {
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--dark-green);
        }

        .payment-fields {
            display: none;
            margin-top: 1.5rem;
            padding: 1.5rem;
            background: var(--gray-light);
            border-radius: 12px;
        }

        .payment-fields.show {
            display: block;
            animation: fadeIn 0.3s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Place Order Button */
        .btn-place-order {
            width: 100%;
            background: linear-gradient(135deg, var(--secondary-green), var(--primary-green));
            color: var(--white);
            border: none;
            padding: 18px;
            border-radius: 15px;
            font-size: 1.4rem;
            font-weight: 700;
            margin-top: 2rem;
            cursor: pointer;
            transition: all 0.4s ease;
            box-shadow: 0 6px 20px rgba(45, 106, 79, 0.3);
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .btn-place-order:hover {
            transform: translateY(-5px) scale(1.02);
            box-shadow: 0 10px 30px rgba(45, 106, 79, 0.4);
        }

        .btn-place-order:disabled {
            background: var(--gray-dark);
            cursor: not-allowed;
            transform: none;
        }

        /* Security Badge */
        .security-badge {
            text-align: center;
            margin-top: 1.5rem;
            padding: 1rem;
            background: linear-gradient(135deg, var(--pale-green), var(--light-green));
            border-radius: 12px;
        }

        .security-badge i {
            font-size: 2rem;
            color: var(--success);
            margin-bottom: 0.5rem;
        }

        .security-badge p {
            margin: 0;
            color: var(--dark-green);
            font-weight: 600;
            font-size: 0.95rem;
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
            .order-summary {
                position: static;
                margin-bottom: 2rem;
            }
        }

        @media (max-width: 768px) {
            .page-header h1 {
                font-size: 2.5rem;
            }

            .payment-methods {
                flex-direction: column;
            }

            .checkout-form {
                padding: 1.5rem;
            }
        }

        @media (max-width: 576px) {
            .navbar-brand {
                font-size: 1.4rem;
            }

            .page-header h1 {
                font-size: 2rem;
            }

            .order-item {
                flex-direction: column;
                text-align: center;
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
                        <a class="nav-link" href="products.html">
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
                            <span class="cart-badge" id="cartCount">3</span>
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
            <h1><i class="bi bi-credit-card"></i>Checkout</h1>
            <p>Confirm your order and enter payment details</p>
        </div>
    </section>

    <!-- ========================================
         CHECKOUT SECTION
         ======================================== -->
    <section class="checkout-section">
        <div class="container">
            <div class="row">
                <!-- Order Summary Column -->
                <div class="col-lg-4 order-lg-2">
                    <div class="order-summary">
                        <h2 class="summary-title">
                            <i class="bi bi-cart-check"></i> Order Summary
                        </h2>
                        
                        <!-- Order Items -->
                        <div class="order-items">
                            <div class="order-item">
                                <div class="order-item-image">
                                    <img src="https://images.unsplash.com/photo-1518709268805-4e9042af9f23?w=100&h=100&fit=crop" 
                                         alt="Rose Plant">
                                </div>
                                <div class="order-item-details">
                                    <div class="order-item-name">Rose Plant</div>
                                    <div class="order-item-quantity">Quantity: 2</div>
                                </div>
                                <div class="order-item-price">$25.80</div>
                            </div>

                            <div class="order-item">
                                <div class="order-item-image">
                                    <img src="https://images.unsplash.com/photo-1617576683096-00fc8eecb3af?w=100&h=100&fit=crop" 
                                         alt="Garden Shovel">
                                </div>
                                <div class="order-item-details">
                                    <div class="order-item-name">Garden Shovel</div>
                                    <div class="order-item-quantity">Quantity: 1</div>
                                </div>
                                <div class="order-item-price">$45.00</div>
                            </div>

                            <div class="order-item">
                                <div class="order-item-image">
                                    <img src="https://images.unsplash.com/photo-1597848212624-e530501dfcda?w=100&h=100&fit=crop" 
                                         alt="Sunflower Seeds">
                                </div>
                                <div class="order-item-details">
                                    <div class="order-item-name">Sunflower Seeds</div>
                                    <div class="order-item-quantity">Quantity: 3</div>
                                </div>
                                <div class="order-item-price">$25.50</div>
                            </div>
                        </div>

                        <!-- Order Total -->
                        <div class="order-total">
                            <div class="total-row">
                                <span class="total-label">Subtotal:</span>
                                <span class="total-value">$96.30</span>
                            </div>
                            <div class="total-row">
                                <span class="total-label">Shipping:</span>
                                <span class="total-value">$5.00</span>
                            </div>
                            <div class="total-row">
                                <span class="total-label">Tax (10%):</span>
                                <span class="total-value">$9.63</span>
                            </div>
                            <div class="total-row grand-total">
                                <span class="total-label">Total:</span>
                                <span class="total-value" id="grandTotal">$110.93</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Checkout Form Column -->
                <div class="col-lg-8 order-lg-1">
                    <form id="checkoutForm" class="checkout-form" novalidate>
                        
                        <!-- Customer Information -->
                        <div class="form-section">
                            <h2 class="section-title">
                                <i class="bi bi-person-fill"></i> Customer Information
                            </h2>
                            
                            <div class="mb-3">
                                <label for="fullName" class="form-label">Full Name *</label>
                                <input type="text" 
                                       class="form-control" 
                                       id="fullName" 
                                       name="fullName"
                                       placeholder="Enter your full name"
                                       required>
                                <div class="invalid-feedback">Please enter your full name.</div>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address *</label>
                                <input type="email" 
                                       class="form-control" 
                                       id="email" 
                                       name="email"
                                       placeholder="example@email.com"
                                       required>
                                <div class="invalid-feedback">Please enter a valid email address.</div>
                            </div>

                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone Number *</label>
                                <input type="tel" 
                                       class="form-control" 
                                       id="phone" 
                                       name="phone"
                                       placeholder="+1 (555) 123-4567"
                                       required>
                                <div class="invalid-feedback">Please enter your phone number.</div>
                            </div>

                            <div class="mb-3">
                                <label for="address" class="form-label">Delivery Address *</label>
                                <textarea class="form-control" 
                                          id="address" 
                                          name="address"
                                          rows="3"
                                          placeholder="Street, City, State, ZIP Code"
                                          required></textarea>
                                <div class="invalid-feedback">Please enter your delivery address.</div>
                            </div>
                        </div>

                        <!-- Payment Method -->
                        <div class="form-section">
                            <h2 class="section-title">
                                <i class="bi bi-wallet2"></i> Payment Method
                            </h2>

                            <div class="payment-methods">
                                <div class="payment-option active" onclick="selectPayment('card')">
                                    <i class="bi bi-credit-card-2-front"></i>
                                    <div class="payment-name">Credit Card</div>
                                </div>
                                <div class="payment-option" onclick="selectPayment('cash')">
                                    <i class="bi bi-cash-stack"></i>
                                    <div class="payment-name">Cash on Delivery</div>
                                </div>
                            </div>

                            <input type="hidden" id="paymentMethod" name="paymentMethod" value="card">

                            <!-- Card Payment Fields -->
                            <div id="cardFields" class="payment-fields show">
                                <div class="mb-3">
                                    <label for="cardNumber" class="form-label">Card Number *</label>
                                    <input type="text" 
                                           class="form-control" 
                                           id="cardNumber" 
                                           name="cardNumber"
                                           placeholder="1234 5678 9012 3456"
                                           maxlength="19"
                                           pattern="[0-9\s]{13,19}">
                                    <div class="invalid-feedback">Please enter a valid card number.</div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="cardExpiry" class="form-label">Expiry Date *</label>
                                        <input type="text" 
                                               class="form-control" 
                                               id="cardExpiry" 
                                               name="cardExpiry"
                                               placeholder="MM/YY"
                                               maxlength="5"
                                               pattern="(0[1-9]|1[0-2])\/[0-9]{2}">
                                        <div class="invalid-feedback">Please enter expiry date (MM/YY).</div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="cardCVV" class="form-label">CVV *</label>
                                        <input type="text" 
                                               class="form-control" 
                                               id="cardCVV" 
                                               name="cardCVV"
                                               placeholder="123"
                                               maxlength="4"
                                               pattern="[0-9]{3,4}">
                                        <div class="invalid-feedback">Please enter CVV.</div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="cardName" class="form-label">Cardholder Name *</label>
                                    <input type="text" 
                                           class="form-control" 
                                           id="cardName" 
                                           name="cardName"
                                           placeholder="Name on card">
                                    <div class="invalid-feedback">Please enter cardholder name.</div>
                                </div>
                            </div>

                            <!-- Cash Payment Fields -->
                            <div id="cashFields" class="payment-fields">
                                <div class="alert alert-info d-flex align-items-center">
                                    <i class="bi bi-info-circle me-3" style="font-size: 2rem;"></i>
                                    <div>
                                        <strong>Cash on Delivery</strong><br>
                                        Please prepare the exact amount of <strong>$110.93</strong> for payment upon delivery.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Place Order Button -->
                        <button type="submit" class="btn-place-order">
                            <i class="bi bi-check-circle"></i> Place Order
                        </button>

                        <!-- Security Badge -->
                        <div class="security-badge">
                            <i class="bi bi-shield-check"></i>
                            <p>Secure Checkout - Your information is protected</p>
                        </div>
                    </form>
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

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom JavaScript -->
    <script>
        // ========================================
        // PAYMENT METHOD SELECTION
        // ========================================
        function selectPayment(method) {
            // Update payment options UI
            const options = document.querySelectorAll('.payment-option');
            options.forEach(option => option.classList.remove('active'));
            event.currentTarget.classList.add('active');

            // Update hidden input
            document.getElementById('paymentMethod').value = method;

            // Show/hide payment fields
            const cardFields = document.getElementById('cardFields');
            const cashFields = document.getElementById('cashFields');
            
            if (method === 'card') {
                cardFields.classList.add('show');
                cashFields.classList.remove('show');
                
                // Make card fields required
                setFieldsRequired('cardFields', true);
                setFieldsRequired('cashFields', false);
            } else {
                cardFields.classList.remove('show');
                cashFields.classList.add('show');
                
                // Make card fields not required
                setFieldsRequired('cardFields', false);
                setFieldsRequired('cashFields', false);
            }

            console.log('Payment method selected:', method);
        }

        // ========================================
        // SET FIELDS REQUIRED
        // ========================================
        function setFieldsRequired(containerId, required) {
            const container = document.getElementById(containerId);
            const inputs = container.querySelectorAll('input');
            
            inputs.forEach(input => {
                if (required) {
                    input.setAttribute('required', '');
                } else {
                    input.removeAttribute('required');
                }
            });
        }

        // ========================================
        // FORM VALIDATION AND SUBMISSION
        // ========================================
        document.getElementById('checkoutForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Get form
            const form = e.target;
            
            // Check validity
            if (!form.checkValidity()) {
                e.stopPropagation();
                form.classList.add('was-validated');
                
                // Scroll to first invalid field
                const firstInvalid = form.querySelector(':invalid');
                if (firstInvalid) {
                    firstInvalid.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    firstInvalid.focus();
                }
                
                return;
            }

            // Get form data
            const formData = new FormData(form);
            const data = {};
            formData.forEach((value, key) => {
                data[key] = value;
            });

            console.log('Order data:', data);

            // Show success message
            const total = document.getElementById('grandTotal').textContent;
            alert(`Order placed successfully!\n\nOrder Total: ${total}\n\nThank you for your purchase!\n\nYou will receive a confirmation email shortly.`);

            // Optional: Redirect to confirmation page
            // setTimeout(() => {
            //     window.location.href = 'order-confirmation.html';
            // }, 2000);

            // Reset form (optional)
            // form.reset();
            // form.classList.remove('was-validated');
        });

        // ========================================
        // CARD NUMBER FORMATTING
        // ========================================
        document.getElementById('cardNumber')?.addEventListener('input', function(e) {
            let value = e.target.value.replace(/\s/g, '');
            let formattedValue = value.match(/.{1,4}/g)?.join(' ') || value;
            e.target.value = formattedValue;
        });

        // ========================================
        // EXPIRY DATE FORMATTING
        // ========================================
        document.getElementById('cardExpiry')?.addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length >= 2) {
                value = value.slice(0, 2) + '/' + value.slice(2, 4);
            }
            e.target.value = value;
        });

        // ========================================
        // CVV VALIDATION
        // ========================================
        document.getElementById('cardCVV')?.addEventListener('input', function(e) {
            e.target.value = e.target.value.replace(/\D/g, '');
        });

        // ========================================
        // PHONE NUMBER FORMATTING (OPTIONAL)
        // ========================================
        document.getElementById('phone')?.addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length > 0) {
                if (value.length <= 3) {
                    value = `+1 (${value}`;
                } else if (value.length <= 6) {
                    value = `+1 (${value.slice(0, 3)}) ${value.slice(3)}`;
                } else {
                    value = `+1 (${value.slice(0, 3)}) ${value.slice(3, 6)}-${value.slice(6, 10)}`;
                }
            }
            e.target.value = value;
        });

        // ========================================
        // REAL-TIME VALIDATION
        // ========================================
        const inputs = document.querySelectorAll('.form-control');
        inputs.forEach(input => {
            input.addEventListener('blur', function() {
                if (this.checkValidity()) {
                    this.classList.remove('is-invalid');
                    this.classList.add('is-valid');
                } else {
                    this.classList.remove('is-valid');
                    this.classList.add('is-invalid');
                }
            });
        });

        // ========================================
        // INITIALIZE ON PAGE LOAD
        // ========================================
        document.addEventListener('DOMContentLoaded', function() {
            // Set card fields as required by default
            setFieldsRequired('cardFields', true);
            
            console.log('🌿 GardenApp Checkout Page loaded successfully!');
            console.log('Features: Form validation, Payment method selection, Auto-formatting');
            console.log('Total amount: $110.93');
        });
    </script>

</body>
</html>