@extends('layout.admin')
@section('title-and-style')

    <title>Gestion des Produits - Jardin Naturel</title>
    <link rel="stylesheet" href="{{asset('css/produits.css')}}">

@endsection

@section('main-content')

    <!-- Sidebar -->
    <aside class="sidebar" id="sidebar">

        <nav class="sidebar-nav">
            <a href="{{route('Dashbord-Admin')}}" class="nav-item ">
                <span class="nav-icon">📊</span>
                <span class="nav-text">Tableau de bord</span>
            </a>
            <a href="{{route('category-admin')}}" class="nav-item">
                <span class="nav-icon">🏷️</span>
                <span class="nav-text">Catégories</span>
                <span class="nav-badge">48</span>
            </a>
            <a href="{{route('produits-admin')}}" class="nav-item active">
                <span class="nav-icon">🌱</span>
                <span class="nav-text">Produits</span>
                <span class="nav-badge">48</span>
            </a>
            <a href="{{route('commandes-admin')}}" class="nav-item">
                <span class="nav-icon">📦</span>
                <span class="nav-text">Commandes</span>
                <span class="nav-badge">12</span>
            </a>
            <a href="{{route('utilisateurs-admin')}}" class="nav-item">
                <span class="nav-icon">👥</span>
                <span class="nav-text">Utilisateurs</span>
            </a>
            <a href="#" class="nav-item">
                <span class="nav-icon">💬</span>
                <span class="nav-text">Avis clients</span>
            </a>
            <a href="#" class="nav-item">
                <span class="nav-icon">📈</span>
                <span class="nav-text">Statistiques</span>
            </a>
            <a href="#" class="nav-item">
                <span class="nav-icon">⚙️</span>
                <span class="nav-text">Paramètres</span>
            </a>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Page Header -->
        <div class="page-header">
            <div class="header-left">
                <h2 class="page-title">Gestion des Produits</h2>
                <p class="page-subtitle">Gérez votre catalogue de produits de jardinage</p>
            </div>
            <button class="btn-primary" id="addProductBtn">
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
                <select id="categoryFilter" class="filter-select">
                    <option value="">Toutes les catégories</option>
                    <option value="graines">Graines et semences</option>
                    <option value="outils">Outils de jardinage</option>
                    <option value="engrais">Engrais et fertilisants</option>
                    <option value="pots">Pots et jardinières</option>
                    <option value="decor">Décoration jardin</option>
                </select>

                <select id="statusFilter" class="filter-select">
                    <option value="">Tous les statuts</option>
                    <option value="active">Actif</option>
                    <option value="inactive">Inactif</option>
                </select>

                <select id="sortBy" class="filter-select">
                    <option value="name-asc">Nom (A-Z)</option>
                    <option value="name-desc">Nom (Z-A)</option>
                    <option value="price-asc">Prix croissant</option>
                    <option value="price-desc">Prix décroissant</option>
                    <option value="stock-asc">Stock croissant</option>
                    <option value="stock-desc">Stock décroissant</option>
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
                    <span class="product-status active">Actif</span>
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
                            <span class="info-value stock high">{{$produit->stock}} unités</span>
                        </div>
                    </div>
                    <div class="product-actions">
                        <button class="btn-edit" onclick="editProduct({{$produit}})">
                            <span class="btn-icon">✏️</span>
                            Modifier
                        </button>
                        <form action="{{route('delete-produit',$produit)}}" method="post">
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

            <!-- Product Card 3 -->
            <div class="product-card" data-id="3" data-category="engrais" data-status="active">
                <div class="product-image">
                    <img src="https://images.unsplash.com/photo-1585320806297-9794b3e4eeae?w=400&h=300&fit=crop" alt="Engrais Naturel Bio">
                    <span class="product-status active">Actif</span>
                </div>
                <div class="product-content">
                    <div class="product-header">
                        <h3 class="product-name">Engrais Naturel Bio</h3>
                        <span class="product-category">Engrais et fertilisants</span>
                    </div>
                    <div class="product-info">
                        <div class="info-item">
                            <span class="info-label">Prix</span>
                            <span class="info-value price">12,50€</span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Stock</span>
                            <span class="info-value stock high">89 unités</span>
                        </div>
                    </div>
                    <div class="product-actions">
                        <button class="btn-edit" onclick="editProduct(3)">
                            <span class="btn-icon">✏️</span>
                            Modifier
                        </button>
                        <button class="btn-delete" onclick="confirmDelete(3)">
                            <span class="btn-icon">🗑️</span>
                            Supprimer
                        </button>
                    </div>
                </div>
            </div>

            <!-- Product Card 4 -->
            <div class="product-card" data-id="4" data-category="pots" data-status="active">
                <div class="product-image">
                    <img src="https://images.unsplash.com/photo-1485955900006-10f4d324d411?w=400&h=300&fit=crop" alt="Pot en Terre Cuite">
                    <span class="product-status active">Actif</span>
                </div>
                <div class="product-content">
                    <div class="product-header">
                        <h3 class="product-name">Pot en Terre Cuite</h3>
                        <span class="product-category">Pots et jardinières</span>
                    </div>
                    <div class="product-info">
                        <div class="info-item">
                            <span class="info-label">Prix</span>
                            <span class="info-value price">8,90€</span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Stock</span>
                            <span class="info-value stock low">12 unités</span>
                        </div>
                    </div>
                    <div class="product-actions">
                        <button class="btn-edit" onclick="editProduct(4)">
                            <span class="btn-icon">✏️</span>
                            Modifier
                        </button>
                        <button class="btn-delete" onclick="confirmDelete(4)">
                            <span class="btn-icon">🗑️</span>
                            Supprimer
                        </button>
                    </div>
                </div>
            </div>

            <!-- Product Card 5 -->
            <div class="product-card" data-id="5" data-category="graines" data-status="inactive">
                <div class="product-image">
                    <img src="https://images.unsplash.com/photo-1592419044706-39796d40f98c?w=400&h=300&fit=crop" alt="Graines de Basilic">
                    <span class="product-status inactive">Inactif</span>
                </div>
                <div class="product-content">
                    <div class="product-header">
                        <h3 class="product-name">Graines de Basilic</h3>
                        <span class="product-category">Graines et semences</span>
                    </div>
                    <div class="product-info">
                        <div class="info-item">
                            <span class="info-label">Prix</span>
                            <span class="info-value price">3,50€</span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Stock</span>
                            <span class="info-value stock low">8 unités</span>
                        </div>
                    </div>
                    <div class="product-actions">
                        <button class="btn-edit" onclick="editProduct(5)">
                            <span class="btn-icon">✏️</span>
                            Modifier
                        </button>
                        <button class="btn-delete" onclick="confirmDelete(5)">
                            <span class="btn-icon">🗑️</span>
                            Supprimer
                        </button>
                    </div>
                </div>
            </div>

            <!-- Product Card 6 -->
            <div class="product-card" data-id="6" data-category="decor" data-status="active">
                <div class="product-image">
                    <img src="https://images.unsplash.com/photo-1585320806297-9794b3e4eeae?w=400&h=300&fit=crop" alt="Nain de Jardin">
                    <span class="product-status active">Actif</span>
                </div>
                <div class="product-content">
                    <div class="product-header">
                        <h3 class="product-name">Nain de Jardin Décoratif</h3>
                        <span class="product-category">Décoration jardin</span>
                    </div>
                    <div class="product-info">
                        <div class="info-item">
                            <span class="info-label">Prix</span>
                            <span class="info-value price">15,99€</span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Stock</span>
                            <span class="info-value stock medium">34 unités</span>
                        </div>
                    </div>
                    <div class="product-actions">
                        <button class="btn-edit" onclick="editProduct(6)">
                            <span class="btn-icon">✏️</span>
                            Modifier
                        </button>
                        <button class="btn-delete" onclick="confirmDelete(6)">
                            <span class="btn-icon">🗑️</span>
                            Supprimer
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Modal Form - Add/Edit Product -->
    <div class="modal-overlay" id="productModal">
        <div class="modal-container">
            <div class="modal-header">
                <h3 class="modal-title" id="modalTitle">Ajouter un produit</h3>
                <button class="modal-close" onclick="closeModal()">✕</button>
            </div>

            <form action="{{route('create-produit')}}" method="post" class="product-form" id="productForm" enctype="multipart/form-data">

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

                            <!-- <option value="outils">Outils de jardinage</option>
                            <option value="engrais">Engrais et fertilisants</option>
                            <option value="pots">Pots et jardinières</option>
                            <option value="decor">Décoration jardin</option> -->
                        </select>
                    </div>

                    <!-- <div class="form-group">
                        <label for="productStatus">Statut *</label>
                        <select id="productStatus" required>
                            <option value="active">Actif</option>
                            <option value="inactive">Inactif</option>
                        </select>
                    </div> -->
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

    <!-- Confirmation Modal -->
    <div class="modal-overlay" id="confirmModal">
        <div class="modal-container confirm-modal">
            <div class="confirm-icon">⚠️</div>
            <h3 class="confirm-title">Confirmer la suppression</h3>
            <p class="confirm-message">Êtes-vous sûr de vouloir supprimer ce produit ? Cette action est irréversible.</p>
            <div class="modal-actions">
                <button type="button" class="btn-secondary" onclick="closeConfirmModal()">Annuler</button>
                <button type="button" class="btn-danger" onclick="deleteProduct()">Supprimer</button>
            </div>
        </div>
    </div>

    <!-- Toast Notification -->
    <div class="toast" id="toast">
        <div class="toast-icon" id="toastIcon">✓</div>
        <div class="toast-message" id="toastMessage">Action effectuée avec succès</div>
    </div>

<script>

    document.addEventListener('DOMContentLoaded', function() {
        initializeEventListeners();
        // renderProducts();
    });

    function initializeEventListeners() {
        // Bouton Ajouter un produit
        document.getElementById('addProductBtn').addEventListener('click', openAddModal);
    }

    
    function openAddModal() {

        document.getElementById('productModal').classList.add('show');
    }

    function editProduct(produit) {
        let url = "{{route('edit-produit','id')}}".replace('id',produit.id)
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
                    <button type="reset" class="btn-secondary" onclick="closeModal()">Annuler</button>
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

    
    function confirmDelete(id) {
        //     productToDelete = id;
        document.getElementById('confirmModal').classList.add('show');
    }

    function closeConfirmModal() {
        productToDelete = null;
        document.getElementById('confirmModal').classList.remove('show');
    }

    window.confirmDelete = confirmDelete;
    window.closeConfirmModal = closeConfirmModal;
</script>
@endsection
