@extends('layout.client')
@section('title')
<title>Checkout - GardenApp</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('style')
<link rel="stylesheet" href="{{asset('css/client/checkout.css')}}">
@endsection
<!-- ========================================
         PAGE HEADER
         ======================================== -->
@section('page-header',true)
@section('icon', 'credit-card')
@section('title-h1', 'Checkout')
@section('description-p', 'Confirm your order and enter payment details')


@section('sections')
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
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                    <!-- Order Items -->
                    <div class="order-items">
                        @if($commandes)
                        @foreach($commandes as $commande)
                        <div class="order-item" data-id="{{ $commande->id }}" onclick="selectCommande({{ $commande->id }})">
                            <div class="order-item-image">
                                <img src="{{asset('storage/'.$commande->produit->image)}}"
                                    alt="{{ $commande->produit->name }}">
                            </div>
                            <div class="order-item-details">
                                <div class="order-item-name">{{$commande->produit->name}}</div>
                                <div  class="order-item-quantity">Quantity: <span id="quantityy-{{$commande->id}}">{{$commande->quantity}}</span></div>
                                <!-- <form method="POST" action=""> -->


                                <div class="checkout-container quantity-controls" data-update-url="{{route('CommandeUpdated', $commande->id)}}">

                                    <button data-action="decrease" class="quantity-btn" data-id="{{ $commande->id }}">
                                        <i class="bi bi-dash"></i>
                                    </button>

                                    <input type="number"
                                        class="quantity-input"
                                        id="quantity-{{$commande->id}}"
                                        value="{{ $commande->quantity }}"
                                        readonly>

                                    <button data-action="increase" data-id="{{$commande->id}}" class="quantity-btn">
                                        <i class="bi bi-plus"></i>
                                    </button>

                                </div>
                                <!-- </form> -->

                            </div>
                            <div id="total-{{$commande->id}}" class="order-item-price">${{$commande->total}}</div>
                        </div>
                        @endforeach
                        @endif

                    </div>

                    <!-- Order Total -->
                    <div class="order-total">

                        <!-- <div class="total-row grand-total"> -->
                        @if($total!=0)
                        <span class="total-label">Total:</span>
                        <span class="total-value" id="grandTotal">${{$total}}</span>
                        @else
                        <span class="total-value" id="grandTotal">Aucun Order</span>
                        @endif

                        <!-- </div> -->
                    </div>
                </div>
            </div>

            <!-- Checkout Form Column -->
            <div class="col-lg-8 order-lg-1">
                <form id="checkoutForm" class="checkout-form" method="POST" action="{{ route('payer') }}">
                    @csrf

                    <input type="text" hidden name="commande_id" id="commande_id" value="">
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
                                value="{{$user->name}}"
                                required>
                            <div class="invalid-feedback">Please enter your full name.</div>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address *</label>
                            <input type="email"
                                class="form-control"
                                id="email"
                                name="email"
                                value="{{$user->email}}"
                                placeholder="example@email.com"
                                required>
                            <div class="invalid-feedback">Please enter a valid email address.</div>
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
                            <div class="payment-option active" id="methodeStripe">
                                <i class="bi bi-credit-card-2-front"></i>
                                <div class="payment-name">Stripe</div>
                            </div>
                            <div class="payment-option" id="methodeCash">
                                <i class="bi bi-cash-stack"></i>
                                <div class="payment-name">Cash on Delivery</div>
                            </div>
                        </div>

                        <input type="hidden" id="paymentMethod" name="methode" value="stripe">

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
                    <!-- <div class="security-badge">
                            <i class="bi bi-shield-check"></i>
                            <p>Secure Checkout - Your information is protected</p>
                        </div> -->
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')

<script>
    function selectCommande(id) {
        document.getElementById('commande_id').value = id;
    }

    document.querySelectorAll('.order-item').forEach(item => {
        item.addEventListener('click', function() {
            document.querySelectorAll('.order-item').forEach(i => i.classList.remove('selected'));
            this.classList.add('selected');
            selectCommande(this.dataset.id);
        });
    });

    // payment method toggle
    let methodeStripe = document.getElementById('methodeStripe');
    let methodeCash = document.getElementById('methodeCash');

    methodeStripe.addEventListener('click', () => {
        // document.getElementById('cardFields').classList.add('show');
        // document.getElementById('cashFields').classList.remove('show');
        document.getElementById('methodeStripe').classList.add('active');
        document.getElementById('methodeCash').classList.remove('active');
        document.getElementById('paymentMethod').value = 'stripe';
    });

    methodeCash.addEventListener('click', () => {
        // document.getElementById('cardFields').classList.remove('show');
        // document.getElementById('cashFields').classList.add('show');
        document.getElementById('methodeStripe').classList.remove('active');
        document.getElementById('methodeCash').classList.add('active');
        document.getElementById('paymentMethod').value = 'cash';
    });

    // pour changement quantity
    let buttonsQuantity = document.querySelectorAll('.quantity-btn');
    buttonsQuantity.forEach(btn => {
        // console.log('btn trouver:', btn)
        btn.addEventListener('click', function() {

            // recuperer des donnees
            let id = this.dataset.id;
            let Action = this.dataset.action;
            let url = this.closest('.checkout-container').dataset.updateUrl;

            // url from  btn click
            //  console.log('URL:', url)
            console.log('id:', id, 'action:', Action)

            //  envoyer la requet a server 
            fetch(url, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json', // laravel va return json pas html
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'X-HTTP-Method-Override': 'PUT' // this post is put de l'origine
                    },
                    body: JSON.stringify({
                        action: Action
                    })
                })

                // convertur reponse en json

                .then(response => {
                    /**  console.log('Status:', response.status)*/
                    return response.json()
                })


                // change dom
                .then(data => {
                    console.log('Data:', data)
                    document.getElementById(`quantity-${id}`).value = data.quantity;
                    document.getElementById(`quantityy-${id}`).innerHTML = data.quantity;
                    document.getElementById(`total-${id}`).innerHTML = data.total;
                })
        });
    })
</script>
@endsection