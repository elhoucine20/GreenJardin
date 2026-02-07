<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Jardin Naturel</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Poppins', sans-serif;
    background: linear-gradient(135deg, #e8f5e9 0%, #c8e6c9 100%);
    background-attachment: fixed;
    min-height: 100vh;
}

/* ========== NAVBAR ADMIN ========== */
.admin-navbar {
    background: linear-gradient(135deg, #2e7d32 0%, #43a047 100%);
    padding: 1rem 0;
    box-shadow: 0 4px 15px rgba(46, 125, 50, 0.3);
    position: sticky;
    top: 0;
    z-index: 1000;
}

.admin-nav-container {
    max-width: 100%;
    margin: 0 auto;
    padding: 0 2rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.admin-logo {
    font-size: 1.5rem;
    font-weight: 800;
    color: white;
    text-decoration: none;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.admin-user {
    display: flex;
    align-items: center;
    gap: 1.5rem;
}

.admin-user-info {
    color: white;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.admin-user-name {
    font-weight: 600;
}

.logout-btn {
    background: rgba(255, 255, 255, 0.2);
    color: white;
    padding: 0.6rem 1.2rem;
    border: 2px solid white;
    border-radius: 10px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s;
    text-decoration: none;
    font-size: 0.9rem;
}

.logout-btn:hover {
    background: white;
    color: #2e7d32;
    transform: translateY(-2px);
}

/* ========== DASHBOARD LAYOUT ========== */
.dashboard-layout {
    display: flex;
    min-height: calc(100vh - 70px);
}

/* ========== SIDEBAR (FIXE) ========== */
.sidebar {
    width: 250px;
    background: white;
    box-shadow: 4px 0 15px rgba(46, 125, 50, 0.1);
    position: fixed;
    left: 0;
    top: 70px;
    height: calc(100vh - 70px);
    overflow-y: auto;
    z-index: 999;
}

.sidebar-title {
    padding: 1.5rem 1.5rem 1rem 1.5rem;
    color: #2e7d32;
    font-weight: 700;
    font-size: 1.1rem;
    border-bottom: 2px solid #e8f5e9;
}

.sidebar-menu {
    list-style: none;
    padding: 1rem 0;
}

.sidebar-menu li {
    margin-bottom: 0.25rem;
}

.sidebar-menu a {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    padding: 1rem 1.5rem;
    color: #66bb6a;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s;
    border-left: 4px solid transparent;
}

.sidebar-menu a:hover,
.sidebar-menu a.active {
    background: #e8f5e9;
    color: #2e7d32;
    border-left-color: #43a047;
}

.sidebar-menu a span {
    font-size: 1.2rem;
}

/* Scroll bar pour sidebar */
.sidebar::-webkit-scrollbar {
    width: 6px;
}

.sidebar::-webkit-scrollbar-track {
    background: #f1f8f4;
}

.sidebar::-webkit-scrollbar-thumb {
    background: #c8e6c9;
    border-radius: 10px;
}

.sidebar::-webkit-scrollbar-thumb:hover {
    background: #66bb6a;
}

/* ========== MAIN CONTENT ========== */
.main-content {
    margin-left: 250px;
    flex: 1;
    padding: 2rem;
    display: flex;
    flex-direction: column;
    gap: 2rem;
}

/* Page Header */
.page-header {
    background: white;
    padding: 2rem;
    border-radius: 20px;
    box-shadow: 0 8px 30px rgba(46, 125, 50, 0.15);
}

.page-header h1 {
    color: #2e7d32;
    font-size: 2rem;
    font-weight: 800;
    margin-bottom: 0.5rem;
}

.page-header p {
    color: #66bb6a;
    font-size: 1rem;
}

/* Stats Grid */
.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 1.5rem;
}

.stat-card {
    background: white;
    padding: 2rem;
    border-radius: 20px;
    box-shadow: 0 8px 30px rgba(46, 125, 50, 0.15);
    border: 2px solid #e8f5e9;
    transition: all 0.3s;
    position: relative;
    overflow: hidden;
}

.stat-card::before {
    content: '';
    position: absolute;
    top: 0;
    right: 0;
    width: 100px;
    height: 100px;
    background: linear-gradient(135deg, #e8f5e9 0%, transparent 100%);
    border-radius: 0 0 0 100%;
}

.stat-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 40px rgba(46, 125, 50, 0.25);
    border-color: #66bb6a;
}

.stat-icon {
    font-size: 3rem;
    margin-bottom: 1rem;
}

.stat-value {
    font-size: 2.5rem;
    font-weight: 800;
    color: #2e7d32;
    margin-bottom: 0.5rem;
}

.stat-label {
    color: #66bb6a;
    font-weight: 600;
    font-size: 0.95rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.stat-change {
    margin-top: 0.75rem;
    font-size: 0.85rem;
    color: #43a047;
    font-weight: 600;
}

.stat-change.positive::before {
    content: '↗ ';
}

.stat-change.negative {
    color: #e53935;
}

.stat-change.negative::before {
    content: '↘ ';
}

/* Recent Activity */
.activity-section {
    background: white;
    padding: 2rem;
    border-radius: 20px;
    box-shadow: 0 8px 30px rgba(46, 125, 50, 0.15);
}

.section-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 1.5rem;
}

.section-title {
    color: #2e7d32;
    font-size: 1.5rem;
    font-weight: 700;
}

.view-all-btn {
    color: #66bb6a;
    text-decoration: none;
    font-weight: 600;
    padding: 0.5rem 1rem;
    border-radius: 8px;
    transition: all 0.3s;
}

.view-all-btn:hover {
    background: #e8f5e9;
    color: #2e7d32;
}

.activity-list {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.activity-item {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 1.25rem;
    background: #f1f8f4;
    border-radius: 15px;
    border-left: 4px solid #66bb6a;
    transition: all 0.3s;
}

.activity-item:hover {
    background: #e8f5e9;
    transform: translateX(5px);
}

.activity-icon {
    font-size: 2rem;
    width: 50px;
    height: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: white;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(46, 125, 50, 0.1);
}

.activity-details {
    flex: 1;
}

.activity-title {
    color: #2e7d32;
    font-weight: 600;
    margin-bottom: 0.25rem;
}

.activity-meta {
    color: #81c784;
    font-size: 0.85rem;
}

.activity-time {
    color: #66bb6a;
    font-size: 0.85rem;
    font-weight: 600;
}

/* Quick Actions */
.quick-actions {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 1rem;
}

.action-btn {
    background: linear-gradient(135deg, #66bb6a 0%, #43a047 100%);
    color: white;
    padding: 1.5rem;
    border-radius: 15px;
    text-align: center;
    text-decoration: none;
    font-weight: 700;
    transition: all 0.3s;
    box-shadow: 0 6px 20px rgba(67, 160, 71, 0.3);
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 0.75rem;
}

.action-btn:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(67, 160, 71, 0.4);
}

.action-btn span {
    font-size: 2.5rem;
}

/* Table Styles */
.data-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 1rem;
}

.data-table th {
    background: #e8f5e9;
    color: #2e7d32;
    padding: 1rem;
    text-align: left;
    font-weight: 700;
    text-transform: uppercase;
    font-size: 0.85rem;
    letter-spacing: 0.5px;
}

.data-table td {
    padding: 1rem;
    border-bottom: 1px solid #e8f5e9;
    color: #1b5e20;
}

.data-table tr:hover {
    background: #f1f8f4;
}

.status-badge {
    padding: 0.4rem 0.8rem;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 600;
    display: inline-block;
}

.status-badge.success {
    background: #c8e6c9;
    color: #1b5e20;
}

.status-badge.warning {
    background: #fff9c4;
    color: #f57f17;
}

.status-badge.danger {
    background: #ffcdd2;
    color: #c62828;
}

/* ========== RESPONSIVE ========== */
@media (max-width: 1024px) {
    .sidebar {
        width: 220px;
    }
    
    .main-content {
        margin-left: 220px;
    }
}

@media (max-width: 768px) {
    .sidebar {
        transform: translateX(-100%);
        transition: transform 0.3s;
    }
    
    .sidebar.active {
        transform: translateX(0);
    }
    
    .main-content {
        margin-left: 0;
        padding: 1rem;
    }
    
    .stats-grid {
        grid-template-columns: 1fr;
    }
    
    .page-header h1 {
        font-size: 1.5rem;
    }
    
    .admin-nav-container {
        padding: 0 1rem;
    }
    
    .admin-user {
        gap: 0.5rem;
    }
    
    .admin-user-info span:first-child {
        display: none;
    }
}

@media (max-width: 480px) {
    .stat-value {
        font-size: 2rem;
    }
    
    .activity-item {
        flex-direction: column;
        text-align: center;
    }
    
    .quick-actions {
        grid-template-columns: 1fr;
    }
}
    </style>
</head>
<body>
    <!-- Admin Navbar -->
    <nav class="admin-navbar">
        <div class="admin-nav-container">
            <a href="dashboard-admin.html" class="admin-logo">
                <span>🌿</span>
                <span>Jardin Naturel - Admin</span>
            </a>
            <div class="admin-user">
                <div class="admin-user-info">
                    <span>👤</span>
                    <span class="admin-user-name">Admin</span>
                </div>
                <a href="login.html" class="logout-btn">Déconnexion</a>
            </div>
        </div>
    </nav>

    <!-- Dashboard Layout -->
    <div class="dashboard-layout">
        <!-- Sidebar (Fixe) -->
        <aside class="sidebar">
            <h3 class="sidebar-title">📊 Menu Principal</h3>
            <ul class="sidebar-menu">
                <li><a href="dashboard-admin.html" class="active"><span>🏠</span> Tableau de bord</a></li>
                <li><a href="produits-admin.html"><span>🌱</span> Produits</a></li>
                <li><a href="categories-admin.html"><span>📁</span> Catégories</a></li>
                <li><a href="commandes-admin.html"><span>📦</span> Commandes</a></li>
                <li><a href="utilisateurs-admin.html"><span>👥</span> Utilisateurs</a></li>
                <li><a href="paiements-admin.html"><span>💳</span> Paiements</a></li>
                <li><a href="parametres-admin.html"><span>⚙️</span> Paramètres</a></li>
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <!-- Page Header -->
            <div class="page-header">
                <h1>🎯 Tableau de Bord</h1>
                <p>Bienvenue sur votre espace d'administration</p>
            </div>

            <!-- Stats Grid -->
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-icon">🌱</div>
                    <div class="stat-value">245</div>
                    <div class="stat-label">Produits</div>
                    <div class="stat-change positive">+12% ce mois</div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon">📦</div>
                    <div class="stat-value">89</div>
                    <div class="stat-label">Commandes</div>
                    <div class="stat-change positive">+8% ce mois</div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon">👥</div>
                    <div class="stat-value">1,234</div>
                    <div class="stat-label">Utilisateurs</div>
                    <div class="stat-change positive">+15% ce mois</div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon">💰</div>
                    <div class="stat-value">45,890 DH</div>
                    <div class="stat-label">Chiffre d'affaires</div>
                    <div class="stat-change positive">+23% ce mois</div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="activity-section">
                <div class="section-header">
                    <h2 class="section-title">⚡ Actions Rapides</h2>
                </div>
                <div class="quick-actions">
                    <a href="produits-admin.html?action=add" class="action-btn">
                        <span>➕</span>
                        Ajouter un produit
                    </a>
                    <a href="commandes-admin.html" class="action-btn">
                        <span>📋</span>
                        Voir les commandes
                    </a>
                    <a href="utilisateurs-admin.html" class="action-btn">
                        <span>👤</span>
                        Gérer utilisateurs
                    </a>
                    <a href="categories-admin.html?action=add" class="action-btn">
                        <span>📁</span>
                        Nouvelle catégorie
                    </a>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="activity-section">
                <div class="section-header">
                    <h2 class="section-title">🔔 Activité Récente</h2>
                    <a href="#" class="view-all-btn">Voir tout →</a>
                </div>
                <div class="activity-list">
                    <div class="activity-item">
                        <div class="activity-icon">🛒</div>
                        <div class="activity-details">
                            <div class="activity-title">Nouvelle commande #1234</div>
                            <div class="activity-meta">Client: Mohammed Alami - 450 DH</div>
                        </div>
                        <div class="activity-time">Il y a 5 min</div>
                    </div>

                    <div class="activity-item">
                        <div class="activity-icon">👤</div>
                        <div class="activity-details">
                            <div class="activity-title">Nouvel utilisateur inscrit</div>
                            <div class="activity-meta">Fatima Zahra</div>
                        </div>
                        <div class="activity-time">Il y a 15 min</div>
                    </div>

                    <div class="activity-item">
                        <div class="activity-icon">🌱</div>
                        <div class="activity-details">
                            <div class="activity-title">Produit ajouté</div>
                            <div class="activity-meta">Graines de Tomates Bio</div>
                        </div>
                        <div class="activity-time">Il y a 1 heure</div>
                    </div>

                    <div class="activity-item">
                        <div class="activity-icon">💳</div>
                        <div class="activity-details">
                            <div class="activity-title">Paiement reçu</div>
                            <div class="activity-meta">Commande #1233 - 320 DH</div>
                        </div>
                        <div class="activity-time">Il y a 2 heures</div>
                    </div>

                    <div class="activity-item">
                        <div class="activity-icon">📦</div>
                        <div class="activity-details">
                            <div class="activity-title">Commande expédiée</div>
                            <div class="activity-meta">Commande #1230 - En cours de livraison</div>
                        </div>
                        <div class="activity-time">Il y a 3 heures</div>
                    </div>
                </div>
            </div>

            <!-- Recent Orders Table -->
            <div class="activity-section">
                <div class="section-header">
                    <h2 class="section-title">📋 Dernières Commandes</h2>
                    <a href="commandes-admin.html" class="view-all-btn">Voir tout →</a>
                </div>
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>N° Commande</th>
                            <th>Client</th>
                            <th>Montant</th>
                            <th>Statut</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>#1234</td>
                            <td>Mohammed Alami</td>
                            <td>450 DH</td>
                            <td><span class="status-badge success">Payée</span></td>
                            <td>06/02/2026</td>
                        </tr>
                        <tr>
                            <td>#1233</td>
                            <td>Fatima Zahra</td>
                            <td>320 DH</td>
                            <td><span class="status-badge success">Payée</span></td>
                            <td>06/02/2026</td>
                        </tr>
                        <tr>
                            <td>#1232</td>
                            <td>Ahmed Benani</td>
                            <td>280 DH</td>
                            <td><span class="status-badge warning">En attente</span></td>
                            <td>05/02/2026</td>
                        </tr>
                        <tr>
                            <td>#1231</td>
                            <td>Sara Idrissi</td>
                            <td>550 DH</td>
                            <td><span class="status-badge success">Payée</span></td>
                            <td>05/02/2026</td>
                        </tr>
                        <tr>
                            <td>#1230</td>
                            <td>Youssef Tazi</td>
                            <td>190 DH</td>
                            <td><span class="status-badge danger">Annulée</span></td>
                            <td>04/02/2026</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</body>
</html>