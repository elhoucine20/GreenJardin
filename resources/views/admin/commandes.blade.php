<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Commandes - Jardin Naturel</title>
    <link rel="stylesheet" href="orders-styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<style>
    /* ========================================
   VARIABLES & PALETTE DE COULEURS
   ======================================== */
:root {
    /* Couleurs principales */
    --color-primary: #2d6a4f;
    --color-primary-light: #40916c;
    --color-primary-dark: #1b4332;
    --color-primary-soft: #d8f3dc;
    
    /* Couleurs secondaires */
    --color-secondary: #52b788;
    --color-accent: #95d5b2;
    
    /* Couleurs de statut */
    --color-pending: #f39c12;
    --color-pending-light: #fef5e7;
    --color-paid: #52b788;
    --color-paid-light: #d8f3dc;
    --color-shipped: #9b59b6;
    --color-shipped-light: #f3ebf9;
    --color-cancelled: #e74c3c;
    --color-cancelled-light: #fadbd8;
    
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
.btn-view,
.btn-status,
.btn-cancel,
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

.btn-view {
    background: var(--color-primary-soft);
    color: var(--color-primary);
    border: 1px solid var(--color-primary);
    padding: var(--spacing-xs) var(--spacing-md);
    font-size: 13px;
}

.btn-view:hover {
    background: var(--color-primary);
    color: var(--color-white);
}

.btn-status {
    background: var(--color-pending-light);
    color: var(--color-pending);
    border: 1px solid var(--color-pending);
    padding: var(--spacing-xs) var(--spacing-md);
    font-size: 13px;
}

.btn-status:hover {
    background: var(--color-pending);
    color: var(--color-white);
}

.btn-status:disabled {
    opacity: 0.5;
    cursor: not-allowed;
}

.btn-cancel {
    background: var(--color-cancelled-light);
    color: var(--color-cancelled);
    border: 1px solid var(--color-cancelled);
    padding: var(--spacing-xs) var(--spacing-md);
    font-size: 13px;
}

.btn-cancel:hover {
    background: var(--color-cancelled);
    color: var(--color-white);
}

.btn-cancel:disabled {
    opacity: 0.5;
    cursor: not-allowed;
}

.btn-danger {
    background: var(--color-cancelled);
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
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: var(--spacing-lg);
    margin-bottom: var(--spacing-2xl);
}

.stat-card {
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

.stat-card:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-md);
}

.stat-icon {
    font-size: 36px;
    width: 60px;
    height: 60px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: var(--radius-md);
}

.stat-icon.pending {
    background: var(--color-pending-light);
}

.stat-icon.paid {
    background: var(--color-paid-light);
}

.stat-icon.shipped {
    background: var(--color-shipped-light);
}

.stat-icon.cancelled {
    background: var(--color-cancelled-light);
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
    min-width: 160px;
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
   ORDERS GRID
   ======================================== */
.orders-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(360px, 1fr));
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
   ORDER CARD
   ======================================== */
.order-card {
    background: var(--color-white);
    border-radius: var(--radius-lg);
    overflow: hidden;
    box-shadow: var(--shadow-sm);
    border: 1px solid var(--color-gray-100);
    transition: all var(--transition-base);
    display: flex;
    flex-direction: column;
}

.order-card:hover {
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

.order-number {
    font-size: 16px;
    font-weight: var(--font-weight-bold);
    color: var(--color-primary-dark);
}

.status-badge {
    padding: 6px 14px;
    border-radius: var(--radius-full);
    font-size: 12px;
    font-weight: var(--font-weight-semibold);
    text-transform: uppercase;
    letter-spacing: 0.03em;
}

.status-badge.pending {
    background: var(--color-pending-light);
    color: var(--color-pending);
}

.status-badge.paid {
    background: var(--color-paid-light);
    color: var(--color-paid);
}

.status-badge.shipped {
    background: var(--color-shipped-light);
    color: var(--color-shipped);
}

.status-badge.cancelled {
    background: var(--color-cancelled-light);
    color: var(--color-cancelled);
}

.card-body {
    padding: var(--spacing-lg);
    flex: 1;
    display: flex;
    flex-direction: column;
    gap: var(--spacing-lg);
}

.customer-info {
    display: flex;
    align-items: center;
    gap: var(--spacing-md);
}

.customer-avatar {
    width: 50px;
    height: 50px;
    border-radius: var(--radius-full);
    background: linear-gradient(135deg, var(--color-primary), var(--color-secondary));
    color: var(--color-white);
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: var(--font-weight-semibold);
    font-size: 16px;
}

.customer-details {
    display: flex;
    flex-direction: column;
}

.customer-name {
    font-weight: var(--font-weight-semibold);
    color: var(--color-gray-900);
    font-size: 15px;
}

.customer-email {
    font-size: 13px;
    color: var(--color-gray-500);
}

.order-meta {
    display: flex;
    flex-direction: column;
    gap: var(--spacing-sm);
    padding: var(--spacing-md);
    background: var(--color-gray-50);
    border-radius: var(--radius-sm);
}

.meta-item {
    display: flex;
    justify-content: space-between;
    font-size: 13px;
}

.meta-label {
    color: var(--color-gray-500);
}

.meta-value {
    font-weight: var(--font-weight-medium);
    color: var(--color-gray-800);
}

.order-amount {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-top: var(--spacing-md);
    border-top: 1px solid var(--color-gray-100);
}

.amount-label {
    font-size: 13px;
    color: var(--color-gray-500);
}

.amount-value {
    font-size: 22px;
    font-weight: var(--font-weight-bold);
    color: var(--color-primary);
}

.card-actions {
    display: flex;
    gap: var(--spacing-xs);
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

.modal-container.large {
    max-width: 900px;
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

.modal-body {
    padding: var(--spacing-xl);
}

/* ========================================
   ORDER DETAILS
   ======================================== */
.details-section {
    margin-bottom: var(--spacing-xl);
}

.section-title {
    font-size: 16px;
    font-weight: var(--font-weight-semibold);
    color: var(--color-gray-900);
    margin-bottom: var(--spacing-md);
    display: flex;
    align-items: center;
    gap: var(--spacing-sm);
}

.info-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: var(--spacing-md);
}

.info-item {
    display: flex;
    flex-direction: column;
    gap: var(--spacing-xs);
}

.info-label {
    font-size: 12px;
    color: var(--color-gray-500);
    text-transform: uppercase;
    letter-spacing: 0.05em;
}

.info-value {
    font-size: 14px;
    font-weight: var(--font-weight-medium);
    color: var(--color-gray-800);
}

.products-table {
    border: 1px solid var(--color-gray-200);
    border-radius: var(--radius-md);
    overflow: hidden;
}

.product-row {
    display: grid;
    grid-template-columns: 2fr 1fr 1fr;
    gap: var(--spacing-md);
    padding: var(--spacing-md);
    border-bottom: 1px solid var(--color-gray-100);
}

.product-row:last-child {
    border-bottom: none;
}

.product-row.header {
    background: var(--color-gray-50);
    font-weight: var(--font-weight-semibold);
    font-size: 13px;
    color: var(--color-gray-600);
}

.order-summary {
    background: var(--color-gray-50);
    padding: var(--spacing-lg);
    border-radius: var(--radius-md);
}

.summary-row {
    display: flex;
    justify-content: space-between;
    padding: var(--spacing-sm) 0;
    font-size: 14px;
}

.summary-row.total {
    border-top: 2px solid var(--color-gray-300);
    margin-top: var(--spacing-sm);
    padding-top: var(--spacing-md);
    font-size: 18px;
    font-weight: var(--font-weight-bold);
    color: var(--color-primary);
}

.status-timeline {
    display: flex;
    flex-direction: column;
    gap: var(--spacing-md);
}

.timeline-item {
    display: flex;
    gap: var(--spacing-md);
    position: relative;
}

.timeline-item:not(:last-child)::after {
    content: '';
    position: absolute;
    left: 14px;
    top: 32px;
    width: 2px;
    height: calc(100% + var(--spacing-md));
    background: var(--color-gray-200);
}

.timeline-dot {
    width: 28px;
    height: 28px;
    border-radius: var(--radius-full);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 14px;
    flex-shrink: 0;
    z-index: 1;
}

.timeline-dot.pending {
    background: var(--color-pending-light);
}

.timeline-dot.paid {
    background: var(--color-paid-light);
}

.timeline-dot.shipped {
    background: var(--color-shipped-light);
}

.timeline-content {
    flex: 1;
}

.timeline-title {
    font-weight: var(--font-weight-semibold);
    color: var(--color-gray-900);
    font-size: 14px;
}

.timeline-date {
    font-size: 13px;
    color: var(--color-gray-500);
}

/* ========================================
   FORM ELEMENTS
   ======================================== */
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

.form-select {
    width: 100%;
    padding: var(--spacing-sm) var(--spacing-md);
    border: 1px solid var(--color-gray-200);
    border-radius: var(--radius-sm);
    font-family: var(--font-family);
    font-size: 14px;
    background: var(--color-white);
    transition: all var(--transition-base);
}

.form-select:focus {
    outline: none;
    border-color: var(--color-primary);
    box-shadow: 0 0 0 3px var(--color-primary-soft);
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
    background: var(--color-paid);
}

.toast.error {
    background: var(--color-cancelled);
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
    
    .orders-grid {
        grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        gap: var(--spacing-lg);
    }
    
    .stats-summary {
        grid-template-columns: repeat(2, 1fr);
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
    
    .orders-grid {
        grid-template-columns: 1fr;
    }
    
    .stats-summary {
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
    
    .info-grid {
        grid-template-columns: 1fr;
    }
    
    .product-row {
        grid-template-columns: 1fr;
    }
    
    .card-actions {
        flex-direction: column;
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
    
    .card-body {
        padding: var(--spacing-md);
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
            <a href="{{route('Dashbord-Admin')}}" class="nav-item ">
                <span class="nav-icon">📊</span>
                <span class="nav-text">Tableau de bord</span>
            </a>
            <a href="{{route('category-admin')}}"  class="nav-item">
                <span class="nav-icon">🏷️</span>
                <span class="nav-text">Catégories</span>
                <span class="nav-badge">48</span>
            </a>
            <a href="{{route('produits-admin')}}" class="nav-item">
                <span class="nav-icon">🌱</span>
                <span class="nav-text">Produits</span>
                <span class="nav-badge">48</span>
            </a>
            <a href="{{route('commandes-admin')}}" class="nav-item active">
                <span class="nav-icon">📦</span>
                <span class="nav-text">Commandes</span>
                <span class="nav-badge">12</span>
            </a>
            <a href="{{route('utilisateurs-admin')}}"  class="nav-item">
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

    <script src="orders-script.js"></script>
</body>
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
</html>