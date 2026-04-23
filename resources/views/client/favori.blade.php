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
            You have <strong id="favoriteNumber">{{$favorites->count()}}</strong> favorite products
        </div>
        <aside>
            @if(session('deleted'))
            <p style="color: red;">{{session('deleted')}}</p>
            @endif
        </aside>

        <div class="row" id="favoritesContainer">
            <!-- Favorite 1: Rose Plant -->
            @foreach($favorites as $favorite)
            @if($favorite->produit)
            <div class="col-lg-4 col-md-6 favorite-item" data-id="1" data-name="Rose Plant">
                <div class="favorite-card">
                    <div class="product-image-wrapper">
                        <img src="{{ asset('storage/'.$favorite->produit->image) }}"
                            alt=" Plant"
                            class="product-image">
                        <span class="favorite-badge">
                            <i class="bi bi-heart-fill"></i> Favorite
                        </span>
                    </div>
                    <div class="product-body">
                        <h4>{{$favorite->produit->name}}</h4>
                        <p>{{$favorite->produit->description}}</p>
                        <div class="product-buttons">
                            <button class="btn btn-view" data-id="{{$favorite->id}}" onclick="ViewModal(this.dataset.id)">
                                <i class="bi bi-eye"></i> View Details
                            </button>

                            <form method="POST" action="{{ route('AddToFavorites', $favorite->produit->id) }}">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-remove">
                                    <i class="bi bi-heart-slash"></i> Remove
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ========================================
                    PRODUCT DETAILS MODAL
                         ======================================== -->
            <div class="modal fade" id="{{$favorite->id}}" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header border-0 pb-0">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body p-0">
                            <div class="row g-0">
                                <!-- Image Side -->
                                <div class="col-md-5" style="max-height: 260px;">
                                    <img src="{{ asset('storage/'.$favorite->produit->image) }}" alt="{{$favorite->produit->name}}"
                                        class="img-fluid w-100"
                                        style="object-fit: cover; height: 260px; padding: 7px; border-radius: 12px;">
                                </div>
                                <!-- Info Side -->
                                <div class="col-md-7 p-4 d-flex flex-column justify-content-between">
                                    <div>
                                        <span id="modalBadge" class="badge mb-3" style="background: #28a745; font-size: 0.8rem; padding: 6px 14px; border-radius: 20px;"></span>
                                        <h3 class="fw-semibold mb-2">{{$favorite->produit->name}}</h3>
                                        <p id="modalDescription" class="text-muted mb-4" style="line-height: 1.7;">{{$favorite->produit->description}}</p>

                                        <div class="row g-3 mb-4">
                                            <div class="col-6">
                                                <div class="p-3 rounded-3" style="background: #f8f9fa;">
                                                    <div class="text-muted" style="font-size: 12px;">Price</div>
                                                    <div id="modalPrice" class="fw-semibold" style="font-size: 18px; color: #28a745;">{{$favorite->produit->prix}}</div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="p-3 rounded-3" style="background: #f8f9fa;">
                                                    <div class="text-muted" style="font-size: 12px;">Stock</div>
                                                    <div id="modalStock" class="fw-semibold" style="font-size: 18px;">{{$favorite->produit->stock}}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex gap-2">


                                        @if($favorite->produit->stock <= 0)
                                            <button type="button" class="btn btn-decart">
                                            <i class="bi bi-cart-plus"></i> n'exist pas
                                            </button>
                                            <button class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                                Close
                                            </button>
                                            @else

                                            <form method="post" action="{{route('commande-ajouter',$favorite->produit)}}">
                                                @csrf
                                                @method('POST')

                                                <input type="number" name="produit_id" hidden value="{{$favorite->produit->id}}">
                                                <input type="number" name="prix" hidden value="{{$favorite->produit->prix}}">

                                                @if($favorite->produit->commandes()->where('status', 'pendding')->exists())
                                                <button id="modalAddToCart" type="button" class="btn btn-decart">
                                                    <i class="bi bi-cart-plus"></i> deja to Cart
                                                </button>
                                                @else
                                                <button id="modalAddToCart" type="submit" class="btn btn-cart">
                                                    <i class="bi bi-cart-plus"></i> Add to Cart
                                                </button>
                                                @endif
                                                <button class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                                    Close
                                                </button>
                                            </form>
                                            @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <p>Aucun Produit</p>
            @endif
            @endforeach
            
            
        </div>
        {{ $favorites->links('pagination::bootstrap-5') }}

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
    function ViewModal(idProduit) {

        document.getElementById('modalAddToCart').onclick = function() {
            addToCart(name);
            bootstrap.Modal.getInstance(document.getElementById('productModal')).hide();
        };

        new bootstrap.Modal(document.getElementById(idProduit)).show();
    }
</script>
@endsection