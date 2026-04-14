@extends('layout.admin')
@section('title-and-style')

<title>Gestion des Utilisateurs - Jardin Naturel</title>
<link rel="stylesheet" href="{{asset('css/utilisateurs.css')}}">

@endsection

@section('main-content')

<!-- Sidebar -->
<!-- <x-sidebar /> -->

<!-- Main Content -->
<main class="main-content">
    <!-- Page Header -->
    @if(session('succes'))
    <div class="alert alert-success" style="color: green; padding:10px;">
        <h3> {{ session('succes') }}</h3>

    </div>
    @endif

        @if(session('error'))
    <div class="alert alert-success" style="color: red; padding:10px;">
        <h3> {{ session('error') }}</h3>

    </div>
    @endif
    <div class="page-header">
        <div class="header-left">
            <h2 class="page-title">Gestion des Utilisateurs</h2>
            <p class="page-subtitle">Gérez les comptes et les permissions de vos utilisateurs</p>
        </div>
        <!-- <button class="btn-primary" id="addUserBtn">
            <span class="btn-icon">➕</span>
            Ajouter un utilisateur
        </button> -->
    </div>

    <!-- Stats Summary -->
    <div class="stats-summary">
        <div class="stat-card">
            <div class="stat-icon total">👥</div>
            <div class="stat-content">
                <span class="stat-value" id="totalUsers">{{$countUsers}}</span>
                <span class="stat-label">Total utilisateurs</span>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon admins">🔑</div>
            <div class="stat-content">
                <span class="stat-value" id="adminCount">{{$countAdmins}}</span>
                <span class="stat-label">Administrateurs</span>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon clients">👤</div>
            <div class="stat-content">
                <span class="stat-value" id="clientCount">{{$countClients}}</span>
                <span class="stat-label">Clients</span>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon active">✅</div>
            <div class="stat-content">
                <span class="stat-value" id="activeCount">{{$countUsers}}</span>
                <span class="stat-label">Comptes actifs</span>
            </div>
        </div>
    </div>

    <!-- Filters Bar -->
    <!-- <div class="filters-bar">
            <div class="search-box">
                <span class="search-icon">🔍</span>
                <input type="search" id="searchInput" placeholder="Rechercher par nom ou email...">
            </div>

            <div class="filter-group">
                <select id="roleFilter" class="filter-select">
                    <option value="">Tous les rôles</option>
                    <option value="admin">Administrateurs</option>
                    <option value="client">Clients</option>
                </select>

                <select id="statusFilter" class="filter-select">
                    <option value="">Tous les statuts</option>
                    <option value="active">Actifs</option>
                    <option value="blocked">Bloqués</option>
                </select>

                <select id="sortBy" class="filter-select">
                    <option value="name-asc">Nom (A-Z)</option>
                    <option value="name-desc">Nom (Z-A)</option>
                    <option value="date-desc">Plus récents</option>
                    <option value="date-asc">Plus anciens</option>
                </select>
            </div>
        </div> -->

    <!-- Users Grid -->
    <div class="users-grid" id="usersGrid">
        <!-- User Card 1 -->
        @foreach($users as $user)
        <div class="user-card" data-id="1" data-role="admin" data-status="active">
            <div class="card-header">
                @if($user->role == 'client')
                <div class="user-avatar client">{{strtoupper(substr($user->name, 0, 2))}}</div>
                @else
                <div class="user-avatar admin">{{strtoupper(substr($user->name, 0, 2))}}</div>
                @endif
                <div class="user-badges">
                    <span class="role-badge admin">{{$user->role}}</span>
                    @if($user->statu == 'active')
                    <span class="status-badge active">{{$user->statu}}</span>
                    @else
                    <span class="status-badge blocked">{{$user->statu}}</span>
                    @endif
                </div>
            </div>
            <div class="card-body">
                <h3 class="user-name">{{$user->name}}</h3>
                <p class="user-email">{{$user->email}}</p>
                <div class="user-meta">
                    <span class="meta-item">
                        <span class="meta-icon">📅</span>
                        Inscrit le {{$user->created_at}}
                    </span>
                </div>
            </div>
            <div class="card-actions">
                 @if($user->statu == 'active')
                <form method="post" action="{{route('userBloquer',$user->id)}}">
                    @csrf
                    @method('PUT')

                    <button type="submit" class="btn-view">
                        <span class="btn-icon">🔒</span>
                        Bloquer
                    </button>
                </form>
                @else
                <form method="post" action="{{route('userDeBloquer',$user->id)}}">
                    @csrf
                    @method('PUT')

                    <button type="submit" class="btn-view">
                        <span class="btn-icon">🔒</span>
                        DeBloquer
                    </button>
                </form>
                @endif

                <!-- <button class="btn-edit">
                    <span class="btn-icon">✏️</span>
                    Modifier
                </button> -->
                <!-- <button class="btn-more" onclick="toggleUserMenu(1)">&vellip; </button> -->
            </div>
            <!-- <div class="dropdown-menu" id="menu-1">
                    <button onclick="toggleUserStatus(1)">
                        <span>🔒</span> Bloquer
                    </button>
                    <button onclick="confirmDeleteUser(1)">
                        <span>🗑️</span> Supprimer
                    </button>
                </div> -->
        </div>
        @endforeach

        <!-- User Card 2 -->
        <!-- <div class="user-card" data-id="2" data-role="admin" data-status="active">
                <div class="card-header">
                    <div class="user-avatar admin">ML</div>
                    <div class="user-badges">
                        <span class="role-badge admin">Admin</span>
                        <span class="status-badge active">Actif</span>
                    </div>
                </div>
                <div class="card-body">
                    <h3 class="user-name">Marc Laurent</h3>
                    <p class="user-email">marc.laurent@email.fr</p>
                    <div class="user-meta">
                        <span class="meta-item">
                            <span class="meta-icon">📅</span>
                            Inscrit le 20 Jan 2024
                        </span>
                    </div>
                </div>
                <div class="card-actions">
                    <button class="btn-view" onclick="viewUserProfile(2)">
                        <span class="btn-icon">👁️</span>
                        Profil
                    </button>
                    <button class="btn-edit" onclick="editUser(2)">
                        <span class="btn-icon">✏️</span>
                        Modifier
                    </button>
                    <button class="btn-more" onclick="toggleUserMenu(2)">⋮</button>
                </div>
                <div class="dropdown-menu" id="menu-2">
                    <button onclick="toggleUserStatus(2)">
                        <span>🔒</span> Bloquer
                    </button>
                    <button onclick="confirmDeleteUser(2)">
                        <span>🗑️</span> Supprimer
                    </button>
                </div>
            </div> -->

        <!-- User Card 3 -->
        <!-- <div class="user-card" data-id="3" data-role="client" data-status="active">
                <div class="card-header">
                    <div class="user-avatar client">PD</div>
                    <div class="user-badges">
                        <span class="role-badge client">Client</span>
                        <span class="status-badge active">Actif</span>
                    </div>
                </div>
                <div class="card-body">
                    <h3 class="user-name">Pierre Dubois</h3>
                    <p class="user-email">pierre.dubois@email.fr</p>
                    <div class="user-meta">
                        <span class="meta-item">
                            <span class="meta-icon">📅</span>
                            Inscrit le 05 Fév 2024
                        </span>
                    </div>
                </div>
                <div class="card-actions">
                    <button class="btn-view" onclick="viewUserProfile(3)">
                        <span class="btn-icon">👁️</span>
                        Profil
                    </button>
                    <button class="btn-edit" onclick="editUser(3)">
                        <span class="btn-icon">✏️</span>
                        Modifier
                    </button>
                    <button class="btn-more" onclick="toggleUserMenu(3)">⋮</button>
                </div>
                <div class="dropdown-menu" id="menu-3">
                    <button onclick="toggleUserStatus(3)">
                        <span>🔒</span> Bloquer
                    </button>
                    <button onclick="confirmDeleteUser(3)">
                        <span>🗑️</span> Supprimer
                    </button>
                </div>
            </div> -->

        <!-- User Card 4 -->
        <!-- <div class="user-card" data-id="4" data-role="client" data-status="blocked">
                <div class="card-header">
                    <div class="user-avatar client">SB</div>
                    <div class="user-badges">
                        <span class="role-badge client">Client</span>
                        <span class="status-badge blocked">Bloqué</span>
                    </div>
                </div>
                <div class="card-body">
                    <h3 class="user-name">Sophie Bernard</h3>
                    <p class="user-email">sophie.bernard@email.fr</p>
                    <div class="user-meta">
                        <span class="meta-item">
                            <span class="meta-icon">📅</span>
                            Inscrit le 10 Fév 2024
                        </span>
                    </div>
                </div>
                <div class="card-actions">
                    <button class="btn-view" onclick="viewUserProfile(4)">
                        <span class="btn-icon">👁️</span>
                        Profil
                    </button>
                    <button class="btn-edit" onclick="editUser(4)">
                        <span class="btn-icon">✏️</span>
                        Modifier
                    </button>
                    <button class="btn-more" onclick="toggleUserMenu(4)">⋮</button>
                </div>
                <div class="dropdown-menu" id="menu-4">
                    <button onclick="toggleUserStatus(4)">
                        <span>✅</span> Activer
                    </button>
                    <button onclick="confirmDeleteUser(4)">
                        <span>🗑️</span> Supprimer
                    </button>
                </div>
            </div> -->
    </div>
</main>

<!-- Add/Edit User Modal -->
<div class="modal-overlay" id="userModal">
    <div class="modal-container">
        <div class="modal-header">
            <h3 class="modal-title" id="modalTitle">Ajouter un utilisateur</h3>
            <button class="modal-close" onclick="closeUserModal()">✕</button>
        </div>

        <form class="user-form" id="userForm">
            <input type="hidden" id="userId">

            <div class="form-row">
                <div class="form-group">
                    <label for="userName">Nom complet *</label>
                    <input type="text" id="userName" required placeholder="Ex: Julie Dupont">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="userEmail">Email *</label>
                    <input type="email" id="userEmail" required placeholder="exemple@email.fr">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="userPassword">Mot de passe *</label>
                    <input type="password" id="userPassword" placeholder="••••••••">
                    <small class="form-hint">Laisser vide pour conserver l'actuel (modification)</small>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="userRole">Rôle *</label>
                    <select id="userRole" required>
                        <option value="">Sélectionnez un rôle</option>
                        <option value="admin">Administrateur</option>
                        <option value="client">Client</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="userStatus">Statut *</label>
                    <select id="userStatus" required>
                        <option value="active">Actif</option>
                        <option value="blocked">Bloqué</option>
                    </select>
                </div>
            </div>

            <div class="modal-actions">
                <button type="button" class="btn-secondary" onclick="closeUserModal()">Annuler</button>
                <button type="submit" class="btn-primary">
                    <span id="submitBtnText">Ajouter l'utilisateur</span>
                </button>
            </div>
        </form>
    </div>
</div>

<!-- User Profile Modal -->
<div class="modal-overlay" id="profileModal">
    <div class="modal-container large">
        <div class="modal-header">
            <h3 class="modal-title">Profil Utilisateur</h3>
            <button class="modal-close" onclick="closeProfileModal()">✕</button>
        </div>

        <div class="modal-body">
            <div class="profile-section">
                <div class="profile-header">
                    <div class="profile-avatar-large" id="profileAvatar">JD</div>
                    <div class="profile-info">
                        <h3 id="profileName">Julie Dupont</h3>
                        <p id="profileEmail">julie.dupont@email.fr</p>
                        <div class="profile-badges">
                            <span class="role-badge" id="profileRole"></span>
                            <span class="status-badge" id="profileStatus"></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="profile-details">
                <div class="detail-row">
                    <span class="detail-label">📅 Date d'inscription</span>
                    <span class="detail-value" id="profileDate"></span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">📦 Commandes passées</span>
                    <span class="detail-value" id="profileOrders">0</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">💰 Total dépensé</span>
                    <span class="detail-value" id="profileSpent">0,00€</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">📧 Dernière connexion</span>
                    <span class="detail-value" id="profileLastLogin">Jamais</span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Toggle Status Confirmation Modal -->
<div class="modal-overlay" id="statusModal">
    <div class="modal-container confirm-modal">
        <div class="confirm-icon" id="statusIcon">⚠️</div>
        <h3 class="confirm-title" id="statusTitle">Bloquer cet utilisateur ?</h3>
        <p class="confirm-message" id="statusMessage">L'utilisateur ne pourra plus se connecter ni passer de commandes.</p>
        <div class="modal-actions">
            <button class="btn-secondary" onclick="closeStatusModal()">Annuler</button>
            <button class="btn-danger" onclick="confirmToggleStatus()">Confirmer</button>
        </div>
    </div>
</div>

<!-- Delete User Confirmation Modal -->
<div class="modal-overlay" id="deleteModal">
    <div class="modal-container confirm-modal">
        <div class="confirm-icon">⚠️</div>
        <h3 class="confirm-title">Supprimer cet utilisateur ?</h3>
        <p class="confirm-message">Cette action est irréversible. Toutes les données de l'utilisateur seront définitivement supprimées.</p>
        <div class="modal-actions">
            <button class="btn-secondary" onclick="closeDeleteModal()">Annuler</button>
            <button class="btn-danger" onclick="deleteUser()">Supprimer</button>
        </div>
    </div>
</div>

<!-- Toast Notification -->
<div class="toast" id="toast">
    <div class="toast-icon" id="toastIcon">✓</div>
    <div class="toast-message" id="toastMessage">Action effectuée avec succès</div>
</div>

@endsection