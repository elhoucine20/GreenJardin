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
                placeholder="Search for products...">
            <i class="bi bi-search search-icon"></i>
        </div>

        <!-- Category Filter Buttons -->
        <div class="category-filters">
            <button class="category-btn active" onclick="filterByCategory('all')">
                <i class="bi bi-grid-3x3-gap"></i> All Products
            </button>
            @foreach($categories as $categorie)
            <button class="category-btn" onclick="filterByCategory('plant')">
                <span>{{$categorie->icon}}</span>
                {{$categorie->name}}
            </button>
            @endforeach
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
            @foreach($produits as $produit)
            <div class="col-lg-4 col-md-6 product-item" data-name="Rose Plant" data-category="plant">
                <div class="product-card">
                    <div class="product-image-wrapper">

                        <img src="{{ asset('storage/'.$produit->image) }}"
                            alt="{{$produit->name}}"
                            class="product-image">
                        <form method="POST" action="{{ route('AddToFavorites', $produit->id) }}">
                            @csrf
                            @method('PUT')

                            @php
                            $Favorite = $favorites->contains('produit_id', $produit->id);
                            @endphp

                            @if($Favorite)
                            <button type="submit" class="btn btn-favorite product-badgee active">
                                <i class="bi bi-heart-fill"></i> Remove from Favorites
                            </button>
                            @else
                            <button type="submit" class="btn btn-favorite product-badgee">
                                <i class="bi bi-heart"></i> Add to Favorites
                            </button>
                            @endif

                        </form>
                        <span class="product-badge">{{$produit->categorie->name}} </span>
                    </div>
                    <div class="product-body">
                        <h4>{{$produit->name}}</h4>
                        <p>{{$produit->description}}</p>
                        <div class="product-buttons">
                            <button class="btn btn-view" onclick="ViewModal({{$produit->id}})">
                                <i class="bi bi-eye"></i> View Details
                            </button>
                            
                            <form method="post" action="{{route('commande-ajouter',$produit)}}">
                                @csrf
                                @method('POST')

                                <input type="number" name="produit_id" hidden value="{{$produit->id}}">
                                <input type="number" name="prix" hidden value="{{$produit->prix}}">
                                <button type="submit" class="btn btn-cart">
                                    <i class="bi bi-cart-plus"></i> Add to Cart
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- ========================================
                    PRODUCT DETAILS MODAL
                         ======================================== -->
                <div class="modal fade" id="{{$produit->id}}" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header border-0 pb-0">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body p-0">
                                <div class="row g-0">
                                    <!-- Image Side -->
                                    <div class="col-md-5" style="max-height: 260px;">
                                        <img src="{{ asset('storage/'.$produit->image) }}" alt=""
                                            class="img-fluid w-100"
                                            style="object-fit: cover; height: 260px; padding: 7px; border-radius: 12px;">
                                    </div>
                                    <!-- Info Side -->
                                    <div class="col-md-7 p-4 d-flex flex-column justify-content-between">
                                        <div>
                                            <span id="modalBadge" class="badge mb-3" style="background: #28a745; font-size: 0.8rem; padding: 6px 14px; border-radius: 20px;"></span>
                                            <h3 class="fw-semibold mb-2">{{$produit->name}}</h3>
                                            <p id="modalDescription" class="text-muted mb-4" style="line-height: 1.7;">{{$produit->description}}</p>

                                            <div class="row g-3 mb-4">
                                                <div class="col-6">
                                                    <div class="p-3 rounded-3" style="background: #f8f9fa;">
                                                        <div class="text-muted" style="font-size: 12px;">Price</div>
                                                        <div id="modalPrice" class="fw-semibold" style="font-size: 18px; color: #28a745;">{{$produit->prix}}</div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="p-3 rounded-3" style="background: #f8f9fa;">
                                                        <div class="text-muted" style="font-size: 12px;">Stock</div>
                                                        <div id="modalStock" class="fw-semibold" style="font-size: 18px;">{{$produit->stock}}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex gap-2">
                                            <button class="btn btn-cart flex-grow-1" id="modalAddToCart">
                                                <i class="bi bi-cart-plus"></i> Add to Cart
                                            </button>
                                            <button class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                                Close
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

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
<script>
    function ViewModal(idProduit) {

        document.getElementById('modalAddToCart').onclick = function() {
            // addToCart(name);
            bootstrap.Modal.getInstance(document.getElementById('productModal')).hide();
        };

        new bootstrap.Modal(document.getElementById(idProduit)).show();
    }
</script>
@endsection