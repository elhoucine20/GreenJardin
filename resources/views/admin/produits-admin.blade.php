@extends('layout.admin')
@section('title-and-style')

    <title>Gestion des Produits - Jardin Naturel</title>
    <link rel="stylesheet" href="{{asset('css/produits.css')}}">

@endsection

@section('main-content')

    <!-- Sidebar -->
    <!-- <x-sidebar /> -->

    <!-- Main Content -->
    <main class="main-content">
        <!-- Page Header -->
        <div class="page-header">
            <div class="header-left">
                <h2 class="page-title">Gestion des Produits</h2>
                <p class="page-subtitle">Gérez votre catalogue de produits de jardinage</p>
            </div>
            <button class="btn-primary" onclick="openAddModal()">
                <span class="btn-icon">➕</span>
                Ajouter un produit
            </button>
        </div>

        <!-- Filters and Search -->
        <div class="filters-bar">
            <div class="search-box">
                <span class="search-icon">🔍</span>
                <input type="search" id="searchInput" placeholder="Rechercher un produit...">
            </div>

            <div class="filter-group">
                <select id="categoryFilter" name="categorie" class="filter-select">
                    <option value="">Toutes les catégories</option>
                    @foreach($categories as $categorie)
                    <option value="{{$categorie->id}}">{{$categorie->name}}</option>
                    @endforeach
                    <!-- <option value="outils">Outils de jardinage</option>
                    <option value="engrais">Engrais et fertilisants</option>
                    <option value="pots">Pots et jardinières</option>
                    <option value="decor">Décoration jardin</option> -->
                </select>

                <!-- <select id="statusFilter" class="filter-select">
                    <option value="">Tous les statuts</option>
                    <option value="active">Actif</option>
                    <option value="inactive">Inactif</option>
                </select> -->

                <select id="sortBy" class="filter-select">
                    <option value="name">Nom (A-Z)</option>
                    <option value="prix">Prix croissant</option>
                    <option value="stock">Stock croissant</option>
                </select>
            </div>
        </div>

        <!-- Products Grid -->
        <div class="products-grid" id="productsGrid">
            <!-- Product Card 1 -->
            @foreach($produits as $produit)
            <div class="product-card" data-id="1" data-category="graines" data-status="active">
                <div class="product-image">
                    @if($produit->image)
                    <img src="{{ asset('storage/'.$produit->image) }}" alt="Graines de Tomates Bio">
                    @endif
                    @if($produit->stock>0)
                    <span class="product-status active">Actif</span>
                    @else
                    <span class="product-status inactive">Inactif</span>
                    @endif
                </div>
                <div class="product-content">
                    <div class="product-header">
                        <h3 class="product-name">{{$produit->name}}</h3>
                        <span class="product-category">{{$produit->categorie->name}}</span><br>
                        <span class="product-category">{{$produit->description}}</span>
                    </div>
                    <div class="product-info">
                        <div class="info-item">
                            <span class="info-label">Prix</span>
                            <span class="info-value price">{{$produit->prix}}€</span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Stock</span>
                            @if($produit->stock>0 && $produit->stock<=10 )
                            <span class="info-value stock medium">{{$produit->stock}} unités</span>
                            @elseif($produit->stock>10)
                            <span class="info-value stock high">{{$produit->stock}} unités</span>
                            @else
                            <span class="info-value stock low">0 unités</span>
                            @endif
                        </div>
                    </div>
                    <div class="product-actions">
                        <button class="btn-edit" data-produit='@json($produit)'  onclick="editProduct(this)">
                            <span class="btn-icon">✏️</span>
                            Modifier
                        </button>
                        <form action="{{route('produits.destroy',$produit)}}" method="post">
                         @csrf
                          @method('DELETE')
                            <button class="btn-delete" type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?')">
                                <span class="btn-icon">🗑️</span>
                                Supprimer
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </main>

    <!-- Modal Form - Add/Edit Product -->
    <div class="modal-overlay" id="productModal">
        <div class="modal-container">
            <div class="modal-header">
                <h3 class="modal-title" id="modalTitle">Ajouter un produit</h3>
                <button class="modal-close" onclick="closeModal()">✕</button>
            </div>

            <form action="{{route('produits.store')}}" method="post" class="product-form" id="productForm" enctype="multipart/form-data">

                @csrf
                @method('POST')
                <input type="hidden" id="productId">

                <div class="form-row">
                    <div class="form-group">
                        <label for="productName">Nom du produit *</label>
                        <input name="name" type="text" id="productName" required placeholder="Ex: Graines de Tomates Bio">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="productCategory">Catégorie *</label>
                        <select name="categorie_id" id="productCategory" required>
                            <option value="">Sélectionnez une catégorie</option>
                            @foreach($categories as $categorie)
                            <option value="{{$categorie->id}}">{{$categorie->name}}</option>
                            @endforeach
                        </select>
                    </div>

                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="productPrice">Prix (€) *</label>
                        <input name="prix" type="number" id="productPrice" step="0.01" min="0" required placeholder="Ex: 4.99">
                    </div>

                    <div class="form-group">
                        <label for="productStock">Quantité en stock *</label>
                        <input name="stock" type="number" id="productStock" min="0" required placeholder="Ex: 100">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group full-width">
                        <label for="productDescription">Description</label>
                        <textarea name="description" id="productDescription" rows="4" placeholder="Décrivez le produit..."></textarea>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group full-width">
                        <label for="productImage">Image du produit</label>
                        <div class="file-upload">
                            <input name="image" type="file" id="productImage" accept="image/*">
                            <label for="productImage" class="file-upload-label">
                                <span class="file-icon">📷</span>
                                <span class="file-text">Cliquez pour choisir une image</span>
                            </label>
                            <div class="image-preview" id="imagePreview"></div>
                        </div>
                    </div>
                </div>

                <div class="modal-actions">
                    <button type="reset" class="btn-secondary" onclick="closeModal()">Annuler</button>
                    <button type="submit" class="btn-primary">
                        <span id="submitBtnText">Ajouter le produit</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

        <!-- Modal Form - Add/Edit Product -->
    <div class="modal-overlay" id="productModalEdit">

    </div>

<script>

    function openAddModal() {

        document.getElementById('productModal').classList.add('show');
    }

    function editProduct(button) {
        const produit = JSON.parse(button.dataset.produit);
        // console.log(produit);
    
        let url = "{{route('produits.update','id')}}".replace('id',produit.id)
       let  Modal = document.getElementById('productModalEdit');
       Modal.innerHTML=`
                  <div class="modal-container">
            <div class="modal-header">
                <h3 class="modal-title" id="modalTitle">modifier un produit</h3>
                <button class="modal-close" onclick="closeModalEdit()">✕</button>
            </div>

            <form action="${url}" method="post" class="product-form" id="productForm" enctype="multipart/form-data">

                @csrf
                @method('PUT')
                <input type="hidden" id="productId">

                <div class="form-row">
                    <div class="form-group">
                        <label for="productName">Nom du produit *</label>
                        <input name="name" value="${produit.name}" type="text" id="productName" required placeholder="Ex: Graines de Tomates Bio">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="productCategory">Catégorie *</label>
                        <select name="categorie_id" id="productCategory" required>
                            <option value="${produit.categorie_id}">${produit.categorie.name}</option>
                            @foreach($categories as $categorie)
                            <option value="{{$categorie->id}}">{{$categorie->name}}</option>
                            @endforeach

                            <!-- <option value="outils">Outils de jardinage</option>
                            <option value="engrais">Engrais et fertilisants</option>
                            <option value="pots">Pots et jardinières</option>
                            <option value="decor">Décoration jardin</option> -->
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="productPrice">Prix (€) *</label>
                        <input name="prix" value="${produit.prix}" type="number" id="productPrice" step="0.01" min="0" required placeholder="Ex: 4.99">
                    </div>

                    <div class="form-group">
                        <label for="productStock">Quantité en stock *</label>
                        <input name="stock" value="${produit.stock}" type="number" id="productStock" min="0" required placeholder="Ex: 100">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group full-width">
                        <label for="productDescription">Description</label>
                        <textarea name="description" id="productDescription" rows="4" placeholder="Décrivez le produit...">${produit.description}</textarea>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group full-width">
                        <label for="productImage">Image du produit</label>
                        <div class="file-upload">
                            <input name="image" type="file" id="productImage" accept="image/*">
                            <label for="productImage" class="file-upload-label">
                                <span class="file-icon">📷</span>
                                <span class="file-text">Cliquez pour choisir une image</span>
                            </label>
                            <div class="image-preview" id="imagePreview"></div>
                        </div>
                    </div>
                </div>

                <div class="modal-actions">
                    <button type="reset" class="btn-secondary" onclick="closeModalEdit()">Annuler</button>
                    <button type="submit" class="btn-primary">
                        <span id="submitBtnText">Ajouter le produit</span>
                    </button>
                </div>
            </form>
        </div>
       `
        Modal.classList.add('show');

    }

    function closeModal() {
        document.getElementById('productModal').classList.remove('show');
    }
    function closeModalEdit() {
        document.getElementById('productModalEdit').classList.remove('show');
    }

</script>
@endsection
