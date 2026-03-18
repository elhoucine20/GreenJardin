<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment - GardenApp</title>
    
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
           PAYMENT SECTION
           ======================================== */
        .payment-section {
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
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .total-label {
            font-size: 1.4rem;
            color: var(--dark-green);
            font-weight: 700;
        }

        .total-value {
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary-green);
        }

        /* Payment Form */
        .payment-form-container {
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

        /* Payment Methods */
        .payment-methods {
            margin-bottom: 2rem;
        }

        .payment-option {
            border: 3px solid var(--light-green);
            border-radius: 15px;
            padding: 1.5rem;
            margin-bottom: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .payment-option:hover {
            border-color: var(--secondary-green);
            transform: translateX(5px);
            box-shadow: 0 5px 15px rgba(45, 106, 79, 0.15);
        }

        .payment-option.active {
            border-color: var(--primary-green);
            background: linear-gradient(135deg, var(--pale-green), var(--light-green));
            transform: translateX(5px);
            box-shadow: 0 5px 20px rgba(45, 106, 79, 0.2);
        }

        .payment-option input[type="radio"] {
            width: 24px;
            height: 24px;
            cursor: pointer;
            accent-color: var(--primary-green);
        }

        .payment-option-content {
            flex: 1;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .payment-option-icon {
            font-size: 3rem;
            color: var(--primary-green);
        }

        .payment-option-info h3 {
            font-size: 1.3rem;
            font-weight: 700;
            color: var(--dark-green);
            margin-bottom: 0.25rem;
        }

        .payment-option-info p {
            font-size: 0.9rem;
            color: var(--gray-dark);
            margin: 0;
        }

        /* Card Form Fields */
        .card-fields {
            display: none;
            margin-top: 2rem;
            padding: 2rem;
            background: var(--gray-light);
            border-radius: 15px;
            border: 2px solid var(--light-green);
        }

        .card-fields.show {
            display: block;
            animation: fadeIn 0.4s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .form-label {
            font-weight: 600;
            color: var(--dark-green);
            margin-bottom: 0.5rem;
            font-size: 1rem;
        }

        .form-control {
            border: 2px solid var(--light-green);
            border-radius: 10px;
            padding: 0.75rem 1rem;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--secondary-green);
            box-shadow: 0 0 0 4px rgba(82, 183, 136, 0.1);
            outline: none;
        }

        .form-control.is-invalid {
            border-color: var(--danger);
        }

        .form-control.is-valid {
            border-color: var(--success);
        }

        .invalid-feedback,
        .valid-feedback {
            font-size: 0.9rem;
            margin-top: 0.5rem;
        }

        /* Pay Now Button */
        .btn-pay-now {
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
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1rem;
        }

        .btn-pay-now:hover {
            transform: translateY(-5px) scale(1.02);
            box-shadow: 0 10px 30px rgba(45, 106, 79, 0.4);
        }

        .btn-pay-now:disabled {
            background: var(--gray-dark);
            cursor: not-allowed;
            transform: none;
        }

        /* Security Info */
        .security-info {
            text-align: center;
            margin-top: 1.5rem;
            padding: 1.5rem;
            background: linear-gradient(135deg, var(--pale-green), var(--light-green));
            border-radius: 12px;
        }

        .security-info i {
            font-size: 2.5rem;
            color: var(--success);
            margin-bottom: 0.5rem;
        }

        .security-info p {
            margin: 0.25rem 0;
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

            .payment-form-container {
                padding: 1.5rem;
            }

            .order-item {
                flex-direction: column;
                text-align: center;
            }
        }

        @media (max-width: 576px) {
            .navbar-brand {
                font-size: 1.4rem;
            }

            .page-header h1 {
                font-size: 2rem;
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
            <h1><i class="bi bi-wallet2"></i>Payment</h1>
            <p>Securely complete your order</p>
        </div>
    </section>

    <!-- ========================================
         PAYMENT SECTION
         ======================================== -->
    <section class="payment-section">
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
                            <span class="total-label">Total:</span>
                            <span class="total-value" id="totalAmount">$96.30</span>
                        </div>
                    </div>
                </div>

                <!-- Payment Form Column -->
                <div class="col-lg-8 order-lg-1">
                    <div class="payment-form-container">
                        <h2 class="section-title">
                            <i class="bi bi-credit-card-2-front"></i> Select Payment Method
                        </h2>

                        <form id="paymentForm" novalidate>
                            <!-- Payment Methods -->
                            <div class="payment-methods">
                                <!-- Credit Card Option -->
                                <label class="payment-option active">
                                    <input type="radio" 
                                           name="paymentMethod" 
                                           value="card" 
                                           checked
                                           onchange="selectPaymentMethod('card')">
                                    <div class="payment-option-content">
                                        <i class="bi bi-credit-card-2-front payment-option-icon"></i>
                                        <div class="payment-option-info">
                                            <h3>Credit Card</h3>
                                            <p>Pay securely with your credit or debit card</p>
                                        </div>
                                    </div>
                                </label>

                                <!-- Cash on Delivery Option -->
                                <label class="payment-option">
                                    <input type="radio" 
                                           name="paymentMethod" 
                                           value="cash"
                                           onchange="selectPaymentMethod('cash')">
                                    <div class="payment-option-content">
                                        <i class="bi bi-cash-stack payment-option-icon"></i>
                                        <div class="payment-option-info">
                                            <h3>Cash on Delivery</h3>
                                            <p>Pay with cash when your order arrives</p>
                                        </div>
                                    </div>
                                </label>
                            </div>

                            <!-- Card Payment Fields -->
                            <div id="cardFields" class="card-fields show">
                                <h3 class="section-title">
                                    <i class="bi bi-wallet2"></i> Card Details
                                </h3>

                                <div class="mb-3">
                                    <label for="cardholderName" class="form-label">Cardholder Name *</label>
                                    <input type="text" 
                                           class="form-control" 
                                           id="cardholderName" 
                                           name="cardholderName"
                                           placeholder="Name on card"
                                           required>
                                    <div class="invalid-feedback">Please enter cardholder name.</div>
                                </div>

                                <div class="mb-3">
                                    <label for="cardNumber" class="form-label">Card Number *</label>
                                    <input type="text" 
                                           class="form-control" 
                                           id="cardNumber" 
                                           name="cardNumber"
                                           placeholder="1234 5678 9012 3456"
                                           maxlength="19"
                                           required>
                                    <div class="invalid-feedback">Please enter a valid 16-digit card number.</div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="expiryDate" class="form-label">Expiry Date *</label>
                                        <input type="text" 
                                               class="form-control" 
                                               id="expiryDate" 
                                               name="expiryDate"
                                               placeholder="MM/YY"
                                               maxlength="5"
                                               required>
                                        <div class="invalid-feedback">Please enter expiry date (MM/YY).</div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="cvv" class="form-label">CVV *</label>
                                        <input type="text" 
                                               class="form-control" 
                                               id="cvv" 
                                               name="cvv"
                                               placeholder="123"
                                               maxlength="4"
                                               required>
                                        <div class="invalid-feedback">Please enter CVV (3-4 digits).</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Pay Now Button -->
                            <button type="submit" class="btn-pay-now">
                                <i class="bi bi-lock-fill"></i>
                                <span id="payButtonText">Pay Now - $96.30</span>
                            </button>

                            <!-- Security Info -->
                            <div class="security-info">
                                <i class="bi bi-shield-check"></i>
                                <p><strong>Secure Payment</strong></p>
                                <p>Your payment information is encrypted and secure</p>
                            </div>
                        </form>
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

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom JavaScript -->
    <script>
        // ========================================
        // GLOBAL VARIABLES
        // ========================================
        const totalAmount = '$96.30';
        let selectedPaymentMethod = 'card';

        // ========================================
        // SELECT PAYMENT METHOD
        // ========================================
        function selectPaymentMethod(method) {
            selectedPaymentMethod = method;
            
            // Update UI - remove active class from all options
            const options = document.querySelectorAll('.payment-option');
            options.forEach(option => option.classList.remove('active'));
            
            // Add active class to selected option
            event.currentTarget.closest('.payment-option').classList.add('active');
            
            // Show/hide card fields
            const cardFields = document.getElementById('cardFields');
            const payButtonText = document.getElementById('payButtonText');
            
            if (method === 'card') {
                cardFields.classList.add('show');
                payButtonText.textContent = `Pay Now - ${totalAmount}`;
                setCardFieldsRequired(true);
            } else {
                cardFields.classList.remove('show');
                payButtonText.textContent = 'Confirm Order';
                setCardFieldsRequired(false);
            }
            
            console.log('Payment method selected:', method);
        }

        // ========================================
        // SET CARD FIELDS REQUIRED
        // ========================================
        function setCardFieldsRequired(required) {
            const cardInputs = document.querySelectorAll('#cardFields input');
            cardInputs.forEach(input => {
                if (required) {
                    input.setAttribute('required', '');
                } else {
                    input.removeAttribute('required');
                }
            });
        }

        // ========================================
        // CARD NUMBER FORMATTING
        // ========================================
        document.getElementById('cardNumber')?.addEventListener('input', function(e) {
            // Remove non-numeric characters
            let value = e.target.value.replace(/\D/g, '');
            
            // Add space every 4 digits
            let formattedValue = value.match(/.{1,4}/g)?.join(' ') || value;
            
            e.target.value = formattedValue;
        });

        // ========================================
        // EXPIRY DATE FORMATTING
        // ========================================
        document.getElementById('expiryDate')?.addEventListener('input', function(e) {
            // Remove non-numeric characters
            let value = e.target.value.replace(/\D/g, '');
            
            // Add slash after 2 digits
            if (value.length >= 2) {
                value = value.slice(0, 2) + '/' + value.slice(2, 4);
            }
            
            e.target.value = value;
        });

        // ========================================
        // CVV VALIDATION (NUMERIC ONLY)
        // ========================================
        document.getElementById('cvv')?.addEventListener('input', function(e) {
            // Only allow numbers
            e.target.value = e.target.value.replace(/\D/g, '');
        });

        // ========================================
        // FORM VALIDATION
        // ========================================
        function validateForm() {
            const form = document.getElementById('paymentForm');
            
            // If cash on delivery, no validation needed
            if (selectedPaymentMethod === 'cash') {
                return true;
            }
            
            // Validate card fields
            const cardholderName = document.getElementById('cardholderName').value.trim();
            const cardNumber = document.getElementById('cardNumber').value.replace(/\s/g, '');
            const expiryDate = document.getElementById('expiryDate').value;
            const cvv = document.getElementById('cvv').value;
            
            let isValid = true;
            
            // Cardholder Name
            if (cardholderName === '') {
                setFieldInvalid('cardholderName');
                isValid = false;
            } else {
                setFieldValid('cardholderName');
            }
            
            // Card Number (should be 16 digits)
            if (cardNumber.length !== 16 || !/^\d+$/.test(cardNumber)) {
                setFieldInvalid('cardNumber');
                isValid = false;
            } else {
                setFieldValid('cardNumber');
            }
            
            // Expiry Date (should be MM/YY format)
            if (!/^\d{2}\/\d{2}$/.test(expiryDate)) {
                setFieldInvalid('expiryDate');
                isValid = false;
            } else {
                setFieldValid('expiryDate');
            }
            
            // CVV (should be 3 or 4 digits)
            if (cvv.length < 3 || cvv.length > 4 || !/^\d+$/.test(cvv)) {
                setFieldInvalid('cvv');
                isValid = false;
            } else {
                setFieldValid('cvv');
            }
            
            return isValid;
        }

        function setFieldInvalid(fieldId) {
            const field = document.getElementById(fieldId);
            field.classList.remove('is-valid');
            field.classList.add('is-invalid');
        }

        function setFieldValid(fieldId) {
            const field = document.getElementById(fieldId);
            field.classList.remove('is-invalid');
            field.classList.add('is-valid');
        }

        // ========================================
        // FORM SUBMISSION
        // ========================================
        document.getElementById('paymentForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            console.log('Payment form submitted');
            console.log('Payment method:', selectedPaymentMethod);
            
            // Validate form
            if (selectedPaymentMethod === 'card') {
                if (!validateForm()) {
                    console.log('Form validation failed');
                    
                    // Scroll to first invalid field
                    const firstInvalid = document.querySelector('.is-invalid');
                    if (firstInvalid) {
                        firstInvalid.scrollIntoView({ behavior: 'smooth', block: 'center' });
                        firstInvalid.focus();
                    }
                    
                    return;
                }
            }
            
            // Show success message
            if (selectedPaymentMethod === 'card') {
                alert(`Payment Successful!\n\nAmount: ${totalAmount}\nPayment Method: Credit Card\n\nThank you for your purchase!`);
            } else {
                alert(`Order Confirmed!\n\nAmount: ${totalAmount}\nPayment Method: Cash on Delivery\n\nPlease prepare the exact amount for delivery.`);
            }
            
            console.log('Payment successful!');
            
            // Optional: Redirect to success page
            // setTimeout(() => {
            //     window.location.href = 'order-success.html';
            // }, 2000);
        });

        // ========================================
        // REAL-TIME VALIDATION ON BLUR
        // ========================================
        const inputs = document.querySelectorAll('#cardFields input');
        inputs.forEach(input => {
            input.addEventListener('blur', function() {
                if (selectedPaymentMethod === 'card' && this.value.trim() !== '') {
                    validateForm();
                }
            });
        });

        // ========================================
        // INITIALIZE ON PAGE LOAD
        // ========================================
        document.addEventListener('DOMContentLoaded', function() {
            console.log('🌿 GardenApp Payment Page loaded successfully!');
            console.log('Features: Payment method selection, Form validation, Auto-formatting');
            console.log('Order total:', totalAmount);
        });
    </script>

</body>
</html>