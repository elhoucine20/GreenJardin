<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Catégories - Jardin Naturel</title>
    <link rel="stylesheet" href="categories-styles.css">
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
    margin-bottom: var(--spacing-xl);
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
   STATS SUMMARY
   ======================================== */
.stats-summary {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
    gap: var(--spacing-lg);
    margin-bottom: var(--spacing-2xl);
}

.stat-item {
    background: var(--color-white);
    padding: var(--spacing-lg);
    border-radius: var(--radius-lg);
    display: flex;
    align-items: center;
    gap: var(--spacing-lg);
    box-shadow: var(--shadow-sm);
    border: 1px solid var(--color-gray-100);
    transition: all var(--transition-base);
}

.stat-item:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-md);
}

.stat-icon {
    font-size: 40px;
    width: 64px;
    height: 64px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, var(--color-primary-soft), var(--color-accent));
    border-radius: var(--radius-md);
}

.stat-content {
    display: flex;
    flex-direction: column;
}

.stat-value {
    font-size: 28px;
    font-weight: var(--font-weight-bold);
    color: var(--color-gray-900);
    line-height: 1;
}

.stat-label {
    font-size: 13px;
    color: var(--color-gray-500);
    margin-top: var(--spacing-xs);
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
   CATEGORIES GRID
   ======================================== */
.categories-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(340px, 1fr));
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
   CATEGORY CARD
   ======================================== */
.category-card {
    background: var(--color-white);
    border-radius: var(--radius-lg);
    overflow: hidden;
    box-shadow: var(--shadow-sm);
    border: 1px solid var(--color-gray-100);
    transition: all var(--transition-base);
    display: flex;
    flex-direction: column;
}

.category-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-lg);
}

.card-header {
    padding: var(--spacing-lg);
    background: linear-gradient(135deg, var(--color-primary-soft), var(--color-accent));
    display: flex;
    align-items: center;
    justify-content: space-between;
    border-bottom: 1px solid var(--color-gray-100);
}

.category-icon {
    font-size: 48px;
    width: 80px;
    height: 80px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: var(--color-white);
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-sm);
}

.category-status {
    padding: 6px 14px;
    border-radius: var(--radius-full);
    font-size: 12px;
    font-weight: var(--font-weight-semibold);
    text-transform: uppercase;
    letter-spacing: 0.03em;
}

.category-status.active {
    background: var(--color-success-light);
    color: var(--color-success);
}

.category-status.inactive {
    background: var(--color-gray-200);
    color: var(--color-gray-600);
}

.card-content {
    padding: var(--spacing-lg);
    flex: 1;
    display: flex;
    flex-direction: column;
    gap: var(--spacing-md);
}

.category-name {
    font-size: 20px;
    font-weight: var(--font-weight-bold);
    color: var(--color-gray-900);
    line-height: 1.3;
}

.category-description {
    color: var(--color-gray-600);
    font-size: 14px;
    line-height: 1.6;
    flex: 1;
}

.category-stats {
    display: flex;
    gap: var(--spacing-sm);
    padding-top: var(--spacing-md);
    border-top: 1px solid var(--color-gray-100);
}

.stat-badge {
    display: flex;
    align-items: center;
    gap: var(--spacing-xs);
    padding: var(--spacing-xs) var(--spacing-md);
    background: var(--color-primary-soft);
    border-radius: var(--radius-sm);
}

.badge-icon {
    font-size: 16px;
}

.badge-text {
    font-size: 13px;
    font-weight: var(--font-weight-medium);
    color: var(--color-primary-dark);
}

.card-actions {
    display: flex;
    gap: var(--spacing-sm);
    padding: var(--spacing-md) var(--spacing-lg);
    background: var(--color-gray-50);
    border-top: 1px solid var(--color-gray-100);
}

.card-actions button {
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
   CATEGORY FORM
   ======================================== */
.category-form {
    padding: var(--spacing-xl);
}

.form-group {
    margin-bottom: var(--spacing-lg);
}

.form-group label {
    display: block;
    font-size: 14px;
    font-weight: var(--font-weight-medium);
    color: var(--color-gray-700);
    margin-bottom: var(--spacing-xs);
}

.form-group input,
.form-group select,
.form-group textarea {
    width: 100%;
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

/* Icon Selector */
.icon-selector {
    display: flex;
    flex-direction: column;
    gap: var(--spacing-md);
}

.icon-suggestions {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(50px, 1fr));
    gap: var(--spacing-sm);
    padding: var(--spacing-md);
    background: var(--color-gray-50);
    border-radius: var(--radius-sm);
}

.icon-btn {
    width: 50px;
    height: 50px;
    border: 2px solid var(--color-gray-200);
    background: var(--color-white);
    border-radius: var(--radius-sm);
    font-size: 24px;
    cursor: pointer;
    transition: all var(--transition-base);
}

.icon-btn:hover {
    border-color: var(--color-primary);
    background: var(--color-primary-soft);
    transform: scale(1.1);
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
   EMPTY STATE
   ======================================== */
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
    
    .categories-grid {
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: var(--spacing-lg);
    }
    
    .stats-summary {
        grid-template-columns: 1fr;
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
    
    .categories-grid {
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
    
    .icon-suggestions {
        grid-template-columns: repeat(6, 1fr);
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
    
    .card-content {
        padding: var(--spacing-md);
    }
    
    .card-actions {
        flex-direction: column;
    }
    
    .modal-overlay {
        padding: 0;
    }
    
    .modal-container {
        border-radius: var(--radius-lg) var(--radius-lg) 0 0;
        max-height: 100vh;
    }
    
    .category-icon {
        width: 64px;
        height: 64px;
        font-size: 36px;
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
    <aside class="sidebar">
        <nav class="sidebar-nav">
            <a href="{{route('Dashbord-Admin')}}" class="nav-item">
                <span class="nav-icon">📊</span>
                <span class="nav-text">Tableau de bord</span>
            </a>
            <a href="{{route('category-admin')}}"  class="nav-item active">
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
            <a href="{{route('utilisateurs-admin')}}"  class="nav-item">
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
                    <span class="stat-value" >{{$totalCategories}}</span>
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
                    <button class="btn-delete" onclick="confirm()">
                        <span class="btn-icon">🗑️</span>
                        Supprimer
                    </button>
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
                    <input id="categoryName" name="categorie_name" type="text"  required placeholder="Ex: Graines et Semences">
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

    <script src="categories-script.js"></script>
</body>
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
    
    // document.getElementById('categoryId').value = category.id;
    // document.getElementById('categoryNameEdit').value = categorie.name;
    // document.getElementById('categoryIconEdit').value = categorie.icon;
    // document.getElementById('categoryDescriptionEdit').value = categorie.description;
    // document.getElementById('categoryStatus').value = category.status;
    let Modal = document.getElementById('categoryModalEdit');
    Modal.innerHTML=`
            <div class="modal-container">
            <div class="modal-header">
                <h3 class="modal-title" id="modalTitle">Modifier la catégorie</h3>
                <button class="modal-close" onclick="closeModalEdit()">✕</button>
            </div>
            
            <form action="{{route('edit-categorie',${categorie.id}" method="post" class="category-form" id="categoryForm">
                @csrf
                @method('PUT')
                <!-- <input type="hidden" id="categoryId"> -->
                
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

// ========================================
// FERMER LE MODAL
// ========================================
function closeModal() {
    document.getElementById('categoryModal').classList.remove('show');
}
function closeModalEdit() {
    document.getElementById('categoryModalEdit').classList.remove('show');
}

// ========================================
// SÉLECTIONNER UNE ICÔNE
// ========================================
function selectIcon(icon) {
    document.getElementById('categoryIcon').value = icon;
}


// ========================================
// METTRE À JOUR UNE CATÉGORIE
// ========================================
function updateCategory(id, data) {

        closeModalEdit();

}

// ========================================
// CONFIRMATION DE SUPPRESSION
// ========================================
function confirmDelete(id) {
    // categoryToDelete = id;
    document.getElementById('confirmModal').classList.add('show');
}

function closeConfirmModal() {
    // categoryToDelete = null;
    document.getElementById('confirmModal').classList.remove('show');
}

// ========================================
// SUPPRIMER UNE CATÉGORIE
// ========================================
function deleteCategory() {

        closeConfirmModal();

}

</script>
</html>