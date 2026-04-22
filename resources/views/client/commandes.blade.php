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
     
            You have <strong id="orderNumber">{{$totalCommandes}}</strong> orders
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
                        <div class="order-total">Total: ${{$totalPaids}}</div>
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

                        @if($paids)
                        @foreach($paids as $commande)
                        <div class="product-item">
                            <div class="product-image">
                                <img src="{{asset('storage/'.$commande->produit->image)}}"
                                    alt="connexion-error">
                            </div>
                            <div class="product-info">
                                <div class="product-name">{{$commande->produit->name}}</div>
                                <div class="product-quantity">Quantity: {{$commande->quantity}}</div>
                                <div class="product-quantity">Prix: ${{$commande->produit->prix}}</div>
                            </div>
                            <!-- <div class="product-price">prix: ${{$commande->produit->prix}} </div> -->
                            <div class="product-price">${{$commande->total}}</div>
                        </div>
                        @endforeach
                        @endif


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
                        <div class="order-total">Total: ${{$totalPenddings}}</div>
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
                        @if($penddings)
                        @foreach($penddings as $commande)
                        <div class="product-item">
                            <div class="product-image">
                                <img src="{{asset('storage/'.$commande->produit->image)}}"
                                    alt="connexion error">
                            </div>
                            <div class="product-info">
                                <div class="product-name">{{$commande->produit->name}}</div>
                                <div class="product-quantity">Quantity: {{$commande->quantity}}</div>
                                <div class="product-quantity">Prix: ${{$commande->produit->prix}}</div>
                            </div>
                            <!-- <div class="product-price">${{$commande->produit->prix}}</div> -->
                            <div class="product-price">${{$commande->total}}</div>
                        </div>
                        @endforeach
                        @endif
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

    // toggle for delaits de commandes 
    function toggleOrderDetails(orderId) {
        const detailsElement = document.getElementById(`details-${orderId}`);
        const button = event.currentTarget;

        // Toggle show class
        detailsElement.classList.toggle('show');

        // Update button text
        if (detailsElement.classList.contains('show')) {
            button.innerHTML = '<i class="bi bi-chevron-up"></i> Hide Details';
        } else {
            button.innerHTML = '<i class="bi bi-chevron-down"></i> View Details';
        }

        // console.log(`Toggle for order ${orderId}`);
    }

</script>
@endsection