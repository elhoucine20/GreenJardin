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
                <button class="btn-secondary">Exporter</button>
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
                    <h3 class="stat-value">248</h3>
                    <p class="stat-label">Produits actifs</p>
                    <div class="stat-trend positive">
                        <span class="trend-icon">↑</span>
                        <span class="trend-value">+12%</span>
                        <span class="trend-label">vs mois dernier</span>
                    </div>
                </div>
            </div>

            <div class="stat-card stat-card-blue">
                <div class="stat-icon">📦</div>
                <div class="stat-content">
                    <h3 class="stat-value">156</h3>
                    <p class="stat-label">Commandes ce mois</p>
                    <div class="stat-trend positive">
                        <span class="trend-icon">↑</span>
                        <span class="trend-value">+8%</span>
                        <span class="trend-label">vs mois dernier</span>
                    </div>
                </div>
            </div>

            <div class="stat-card stat-card-purple">
                <div class="stat-icon">👥</div>
                <div class="stat-content">
                    <h3 class="stat-value">1,847</h3>
                    <p class="stat-label">Utilisateurs inscrits</p>
                    <div class="stat-trend positive">
                        <span class="trend-icon">↑</span>
                        <span class="trend-value">+24%</span>
                        <span class="trend-label">vs mois dernier</span>
                    </div>
                </div>
            </div>

            <div class="stat-card stat-card-orange">
                <div class="stat-icon">💰</div>
                <div class="stat-content">
                    <h3 class="stat-value">24,580€</h3>
                    <p class="stat-label">Chiffre d'affaires</p>
                    <div class="stat-trend negative">
                        <span class="trend-icon">↓</span>
                        <span class="trend-value">-3%</span>
                        <span class="trend-label">vs mois dernier</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- Actions rapides et Activités -->
        <section class="two-column-section">
            <!-- Actions rapides -->
            <div class="quick-actions">
                <h3 class="section-title">Actions rapides</h3>
                <div class="action-grid">
                    <button class="action-card">
                        <span class="action-icon">➕</span>
                        <span class="action-text">Ajouter un produit</span>
                    </button>
                    <button class="action-card">
                        <span class="action-icon">📋</span>
                        <span class="action-text">Voir les commandes</span>
                    </button>
                    <button class="action-card">
                        <span class="action-icon">👤</span>
                        <span class="action-text">Gérer les clients</span>
                    </button>
                    <button class="action-card">
                        <span class="action-icon">📊</span>
                        <span class="action-text">Rapports détaillés</span>
                    </button>
                </div>
            </div>

            <!-- Activités récentes -->
            <div class="recent-activities">
                <h3 class="section-title">Activités récentes</h3>
                <div class="activity-timeline">
                    <div class="activity-item">
                        <div class="activity-dot activity-green"></div>
                        <div class="activity-content">
                            <p class="activity-text"><strong>Nouvelle commande</strong> #12845</p>
                            <span class="activity-time">Il y a 5 minutes</span>
                        </div>
                    </div>
                    <div class="activity-item">
                        <div class="activity-dot activity-blue"></div>
                        <div class="activity-content">
                            <p class="activity-text"><strong>Nouvel utilisateur</strong> Marie Laurent</p>
                            <span class="activity-time">Il y a 23 minutes</span>
                        </div>
                    </div>
                    <div class="activity-item">
                        <div class="activity-dot activity-orange"></div>
                        <div class="activity-content">
                            <p class="activity-text"><strong>Produit mis à jour</strong> Engrais bio premium</p>
                            <span class="activity-time">Il y a 1 heure</span>
                        </div>
                    </div>
                    <div class="activity-item">
                        <div class="activity-dot activity-purple"></div>
                        <div class="activity-content">
                            <p class="activity-text"><strong>Avis client</strong> 5 étoiles reçues</p>
                            <span class="activity-time">Il y a 2 heures</span>
                        </div>
                    </div>
                    <div class="activity-item">
                        <div class="activity-dot activity-green"></div>
                        <div class="activity-content">
                            <p class="activity-text"><strong>Commande expédiée</strong> #12840</p>
                            <span class="activity-time">Il y a 3 heures</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Dernières commandes -->
        <section class="orders-section">
            <div class="section-header">
                <h3 class="section-title">Dernières commandes</h3>
                <a href="#" class="view-all-link">Voir tout →</a>
            </div>

            <div class="table-container">
                <table class="orders-table">
                    <thead>
                        <tr>
                            <th>N° Commande</th>
                            <th>Client</th>
                            <th>Produits</th>
                            <th>Date</th>
                            <th>Montant</th>
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="order-id">#12845</td>
                            <td>
                                <div class="customer-info">
                                    <div class="customer-avatar">PD</div>
                                    <span>Pierre Dubois</span>
                                </div>
                            </td>
                            <td>3 articles</td>
                            <td>08 Fév 2026</td>
                            <td class="amount">145,90€</td>
                            <td><span class="badge badge-pending">En attente</span></td>
                            <td>
                                <button class="action-btn">👁️</button>
                                <button class="action-btn">✏️</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="order-id">#12844</td>
                            <td>
                                <div class="customer-info">
                                    <div class="customer-avatar">ML</div>
                                    <span>Marie Laurent</span>
                                </div>
                            </td>
                            <td>5 articles</td>
                            <td>08 Fév 2026</td>
                            <td class="amount">289,50€</td>
                            <td><span class="badge badge-processing">En cours</span></td>
                            <td>
                                <button class="action-btn">👁️</button>
                                <button class="action-btn">✏️</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="order-id">#12843</td>
                            <td>
                                <div class="customer-info">
                                    <div class="customer-avatar">JM</div>
                                    <span>Jean Martin</span>
                                </div>
                            </td>
                            <td>2 articles</td>
                            <td>07 Fév 2026</td>
                            <td class="amount">78,00€</td>
                            <td><span class="badge badge-shipped">Expédiée</span></td>
                            <td>
                                <button class="action-btn">👁️</button>
                                <button class="action-btn">✏️</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="order-id">#12842</td>
                            <td>
                                <div class="customer-info">
                                    <div class="customer-avatar">SB</div>
                                    <span>Sophie Bernard</span>
                                </div>
                            </td>
                            <td>7 articles</td>
                            <td>07 Fév 2026</td>
                            <td class="amount">412,30€</td>
                            <td><span class="badge badge-delivered">Livrée</span></td>
                            <td>
                                <button class="action-btn">👁️</button>
                                <button class="action-btn">✏️</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="order-id">#12841</td>
                            <td>
                                <div class="customer-info">
                                    <div class="customer-avatar">LR</div>
                                    <span>Lucas Rousseau</span>
                                </div>
                            </td>
                            <td>1 article</td>
                            <td>06 Fév 2026</td>
                            <td class="amount">45,00€</td>
                            <td><span class="badge badge-cancelled">Annulée</span></td>
                            <td>
                                <button class="action-btn">👁️</button>
                                <button class="action-btn">✏️</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
    </main>
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

    function editProduct(id) {
        document.getElementById('productModal').classList.add('show');
    }

    function closeModal() {
        document.getElementById('productModal').classList.remove('show');
    }

    // ========================================
    // CONFIRMATION DE SUPPRESSION
    // ========================================
    function confirmDelete(id) {
        //     productToDelete = id;
        document.getElementById('confirmModal').classList.add('show');
    }

    function closeConfirmModal() {
        productToDelete = null;
        document.getElementById('confirmModal').classList.remove('show');
    }


    window.confirmDelete = confirmDelete;
    // window.deleteProduct = deleteProduct;
    // window.closeModal = closeModal;
    window.closeConfirmModal = closeConfirmModal;
</script>
@endsection