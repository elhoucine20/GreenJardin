<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Utilisateurs - Jardin Naturel</title>
    <link rel="stylesheet" href="users-styles.css">
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

        /* Couleurs de rôle */
        --color-admin: #9b59b6;
        --color-admin-light: #f3ebf9;
        --color-client: #4a90e2;
        --color-client-light: #e8f4fd;

        /* Couleurs de statut */
        --color-active: #52b788;
        --color-active-light: #d8f3dc;
        --color-blocked: #e74c3c;
        --color-blocked-light: #fadbd8;

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
    .btn-edit,
    .btn-more,
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

    .btn-edit {
        background: var(--color-client-light);
        color: var(--color-client);
        border: 1px solid var(--color-client);
        padding: var(--spacing-xs) var(--spacing-md);
        font-size: 13px;
    }

    .btn-edit:hover {
        background: var(--color-client);
        color: var(--color-white);
    }

    .btn-more {
        background: var(--color-gray-100);
        color: var(--color-gray-600);
        padding: var(--spacing-xs) var(--spacing-sm);
        font-size: 18px;
        min-width: auto;
    }

    .btn-more:hover {
        background: var(--color-gray-200);
    }

    .btn-danger {
        background: var(--color-blocked);
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
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
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

    .stat-icon.total {
        background: var(--color-primary-soft);
    }

    .stat-icon.admins {
        background: var(--color-admin-light);
    }

    .stat-icon.clients {
        background: var(--color-client-light);
    }

    .stat-icon.active {
        background: var(--color-active-light);
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
   USERS GRID
   ======================================== */
    .users-grid {
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
   USER CARD
   ======================================== */
    .user-card {
        background: var(--color-white);
        border-radius: var(--radius-lg);
        overflow: hidden;
        box-shadow: var(--shadow-sm);
        border: 1px solid var(--color-gray-100);
        transition: all var(--transition-base);
        display: flex;
        flex-direction: column;
        position: relative;
    }

    .user-card:hover {
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

    .user-avatar {
        width: 64px;
        height: 64px;
        border-radius: var(--radius-full);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        font-weight: var(--font-weight-bold);
        color: var(--color-white);
        border: 3px solid var(--color-white);
        box-shadow: var(--shadow-sm);
    }

    .user-avatar.admin {
        background: linear-gradient(135deg, var(--color-admin), #8e44ad);
    }

    .user-avatar.client {
        background: linear-gradient(135deg, var(--color-client), #3498db);
    }

    .user-badges {
        display: flex;
        flex-direction: column;
        gap: var(--spacing-xs);
        align-items: flex-end;
    }

    .role-badge,
    .status-badge {
        padding: 5px 12px;
        border-radius: var(--radius-full);
        font-size: 11px;
        font-weight: var(--font-weight-semibold);
        text-transform: uppercase;
        letter-spacing: 0.03em;
    }

    .role-badge.admin {
        background: var(--color-admin-light);
        color: var(--color-admin);
    }

    .role-badge.client {
        background: var(--color-client-light);
        color: var(--color-client);
    }

    .status-badge.active {
        background: var(--color-active-light);
        color: var(--color-active);
    }

    .status-badge.blocked {
        background: var(--color-blocked-light);
        color: var(--color-blocked);
    }

    .card-body {
        padding: var(--spacing-lg);
        flex: 1;
    }

    .user-name {
        font-size: 18px;
        font-weight: var(--font-weight-semibold);
        color: var(--color-gray-900);
        margin-bottom: var(--spacing-xs);
    }

    .user-email {
        font-size: 14px;
        color: var(--color-gray-500);
        margin-bottom: var(--spacing-md);
    }

    .user-meta {
        display: flex;
        flex-direction: column;
        gap: var(--spacing-xs);
    }

    .meta-item {
        display: flex;
        align-items: center;
        gap: var(--spacing-xs);
        font-size: 13px;
        color: var(--color-gray-600);
    }

    .meta-icon {
        font-size: 14px;
    }

    .card-actions {
        display: flex;
        gap: var(--spacing-xs);
        padding: var(--spacing-md) var(--spacing-lg);
        background: var(--color-gray-50);
        border-top: 1px solid var(--color-gray-100);
    }

    .card-actions button:not(.btn-more) {
        flex: 1;
    }

    /* ========================================
   DROPDOWN MENU
   ======================================== */
    .dropdown-menu {
        display: none;
        position: absolute;
        right: var(--spacing-md);
        bottom: 70px;
        background: var(--color-white);
        border: 1px solid var(--color-gray-200);
        border-radius: var(--radius-sm);
        box-shadow: var(--shadow-lg);
        z-index: 10;
        min-width: 150px;
    }

    .dropdown-menu.show {
        display: block;
        animation: slideDown 0.2s ease-out;
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .dropdown-menu button {
        width: 100%;
        padding: var(--spacing-sm) var(--spacing-md);
        border: none;
        background: none;
        text-align: left;
        font-family: var(--font-family);
        font-size: 14px;
        color: var(--color-gray-700);
        cursor: pointer;
        transition: background var(--transition-fast);
        display: flex;
        align-items: center;
        gap: var(--spacing-sm);
    }

    .dropdown-menu button:hover {
        background: var(--color-gray-50);
    }

    .dropdown-menu button:first-child {
        border-radius: var(--radius-sm) var(--radius-sm) 0 0;
    }

    .dropdown-menu button:last-child {
        border-radius: 0 0 var(--radius-sm) var(--radius-sm);
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
        max-width: 700px;
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
   USER FORM
   ======================================== */
    .user-form {
        padding: var(--spacing-xl);
    }

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: var(--spacing-lg);
        margin-bottom: var(--spacing-lg);
    }

    .form-row:has(.form-group:only-child) {
        grid-template-columns: 1fr;
    }

    .form-group {
        display: flex;
        flex-direction: column;
        gap: var(--spacing-xs);
    }

    .form-group label {
        font-size: 14px;
        font-weight: var(--font-weight-medium);
        color: var(--color-gray-700);
    }

    .form-group input,
    .form-group select {
        padding: var(--spacing-sm) var(--spacing-md);
        border: 1px solid var(--color-gray-200);
        border-radius: var(--radius-sm);
        font-family: var(--font-family);
        font-size: 14px;
        background: var(--color-white);
        transition: all var(--transition-base);
    }

    .form-group input:focus,
    .form-group select:focus {
        outline: none;
        border-color: var(--color-primary);
        box-shadow: 0 0 0 3px var(--color-primary-soft);
    }

    .form-hint {
        font-size: 12px;
        color: var(--color-gray-500);
        margin-top: var(--spacing-xs);
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
   USER PROFILE
   ======================================== */
    .profile-section {
        margin-bottom: var(--spacing-xl);
    }

    .profile-header {
        display: flex;
        align-items: center;
        gap: var(--spacing-lg);
        padding: var(--spacing-lg);
        background: linear-gradient(135deg, var(--color-primary-soft), var(--color-accent));
        border-radius: var(--radius-md);
    }

    .profile-avatar-large {
        width: 100px;
        height: 100px;
        border-radius: var(--radius-full);
        background: linear-gradient(135deg, var(--color-primary), var(--color-secondary));
        color: var(--color-white);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 36px;
        font-weight: var(--font-weight-bold);
        border: 4px solid var(--color-white);
        box-shadow: var(--shadow-md);
    }

    .profile-info h3 {
        font-size: 24px;
        font-weight: var(--font-weight-bold);
        color: var(--color-gray-900);
        margin-bottom: var(--spacing-xs);
    }

    .profile-info p {
        font-size: 15px;
        color: var(--color-gray-600);
        margin-bottom: var(--spacing-md);
    }

    .profile-badges {
        display: flex;
        gap: var(--spacing-sm);
    }

    .profile-details {
        display: flex;
        flex-direction: column;
        gap: var(--spacing-md);
    }

    .detail-row {
        display: flex;
        justify-content: space-between;
        padding: var(--spacing-md);
        background: var(--color-gray-50);
        border-radius: var(--radius-sm);
    }

    .detail-label {
        color: var(--color-gray-600);
        font-size: 14px;
    }

    .detail-value {
        font-weight: var(--font-weight-semibold);
        color: var(--color-gray-900);
        font-size: 14px;
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
        background: var(--color-active);
    }

    .toast.error {
        background: var(--color-blocked);
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

        .users-grid {
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
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

        .users-grid {
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

        .form-row {
            grid-template-columns: 1fr;
        }

        .card-actions {
            flex-wrap: wrap;
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

        .user-avatar {
            width: 50px;
            height: 50px;
            font-size: 18px;
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
            <a href="{{route('category-admin')}}" class="nav-item">
                <span class="nav-icon">🏷️</span>
                <span class="nav-text">Catégories</span>
                <span class="nav-badge">48</span>
            </a>
            <a href="{{route('produits-admin')}}" class="nav-item">
                <span class="nav-icon">🌱</span>
                <span class="nav-text">Produits</span>
                <span class="nav-badge">48</span>
            </a>
            <a href="{{route('commandes-admin')}}" class="nav-item">
                <span class="nav-icon">📦</span>
                <span class="nav-text">Commandes</span>
                <span class="nav-badge">12</span>
            </a>
            <a href="{{route('utilisateurs-admin')}}" class="nav-item active">
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
                <h2 class="page-title">Gestion des Utilisateurs</h2>
                <p class="page-subtitle">Gérez les comptes et les permissions de vos utilisateurs</p>
            </div>
            <button class="btn-primary" id="addUserBtn">
                <span class="btn-icon">➕</span>
                Ajouter un utilisateur
            </button>
        </div>

        <!-- Stats Summary -->
        <div class="stats-summary">
            <div class="stat-card">
                <div class="stat-icon total">👥</div>
                <div class="stat-content">
                    <span class="stat-value" id="totalUsers">12</span>
                    <span class="stat-label">Total utilisateurs</span>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon admins">🔑</div>
                <div class="stat-content">
                    <span class="stat-value" id="adminCount">3</span>
                    <span class="stat-label">Administrateurs</span>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon clients">👤</div>
                <div class="stat-content">
                    <span class="stat-value" id="clientCount">9</span>
                    <span class="stat-label">Clients</span>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon active">✅</div>
                <div class="stat-content">
                    <span class="stat-value" id="activeCount">11</span>
                    <span class="stat-label">Comptes actifs</span>
                </div>
            </div>
        </div>

        <!-- Filters Bar -->
        <div class="filters-bar">
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
        </div>

        <!-- Users Grid -->
        <div class="users-grid" id="usersGrid">
            <!-- User Card 1 -->
            <div class="user-card" data-id="1" data-role="admin" data-status="active">
                <div class="card-header">
                    <div class="user-avatar admin">JD</div>
                    <div class="user-badges">
                        <span class="role-badge admin">Admin</span>
                        <span class="status-badge active">Actif</span>
                    </div>
                </div>
                <div class="card-body">
                    <h3 class="user-name">Julie Dupont</h3>
                    <p class="user-email">julie.dupont@email.fr</p>
                    <div class="user-meta">
                        <span class="meta-item">
                            <span class="meta-icon">📅</span>
                            Inscrit le 15 Jan 2024
                        </span>
                    </div>
                </div>
                <div class="card-actions">
                    <button class="btn-view" onclick="viewUserProfile(1)">
                        <span class="btn-icon">👁️</span>
                        Profil
                    </button>
                    <button class="btn-edit" onclick="editUser(1)">
                        <span class="btn-icon">✏️</span>
                        Modifier
                    </button>
                    <button class="btn-more" onclick="toggleUserMenu(1)">⋮</button>
                </div>
                <div class="dropdown-menu" id="menu-1">
                    <button onclick="toggleUserStatus(1)">
                        <span>🔒</span> Bloquer
                    </button>
                    <button onclick="confirmDeleteUser(1)">
                        <span>🗑️</span> Supprimer
                    </button>
                </div>
            </div>

            <!-- User Card 2 -->
            <div class="user-card" data-id="2" data-role="admin" data-status="active">
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
            </div>

            <!-- User Card 3 -->
            <div class="user-card" data-id="3" data-role="client" data-status="active">
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
            </div>

            <!-- User Card 4 -->
            <div class="user-card" data-id="4" data-role="client" data-status="blocked">
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
            </div>
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

    <script src="users-script.js"></script>
</body>

</html>