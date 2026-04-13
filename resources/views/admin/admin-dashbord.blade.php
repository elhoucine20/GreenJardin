@extends('layout.admin')
@section('title-and-style')
    <title>Dashboard Admin - Jardin Naturel</title>
    <link rel="stylesheet" href="{{asset('css/admin_dashbord.css')}}">
@endsection

@section('main-content')
    <!-- Sidebar -->
    <!-- <x-sidebar /> -->


    <!-- Main Content -->
    <main class="main-content">
        <div class="content-header">
            <div>
                <h2 class="page-title">Tableau de bord</h2>
                <p class="page-subtitle">Bienvenue, voici un aperçu de votre activité</p>
            </div>
            <div class="header-actions">
                <a href="{{route('produits.store')}}">
                </a>
                <button id="addProductBtn" class="btn-primary">+ Nouveau produit</button>

            </div>
        </div>

        <!-- Stats Cards -->
        <section class="stats-grid">
            <div class="stat-card stat-card-green">
                <div class="stat-icon">🌱</div>
                <div class="stat-content">
                    <!-- 'produitsActif','chiffreDaffiare','countUsers','countAdmins','countClients' -->
                    <h3 class="stat-value">{{$produitsActif}}</h3>
                    <p class="stat-label">Produits actifs</p>
                    <!-- <div class="stat-trend positive">
                        <span class="trend-icon">↑</span>
                        <span class="trend-value">+12%</span>
                        <span class="trend-label">vs mois dernier</span>
                    </div> -->
                </div>
            </div>

            <div class="stat-card stat-card-blue">
                <div class="stat-icon">📦</div>
                <div class="stat-content">
                    <h3 class="stat-value">{{$countCommande}}</h3>
                    <p class="stat-label">Total Commandes</p>
  
                </div>
            </div>

            <div class="stat-card stat-card-purple">
                <div class="stat-icon">👥</div>
                <div class="stat-content">
                    <h3 class="stat-value">{{$countUsers}}</h3>
                    <p class="stat-label">Utilisateurs inscrits</p>
                    <div class="stat-trend positive">

                         <p><span> {{$countAdmins}} admins</span></p><br>
                         <p><span>{{$countClients}} clients</span></p>
                    </div>
                </div>
            </div>

            <div class="stat-card stat-card-orange">
                <div class="stat-icon">💰</div>
                <div class="stat-content">
                    <h3 class="stat-value">{{$chiffreDaffiare}}$</h3>
                    <p class="stat-label">Chiffre d'affaires</p>
                </div>
            </div>
        </section>
    </main>

    <!-- formulaire de creation un produit -->
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



<script>
    document.addEventListener('DOMContentLoaded', function() {
        initializeEventListeners();
    });

    function initializeEventListeners() {
        // Bouton Ajouter un produit
        document.getElementById('addProductBtn').addEventListener('click', openAddModal);
    }

    function openAddModal() {
        document.getElementById('productModal').classList.add('show');
    }

    // function editProduct(id) {
    //     document.getElementById('productModal').classList.add('show');
    // }

    function closeModal() {
        document.getElementById('productModal').classList.remove('show');
    }

    // function confirmDelete(id) {
    //     //     productToDelete = id;
    //     document.getElementById('confirmModal').classList.add('show');
    // }

    // function closeConfirmModal() {
    //     productToDelete = null;
    //     document.getElementById('confirmModal').classList.remove('show');
    // }


    // window.confirmDelete = confirmDelete;
    // window.deleteProduct = deleteProduct;
    // window.closeModal = closeModal;
    // window.closeConfirmModal = closeConfirmModal;
</script>
@endsection