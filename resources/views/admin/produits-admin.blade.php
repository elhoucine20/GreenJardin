<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Produits - Jardin Naturel</title>
    <link rel="stylesheet" href="products-styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<style>
    /* ========================================
   VARIABLES & PALETTE DE COULEURS
   ======================================== */
:root {
    /* Couleurs principales - Thème jardin naturel */
    --color-primary: #2d6a4f;
    --color-primary-light: #40916c;
    --color-primary-dark: #1b4332;
    --color-primary-soft: #d8f3dc;
    
    /* Couleurs secondaires */
    --color-secondary: #52b788;
    --color-accent: #95d5b2;
    
    /* Couleurs de statut */
    --color-success: #52b788;
    --color-success-light: #d8f3dc;
    --color-warning: #f39c12;
    --color-warning-light: #fef5e7;
    --color-danger: #e74c3c;
    --color-danger-light: #fadbd8;
    --color-info: #4a90e2;
    --color-info-light: #e8f4fd;
    
    /* Neutrals */
    --color-white: #ffffff;
    --color-gray-50: #f8fafb;
    --color-gray-100: #f1f5f7;
    --color-gray-200: #e4e9ec;
    --color-gray-300: #d1d8dd;
    --color-gray-400: #9fa8b2;
    --color-gray-500: #6c7680;
    --color-gray-600: #4a5158;
    --color-gray-700: #2f3439;
    --color-gray-800: #1a1d21;
    
    /* Typographie */
    --font-family: 'Inter', -apple-system, sans-serif;
    --font-weight-regular: 400;
    --font-weight-medium: 500;
    --font-weight-semibold: 600;
    --font-weight-bold: 700;
    
    /* Spacing */
    --spacing-xs: 0.5rem;
    --spacing-sm: 0.75rem;
    --spacing-md: 1rem;
    --spacing-lg: 1.5rem;
    --spacing-xl: 2rem;
    --spacing-2xl: 3rem;
    
    /* Border radius */
    --radius-sm: 8px;
    --radius-md: 12px;
    --radius-lg: 16px;
    --radius-xl: 20px;
    --radius-full: 9999px;
    
    /* Shadows */
    --shadow-xs: 0 1px 2px rgba(45, 106, 79, 0.05);
    --shadow-sm: 0 2px 4px rgba(45, 106, 79, 0.06), 0 1px 2px rgba(45, 106, 79, 0.04);
    --shadow-md: 0 4px 8px rgba(45, 106, 79, 0.08), 0 2px 4px rgba(45, 106, 79, 0.04);
    --shadow-lg: 0 8px 16px rgba(45, 106, 79, 0.1), 0 4px 8px rgba(45, 106, 79, 0.06);
    --shadow-xl: 0 12px 24px rgba(45, 106, 79, 0.12), 0 8px 12px rgba(45, 106, 79, 0.08);
    
    /* Transitions */
    --transition-fast: 150ms cubic-bezier(0.4, 0, 0.2, 1);
    --transition-base: 250ms cubic-bezier(0.4, 0, 0.2, 1);
    --transition-slow: 350ms cubic-bezier(0.4, 0, 0.2, 1);
    
    /* Layout */
    --sidebar-width: 260px;
    --navbar-height: 70px;
}

/* ========================================
   RESET & BASE
   ======================================== */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: var(--font-family);
    font-size: 15px;
    line-height: 1.6;
    color: var(--color-gray-700);
    background-color: var(--color-gray-50);
    overflow-x: hidden;
}

/* ========================================
   NAVBAR
   ======================================== */
.navbar {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    height: var(--navbar-height);
    background: var(--color-white);
    border-bottom: 1px solid var(--color-gray-200);
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 var(--spacing-xl);
    z-index: 1000;
    box-shadow: var(--shadow-sm);
}

.navbar-brand {
    display: flex;
    align-items: center;
    gap: var(--spacing-sm);
}

.brand-icon {
    font-size: 32px;
}

.navbar-brand h1 {
    font-size: 20px;
    font-weight: var(--font-weight-bold);
    color: var(--color-primary);
}

.navbar-right {
    display: flex;
    align-items: center;
}

.admin-profile {
    display: flex;
    align-items: center;
    gap: var(--spacing-md);
}

.profile-avatar {
    width: 40px;
    height: 40px;
    border-radius: var(--radius-full);
    background: linear-gradient(135deg, var(--color-primary), var(--color-secondary));
    color: var(--color-white);
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: var(--font-weight-semibold);
}

.profile-info {
    display: flex;
    flex-direction: column;
}

.profile-name {
    font-weight: var(--font-weight-semibold);
    color: var(--color-gray-800);
    font-size: 14px;
}

.profile-role {
    font-size: 12px;
    color: var(--color-gray-500);
}

/* ========================================
   SIDEBAR
   ======================================== */
.sidebar {
    position: fixed;
    left: 0;
    top: var(--navbar-height);
    width: var(--sidebar-width);
    height: calc(100vh - var(--navbar-height));
    background: var(--color-white);
    border-right: 1px solid var(--color-gray-200);
    padding: var(--spacing-xl) 0;
    z-index: 999;
    overflow-y: auto;
}

.sidebar-nav {
    display: flex;
    flex-direction: column;
    gap: var(--spacing-xs);
    padding: 0 var(--spacing-md);
}

.nav-item {
    display: flex;
    align-items: center;
    gap: var(--spacing-md);
    padding: var(--spacing-md) var(--spacing-lg);
    border-radius: var(--radius-md);
    color: var(--color-gray-600);
    text-decoration: none;
    font-weight: var(--font-weight-medium);
    font-size: 14px;
    transition: all var(--transition-base);
    position: relative;
}

.nav-item:hover {
    background: var(--color-gray-50);
    color: var(--color-gray-800);
}

.nav-item.active {
    background: linear-gradient(135deg, var(--color-primary-soft), var(--color-accent));
    color: var(--color-primary-dark);
    font-weight: var(--font-weight-semibold);
}

.nav-item.active::before {
    content: '';
    position: absolute;
    left: 0;
    top: 50%;
    transform: translateY(-50%);
    width: 4px;
    height: 60%;
    background: var(--color-primary);
    border-radius: 0 4px 4px 0;
}

.nav-icon {
    font-size: 20px;
}

.nav-text {
    flex: 1;
}

.nav-badge {
    background: var(--color-primary);
    color: var(--color-white);
    font-size: 11px;
    font-weight: var(--font-weight-semibold);
    padding: 3px 8px;
    border-radius: var(--radius-full);
}

/* ========================================
   MAIN CONTENT
   ======================================== */
.main-content {
    margin-left: var(--sidebar-width);
    margin-top: var(--navbar-height);
    padding: var(--spacing-2xl);
    min-height: calc(100vh - var(--navbar-height));
}

/* ========================================
   PAGE HEADER
   ======================================== */
.page-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: var(--spacing-2xl);
}

.page-title {
    font-size: 28px;
    font-weight: var(--font-weight-bold);
    color: var(--color-gray-900);
    margin-bottom: var(--spacing-xs);
}

.page-subtitle {
    color: var(--color-gray-500);
    font-size: 14px;
}

/* ========================================
   BUTTONS
   ======================================== */
.btn-primary,
.btn-secondary,
.btn-edit,
.btn-delete,
.btn-danger {
    display: inline-flex;
    align-items: center;
    gap: var(--spacing-sm);
    padding: var(--spacing-sm) var(--spacing-lg);
    border: none;
    border-radius: var(--radius-sm);
    font-family: var(--font-family);
    font-weight: var(--font-weight-semibold);
    font-size: 14px;
    cursor: pointer;
    transition: all var(--transition-base);
    white-space: nowrap;
}

.btn-primary {
    background: var(--color-primary);
    color: var(--color-white);
    box-shadow: var(--shadow-sm);
}

.btn-primary:hover {
    background: var(--color-primary-dark);
    transform: translateY(-2px);
    box-shadow: var(--shadow-md);
}

.btn-secondary {
    background: var(--color-white);
    color: var(--color-gray-700);
    border: 1px solid var(--color-gray-200);
}

.btn-secondary:hover {
    background: var(--color-gray-50);
    border-color: var(--color-gray-300);
}

.btn-edit {
    background: var(--color-info-light);
    color: var(--color-info);
    border: 1px solid var(--color-info);
    padding: var(--spacing-xs) var(--spacing-md);
    font-size: 13px;
}

.btn-edit:hover {
    background: var(--color-info);
    color: var(--color-white);
}

.btn-delete {
    background: var(--color-danger-light);
    color: var(--color-danger);
    border: 1px solid var(--color-danger);
    padding: var(--spacing-xs) var(--spacing-md);
    font-size: 13px;
}

.btn-delete:hover {
    background: var(--color-danger);
    color: var(--color-white);
}

.btn-danger {
    background: var(--color-danger);
    color: var(--color-white);
}

.btn-danger:hover {
    background: #c0392b;
}

/* ========================================
   FILTERS BAR
   ======================================== */
.filters-bar {
    display: flex;
    gap: var(--spacing-lg);
    margin-bottom: var(--spacing-xl);
    flex-wrap: wrap;
}

.search-box {
    position: relative;
    flex: 1;
    min-width: 280px;
}

.search-box input {
    width: 100%;
    padding: var(--spacing-sm) var(--spacing-md);
    padding-left: 40px;
    border: 1px solid var(--color-gray-200);
    border-radius: var(--radius-md);
    font-family: var(--font-family);
    font-size: 14px;
    background: var(--color-white);
    transition: all var(--transition-base);
}

.search-box input:focus {
    outline: none;
    border-color: var(--color-primary);
    box-shadow: 0 0 0 3px var(--color-primary-soft);
}

.search-icon {
    position: absolute;
    left: var(--spacing-md);
    top: 50%;
    transform: translateY(-50%);
    font-size: 16px;
    opacity: 0.6;
}

.filter-group {
    display: flex;
    gap: var(--spacing-md);
    flex-wrap: wrap;
}

.filter-select {
    padding: var(--spacing-sm) var(--spacing-md);
    border: 1px solid var(--color-gray-200);
    border-radius: var(--radius-md);
    font-family: var(--font-family);
    font-size: 14px;
    background: var(--color-white);
    color: var(--color-gray-700);
    cursor: pointer;
    transition: all var(--transition-base);
    min-width: 180px;
}

.filter-select:focus {
    outline: none;
    border-color: var(--color-primary);
    box-shadow: 0 0 0 3px var(--color-primary-soft);
}

.filter-select:hover {
    border-color: var(--color-gray-300);
}

/* ========================================
   PRODUCTS GRID
   ======================================== */
.products-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
    gap: var(--spacing-xl);
    animation: fadeIn var(--transition-slow) ease-out;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* ========================================
   PRODUCT CARD
   ======================================== */
.product-card {
    background: var(--color-white);
    border-radius: var(--radius-lg);
    overflow: hidden;
    box-shadow: var(--shadow-sm);
    border: 1px solid var(--color-gray-100);
    transition: all var(--transition-base);
    display: flex;
    flex-direction: column;
}

.product-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-lg);
}

.product-image {
    position: relative;
    width: 100%;
    height: 200px;
    overflow: hidden;
}

.product-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform var(--transition-slow);
}

.product-card:hover .product-image img {
    transform: scale(1.05);
}

.product-status {
    position: absolute;
    top: var(--spacing-md);
    right: var(--spacing-md);
    padding: 6px 12px;
    border-radius: var(--radius-full);
    font-size: 12px;
    font-weight: var(--font-weight-semibold);
    text-transform: uppercase;
    letter-spacing: 0.03em;
}

.product-status.active {
    background: var(--color-success-light);
    color: var(--color-success);
}

.product-status.inactive {
    background: var(--color-gray-200);
    color: var(--color-gray-600);
}

.product-content {
    padding: var(--spacing-lg);
    display: flex;
    flex-direction: column;
    gap: var(--spacing-md);
    flex: 1;
}

.product-header {
    display: flex;
    flex-direction: column;
    gap: var(--spacing-xs);
}

.product-name {
    font-size: 18px;
    font-weight: var(--font-weight-semibold);
    color: var(--color-gray-900);
    line-height: 1.3;
}

.product-category {
    font-size: 13px;
    color: var(--color-gray-500);
}

.product-info {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: var(--spacing-md);
    padding: var(--spacing-md) 0;
    border-top: 1px solid var(--color-gray-100);
    border-bottom: 1px solid var(--color-gray-100);
}

.info-item {
    display: flex;
    flex-direction: column;
    gap: 4px;
}

.info-label {
    font-size: 12px;
    color: var(--color-gray-500);
    text-transform: uppercase;
    letter-spacing: 0.05em;
}

.info-value {
    font-size: 16px;
    font-weight: var(--font-weight-semibold);
    color: var(--color-gray-800);
}

.info-value.price {
    color: var(--color-primary);
}

.info-value.stock.high {
    color: var(--color-success);
}

.info-value.stock.medium {
    color: var(--color-warning);
}

.info-value.stock.low {
    color: var(--color-danger);
}

.product-actions {
    display: flex;
    gap: var(--spacing-sm);
    margin-top: auto;
}

.product-actions button {
    flex: 1;
}

/* ========================================
   MODAL
   ======================================== */
.modal-overlay {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.5);
    backdrop-filter: blur(4px);
    z-index: 2000;
    align-items: center;
    justify-content: center;
    padding: var(--spacing-lg);
    animation: fadeIn 0.2s ease-out;
}

.modal-overlay.show {
    display: flex;
}

.modal-container {
    background: var(--color-white);
    border-radius: var(--radius-xl);
    box-shadow: var(--shadow-xl);
    max-width: 600px;
    width: 100%;
    max-height: 90vh;
    overflow-y: auto;
    animation: slideUp 0.3s ease-out;
}

@keyframes slideUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.modal-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: var(--spacing-xl);
    border-bottom: 1px solid var(--color-gray-200);
}

.modal-title {
    font-size: 22px;
    font-weight: var(--font-weight-bold);
    color: var(--color-gray-900);
}

.modal-close {
    width: 36px;
    height: 36px;
    border: none;
    background: var(--color-gray-100);
    color: var(--color-gray-600);
    font-size: 20px;
    border-radius: var(--radius-sm);
    cursor: pointer;
    transition: all var(--transition-fast);
}

.modal-close:hover {
    background: var(--color-gray-200);
    color: var(--color-gray-800);
}

/* ========================================
   PRODUCT FORM
   ======================================== */
.product-form {
    padding: var(--spacing-xl);
}

.form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: var(--spacing-lg);
    margin-bottom: var(--spacing-lg);
}

.form-group {
    display: flex;
    flex-direction: column;
    gap: var(--spacing-xs);
}

.form-group.full-width {
    grid-column: 1 / -1;
}

.form-group label {
    font-size: 14px;
    font-weight: var(--font-weight-medium);
    color: var(--color-gray-700);
}

.form-group input,
.form-group select,
.form-group textarea {
    padding: var(--spacing-sm) var(--spacing-md);
    border: 1px solid var(--color-gray-200);
    border-radius: var(--radius-sm);
    font-family: var(--font-family);
    font-size: 14px;
    background: var(--color-white);
    transition: all var(--transition-base);
}

.form-group input:focus,
.form-group select:focus,
.form-group textarea:focus {
    outline: none;
    border-color: var(--color-primary);
    box-shadow: 0 0 0 3px var(--color-primary-soft);
}

.form-group textarea {
    resize: vertical;
    min-height: 100px;
}

/* File Upload */
.file-upload {
    position: relative;
}

.file-upload input[type="file"] {
    position: absolute;
    opacity: 0;
    width: 0;
    height: 0;
}

.file-upload-label {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: var(--spacing-sm);
    padding: var(--spacing-lg);
    border: 2px dashed var(--color-gray-300);
    border-radius: var(--radius-md);
    background: var(--color-gray-50);
    cursor: pointer;
    transition: all var(--transition-base);
}

.file-upload-label:hover {
    border-color: var(--color-primary);
    background: var(--color-primary-soft);
}

.file-icon {
    font-size: 24px;
}

.file-text {
    font-size: 14px;
    color: var(--color-gray-600);
}

.image-preview {
    margin-top: var(--spacing-md);
    display: none;
}

.image-preview.show {
    display: block;
}

.image-preview img {
    width: 100%;
    max-height: 200px;
    object-fit: cover;
    border-radius: var(--radius-md);
}

.modal-actions {
    display: flex;
    gap: var(--spacing-md);
    padding-top: var(--spacing-lg);
    border-top: 1px solid var(--color-gray-200);
}

.modal-actions button {
    flex: 1;
}

/* ========================================
   CONFIRMATION MODAL
   ======================================== */
.confirm-modal {
    max-width: 450px;
    text-align: center;
}

.confirm-modal .modal-header {
    border-bottom: none;
    padding-bottom: 0;
    justify-content: flex-end;
}

.confirm-icon {
    font-size: 64px;
    margin: var(--spacing-lg) 0;
}

.confirm-title {
    font-size: 22px;
    font-weight: var(--font-weight-bold);
    color: var(--color-gray-900);
    margin-bottom: var(--spacing-md);
}

.confirm-message {
    color: var(--color-gray-600);
    font-size: 15px;
    line-height: 1.6;
    margin-bottom: var(--spacing-xl);
    padding: 0 var(--spacing-xl);
}

/* ========================================
   TOAST NOTIFICATION
   ======================================== */
.toast {
    position: fixed;
    bottom: var(--spacing-xl);
    right: var(--spacing-xl);
    background: var(--color-gray-900);
    color: var(--color-white);
    padding: var(--spacing-md) var(--spacing-lg);
    border-radius: var(--radius-md);
    box-shadow: var(--shadow-xl);
    display: flex;
    align-items: center;
    gap: var(--spacing-md);
    z-index: 3000;
    transform: translateY(200%);
    transition: transform var(--transition-base);
}

.toast.show {
    transform: translateY(0);
}

.toast.success {
    background: var(--color-success);
}

.toast.error {
    background: var(--color-danger);
}

.toast-icon {
    font-size: 20px;
}

.toast-message {
    font-size: 14px;
    font-weight: var(--font-weight-medium);
}

/* ========================================
   RESPONSIVE
   ======================================== */

/* Tablet */
@media (max-width: 1024px) {
    .main-content {
        margin-left: 0;
        padding: var(--spacing-lg);
    }
    
    .sidebar {
        transform: translateX(-100%);
    }
    
    .products-grid {
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: var(--spacing-lg);
    }
    
    .filters-bar {
        flex-direction: column;
    }
    
    .filter-group {
        width: 100%;
    }
    
    .filter-select {
        flex: 1;
        min-width: 0;
    }
}

/* Mobile */
@media (max-width: 768px) {
    .page-header {
        flex-direction: column;
        align-items: flex-start;
        gap: var(--spacing-md);
    }
    
    .btn-primary {
        width: 100%;
        justify-content: center;
    }
    
    .products-grid {
        grid-template-columns: 1fr;
    }
    
    .form-row {
        grid-template-columns: 1fr;
    }
    
    .modal-container {
        max-height: 95vh;
        margin: 0;
    }
    
    .profile-info {
        display: none;
    }
    
    .navbar {
        padding: 0 var(--spacing-md);
    }
    
    .toast {
        right: var(--spacing-md);
        left: var(--spacing-md);
        bottom: var(--spacing-md);
    }
}

/* Small mobile */
@media (max-width: 480px) {
    .main-content {
        padding: var(--spacing-md);
    }
    
    .page-title {
        font-size: 22px;
    }
    
    .product-image {
        height: 180px;
    }
    
    .product-content {
        padding: var(--spacing-md);
    }
    
    .product-actions {
        flex-direction: column;
    }
    
    .modal-overlay {
        padding: 0;
    }
    
    .modal-container {
        border-radius: var(--radius-lg) var(--radius-lg) 0 0;
        max-height: 100vh;
    }
}

/* ========================================
   SCROLLBAR CUSTOM
   ======================================== */
.modal-container::-webkit-scrollbar,
.sidebar::-webkit-scrollbar {
    width: 6px;
}

.modal-container::-webkit-scrollbar-track,
.sidebar::-webkit-scrollbar-track {
    background: var(--color-gray-100);
}

.modal-container::-webkit-scrollbar-thumb,
.sidebar::-webkit-scrollbar-thumb {
    background: var(--color-gray-300);
    border-radius: 3px;
}

.modal-container::-webkit-scrollbar-thumb:hover,
.sidebar::-webkit-scrollbar-thumb:hover {
    background: var(--color-gray-400);
}

/* ========================================
   UTILITIES
   ======================================== */
.hidden {
    display: none !important;
}

.no-results {
    grid-column: 1 / -1;
    text-align: center;
    padding: var(--spacing-2xl);
    color: var(--color-gray-500);
}

.no-results-icon {
    font-size: 64px;
    margin-bottom: var(--spacing-md);
    opacity: 0.5;
}

.no-results-text {
    font-size: 18px;
    font-weight: var(--font-weight-medium);
}
</style>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="navbar-left">
            <div class="navbar-brand">
                <div class="brand-icon">🌿</div>
                <h1>Jardin Naturel</h1>
            </div>
        </div>
        
        <div class="navbar-right">
            <div class="admin-profile">
                <div class="profile-avatar">JD</div>
                <div class="profile-info">
                    <span class="profile-name">Julie Dupont</span>
                    <span class="profile-role">Administrateur</span>
                </div>
            </div>
        </div>
    </nav>

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
        
        <div class="sidebar-footer">
            <div class="upgrade-card">
                <div class="upgrade-icon">✨</div>
                <h3>Version Premium</h3>
                <p>Débloquez toutes les fonctionnalités</p>
                <button class="upgrade-btn">Découvrir</button>
            </div>
        </div>
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
                        <button class="btn-edit" onclick="editProduct(1)">
                            <span class="btn-icon">✏️</span>
                            Modifier
                        </button>
                        <button class="btn-delete" onclick="confirmDelete(1)">
                            <span class="btn-icon">🗑️</span>
                            Supprimer
                        </button>
                    </div>
                </div>
            </div>
            @endforeach

            <!-- Product Card 2
            <div class="product-card" data-id="2" data-category="outils" data-status="active">
                <div class="product-image">
                    <img src="https://images.unsplash.com/photo-1416879595882-3373a0480b5b?w=400&h=300&fit=crop" alt="Sécateur Professionnel">
                    <span class="product-status active">Actif</span>
                </div>
                <div class="product-content">
                    <div class="product-header">
                        <h3 class="product-name">Sécateur Professionnel</h3>
                        <span class="product-category">Outils de jardinage</span>
                    </div>
                    <div class="product-info">
                        <div class="info-item">
                            <span class="info-label">Prix</span>
                            <span class="info-value price">24,90€</span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Stock</span>
                            <span class="info-value stock medium">45 unités</span>
                        </div>
                    </div>
                    <div class="product-actions">
                        <button class="btn-edit" onclick="editProduct(2)">
                            <span class="btn-icon">✏️</span>
                            Modifier
                        </button>
                        <button class="btn-delete" onclick="confirmDelete(2)">
                            <span class="btn-icon">🗑️</span>
                            Supprimer
                        </button>
                    </div>
                </div>
            </div> -->

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

    <script src="products-script.js"></script>
</body>
<script>
    // ========================================
// GESTION DES PRODUITS - JARDIN NATUREL
// JavaScript pour CRUD complet
// ========================================

// ========================================
// DONNÉES DES PRODUITS (Simulation base de données)
// ========================================
// let products = [
//     {
//         id: 1,
//         name: "Graines de Tomates Bio",
//         category: "graines",
//         categoryName: "Graines et semences",
//         price: 4.99,
//         stock: 156,
//         status: "active",
//         description: "Graines de tomates biologiques certifiées, variété ancienne à haut rendement.",
//         image: "https://images.unsplash.com/photo-1530836369250-ef72a3f5cda8?w=400&h=300&fit=crop"
//     },
//     {
//         id: 2,
//         name: "Sécateur Professionnel",
//         category: "outils",
//         categoryName: "Outils de jardinage",
//         price: 24.90,
//         stock: 45,
//         status: "active",
//         description: "Sécateur ergonomique en acier inoxydable, idéal pour la taille de précision.",
//         image: "https://images.unsplash.com/photo-1416879595882-3373a0480b5b?w=400&h=300&fit=crop"
//     },
//     {
//         id: 3,
//         name: "Engrais Naturel Bio",
//         category: "engrais",
//         categoryName: "Engrais et fertilisants",
//         price: 12.50,
//         stock: 89,
//         status: "active",
//         description: "Engrais 100% naturel et biologique pour toutes les plantes.",
//         image: "https://images.unsplash.com/photo-1585320806297-9794b3e4eeae?w=400&h=300&fit=crop"
//     },
//     {
//         id: 4,
//         name: "Pot en Terre Cuite",
//         category: "pots",
//         categoryName: "Pots et jardinières",
//         price: 8.90,
//         stock: 12,
//         status: "active",
//         description: "Pot en terre cuite traditionnelle, drainage optimal.",
//         image: "https://images.unsplash.com/photo-1485955900006-10f4d324d411?w=400&h=300&fit=crop"
//     },
//     {
//         id: 5,
//         name: "Graines de Basilic",
//         category: "graines",
//         categoryName: "Graines et semences",
//         price: 3.50,
//         stock: 8,
//         status: "inactive",
//         description: "Graines de basilic aromatique pour culture en pot ou jardin.",
//         image: "https://images.unsplash.com/photo-1592419044706-39796d40f98c?w=400&h=300&fit=crop"
//     },
//     {
//         id: 6,
//         name: "Nain de Jardin Décoratif",
//         category: "decor",
//         categoryName: "Décoration jardin",
//         price: 15.99,
//         stock: 34,
//         status: "active",
//         description: "Figurine décorative en résine peinte à la main.",
//         image: "https://images.unsplash.com/photo-1585320806297-9794b3e4eeae?w=400&h=300&fit=crop"
//     }
// ];

// Variable pour stocker l'ID du produit à supprimer
// let productToDelete = null;

// ========================================
// INITIALISATION
// ========================================
document.addEventListener('DOMContentLoaded', function() {
    initializeEventListeners();
    // renderProducts();
});

function initializeEventListeners() {
    // Bouton Ajouter un produit
    document.getElementById('addProductBtn').addEventListener('click', openAddModal);
    
    // Formulaire de produit
    // document.getElementById('productForm').addEventListener('submit', handleFormSubmit);
    
    // Upload d'image
    // document.getElementById('productImage').addEventListener('change', handleImageUpload);
    
    // Recherche
    // document.getElementById('searchInput').addEventListener('input', filterProducts);
    
    // Filtres
    // document.getElementById('categoryFilter').addEventListener('change', filterProducts);
    // document.getElementById('statusFilter').addEventListener('change', filterProducts);
    // document.getElementById('sortBy').addEventListener('change', filterProducts);
}

// ========================================
// RENDU DES PRODUITS
// ========================================
// function renderProducts(productsToRender = products) {
//     const grid = document.getElementById('productsGrid');
    
//     if (productsToRender.length === 0) {
//         grid.innerHTML = `
//             <div class="no-results">
//                 <div class="no-results-icon">🔍</div>
//                 <p class="no-results-text">Aucun produit trouvé</p>
//             </div>
//         `;
//         return;
//     }
    
//     // grid.innerHTML = productsToRender.map(product => createProductCard(product)).join('');
// }

// function createProductCard(product) {
//     const stockClass = product.stock > 50 ? 'high' : product.stock > 20 ? 'medium' : 'low';
//     const statusClass = product.status === 'active' ? 'active' : 'inactive';
//     const statusText = product.status === 'active' ? 'Actif' : 'Inactif';
    
//     return `
//         <div class="product-card" data-id="${product.id}" data-category="${product.category}" data-status="${product.status}">
//             <div class="product-image">
//                 <img src="${product.image}" alt="${product.name}">
//                 <span class="product-status ${statusClass}">${statusText}</span>
//             </div>
//             <div class="product-content">
//                 <div class="product-header">
//                     <h3 class="product-name">${product.name}</h3>
//                     <span class="product-category">${product.categoryName}</span>
//                 </div>
//                 <div class="product-info">
//                     <div class="info-item">
//                         <span class="info-label">Prix</span>
//                         <span class="info-value price">${product.price.toFixed(2)}€</span>
//                     </div>
//                     <div class="info-item">
//                         <span class="info-label">Stock</span>
//                         <span class="info-value stock ${stockClass}">${product.stock} unités</span>
//                     </div>
//                 </div>
//                 <div class="product-actions">
//                     <button class="btn-edit" onclick="editProduct(${product.id})">
//                         <span class="btn-icon">✏️</span>
//                         Modifier
//                     </button>
//                     <button class="btn-delete" onclick="confirmDelete(${product.id})">
//                         <span class="btn-icon">🗑️</span>
//                         Supprimer
//                     </button>
//                 </div>
//             </div>
//         </div>
//     `;
// }

// ========================================
// FILTRAGE ET RECHERCHE
// ========================================
// function filterProducts() {
//     const searchTerm = document.getElementById('searchInput').value.toLowerCase();
//     const categoryFilter = document.getElementById('categoryFilter').value;
//     const statusFilter = document.getElementById('statusFilter').value;
//     const sortBy = document.getElementById('sortBy').value;
    
//     let filtered = products.filter(product => {
//         const matchesSearch = product.name.toLowerCase().includes(searchTerm) ||
//                             product.categoryName.toLowerCase().includes(searchTerm);
//         const matchesCategory = !categoryFilter || product.category === categoryFilter;
//         const matchesStatus = !statusFilter || product.status === statusFilter;
        
//         return matchesSearch && matchesCategory && matchesStatus;
//     });
    
//     // Tri
//     filtered.sort((a, b) => {
//         switch(sortBy) {
//             case 'name-asc':
//                 return a.name.localeCompare(b.name);
//             case 'name-desc':
//                 return b.name.localeCompare(a.name);
//             case 'price-asc':
//                 return a.price - b.price;
//             case 'price-desc':
//                 return b.price - a.price;
//             case 'stock-asc':
//                 return a.stock - b.stock;
//             case 'stock-desc':
//                 return b.stock - a.stock;
//             default:
//                 return 0;
//         }
//     });
    
//     renderProducts(filtered);
// }

// ========================================
// MODAL - AJOUTER UN PRODUIT
// ========================================
function openAddModal() {
    // document.getElementById('modalTitle').textContent = 'Ajouter un produit';
    // document.getElementById('submitBtnText').textContent = 'Ajouter le produit';
    // document.getElementById('productForm').reset();
    // document.getElementById('productId').value = '';
    // document.getElementById('imagePreview').classList.remove('show');
    // document.getElementById('imagePreview').innerHTML = '';
    document.getElementById('productModal').classList.add('show');
}

// ========================================
// MODAL - MODIFIER UN PRODUIT
// ========================================
function editProduct(id) {
//     const product = products.find(p => p.id === id);
//     if (!product) return;
    
//     document.getElementById('modalTitle').textContent = 'Modifier le produit';
//     document.getElementById('submitBtnText').textContent = 'Enregistrer les modifications';
    
//     // document.getElementById('productId').value = product.id;
//     document.getElementById('productName').value = product.name;
//     document.getElementById('productCategory').value = product.category;
//     document.getElementById('productPrice').value = product.price;
//     document.getElementById('productStock').value = product.stock;
//     document.getElementById('productStatus').value = product.status;
//     document.getElementById('productDescription').value = product.description || '';
    
//     // Afficher l'aperçu de l'image
//     // const preview = document.getElementById('imagePreview');
//     // preview.innerHTML = `<img src="${product.image}" alt="${product.name}">`;
//     // preview.classList.add('show');
    
    document.getElementById('productModal').classList.add('show');
}

// ========================================
// FERMER LE MODAL
// ========================================
function closeModal() {
    document.getElementById('productModal').classList.remove('show');
}

// ========================================
// GESTION DU FORMULAIRE
// // ========================================
// function handleFormSubmit(e) {
//     e.preventDefault();
    
//     const formData = {
//         name: document.getElementById('productName').value,
//         category: document.getElementById('productCategory').value,
//         categoryName: getCategoryName(document.getElementById('productCategory').value),
//         price: parseFloat(document.getElementById('productPrice').value),
//         stock: parseInt(document.getElementById('productStock').value),
//         status: document.getElementById('productStatus').value,
//         description: document.getElementById('productDescription').value,
//         image: getImageUrl()
//     };
    
//     // const productId = document.getElementById('productId').value;
    
//     // if (productId) {
//     //     // Mise à jour
//     //     updateProduct(parseInt(productId), formData);
//     // } else {
//     //     // Création
//     //     addProduct(formData);
//     // }
// }

// function getCategoryName(categoryValue) {
//     const categories = {
//         'graines': 'Graines et semences',
//         'outils': 'Outils de jardinage',
//         'engrais': 'Engrais et fertilisants',
//         'pots': 'Pots et jardinières',
//         'decor': 'Décoration jardin'
//     };
//     return categories[categoryValue] || categoryValue;
// }

// function getImageUrl() {
//     // const preview = document.getElementById('imagePreview');
//     const img = preview.querySelector('img');
//     return img ? img.src : 'https://images.unsplash.com/photo-1585320806297-9794b3e4eeae?w=400&h=300&fit=crop';
// }

// ========================================
// AJOUTER UN PRODUIT
// ========================================
// function addProduct(data) {
//     const newProduct = {
//         id: Math.max(...products.map(p => p.id)) + 1,
//         ...data
//     };
    
//     products.push(newProduct);
//     renderProducts();
//     // filterProducts(); // Réappliquer les filtres
//     closeModal();
//     showToast('Produit ajouté avec succès', 'success');
    
//     // Mettre à jour le badge
//     updateProductBadge();
// }

// ========================================
// METTRE À JOUR UN PRODUIT
// ========================================
// function updateProduct(id, data) {
//     const index = products.findIndex(p => p.id === id);
//     if (index !== -1) {
//         products[index] = { ...products[index], ...data };
//         renderProducts();
//         // filterProducts(); // Réappliquer les filtres
//         closeModal();
//         showToast('Produit modifié avec succès', 'success');
//     }
// }

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

// ========================================
// SUPPRIMER UN PRODUIT
// ========================================
// function deleteProduct() {
//     if (productToDelete !== null) {
//         products = products.filter(p => p.id !== productToDelete);
//         renderProducts();
//         filterProducts(); // Réappliquer les filtres
//         closeConfirmModal();
//         showToast('Produit supprimé avec succès', 'success');
        
//         // Mettre à jour le badge
//         updateProductBadge();
//     }
// }

// ========================================
// GESTION DE L'UPLOAD D'IMAGE
// ========================================
// function handleImageUpload(e) {
//     const file = e.target.files[0];
//     if (!file) return;
    
//     // Vérifier le type de fichier
//     if (!file.type.startsWith('image/')) {
//         showToast('Veuillez sélectionner une image valide', 'error');
//         return;
//     }
    
//     // Vérifier la taille (max 5MB)
//     if (file.size > 5 * 1024 * 1024) {
//         showToast('L\'image ne doit pas dépasser 5MB', 'error');
//         return;
//     }
    
//     const reader = new FileReader();
//     reader.onload = function(event) {
//         // const preview = document.getElementById('imagePreview');
//         preview.innerHTML = `<img src="${event.target.result}" alt="Aperçu">`;
//         preview.classList.add('show');
//     };
//     reader.readAsDataURL(file);
// }

// ========================================
// NOTIFICATIONS TOAST
// ========================================
// function showToast(message, type = 'success') {
//     const toast = document.getElementById('toast');
//     const toastMessage = document.getElementById('toastMessage');
//     const toastIcon = document.getElementById('toastIcon');
    
//     toastMessage.textContent = message;
    
//     // Icône selon le type
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

// ========================================
// METTRE À JOUR LE BADGE DE PRODUITS
// ========================================
// function updateProductBadge() {
//     const badge = document.querySelector('.nav-item.active .nav-badge');
//     if (badge) {
//         badge.textContent = products.length;
//     }
// }

// ========================================
// FERMER LES MODALS AU CLIC EXTÉRIEUR
// ========================================
// document.addEventListener('click', function(e) {
//     const productModal = document.getElementById('productModal');
//     const confirmModal = document.getElementById('confirmModal');
    
//     if (e.target === productModal) {
//         closeModal();
//     }
    
//     if (e.target === confirmModal) {
//         closeConfirmModal();
//     }
// });

// ========================================
// NAVIGATION CLAVIER
// ========================================
// document.addEventListener('keydown', function(e) {
//     // Échap pour fermer les modals
//     if (e.key === 'Escape') {
//         const productModal = document.getElementById('productModal');
//         const confirmModal = document.getElementById('confirmModal');
        
//         if (productModal.classList.contains('show')) {
//             closeModal();
//         }
        
//         if (confirmModal.classList.contains('show')) {
//             closeConfirmModal();
//         }
//     }
    
//     // Ctrl/Cmd + K pour focus sur la recherche
//     if ((e.ctrlKey || e.metaKey) && e.key === 'k') {
//         e.preventDefault();
//         document.getElementById('searchInput').focus();
//     }
// });

// ========================================
// ANIMATIONS D'ENTRÉE
// ========================================
// function animateCards() {
//     const cards = document.querySelectorAll('.product-card');
//     cards.forEach((card, index) => {
//         card.style.animation = `fadeIn 0.5s ease-out ${index * 0.05}s both`;
//     });
// // }

// // Observer pour animer les cartes au scroll
// const observer = new IntersectionObserver((entries) => {
//     entries.forEach(entry => {
//         if (entry.isIntersecting) {
//             entry.target.style.animation = 'fadeIn 0.5s ease-out';
//         }
//     });
// }, {
//     threshold: 0.1
// });

// Observer toutes les cartes au chargement
// document.addEventListener('DOMContentLoaded', () => {
//     setTimeout(() => {
//         document.querySelectorAll('.product-card').forEach(card => {
//             observer.observe(card);
//         });
//     }, 100);
// });

// ========================================
// UTILITAIRES
// ========================================

// Formater le prix
// function formatPrice(price) {
//     return price.toFixed(2) + '€';
// }

// Obtenir la classe de couleur pour le stock
// function getStockClass(stock) {
//     if (stock > 50) return 'high';
//     if (stock > 20) return 'medium';
//     return 'low';
// }

// Générer un ID unique
// function generateId() {
//     return Math.max(...products.map(p => p.id), 0) + 1;
// }

// Export des fonctions pour le HTML
// window.editProduct = editProduct;
window.confirmDelete = confirmDelete;
// window.deleteProduct = deleteProduct;
// window.closeModal = closeModal;
window.closeConfirmModal = closeConfirmModal;

// console.log('🌿 Gestion des produits Jardin Naturel initialisée');
// console.log(`📦 ${products.length} produits chargés`);
</script>
</html>