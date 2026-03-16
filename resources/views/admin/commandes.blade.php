@extends('layout.admin')
@section('title-and-style')

    <title>Gestion des Commandes - Jardin Naturel</title>
    <link rel="stylesheet" href="{{asset('css/commandes.css')}}">
@endsection

@section('main-content')
    <!-- Sidebar -->
    <!-- <x-sidebar /> -->

    <!-- Main Content -->
    <main class="main-content">
        <!-- Page Header -->
        <div class="page-header">
            <div class="header-left">
                <h2 class="page-title">Gestion des Commandes</h2>
                <p class="page-subtitle">Suivez et gérez toutes vos commandes en temps réel</p>
            </div>
            <button class="btn-primary" onclick="exportOrders()">
                <span class="btn-icon">📥</span>
                Exporter
            </button>
        </div>

        <!-- Stats Summary -->
        <div class="stats-summary">
            <div class="stat-card">
                <div class="stat-icon pending">⏳</div>
                <div class="stat-content">
                    <span class="stat-value" id="pendingCount">3</span>
                    <span class="stat-label">En attente</span>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon paid">💰</div>
                <div class="stat-content">
                    <span class="stat-value" id="paidCount">2</span>
                    <span class="stat-label">Payées</span>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon shipped">🚚</div>
                <div class="stat-content">
                    <span class="stat-value" id="shippedCount">2</span>
                    <span class="stat-label">Expédiées</span>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon cancelled">❌</div>
                <div class="stat-content">
                    <span class="stat-value" id="cancelledCount">1</span>
                    <span class="stat-label">Annulées</span>
                </div>
            </div>
        </div>

        <!-- Filters Bar -->
        <div class="filters-bar">
            <div class="search-box">
                <span class="search-icon">🔍</span>
                <input type="search" id="searchInput" placeholder="Rechercher par numéro ou client...">
            </div>

            <div class="filter-group">
                <select id="statusFilter" class="filter-select">
                    <option value="">Tous les statuts</option>
                    <option value="pending">En attente</option>
                    <option value="paid">Payée</option>
                    <option value="shipped">Expédiée</option>
                    <option value="cancelled">Annulée</option>
                </select>

                <select id="dateFilter" class="filter-select">
                    <option value="">Toutes les dates</option>
                    <option value="today">Aujourd'hui</option>
                    <option value="week">Cette semaine</option>
                    <option value="month">Ce mois</option>
                </select>

                <select id="sortBy" class="filter-select">
                    <option value="date-desc">Plus récentes</option>
                    <option value="date-asc">Plus anciennes</option>
                    <option value="amount-desc">Montant décroissant</option>
                    <option value="amount-asc">Montant croissant</option>
                </select>
            </div>
        </div>

        <!-- Orders Grid -->
        <div class="orders-grid" id="ordersGrid">
            <!-- Order Card 1 -->
            <div class="order-card" data-id="1" data-status="pending" data-date="2026-02-08">
                <div class="card-header">
                    <div class="order-number">#CMD-2026-001</div>
                    <span class="status-badge pending">En attente</span>
                </div>
                <div class="card-body">
                    <div class="customer-info">
                        <div class="customer-avatar">PD</div>
                        <div class="customer-details">
                            <span class="customer-name">Pierre Dubois</span>
                            <span class="customer-email">pierre.dubois@email.fr</span>
                        </div>
                    </div>
                    <div class="order-meta">
                        <div class="meta-item">
                            <span class="meta-label">📅 Date</span>
                            <span class="meta-value">08 Fév 2026</span>
                        </div>
                        <div class="meta-item">
                            <span class="meta-label">💳 Paiement</span>
                            <span class="meta-value">Carte bancaire</span>
                        </div>
                        <div class="meta-item">
                            <span class="meta-label">📦 Articles</span>
                            <span class="meta-value">3 produits</span>
                        </div>
                    </div>
                    <div class="order-amount">
                        <span class="amount-label">Montant total</span>
                        <span class="amount-value">145,90€</span>
                    </div>
                </div>
                <div class="card-actions">
                    <button class="btn-view" onclick="viewOrderDetails(1)">
                        <span class="btn-icon">👁️</span>
                        Détails
                    </button>
                    <button class="btn-status" onclick="changeStatus(1)">
                        <span class="btn-icon">🔄</span>
                        Statut
                    </button>
                    <button class="btn-cancel" onclick="confirmCancelOrder(1)">
                        <span class="btn-icon">🗑️</span>
                        Annuler
                    </button>
                </div>
            </div>

            <!-- Order Card 2 -->
            <div class="order-card" data-id="2" data-status="paid" data-date="2026-02-08">
                <div class="card-header">
                    <div class="order-number">#CMD-2026-002</div>
                    <span class="status-badge paid">Payée</span>
                </div>
                <div class="card-body">
                    <div class="customer-info">
                        <div class="customer-avatar">ML</div>
                        <div class="customer-details">
                            <span class="customer-name">Marie Laurent</span>
                            <span class="customer-email">marie.laurent@email.fr</span>
                        </div>
                    </div>
                    <div class="order-meta">
                        <div class="meta-item">
                            <span class="meta-label">📅 Date</span>
                            <span class="meta-value">08 Fév 2026</span>
                        </div>
                        <div class="meta-item">
                            <span class="meta-label">💳 Paiement</span>
                            <span class="meta-value">PayPal</span>
                        </div>
                        <div class="meta-item">
                            <span class="meta-label">📦 Articles</span>
                            <span class="meta-value">5 produits</span>
                        </div>
                    </div>
                    <div class="order-amount">
                        <span class="amount-label">Montant total</span>
                        <span class="amount-value">289,50€</span>
                    </div>
                </div>
                <div class="card-actions">
                    <button class="btn-view" onclick="viewOrderDetails(2)">
                        <span class="btn-icon">👁️</span>
                        Détails
                    </button>
                    <button class="btn-status" onclick="changeStatus(2)">
                        <span class="btn-icon">🔄</span>
                        Statut
                    </button>
                    <button class="btn-cancel" onclick="confirmCancelOrder(2)">
                        <span class="btn-icon">🗑️</span>
                        Annuler
                    </button>
                </div>
            </div>

            <!-- Order Card 3 -->
            <div class="order-card" data-id="3" data-status="shipped" data-date="2026-02-07">
                <div class="card-header">
                    <div class="order-number">#CMD-2026-003</div>
                    <span class="status-badge shipped">Expédiée</span>
                </div>
                <div class="card-body">
                    <div class="customer-info">
                        <div class="customer-avatar">JM</div>
                        <div class="customer-details">
                            <span class="customer-name">Jean Martin</span>
                            <span class="customer-email">jean.martin@email.fr</span>
                        </div>
                    </div>
                    <div class="order-meta">
                        <div class="meta-item">
                            <span class="meta-label">📅 Date</span>
                            <span class="meta-value">07 Fév 2026</span>
                        </div>
                        <div class="meta-item">
                            <span class="meta-label">💳 Paiement</span>
                            <span class="meta-value">Carte bancaire</span>
                        </div>
                        <div class="meta-item">
                            <span class="meta-label">📦 Articles</span>
                            <span class="meta-value">2 produits</span>
                        </div>
                    </div>
                    <div class="order-amount">
                        <span class="amount-label">Montant total</span>
                        <span class="amount-value">78,00€</span>
                    </div>
                </div>
                <div class="card-actions">
                    <button class="btn-view" onclick="viewOrderDetails(3)">
                        <span class="btn-icon">👁️</span>
                        Détails
                    </button>
                    <button class="btn-status" onclick="changeStatus(3)">
                        <span class="btn-icon">🔄</span>
                        Statut
                    </button>
                    <button class="btn-cancel" onclick="confirmCancelOrder(3)">
                        <span class="btn-icon">🗑️</span>
                        Annuler
                    </button>
                </div>
            </div>

            <!-- Order Card 4 -->
            <div class="order-card" data-id="4" data-status="cancelled" data-date="2026-02-06">
                <div class="card-header">
                    <div class="order-number">#CMD-2026-004</div>
                    <span class="status-badge cancelled">Annulée</span>
                </div>
                <div class="card-body">
                    <div class="customer-info">
                        <div class="customer-avatar">SB</div>
                        <div class="customer-details">
                            <span class="customer-name">Sophie Bernard</span>
                            <span class="customer-email">sophie.bernard@email.fr</span>
                        </div>
                    </div>
                    <div class="order-meta">
                        <div class="meta-item">
                            <span class="meta-label">📅 Date</span>
                            <span class="meta-value">06 Fév 2026</span>
                        </div>
                        <div class="meta-item">
                            <span class="meta-label">💳 Paiement</span>
                            <span class="meta-value">Virement</span>
                        </div>
                        <div class="meta-item">
                            <span class="meta-label">📦 Articles</span>
                            <span class="meta-value">1 produit</span>
                        </div>
                    </div>
                    <div class="order-amount">
                        <span class="amount-label">Montant total</span>
                        <span class="amount-value">45,00€</span>
                    </div>
                </div>
                <div class="card-actions">
                    <button class="btn-view" onclick="viewOrderDetails(4)">
                        <span class="btn-icon">👁️</span>
                        Détails
                    </button>
                    <button class="btn-status" onclick="changeStatus(4)" disabled>
                        <span class="btn-icon">🔄</span>
                        Statut
                    </button>
                    <button class="btn-cancel" onclick="confirmCancelOrder(4)" disabled>
                        <span class="btn-icon">🗑️</span>
                        Annuler
                    </button>
                </div>
            </div>
        </div>
    </main>

    <!-- Order Details Modal -->
    <div class="modal-overlay" id="detailsModal">
        <div class="modal-container large">
            <div class="modal-header">
                <h3 class="modal-title">Détails de la commande <span id="detailOrderNumber"></span></h3>
                <button class="modal-close" onclick="closeDetailsModal()">✕</button>
            </div>

            <div class="modal-body">
                <!-- Customer Information -->
                <div class="details-section">
                    <h4 class="section-title">👤 Informations Client</h4>
                    <div class="info-grid">
                        <div class="info-item">
                            <span class="info-label">Nom</span>
                            <span class="info-value" id="detailCustomerName"></span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Email</span>
                            <span class="info-value" id="detailCustomerEmail"></span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Téléphone</span>
                            <span class="info-value" id="detailCustomerPhone"></span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Adresse</span>
                            <span class="info-value" id="detailCustomerAddress"></span>
                        </div>
                    </div>
                </div>

                <!-- Order Information -->
                <div class="details-section">
                    <h4 class="section-title">📦 Informations Commande</h4>
                    <div class="info-grid">
                        <div class="info-item">
                            <span class="info-label">Date</span>
                            <span class="info-value" id="detailOrderDate"></span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Statut</span>
                            <span class="info-value" id="detailOrderStatus"></span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Paiement</span>
                            <span class="info-value" id="detailPaymentMethod"></span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Livraison</span>
                            <span class="info-value" id="detailShippingMethod"></span>
                        </div>
                    </div>
                </div>

                <!-- Products List -->
                <div class="details-section">
                    <h4 class="section-title">🛒 Produits Commandés</h4>
                    <div class="products-table" id="detailProductsList">
                        <!-- Dynamic content -->
                    </div>
                </div>

                <!-- Order Summary -->
                <div class="details-section">
                    <h4 class="section-title">💰 Récapitulatif</h4>
                    <div class="order-summary">
                        <div class="summary-row">
                            <span>Sous-total</span>
                            <span id="detailSubtotal"></span>
                        </div>
                        <div class="summary-row">
                            <span>Livraison</span>
                            <span id="detailShipping"></span>
                        </div>
                        <div class="summary-row">
                            <span>Taxes (TVA 20%)</span>
                            <span id="detailTax"></span>
                        </div>
                        <div class="summary-row total">
                            <span>Total</span>
                            <span id="detailTotal"></span>
                        </div>
                    </div>
                </div>

                <!-- Status History -->
                <div class="details-section">
                    <h4 class="section-title">📋 Historique</h4>
                    <div class="status-timeline" id="detailTimeline">
                        <!-- Dynamic content -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Change Status Modal -->
    <div class="modal-overlay" id="statusModal">
        <div class="modal-container">
            <div class="modal-header">
                <h3 class="modal-title">Changer le statut</h3>
                <button class="modal-close" onclick="closeStatusModal()">✕</button>
            </div>

            <div class="modal-body">
                <input type="hidden" id="statusOrderId">
                <div class="form-group">
                    <label>Nouveau statut</label>
                    <select id="newStatus" class="form-select">
                        <option value="pending">En attente</option>
                        <option value="paid">Payée</option>
                        <option value="shipped">Expédiée</option>
                        <option value="cancelled">Annulée</option>
                    </select>
                </div>
                <div class="modal-actions">
                    <button class="btn-secondary" onclick="closeStatusModal()">Annuler</button>
                    <button class="btn-primary" onclick="updateOrderStatus()">Confirmer</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Cancel Order Modal -->
    <div class="modal-overlay" id="cancelModal">
        <div class="modal-container confirm-modal">
            <div class="confirm-icon">⚠️</div>
            <h3 class="confirm-title">Annuler la commande</h3>
            <p class="confirm-message">Êtes-vous sûr de vouloir annuler cette commande ? Cette action est irréversible et le client sera notifié.</p>
            <div class="modal-actions">
                <button class="btn-secondary" onclick="closeCancelModal()">Non, conserver</button>
                <button class="btn-danger" onclick="cancelOrder()">Oui, annuler</button>
            </div>
        </div>
    </div>

    <!-- Toast Notification -->
    <div class="toast" id="toast">
        <div class="toast-icon" id="toastIcon">✓</div>
        <div class="toast-message" id="toastMessage">Action effectuée avec succès</div>
    </div>

<script>
    //     // ========================================
    // // GESTION DES COMMANDES - JARDIN NATUREL
    // // JavaScript pour gestion complète
    // // ========================================

    // // ========================================
    // // DONNÉES DES COMMANDES
    // // ========================================
    // let orders = [
    //     {
    //         id: 1,
    //         orderNumber: "#CMD-2026-001",
    //         customer: {
    //             name: "Pierre Dubois",
    //             email: "pierre.dubois@email.fr",
    //             phone: "06 12 34 56 78",
    //             address: "15 Rue des Fleurs, 75001 Paris"
    //         },
    //         status: "pending",
    //         date: "2026-02-08",
    //         paymentMethod: "Carte bancaire",
    //         shippingMethod: "Livraison standard",
    //         products: [
    //             { name: "Graines de Tomates Bio", quantity: 2, price: 4.99 },
    //             { name: "Engrais Naturel", quantity: 1, price: 12.50 },
    //             { name: "Pot en Terre Cuite", quantity: 3, price: 8.90 }
    //         ],
    //         subtotal: 48.19,
    //         shipping: 5.90,
    //         tax: 10.82,
    //         total: 145.90,
    //         history: [
    //             { status: "pending", date: "2026-02-08 10:30", label: "Commande reçue" }
    //         ]
    //     },
    //     {
    //         id: 2,
    //         orderNumber: "#CMD-2026-002",
    //         customer: {
    //             name: "Marie Laurent",
    //             email: "marie.laurent@email.fr",
    //             phone: "06 23 45 67 89",
    //             address: "42 Avenue du Jardin, 69001 Lyon"
    //         },
    //         status: "paid",
    //         date: "2026-02-08",
    //         paymentMethod: "PayPal",
    //         shippingMethod: "Livraison express",
    //         products: [
    //             { name: "Sécateur Professionnel", quantity: 1, price: 24.90 },
    //             { name: "Graines de Basilic", quantity: 3, price: 3.50 },
    //             { name: "Arrosoir 5L", quantity: 2, price: 15.99 }
    //         ],
    //         subtotal: 68.38,
    //         shipping: 9.90,
    //         tax: 15.66,
    //         total: 289.50,
    //         history: [
    //             { status: "pending", date: "2026-02-08 09:15", label: "Commande reçue" },
    //             { status: "paid", date: "2026-02-08 09:20", label: "Paiement confirmé" }
    //         ]
    //     },
    //     {
    //         id: 3,
    //         orderNumber: "#CMD-2026-003",
    //         customer: {
    //             name: "Jean Martin",
    //             email: "jean.martin@email.fr",
    //             phone: "06 34 56 78 90",
    //             address: "8 Rue de la Nature, 33000 Bordeaux"
    //         },
    //         status: "shipped",
    //         date: "2026-02-07",
    //         paymentMethod: "Carte bancaire",
    //         shippingMethod: "Livraison standard",
    //         products: [
    //             { name: "Graines de Tomates", quantity: 1, price: 4.99 },
    //             { name: "Pot Décoratif", quantity: 1, price: 12.90 }
    //         ],
    //         subtotal: 17.89,
    //         shipping: 5.90,
    //         tax: 4.76,
    //         total: 78.00,
    //         history: [
    //             { status: "pending", date: "2026-02-07 14:20", label: "Commande reçue" },
    //             { status: "paid", date: "2026-02-07 14:25", label: "Paiement confirmé" },
    //             { status: "shipped", date: "2026-02-07 16:00", label: "Colis expédié" }
    //         ]
    //     },
    //     {
    //         id: 4,
    //         orderNumber: "#CMD-2026-004",
    //         customer: {
    //             name: "Sophie Bernard",
    //             email: "sophie.bernard@email.fr",
    //             phone: "06 45 67 89 01",
    //             address: "23 Boulevard Vert, 13001 Marseille"
    //         },
    //         status: "cancelled",
    //         date: "2026-02-06",
    //         paymentMethod: "Virement",
    //         shippingMethod: "Livraison standard",
    //         products: [
    //             { name: "Décoration Jardin", quantity: 1, price: 15.99 }
    //         ],
    //         subtotal: 15.99,
    //         shipping: 5.90,
    //         tax: 4.38,
    //         total: 45.00,
    //         history: [
    //             { status: "pending", date: "2026-02-06 11:30", label: "Commande reçue" },
    //             { status: "cancelled", date: "2026-02-06 12:00", label: "Annulée par le client" }
    //         ]
    //     }
    // ];

    // // Variable pour stocker l'ID de la commande en cours
    // let currentOrderId = null;

    // // ========================================
    // // INITIALISATION
    // // ========================================
    // document.addEventListener('DOMContentLoaded', function() {
    //     initializeEventListeners();
    //     renderOrders();
    //     updateStats();
    // });

    // function initializeEventListeners() {
    //     // Recherche
    //     document.getElementById('searchInput').addEventListener('input', filterOrders);

    //     // Filtres
    //     document.getElementById('statusFilter').addEventListener('change', filterOrders);
    //     document.getElementById('dateFilter').addEventListener('change', filterOrders);
    //     document.getElementById('sortBy').addEventListener('change', filterOrders);
    // }

    // // ========================================
    // // RENDU DES COMMANDES
    // // ========================================
    // function renderOrders(ordersToRender = orders) {
    //     const grid = document.getElementById('ordersGrid');

    //     if (ordersToRender.length === 0) {
    //         grid.innerHTML = `
    //             <div class="no-results">
    //                 <div class="no-results-icon">🔍</div>
    //                 <p class="no-results-text">Aucune commande trouvée</p>
    //             </div>
    //         `;
    //         return;
    //     }

    //     grid.innerHTML = ordersToRender.map(order => createOrderCard(order)).join('');
    // }

    // function createOrderCard(order) {
    //     const statusClass = order.status;
    //     const statusText = getStatusText(order.status);
    //     const initials = order.customer.name.split(' ').map(n => n[0]).join('');
    //     const isDisabled = order.status === 'cancelled';

    //     return `
    //         <div class="order-card" data-id="${order.id}" data-status="${order.status}" data-date="${order.date}">
    //             <div class="card-header">
    //                 <div class="order-number">${order.orderNumber}</div>
    //                 <span class="status-badge ${statusClass}">${statusText}</span>
    //             </div>
    //             <div class="card-body">
    //                 <div class="customer-info">
    //                     <div class="customer-avatar">${initials}</div>
    //                     <div class="customer-details">
    //                         <span class="customer-name">${order.customer.name}</span>
    //                         <span class="customer-email">${order.customer.email}</span>
    //                     </div>
    //                 </div>
    //                 <div class="order-meta">
    //                     <div class="meta-item">
    //                         <span class="meta-label">📅 Date</span>
    //                         <span class="meta-value">${formatDate(order.date)}</span>
    //                     </div>
    //                     <div class="meta-item">
    //                         <span class="meta-label">💳 Paiement</span>
    //                         <span class="meta-value">${order.paymentMethod}</span>
    //                     </div>
    //                     <div class="meta-item">
    //                         <span class="meta-label">📦 Articles</span>
    //                         <span class="meta-value">${order.products.length} produit${order.products.length > 1 ? 's' : ''}</span>
    //                     </div>
    //                 </div>
    //                 <div class="order-amount">
    //                     <span class="amount-label">Montant total</span>
    //                     <span class="amount-value">${order.total.toFixed(2)}€</span>
    //                 </div>
    //             </div>
    //             <div class="card-actions">
    //                 <button class="btn-view" onclick="viewOrderDetails(${order.id})">
    //                     <span class="btn-icon">👁️</span>
    //                     Détails
    //                 </button>
    //                 <button class="btn-status" onclick="changeStatus(${order.id})" ${isDisabled ? 'disabled' : ''}>
    //                     <span class="btn-icon">🔄</span>
    //                     Statut
    //                 </button>
    //                 <button class="btn-cancel" onclick="confirmCancelOrder(${order.id})" ${isDisabled ? 'disabled' : ''}>
    //                     <span class="btn-icon">🗑️</span>
    //                     Annuler
    //                 </button>
    //             </div>
    //         </div>
    //     `;
    // }

    // // ========================================
    // // MISE À JOUR DES STATISTIQUES
    // // ========================================
    // function updateStats() {
    //     const pending = orders.filter(o => o.status === 'pending').length;
    //     const paid = orders.filter(o => o.status === 'paid').length;
    //     const shipped = orders.filter(o => o.status === 'shipped').length;
    //     const cancelled = orders.filter(o => o.status === 'cancelled').length;

    //     document.getElementById('pendingCount').textContent = pending;
    //     document.getElementById('paidCount').textContent = paid;
    //     document.getElementById('shippedCount').textContent = shipped;
    //     document.getElementById('cancelledCount').textContent = cancelled;
    //     document.getElementById('orderCount').textContent = orders.length;

    //     // Animation des compteurs
    //     animateValue('pendingCount', 0, pending, 1000);
    //     animateValue('paidCount', 0, paid, 1000);
    //     animateValue('shippedCount', 0, shipped, 1000);
    //     animateValue('cancelledCount', 0, cancelled, 1000);
    // }

    // function animateValue(id, start, end, duration) {
    //     const element = document.getElementById(id);
    //     if (!element) return;

    //     const range = end - start;
    //     const increment = range / (duration / 16);
    //     let current = start;

    //     const timer = setInterval(() => {
    //         current += increment;
    //         if ((increment > 0 && current >= end) || (increment < 0 && current <= end)) {
    //             current = end;
    //             clearInterval(timer);
    //         }
    //         element.textContent = Math.floor(current);
    //     }, 16);
    // }

    // // ========================================
    // // FILTRAGE ET RECHERCHE
    // // ========================================
    // function filterOrders() {
    //     const searchTerm = document.getElementById('searchInput').value.toLowerCase();
    //     const statusFilter = document.getElementById('statusFilter').value;
    //     const dateFilter = document.getElementById('dateFilter').value;
    //     const sortBy = document.getElementById('sortBy').value;

    //     let filtered = orders.filter(order => {
    //         const matchesSearch = order.orderNumber.toLowerCase().includes(searchTerm) ||
    //                             order.customer.name.toLowerCase().includes(searchTerm) ||
    //                             order.customer.email.toLowerCase().includes(searchTerm);
    //         const matchesStatus = !statusFilter || order.status === statusFilter;
    //         const matchesDate = !dateFilter || checkDateFilter(order.date, dateFilter);

    //         return matchesSearch && matchesStatus && matchesDate;
    //     });

    //     // Tri
    //     filtered.sort((a, b) => {
    //         switch(sortBy) {
    //             case 'date-desc':
    //                 return new Date(b.date) - new Date(a.date);
    //             case 'date-asc':
    //                 return new Date(a.date) - new Date(b.date);
    //             case 'amount-desc':
    //                 return b.total - a.total;
    //             case 'amount-asc':
    //                 return a.total - b.total;
    //             default:
    //                 return 0;
    //         }
    //     });

    //     renderOrders(filtered);
    // }

    // function checkDateFilter(orderDate, filter) {
    //     const today = new Date();
    //     const orderDateObj = new Date(orderDate);

    //     switch(filter) {
    //         case 'today':
    //             return orderDateObj.toDateString() === today.toDateString();
    //         case 'week':
    //             const weekAgo = new Date(today.getTime() - 7 * 24 * 60 * 60 * 1000);
    //             return orderDateObj >= weekAgo;
    //         case 'month':
    //             const monthAgo = new Date(today.getTime() - 30 * 24 * 60 * 60 * 1000);
    //             return orderDateObj >= monthAgo;
    //         default:
    //             return true;
    //     }
    // }

    // // ========================================
    // // VUE DÉTAILS DE LA COMMANDE
    // // ========================================
    // function viewOrderDetails(id) {
    //     const order = orders.find(o => o.id === id);
    //     if (!order) return;

    //     // Remplir les informations
    //     document.getElementById('detailOrderNumber').textContent = order.orderNumber;
    //     document.getElementById('detailCustomerName').textContent = order.customer.name;
    //     document.getElementById('detailCustomerEmail').textContent = order.customer.email;
    //     document.getElementById('detailCustomerPhone').textContent = order.customer.phone;
    //     document.getElementById('detailCustomerAddress').textContent = order.customer.address;

    //     document.getElementById('detailOrderDate').textContent = formatDateLong(order.date);
    //     document.getElementById('detailOrderStatus').innerHTML = `<span class="status-badge ${order.status}">${getStatusText(order.status)}</span>`;
    //     document.getElementById('detailPaymentMethod').textContent = order.paymentMethod;
    //     document.getElementById('detailShippingMethod').textContent = order.shippingMethod;

    //     // Liste des produits
    //     const productsList = document.getElementById('detailProductsList');
    //     productsList.innerHTML = `
    //         <div class="product-row header">
    //             <div>Produit</div>
    //             <div>Quantité</div>
    //             <div>Prix</div>
    //         </div>
    //         ${order.products.map(product => `
    //             <div class="product-row">
    //                 <div>${product.name}</div>
    //                 <div>${product.quantity}</div>
    //                 <div>${(product.price * product.quantity).toFixed(2)}€</div>
    //             </div>
    //         `).join('')}
    //     `;

    //     // Récapitulatif
    //     document.getElementById('detailSubtotal').textContent = order.subtotal.toFixed(2) + '€';
    //     document.getElementById('detailShipping').textContent = order.shipping.toFixed(2) + '€';
    //     document.getElementById('detailTax').textContent = order.tax.toFixed(2) + '€';
    //     document.getElementById('detailTotal').textContent = order.total.toFixed(2) + '€';

    //     // Historique
    //     const timeline = document.getElementById('detailTimeline');
    //     timeline.innerHTML = order.history.map(item => `
    //         <div class="timeline-item">
    //             <div class="timeline-dot ${item.status}">
    //                 ${getStatusEmoji(item.status)}
    //             </div>
    //             <div class="timeline-content">
    //                 <div class="timeline-title">${item.label}</div>
    //                 <div class="timeline-date">${formatDateTimeLong(item.date)}</div>
    //             </div>
    //         </div>
    //     `).join('');

    //     // Afficher le modal
    //     document.getElementById('detailsModal').classList.add('show');
    // }

    // function closeDetailsModal() {
    //     document.getElementById('detailsModal').classList.remove('show');
    // }

    // // ========================================
    // // CHANGER LE STATUT
    // // ========================================
    // function changeStatus(id) {
    //     const order = orders.find(o => o.id === id);
    //     if (!order || order.status === 'cancelled') return;

    //     currentOrderId = id;
    //     document.getElementById('statusOrderId').value = id;
    //     document.getElementById('newStatus').value = order.status;
    //     document.getElementById('statusModal').classList.add('show');
    // }

    // function closeStatusModal() {
    //     currentOrderId = null;
    //     document.getElementById('statusModal').classList.remove('show');
    // }

    // function updateOrderStatus() {
    //     const orderId = parseInt(document.getElementById('statusOrderId').value);
    //     const newStatus = document.getElementById('newStatus').value;

    //     const order = orders.find(o => o.id === orderId);
    //     if (!order) return;

    //     // Mettre à jour le statut
    //     order.status = newStatus;

    //     // Ajouter à l'historique
    //     const now = new Date();
    //     const timestamp = `${now.getFullYear()}-${String(now.getMonth() + 1).padStart(2, '0')}-${String(now.getDate()).padStart(2, '0')} ${String(now.getHours()).padStart(2, '0')}:${String(now.getMinutes()).padStart(2, '0')}`;
    //     order.history.push({
    //         status: newStatus,
    //         date: timestamp,
    //         label: getStatusLabel(newStatus)
    //     });

    //     // Rafraîchir l'affichage
    //     renderOrders();
    //     filterOrders();
    //     updateStats();
    //     closeStatusModal();
    //     showToast(`Statut mis à jour : ${getStatusText(newStatus)}`, 'success');
    // }

    // // ========================================
    // // ANNULER UNE COMMANDE
    // // ========================================
    // function confirmCancelOrder(id) {
    //     const order = orders.find(o => o.id === id);
    //     if (!order || order.status === 'cancelled') return;

    //     currentOrderId = id;
    //     document.getElementById('cancelModal').classList.add('show');
    // }

    // function closeCancelModal() {
    //     currentOrderId = null;
    //     document.getElementById('cancelModal').classList.remove('show');
    // }

    // function cancelOrder() {
    //     if (currentOrderId === null) return;

    //     const order = orders.find(o => o.id === currentOrderId);
    //     if (!order) return;

    //     // Mettre à jour le statut
    //     order.status = 'cancelled';

    //     // Ajouter à l'historique
    //     const now = new Date();
    //     const timestamp = `${now.getFullYear()}-${String(now.getMonth() + 1).padStart(2, '0')}-${String(now.getDate()).padStart(2, '0')} ${String(now.getHours()).padStart(2, '0')}:${String(now.getMinutes()).padStart(2, '0')}`;
    //     order.history.push({
    //         status: 'cancelled',
    //         date: timestamp,
    //         label: 'Annulée par l\'administrateur'
    //     });

    //     // Rafraîchir l'affichage
    //     renderOrders();
    //     filterOrders();
    //     updateStats();
    //     closeCancelModal();
    //     showToast('Commande annulée', 'success');
    // }

    // // ========================================
    // // EXPORTER LES COMMANDES
    // // ========================================
    // function exportOrders() {
    //     const csv = ordersToCSV();
    //     downloadCSV(csv, 'commandes.csv');
    //     showToast('Export réussi', 'success');
    // }

    // function ordersToCSV() {
    //     const headers = ['Numéro', 'Client', 'Email', 'Statut', 'Date', 'Paiement', 'Total'];
    //     const rows = orders.map(o => [
    //         o.orderNumber,
    //         o.customer.name,
    //         o.customer.email,
    //         getStatusText(o.status),
    //         formatDate(o.date),
    //         o.paymentMethod,
    //         o.total.toFixed(2) + '€'
    //     ]);

    //     let csvContent = headers.join(',') + '\n';
    //     csvContent += rows.map(row => row.join(',')).join('\n');

    //     return csvContent;
    // }

    // function downloadCSV(content, filename) {
    //     const blob = new Blob([content], { type: 'text/csv;charset=utf-8;' });
    //     const link = document.createElement('a');
    //     const url = URL.createObjectURL(blob);
    //     link.setAttribute('href', url);
    //     link.setAttribute('download', filename);
    //     link.style.visibility = 'hidden';
    //     document.body.appendChild(link);
    //     link.click();
    //     document.body.removeChild(link);
    // }

    // // ========================================
    // // NOTIFICATIONS TOAST
    // // ========================================
    // function showToast(message, type = 'success') {
    //     const toast = document.getElementById('toast');
    //     const toastMessage = document.getElementById('toastMessage');
    //     const toastIcon = document.getElementById('toastIcon');

    //     toastMessage.textContent = message;

    //     if (type === 'success') {
    //         toastIcon.textContent = '✓';
    //         toast.classList.add('success');
    //         toast.classList.remove('error');
    //     } else if (type === 'error') {
    //         toastIcon.textContent = '✕';
    //         toast.classList.add('error');
    //         toast.classList.remove('success');
    //     }

    //     toast.classList.add('show');

    //     setTimeout(() => {
    //         toast.classList.remove('show');
    //     }, 3000);
    // }

    // // ========================================
    // // UTILITAIRES
    // // ========================================
    // function getStatusText(status) {
    //     const statuses = {
    //         'pending': 'En attente',
    //         'paid': 'Payée',
    //         'shipped': 'Expédiée',
    //         'cancelled': 'Annulée'
    //     };
    //     return statuses[status] || status;
    // }

    // function getStatusLabel(status) {
    //     const labels = {
    //         'pending': 'En attente de paiement',
    //         'paid': 'Paiement confirmé',
    //         'shipped': 'Colis expédié',
    //         'cancelled': 'Commande annulée'
    //     };
    //     return labels[status] || status;
    // }

    // function getStatusEmoji(status) {
    //     const emojis = {
    //         'pending': '⏳',
    //         'paid': '💰',
    //         'shipped': '🚚',
    //         'cancelled': '❌'
    //     };
    //     return emojis[status] || '📦';
    // }

    // function formatDate(dateString) {
    //     const date = new Date(dateString);
    //     const months = ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil', 'Août', 'Sep', 'Oct', 'Nov', 'Déc'];
    //     return `${String(date.getDate()).padStart(2, '0')} ${months[date.getMonth()]} ${date.getFullYear()}`;
    // }

    // function formatDateLong(dateString) {
    //     const date = new Date(dateString);
    //     const months = ['janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre'];
    //     return `${date.getDate()} ${months[date.getMonth()]} ${date.getFullYear()}`;
    // }

    // function formatDateTimeLong(dateString) {
    //     const date = new Date(dateString);
    //     const months = ['janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre'];
    //     return `${date.getDate()} ${months[date.getMonth()]} ${date.getFullYear()} à ${String(date.getHours()).padStart(2, '0')}:${String(date.getMinutes()).padStart(2, '0')}`;
    // }

    // // ========================================
    // // FERMER LES MODALS AU CLIC EXTÉRIEUR
    // // ========================================
    // document.addEventListener('click', function(e) {
    //     const detailsModal = document.getElementById('detailsModal');
    //     const statusModal = document.getElementById('statusModal');
    //     const cancelModal = document.getElementById('cancelModal');

    //     if (e.target === detailsModal) {
    //         closeDetailsModal();
    //     }

    //     if (e.target === statusModal) {
    //         closeStatusModal();
    //     }

    //     if (e.target === cancelModal) {
    //         closeCancelModal();
    //     }
    // });

    // // ========================================
    // // NAVIGATION CLAVIER
    // // ========================================
    // document.addEventListener('keydown', function(e) {
    //     // Échap pour fermer les modals
    //     if (e.key === 'Escape') {
    //         closeDetailsModal();
    //         closeStatusModal();
    //         closeCancelModal();
    //     }

    //     // Ctrl/Cmd + K pour focus sur la recherche
    //     if ((e.ctrlKey || e.metaKey) && e.key === 'k') {
    //         e.preventDefault();
    //         document.getElementById('searchInput').focus();
    //     }
    // });

    // // Export des fonctions pour le HTML
    // window.viewOrderDetails = viewOrderDetails;
    // window.changeStatus = changeStatus;
    // window.confirmCancelOrder = confirmCancelOrder;
    // window.updateOrderStatus = updateOrderStatus;
    // window.cancelOrder = cancelOrder;
    // window.closeDetailsModal = closeDetailsModal;
    // window.closeStatusModal = closeStatusModal;
    // window.closeCancelModal = closeCancelModal;
    // window.exportOrders = exportOrders;

    // console.log('🌿 Gestion des commandes Jardin Naturel initialisée');
    // console.log(`📦 ${orders.length} commandes chargées`);
</script>

@endsection