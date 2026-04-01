@extends('layout.client')
@section('title')
    <title>Payment - GardenApp</title>
@endsection    

@section('style')
<link rel="stylesheet" href="{{asset('css/client/paiments.css')}}">
@endsection
    <!-- ========================================
         PAGE HEADER
         ======================================== -->
@section('page-header',true) 
@section('icon', 'wallet2') 
@section('title-h1', 'Payment') 
@section('description-p', 'Securely complete your order') 

@section('sections')    
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
                                    <div class="order-item-quantity">
                            <div class="cart-item-quantity">
                                <div class="quantity-label">Quantity:</div>
                                <div class="quantity-controls">
                                    <button class="quantity-btn" >
                                        <i class="bi bi-dash"></i>
                                    </button>
                                    <input type="number" class="quantity-input" id="qty-1" value="2" min="1" 
                                            readonly>
                                    <button class="quantity-btn" >
                                        <i class="bi bi-plus"></i>
                                    </button>
                                </div>
                            </div>
                                        Quantity: 2</div>
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
@endsection    

@section('script')
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
@endsection