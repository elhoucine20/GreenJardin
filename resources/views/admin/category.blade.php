@extends('layout.admin')
@section('title-and-style')
    <title>Gestion des Catégories - Jardin Naturel</title>
    <link rel="stylesheet" href="{{asset('css/categories.css')}}">
    
@endsection

@section('main-content')

    <!-- Sidebar -->
    <aside class="sidebar">
        <nav class="sidebar-nav">
            <a href="{{route('Dashbord-Admin')}}" class="nav-item">
                <span class="nav-icon">📊</span>
                <span class="nav-text">Tableau de bord</span>
            </a>
            <a href="{{route('category-admin')}}" class="nav-item active">
                <span class="nav-icon">🏷️</span>
                <span class="nav-text">Catégories</span>
                <span class="nav-badge" id="categoryCount">6</span>
            </a>
            <a href="{{route('produits-admin')}}" class="nav-item">
                <span class="nav-icon">🌱</span>
                <span class="nav-text">Produits</span>
            </a>
            <a href="{{route('commandes-admin')}}" class="nav-item">
                <span class="nav-icon">📦</span>
                <span class="nav-text">Commandes</span>
            </a>
            <a href="{{route('utilisateurs-admin')}}" class="nav-item">
                <span class="nav-icon">👥</span>
                <span class="nav-text">Utilisateurs</span>
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
                <h2 class="page-title">Gestion des Catégories</h2>
                <p class="page-subtitle">Organisez et gérez les catégories de votre catalogue</p>
            </div>
            <button onclick="openAddModal()" class="btn-primary" id="addCategoryBtn">
                <span class="btn-icon">➕</span>
                Ajouter une catégorie
            </button>
        </div>

        <!-- Stats Summary -->
        <div class="stats-summary">
            <div class="stat-item">
                <div class="stat-icon">📚</div>
                <div class="stat-content">
                    <span class="stat-value">{{$totalCategories}}</span>
                    <span class="stat-label">Total catégories</span>
                </div>
            </div>
            <div class="stat-item">
                <div class="stat-icon">✅</div>
                <div class="stat-content">
                    <span class="stat-value" id="activeCategories">5</span>
                    <span class="stat-label">Catégories actives</span>
                </div>
            </div>
            <div class="stat-item">
                <div class="stat-icon">📦</div>
                <div class="stat-content">
                    <span class="stat-value" id="totalProducts">248</span>
                    <span class="stat-label">Produits associés</span>
                </div>
            </div>
        </div>

        <!-- Filters Bar -->
        <div class="filters-bar">
            <div class="search-box">
                <span class="search-icon">🔍</span>
                <input type="search" id="searchInput" placeholder="Rechercher une catégorie...">
            </div>

            <div class="filter-group">
                <select id="statusFilter" class="filter-select">
                    <option value="">Tous les statuts</option>
                    <option value="active">Actives</option>
                    <option value="inactive">Inactives</option>
                </select>

                <select id="sortBy" class="filter-select">
                    <option value="name-asc">Nom (A-Z)</option>
                    <option value="name-desc">Nom (Z-A)</option>
                    <option value="products-desc">Plus de produits</option>
                    <option value="products-asc">Moins de produits</option>
                </select>
            </div>
        </div>

        <!-- Categories Grid -->
        <div class="categories-grid" id="categoriesGrid">
            <!-- Category Card 1 -->
            @foreach($categories as $categorie)
            <div class="category-card" data-id="1" data-status="active">
                <div class="card-header">
                    <div class="category-icon">{{$categorie->icon}}</div>
                    <span class="category-status active">Actif</span>
                </div>
                <div class="card-content">
                    <h3 class="category-name">{{$categorie->name}}</h3>
                    <p class="category-description">{{$categorie->description}}</p>
                    <div class="category-stats">
                        <div class="stat-badge">
                            <span class="badge-icon">📦</span>
                            <span class="badge-text">78 produits</span>
                        </div>
                    </div>
                </div>
                <div class="card-actions">
                    <button class="btn-edit" onclick="editCategory({{$categorie}})">
                        <span class="btn-icon">✏️</span>
                        Modifier
                    </button>
                    <form action="{{route('delete-categorie',$categorie)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="text" hidden value="$categorie->id">
                        <button class="btn-delete" type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette catégorie ?')">
                            <span class="btn-icon">🗑️</span>
                            Supprimer
                        </button>
                    </form>
                </div>
            </div>


            <!-- Modal for edit categorie  -->
            <div class="modal-overlay" id="categoryModalEdit">

            </div>
            @endforeach



            <!-- Category Card 6 -->
            <div class="category-card" data-id="6" data-status="inactive">
                <div class="card-header">
                    <div class="category-icon">💧</div>
                    <span class="category-status inactive">Inactif</span>
                </div>
                <div class="card-content">
                    <h3 class="category-name">Arrosage et Irrigation</h3>
                    <p class="category-description">Systèmes d'arrosage automatique et équipements pour optimiser la gestion de l'eau.</p>
                    <div class="category-stats">
                        <div class="stat-badge">
                            <span class="badge-icon">📦</span>
                            <span class="badge-text">11 produits</span>
                        </div>
                    </div>
                </div>
                <div class="card-actions">
                    <button class="btn-edit" onclick="editCategory(6)">
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
    </main>

    <!-- Modal Form - Add/Edit Category -->
    <div class="modal-overlay" id="categoryModal">
        <div class="modal-container">
            <div class="modal-header">
                <h3 class="modal-title" id="modalTitle">Ajouter une catégorie</h3>
                <button class="modal-close" onclick="closeModal()">✕</button>
            </div>

            <form action="{{route('create-categorie')}}" method="post" class="category-form" id="categoryForm">
                @csrf
                @method('POST')
                <!-- <input type="hidden" id="categoryId"> -->

                <div class="form-group">
                    <label for="categoryName">Nom de la catégorie *</label>
                    <input id="categoryName" name="categorie_name" type="text" required placeholder="Ex: Graines et Semences">
                </div>

                <div class="form-group">
                    <label for="categoryIcon">Icône (emoji) *</label>
                    <div class="icon-selector">
                        <input name="emoji" type="text" id="categoryIcon" required placeholder="Choisissez un emoji" maxlength="2">
                        <div class="icon-suggestions">
                            <button type="button" class="icon-btn" onclick="selectIcon('🌱')">🌱</button>
                            <button type="button" class="icon-btn" onclick="selectIcon('🔨')">🔨</button>
                            <button type="button" class="icon-btn" onclick="selectIcon('🌾')">🌾</button>
                            <button type="button" class="icon-btn" onclick="selectIcon('🪴')">🪴</button>
                            <button type="button" class="icon-btn" onclick="selectIcon('🏡')">🏡</button>
                            <button type="button" class="icon-btn" onclick="selectIcon('💧')">💧</button>
                            <button type="button" class="icon-btn" onclick="selectIcon('🌻')">🌻</button>
                            <button type="button" class="icon-btn" onclick="selectIcon('🌷')">🌷</button>
                            <button type="button" class="icon-btn" onclick="selectIcon('🌹')">🌹</button>
                            <button type="button" class="icon-btn" onclick="selectIcon('🍃')">🍃</button>
                            <button type="button" class="icon-btn" onclick="selectIcon('🌿')">🌿</button>
                            <button type="button" class="icon-btn" onclick="selectIcon('☘️')">☘️</button>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="categoryDescription">Description *</label>
                    <textarea name="description" id="categoryDescription" rows="4" required placeholder="Décrivez cette catégorie..."></textarea>
                </div>

                <!-- <div class="form-group">
                    <label for="categoryStatus">Statut *</label>
                    <select id="categoryStatus" required>
                        <option value="active">Actif</option>
                        <option value="inactive">Inactif</option>
                    </select>
                </div> -->

                <div class="modal-actions">
                    <button type="button" class="btn-secondary" onclick="closeModal()">Annuler</button>
                    <button type="submit" class="btn-primary">
                        <span id="submitBtnText">Ajouter la catégorie</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Confirmation Modal -->
    <div class="modal-overlay" id="confirmModal">
        <div class="modal-container confirm-modal">
            <div class="confirm-icon">⚠️</div>
            <h3 class="confirm-title">Confirmer la suppression</h3>
            <p class="confirm-message">Êtes-vous sûr de vouloir supprimer cette catégorie ? Les produits associés ne seront pas supprimés mais n'auront plus de catégorie.</p>
            <div class="modal-actions">
                <button type="button" class="btn-secondary" onclick="closeConfirmModal()">Annuler</button>
                <button type="button" class="btn-danger" onclick="deleteCategory()">Supprimer</button>
            </div>
        </div>
    </div>

    <!-- Toast Notification -->
    <div class="toast" id="toast">
        <div class="toast-icon" id="toastIcon">✓</div>
        <div class="toast-message" id="toastMessage">Action effectuée avec succès</div>
    </div>

<script>
    // ========================================
    // MODAL - AJOUTER UNE CATÉGORIE
    // ========================================
    function openAddModal() {
        // document.getElementById('categoryForm').reset();
        document.getElementById('categoryModal').classList.add('show');
    }

    // ========================================
    // MODAL - MODIFIER UNE CATÉGORIE
    // ========================================
    function editCategory(categorie) {
        // if (!category) return;
        let id = categorie.id;
        let url = "{{ route('edit-categorie','id') }}".replace('id', categorie.id);

        let Modal = document.getElementById('categoryModalEdit');
        Modal.innerHTML = `
            <div class="modal-container">
            <div class="modal-header">
                <h3 class="modal-title" id="modalTitle">Modifier la catégorie</h3>
                <button class="modal-close" onclick="closeModalEdit()">✕</button>
            </div>
            
            <form action="${url}" method="POST" class="category-form" >
                @csrf
                @method('PUT')
                
                <div class="form-group">
                    <label for="categoryNameEdit">Nom de la catégorie *</label>
                    <input id="categoryNameEdit" value="${categorie.name}" name="categorie_name" type="text"  required placeholder="Ex: Graines et Semences">
                </div>

                <div class="form-group">
                    <label for="categoryIconEdit">Icône (emoji) *</label>
                    <div class="icon-selector">
                        <input name="emoji" value="${categorie.icon}" type="text" id="categoryIconEdit" required placeholder="Choisissez un emoji" maxlength="2">
                        <div class="icon-suggestions">
                            <button type="button" class="icon-btn" onclick="selectIcon('🌱')">🌱</button>
                            <button type="button" class="icon-btn" onclick="selectIcon('🔨')">🔨</button>
                            <button type="button" class="icon-btn" onclick="selectIcon('🌾')">🌾</button>
                            <button type="button" class="icon-btn" onclick="selectIcon('🪴')">🪴</button>
                            <button type="button" class="icon-btn" onclick="selectIcon('🏡')">🏡</button>
                            <button type="button" class="icon-btn" onclick="selectIcon('💧')">💧</button>
                            <button type="button" class="icon-btn" onclick="selectIcon('🌻')">🌻</button>
                            <button type="button" class="icon-btn" onclick="selectIcon('🌷')">🌷</button>
                            <button type="button" class="icon-btn" onclick="selectIcon('🌹')">🌹</button>
                            <button type="button" class="icon-btn" onclick="selectIcon('🍃')">🍃</button>
                            <button type="button" class="icon-btn" onclick="selectIcon('🌿')">🌿</button>
                            <button type="button" class="icon-btn" onclick="selectIcon('☘️')">☘️</button>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="categoryDescriptionEdit">Description *</label>
                    <textarea name="description" id="categoryDescriptionEdit" rows="4" required placeholder="Décrivez cette catégorie...">${categorie.description}</textarea>
                </div>

                <div class="modal-actions">
                    <button type="button" class="btn-secondary" onclick="closeModalEdit()">Annuler</button>
                    <button type="submit" class="btn-primary">
                        <span id="submitBtnText">Enregistrer les modifications</span>
                    </button>
                </div>
            </form>
        </div>
    `
        Modal.classList.add('show');

    }


    function closeModal() {
        document.getElementById('categoryModal').classList.remove('show');
    }

    function closeModalEdit() {
        document.getElementById('categoryModalEdit').classList.remove('show');
    }


    function selectIcon(icon) {
        document.getElementById('categoryIcon').value = icon;
    }


    function updateCategory(id, data) {

        closeModalEdit();

    }


    function confirmDelete(id) {
        // categoryToDelete = id;
        document.getElementById('confirmModal').classList.add('show');
    }


    function closeConfirmModal() {
        // categoryToDelete = null;
        document.getElementById('confirmModal').classList.remove('show');
    }


    function deleteCategory() {

        closeConfirmModal();

    }
</script>
@endsection

