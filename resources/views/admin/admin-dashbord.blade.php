


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Jardin Naturel</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<style>
    /* ========================================
       VARIABLES & PALETTE DE COULEURS NATURELLE
       ======================================== */
    :root {
        /* Couleurs principales - Thème jardin naturel */
        --color-primary: #2d6a4f;        /* Vert forêt principal */
        --color-primary-light: #40916c;  /* Vert moyen */
        --color-primary-dark: #1b4332;   /* Vert foncé */
        --color-primary-soft: #d8f3dc;   /* Vert pastel clair */
        
        /* Couleurs secondaires */
        --color-secondary: #52b788;      /* Vert vif */
        --color-accent: #95d5b2;         /* Vert menthe */
        
        /* Couleurs contextuelles */
        --color-blue: #4a90e2;
        --color-blue-light: #e8f4fd;
        --color-purple: #9b59b6;
        --color-purple-light: #f3ebf9;
        --color-orange: #f39c12;
        --color-orange-light: #fef5e7;
        --color-red: #e74c3c;
        --color-red-light: #fadbd8;
        
        /* Neutrals - Gris élégants */
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
        --color-gray-900: #0f1114;
        
        /* Typographie */
        --font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
        --font-weight-light: 300;
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
        
        /* Shadows - Douces et élégantes */
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
       RESET & BASE STYLES
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
       NAVBAR - Navigation supérieure
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
    
    .navbar-left {
        display: flex;
        align-items: center;
        gap: var(--spacing-lg);
    }
    
    .menu-toggle {
        display: none;
        flex-direction: column;
        gap: 5px;
        background: none;
        border: none;
        cursor: pointer;
        padding: var(--spacing-sm);
        border-radius: var(--radius-sm);
        transition: background var(--transition-fast);
    }
    
    .menu-toggle:hover {
        background: var(--color-gray-100);
    }
    
    .menu-toggle span {
        display: block;
        width: 22px;
        height: 2px;
        background: var(--color-gray-700);
        border-radius: 2px;
        transition: all var(--transition-base);
    }
    
    .navbar-brand {
        display: flex;
        align-items: center;
        gap: var(--spacing-sm);
    }
    
    .brand-icon {
        font-size: 32px;
        line-height: 1;
    }
    
    .navbar-brand h1 {
        font-size: 20px;
        font-weight: var(--font-weight-bold);
        color: var(--color-primary);
        letter-spacing: -0.02em;
    }
    
    .navbar-right {
        display: flex;
        align-items: center;
        gap: var(--spacing-lg);
    }
    
    /* Search Box */
    .search-box {
        position: relative;
        display: flex;
        align-items: center;
    }
    
    .search-box input {
        width: 320px;
        padding: var(--spacing-sm) var(--spacing-md);
        padding-right: 40px;
        border: 1px solid var(--color-gray-200);
        border-radius: var(--radius-full);
        font-family: var(--font-family);
        font-size: 14px;
        background: var(--color-gray-50);
        transition: all var(--transition-base);
    }
    
    .search-box input:focus {
        outline: none;
        border-color: var(--color-primary);
        background: var(--color-white);
        box-shadow: 0 0 0 3px var(--color-primary-soft);
    }
    
    .search-icon {
        position: absolute;
        right: var(--spacing-md);
        font-size: 16px;
        opacity: 0.6;
    }
    
    /* Notification Bell */
    .notification-bell {
        position: relative;
        cursor: pointer;
        padding: var(--spacing-sm);
        border-radius: var(--radius-sm);
        transition: background var(--transition-fast);
    }
    
    .notification-bell:hover {
        background: var(--color-gray-100);
    }
    
    .bell-icon {
        font-size: 20px;
    }
    
    .notification-badge {
        position: absolute;
        top: 4px;
        right: 4px;
        background: var(--color-red);
        color: var(--color-white);
        font-size: 11px;
        font-weight: var(--font-weight-semibold);
        padding: 2px 6px;
        border-radius: var(--radius-full);
        border: 2px solid var(--color-white);
    }
    
    /* Admin Profile */
    .admin-profile {
        display: flex;
        align-items: center;
        gap: var(--spacing-md);
        padding: var(--spacing-sm) var(--spacing-md);
        border-radius: var(--radius-md);
        transition: background var(--transition-fast);
        cursor: pointer;
    }
    
    .admin-profile:hover {
        background: var(--color-gray-50);
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
        font-size: 14px;
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
    
    .logout-btn {
        margin-left: var(--spacing-sm);
        padding: var(--spacing-sm) var(--spacing-md);
        background: var(--color-white);
        border: 1px solid var(--color-gray-200);
        border-radius: var(--radius-sm);
        font-family: var(--font-family);
        font-size: 13px;
        font-weight: var(--font-weight-medium);
        color: var(--color-gray-700);
        cursor: pointer;
        transition: all var(--transition-base);
    }
    
    .logout-btn:hover {
        background: var(--color-gray-50);
        border-color: var(--color-gray-300);
        transform: translateY(-1px);
    }
    
    /* ========================================
       SIDEBAR - Menu latéral
       ======================================== */
    .sidebar {
        position: fixed;
        left: 0;
        top: var(--navbar-height);
        width: var(--sidebar-width);
        height: calc(100vh - var(--navbar-height));
        background: var(--color-white);
        border-right: 1px solid var(--color-gray-200);
        overflow-y: auto;
        padding: var(--spacing-xl) 0;
        z-index: 999;
        transition: transform var(--transition-base);
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
        transform: translateX(2px);
    }
    
    .nav-item.active {
        background: linear-gradient(135deg, var(--color-primary-soft), var(--color-accent));
        color: var(--color-primary-dark);
        font-weight: var(--font-weight-semibold);
        box-shadow: var(--shadow-sm);
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
        flex-shrink: 0;
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
    
    /* Sidebar Footer - Upgrade Card */
    .sidebar-footer {
        margin-top: auto;
        padding: var(--spacing-xl) var(--spacing-md);
    }
    
    .upgrade-card {
        background: linear-gradient(135deg, var(--color-primary), var(--color-secondary));
        padding: var(--spacing-lg);
        border-radius: var(--radius-lg);
        text-align: center;
        color: var(--color-white);
        box-shadow: var(--shadow-md);
    }
    
    .upgrade-icon {
        font-size: 32px;
        margin-bottom: var(--spacing-sm);
    }
    
    .upgrade-card h3 {
        font-size: 16px;
        font-weight: var(--font-weight-bold);
        margin-bottom: var(--spacing-xs);
    }
    
    .upgrade-card p {
        font-size: 13px;
        opacity: 0.9;
        margin-bottom: var(--spacing-md);
    }
    
    .upgrade-btn {
        width: 100%;
        padding: var(--spacing-sm) var(--spacing-md);
        background: var(--color-white);
        color: var(--color-primary);
        border: none;
        border-radius: var(--radius-sm);
        font-family: var(--font-family);
        font-weight: var(--font-weight-semibold);
        font-size: 13px;
        cursor: pointer;
        transition: all var(--transition-base);
    }
    
    .upgrade-btn:hover {
        transform: translateY(-2px);
        box-shadow: var(--shadow-md);
    }
    
    /* ========================================
       MAIN CONTENT - Contenu principal
       ======================================== */
    .main-content {
        margin-left: var(--sidebar-width);
        margin-top: var(--navbar-height);
        padding: var(--spacing-2xl);
        min-height: calc(100vh - var(--navbar-height));
    }
    
    /* Content Header */
    .content-header {
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
    
    .header-actions {
        display: flex;
        gap: var(--spacing-md);
    }
    
    /* Buttons */
    .btn-primary,
    .btn-secondary {
        padding: var(--spacing-sm) var(--spacing-lg);
        border: none;
        border-radius: var(--radius-sm);
        font-family: var(--font-family);
        font-weight: var(--font-weight-semibold);
        font-size: 14px;
        cursor: pointer;
        transition: all var(--transition-base);
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
        transform: translateY(-1px);
    }
    
    /* ========================================
       STATS GRID - Cartes statistiques
       ======================================== */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
        gap: var(--spacing-lg);
        margin-bottom: var(--spacing-2xl);
    }
    
    .stat-card {
        background: var(--color-white);
        padding: var(--spacing-xl);
        border-radius: var(--radius-lg);
        display: flex;
        gap: var(--spacing-lg);
        box-shadow: var(--shadow-sm);
        border: 1px solid var(--color-gray-100);
        transition: all var(--transition-base);
        position: relative;
        overflow: hidden;
    }
    
    .stat-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, var(--card-color-start), var(--card-color-end));
    }
    
    .stat-card:hover {
        transform: translateY(-4px);
        box-shadow: var(--shadow-lg);
    }
    
    /* Couleurs par carte */
    .stat-card-green {
        --card-color-start: var(--color-primary);
        --card-color-end: var(--color-secondary);
    }
    
    .stat-card-blue {
        --card-color-start: #4a90e2;
        --card-color-end: #5dade2;
    }
    
    .stat-card-purple {
        --card-color-start: #9b59b6;
        --card-color-end: #af7ac5;
    }
    
    .stat-card-orange {
        --card-color-start: #f39c12;
        --card-color-end: #f8b739;
    }
    
    .stat-icon {
        font-size: 48px;
        width: 70px;
        height: 70px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: var(--radius-md);
        background: var(--color-gray-50);
        flex-shrink: 0;
    }
    
    .stat-card-green .stat-icon {
        background: var(--color-primary-soft);
    }
    
    .stat-card-blue .stat-icon {
        background: var(--color-blue-light);
    }
    
    .stat-card-purple .stat-icon {
        background: var(--color-purple-light);
    }
    
    .stat-card-orange .stat-icon {
        background: var(--color-orange-light);
    }
    
    .stat-content {
        flex: 1;
    }
    
    .stat-value {
        font-size: 32px;
        font-weight: var(--font-weight-bold);
        color: var(--color-gray-900);
        margin-bottom: var(--spacing-xs);
        line-height: 1;
    }
    
    .stat-label {
        color: var(--color-gray-600);
        font-size: 14px;
        margin-bottom: var(--spacing-md);
    }
    
    .stat-trend {
        display: flex;
        align-items: center;
        gap: var(--spacing-xs);
        font-size: 13px;
    }
    
    .stat-trend.positive {
        color: var(--color-primary);
    }
    
    .stat-trend.negative {
        color: var(--color-red);
    }
    
    .trend-icon {
        font-weight: var(--font-weight-bold);
    }
    
    .trend-value {
        font-weight: var(--font-weight-semibold);
    }
    
    .trend-label {
        color: var(--color-gray-500);
    }
    
    /* ========================================
       TWO COLUMN SECTION
       ======================================== */
    .two-column-section {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: var(--spacing-lg);
        margin-bottom: var(--spacing-2xl);
    }
    
    .section-title {
        font-size: 18px;
        font-weight: var(--font-weight-bold);
        color: var(--color-gray-900);
        margin-bottom: var(--spacing-lg);
    }
    
    /* ========================================
       QUICK ACTIONS - Actions rapides
       ======================================== */
    .quick-actions {
        background: var(--color-white);
        padding: var(--spacing-xl);
        border-radius: var(--radius-lg);
        box-shadow: var(--shadow-sm);
        border: 1px solid var(--color-gray-100);
    }
    
    .action-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: var(--spacing-md);
    }
    
    .action-card {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: var(--spacing-sm);
        padding: var(--spacing-lg);
        background: var(--color-gray-50);
        border: 2px solid var(--color-gray-100);
        border-radius: var(--radius-md);
        cursor: pointer;
        transition: all var(--transition-base);
        font-family: var(--font-family);
    }
    
    .action-card:hover {
        background: var(--color-white);
        border-color: var(--color-primary);
        transform: translateY(-4px);
        box-shadow: var(--shadow-md);
    }
    
    .action-icon {
        font-size: 32px;
    }
    
    .action-text {
        font-size: 13px;
        font-weight: var(--font-weight-medium);
        color: var(--color-gray-700);
        text-align: center;
    }
    
    /* ========================================
       RECENT ACTIVITIES - Activités récentes
       ======================================== */
    .recent-activities {
        background: var(--color-white);
        padding: var(--spacing-xl);
        border-radius: var(--radius-lg);
        box-shadow: var(--shadow-sm);
        border: 1px solid var(--color-gray-100);
    }
    
    .activity-timeline {
        display: flex;
        flex-direction: column;
        gap: var(--spacing-lg);
    }
    
    .activity-item {
        display: flex;
        gap: var(--spacing-md);
        position: relative;
    }
    
    .activity-item:not(:last-child)::after {
        content: '';
        position: absolute;
        left: 9px;
        top: 24px;
        width: 2px;
        height: calc(100% + var(--spacing-lg));
        background: var(--color-gray-200);
    }
    
    .activity-dot {
        width: 20px;
        height: 20px;
        border-radius: var(--radius-full);
        border: 3px solid var(--color-white);
        box-shadow: var(--shadow-sm);
        flex-shrink: 0;
        margin-top: 2px;
    }
    
    .activity-dot.activity-green {
        background: var(--color-primary);
    }
    
    .activity-dot.activity-blue {
        background: var(--color-blue);
    }
    
    .activity-dot.activity-orange {
        background: var(--color-orange);
    }
    
    .activity-dot.activity-purple {
        background: var(--color-purple);
    }
    
    .activity-content {
        flex: 1;
    }
    
    .activity-text {
        color: var(--color-gray-700);
        font-size: 14px;
        margin-bottom: var(--spacing-xs);
    }
    
    .activity-text strong {
        font-weight: var(--font-weight-semibold);
        color: var(--color-gray-900);
    }
    
    .activity-time {
        color: var(--color-gray-500);
        font-size: 12px;
    }
    
    /* ========================================
       ORDERS SECTION - Tableau des commandes
       ======================================== */
    .orders-section {
        background: var(--color-white);
        padding: var(--spacing-xl);
        border-radius: var(--radius-lg);
        box-shadow: var(--shadow-sm);
        border: 1px solid var(--color-gray-100);
    }
    
    .section-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: var(--spacing-lg);
    }
    
    .view-all-link {
        color: var(--color-primary);
        font-size: 14px;
        font-weight: var(--font-weight-medium);
        text-decoration: none;
        transition: color var(--transition-fast);
    }
    
    .view-all-link:hover {
        color: var(--color-primary-dark);
    }
    
    .table-container {
        overflow-x: auto;
        border-radius: var(--radius-md);
        border: 1px solid var(--color-gray-200);
    }
    
    .orders-table {
        width: 100%;
        border-collapse: collapse;
    }
    
    .orders-table thead {
        background: var(--color-gray-50);
    }
    
    .orders-table th {
        padding: var(--spacing-md) var(--spacing-lg);
        text-align: left;
        font-weight: var(--font-weight-semibold);
        font-size: 13px;
        color: var(--color-gray-600);
        text-transform: uppercase;
        letter-spacing: 0.03em;
        border-bottom: 2px solid var(--color-gray-200);
    }
    
    .orders-table tbody tr {
        border-bottom: 1px solid var(--color-gray-100);
        transition: background var(--transition-fast);
    }
    
    .orders-table tbody tr:hover {
        background: var(--color-gray-50);
    }
    
    .orders-table td {
        padding: var(--spacing-md) var(--spacing-lg);
        font-size: 14px;
        color: var(--color-gray-700);
    }
    
    .order-id {
        font-weight: var(--font-weight-semibold);
        color: var(--color-primary);
    }
    
    .customer-info {
        display: flex;
        align-items: center;
        gap: var(--spacing-sm);
    }
    
    .customer-avatar {
        width: 36px;
        height: 36px;
        border-radius: var(--radius-full);
        background: linear-gradient(135deg, var(--color-primary-light), var(--color-accent));
        color: var(--color-white);
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: var(--font-weight-semibold);
        font-size: 13px;
    }
    
    .amount {
        font-weight: var(--font-weight-semibold);
        color: var(--color-gray-900);
    }
    
    /* Badges de statut */
    .badge {
        display: inline-block;
        padding: 5px 12px;
        border-radius: var(--radius-full);
        font-size: 12px;
        font-weight: var(--font-weight-semibold);
        text-transform: capitalize;
    }
    
    .badge-pending {
        background: var(--color-orange-light);
        color: var(--color-orange);
    }
    
    .badge-processing {
        background: var(--color-blue-light);
        color: var(--color-blue);
    }
    
    .badge-shipped {
        background: var(--color-purple-light);
        color: var(--color-purple);
    }
    
    .badge-delivered {
        background: var(--color-primary-soft);
        color: var(--color-primary);
    }
    
    .badge-cancelled {
        background: var(--color-red-light);
        color: var(--color-red);
    }
    
    .action-btn {
        background: none;
        border: none;
        font-size: 16px;
        padding: var(--spacing-xs);
        cursor: pointer;
        border-radius: var(--radius-sm);
        transition: background var(--transition-fast);
        margin: 0 2px;
    }
    
    .action-btn:hover {
        background: var(--color-gray-100);
    }
    
    /* ========================================
       RESPONSIVE DESIGN
       ======================================== */
    
    /* Tablettes et petits écrans */
    @media (max-width: 1024px) {
        .main-content {
            margin-left: 0;
            padding: var(--spacing-lg);
        }
        
        .sidebar {
            transform: translateX(-100%);
        }
        
        .sidebar.active {
            transform: translateX(0);
        }
        
        .menu-toggle {
            display: flex;
        }
        
        .stats-grid {
            grid-template-columns: repeat(2, 1fr);
        }
        
        .two-column-section {
            grid-template-columns: 1fr;
        }
        
        .search-box input {
            width: 200px;
        }
    }
    
    /* Mobile */
    @media (max-width: 768px) {
        .navbar {
            padding: 0 var(--spacing-md);
        }
        
        .navbar-brand h1 {
            font-size: 16px;
        }
        
        .search-box {
            display: none;
        }
        
        .profile-info {
            display: none;
        }
        
        .logout-btn {
            padding: var(--spacing-sm);
            font-size: 12px;
        }
        
        .stats-grid {
            grid-template-columns: 1fr;
        }
        
        .content-header {
            flex-direction: column;
            align-items: flex-start;
            gap: var(--spacing-md);
        }
        
        .header-actions {
            width: 100%;
            flex-direction: column;
        }
        
        .btn-primary,
        .btn-secondary {
            width: 100%;
            justify-content: center;
        }
        
        .page-title {
            font-size: 22px;
        }
        
        .action-grid {
            grid-template-columns: 1fr;
        }
        
        .table-container {
            border-radius: 0;
            margin: 0 calc(-1 * var(--spacing-lg));
        }
    }
    
    /* Très petits écrans */
    @media (max-width: 480px) {
        :root {
            --navbar-height: 60px;
        }
        
        .main-content {
            padding: var(--spacing-md);
        }
        
        .stat-card {
            padding: var(--spacing-md);
        }
        
        .stat-icon {
            width: 50px;
            height: 50px;
            font-size: 32px;
        }
        
        .stat-value {
            font-size: 24px;
        }
    }
    
    /* ========================================
       ANIMATIONS & MICRO-INTERACTIONS
       ======================================== */
    
    /* Animation d'entrée pour les cartes */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .stat-card,
    .action-card,
    .activity-item {
        animation: fadeInUp var(--transition-slow) ease-out;
    }
    
    /* Délais d'animation échelonnés */
    .stat-card:nth-child(1) { animation-delay: 0ms; }
    .stat-card:nth-child(2) { animation-delay: 100ms; }
    .stat-card:nth-child(3) { animation-delay: 200ms; }
    .stat-card:nth-child(4) { animation-delay: 300ms; }
    
    /* Effet de pulsation pour le badge de notification */
    @keyframes pulse {
        0%, 100% {
            transform: scale(1);
        }
        50% {
            transform: scale(1.1);
        }
    }
    
    .notification-badge {
        animation: pulse 2s infinite;
    }
    
    /* Scrollbar personnalisée */
    .sidebar::-webkit-scrollbar {
        width: 6px;
    }
    
    .sidebar::-webkit-scrollbar-track {
        background: var(--color-gray-100);
    }
    
    .sidebar::-webkit-scrollbar-thumb {
        background: var(--color-gray-300);
        border-radius: 3px;
    }
    
    .sidebar::-webkit-scrollbar-thumb:hover {
        background: var(--color-gray-400);
    }
    
    /* Focus states pour l'accessibilité */
    button:focus-visible,
    input:focus-visible,
    a:focus-visible {
        outline: 2px solid var(--color-primary);
        outline-offset: 2px;
    }
</style>

<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="navbar-left">
            <button class="menu-toggle" id="menuToggle">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <div class="navbar-brand">
                <div class="brand-icon">🌿</div>
                <h1>Jardin Naturel</h1>
            </div>
        </div>
        
        <div class="navbar-right">
            <div class="search-box">
                <input type="search" placeholder="Rechercher...">
                <span class="search-icon">🔍</span>
            </div>
            
            <div class="notification-bell">
                <span class="bell-icon">🔔</span>
                <span class="notification-badge">3</span>
            </div>
            
            <div class="admin-profile">
                <div class="profile-avatar">JD</div>
                <div class="profile-info">
                    <span class="profile-name">Julie Dupont</span>
                    <span class="profile-role">Administrateur</span>
                </div>
                <form method="POST" action="{{route('logout')}}">

                @csrf
                @method('POST')
                    <button type="submit" class="logout-btn">Déconnexion</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Sidebar -->
    <aside class="sidebar" id="sidebar">
        
        <nav class="sidebar-nav">
            <a href="{{route('Dashbord-Admin')}}" class="nav-item active">
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
        <div class="content-header">
            <div>
                <h2 class="page-title">Tableau de bord</h2>
                <p class="page-subtitle">Bienvenue, voici un aperçu de votre activité</p>
            </div>
            <div class="header-actions">
                <button class="btn-secondary">Exporter</button>
                <a href="{{route('create-produit')}}"> <button class="btn-primary">+ Nouveau produit</button></a>
               
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

    <script src="script.js"></script>
</body>
<!-- <script>
    // ========================================
   // DASHBOARD ADMIN - JARDIN NATUREL
   // JavaScript pour interactions et animations
   // ========================================
   
   document.addEventListener('DOMContentLoaded', function() {
    
    // ========================================
    // MENU TOGGLE (Mobile)
    // ========================================
    const menuToggle = document.getElementById('menuToggle');
    const sidebar = document.getElementById('sidebar');
    
    if (menuToggle && sidebar) {
        menuToggle.addEventListener('click', function() {
            sidebar.classList.toggle('active');
            
            // Animation du bouton hamburger
            const spans = this.querySelectorAll('span');
            if (sidebar.classList.contains('active')) {
                spans[0].style.transform = 'rotate(45deg) translateY(10px)';
                spans[1].style.opacity = '0';
                spans[2].style.transform = 'rotate(-45deg) translateY(-10px)';
            } else {
                spans[0].style.transform = 'none';
                spans[1].style.opacity = '1';
                spans[2].style.transform = 'none';
            }
        });
        
        // Fermer la sidebar en cliquant en dehors (mobile)
        document.addEventListener('click', function(e) {
            if (window.innerWidth <= 1024) {
                if (!sidebar.contains(e.target) && !menuToggle.contains(e.target)) {
                    sidebar.classList.remove('active');
                    const spans = menuToggle.querySelectorAll('span');
                    spans[0].style.transform = 'none';
                    spans[1].style.opacity = '1';
                    spans[2].style.transform = 'none';
                }
            }
        });
    }
    
    // ========================================
    // ANIMATION DES STATISTIQUES (compteur)
    // ========================================
    const statValues = document.querySelectorAll('.stat-value');
    
    function animateValue(element, start, end, duration) {
        const range = end - start;
        const increment = range / (duration / 16);
        let current = start;
        
        const timer = setInterval(() => {
            current += increment;
            if ((increment > 0 && current >= end) || (increment < 0 && current <= end)) {
                current = end;
                clearInterval(timer);
            }
            
            // Formater le nombre
            const text = element.textContent;
            if (text.includes('€')) {
                element.textContent = Math.floor(current).toLocaleString('fr-FR') + '€';
            } else {
                element.textContent = Math.floor(current).toLocaleString('fr-FR');
            }
        }, 16);
    }
    
    // Observer pour déclencher l'animation au scroll
    const observerOptions = {
        threshold: 0.5,
        rootMargin: '0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting && !entry.target.classList.contains('animated')) {
                entry.target.classList.add('animated');
                const text = entry.target.textContent;
                const numericValue = parseInt(text.replace(/[^0-9]/g, ''));
                
                if (!isNaN(numericValue)) {
                    animateValue(entry.target, 0, numericValue, 1500);
                }
            }
        });
    }, observerOptions);
    
    statValues.forEach(stat => observer.observe(stat));
    
    // ========================================
    // NOTIFICATION BELL - Effet au clic
    // ========================================
    const notificationBell = document.querySelector('.notification-bell');
    
    if (notificationBell) {
        notificationBell.addEventListener('click', function() {
            // Animation de "shake"
            this.style.animation = 'none';
            setTimeout(() => {
                this.style.animation = 'shake 0.5s ease';
            }, 10);
            
            // Simuler l'ouverture d'un dropdown (à implémenter)
            console.log('Ouvrir les notifications');
        });
    }
    
    // ========================================
    // SEARCH BOX - Animation focus
    // ========================================
    const searchInput = document.querySelector('.search-box input');
    
    if (searchInput) {
        searchInput.addEventListener('focus', function() {
            this.parentElement.style.transform = 'scale(1.02)';
        });
        
        searchInput.addEventListener('blur', function() {
            this.parentElement.style.transform = 'scale(1)';
        });
    }
    
    // ========================================
    // ACTION CARDS - Effet de ripple au clic
    // ========================================
    const actionCards = document.querySelectorAll('.action-card');
    
    actionCards.forEach(card => {
        card.addEventListener('click', function(e) {
            // Créer l'effet ripple
            const ripple = document.createElement('span');
            ripple.classList.add('ripple');
            
            const rect = this.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            const x = e.clientX - rect.left - size / 2;
            const y = e.clientY - rect.top - size / 2;
            
            ripple.style.width = ripple.style.height = size + 'px';
            ripple.style.left = x + 'px';
            ripple.style.top = y + 'px';
            
            this.appendChild(ripple);
            
            setTimeout(() => ripple.remove(), 600);
            
            // Action simulée
            console.log('Action card clicked:', this.querySelector('.action-text').textContent);
        });
    });
    
    // ========================================
    // TABLE ROWS - Highlight au survol
    // ========================================
    const tableRows = document.querySelectorAll('.orders-table tbody tr');
    
    tableRows.forEach(row => {
        row.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.01)';
            this.style.boxShadow = '0 2px 8px rgba(45, 106, 79, 0.1)';
        });
        
        row.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1)';
            this.style.boxShadow = 'none';
        });
    });
    
    // ========================================
    // ACTION BUTTONS dans le tableau
    // ========================================
    const actionBtns = document.querySelectorAll('.action-btn');
    
    actionBtns.forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.stopPropagation();
            
            // Animation de clic
            this.style.transform = 'scale(0.9)';
            setTimeout(() => {
                this.style.transform = 'scale(1)';
            }, 150);
            
            console.log('Action button clicked');
        });
    });
    
    // ========================================
    // LOGOUT BUTTON
    // ========================================
    const logoutBtn = document.querySelector('.logout-btn');
    
    if (logoutBtn) {
        logoutBtn.addEventListener('click', function() {
            if (confirm('Êtes-vous sûr de vouloir vous déconnecter ?')) {
                // Animation de déconnexion
                document.body.style.opacity = '0';
                document.body.style.transition = 'opacity 0.3s ease';
                
                setTimeout(() => {
                    console.log('Déconnexion...');
                    // Redirection vers la page de login
                    // window.location.href = '/login';
                }, 300);
            }
        });
    }
    
    // ========================================
    // SMOOTH SCROLL pour les ancres
    // ========================================
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
    
    // ========================================
    // TOOLTIPS (simple implementation)
    // ========================================
    function createTooltip(element, text) {
        const tooltip = document.createElement('div');
        tooltip.className = 'tooltip';
        tooltip.textContent = text;
        document.body.appendChild(tooltip);
        
        const rect = element.getBoundingClientRect();
        tooltip.style.left = rect.left + rect.width / 2 - tooltip.offsetWidth / 2 + 'px';
        tooltip.style.top = rect.top - tooltip.offsetHeight - 8 + 'px';
        
        setTimeout(() => tooltip.classList.add('show'), 10);
        
        return tooltip;
    }
    
    // Ajouter des tooltips aux badges de statut
    const badges = document.querySelectorAll('.badge');
    badges.forEach(badge => {
        let tooltip;
        
        badge.addEventListener('mouseenter', function() {
            const statusText = this.classList.contains('badge-pending') ? 'Commande en attente de traitement' :
                             this.classList.contains('badge-processing') ? 'Commande en cours de préparation' :
                             this.classList.contains('badge-shipped') ? 'Commande expédiée' :
                             this.classList.contains('badge-delivered') ? 'Commande livrée' :
                             'Commande annulée';
            
            tooltip = createTooltip(this, statusText);
        });
        
        badge.addEventListener('mouseleave', function() {
            if (tooltip) {
                tooltip.classList.remove('show');
                setTimeout(() => tooltip.remove(), 200);
            }
        });
    });
    
    // ========================================
    // REFRESH DATA (simulé)
    // ========================================
    let refreshInterval;
    
    function refreshDashboard() {
        console.log('Rafraîchissement des données...');
        
        // Animation de rafraîchissement sur les cartes stats
        document.querySelectorAll('.stat-card').forEach((card, index) => {
            setTimeout(() => {
                card.style.animation = 'none';
                setTimeout(() => {
                    card.style.animation = 'fadeInUp 0.5s ease-out';
                }, 10);
            }, index * 100);
        });
    }
    
    // Auto-refresh toutes les 30 secondes (optionnel)
    // refreshInterval = setInterval(refreshDashboard, 30000);
    
    // ========================================
    // KEYBOARD SHORTCUTS
    // ========================================
    document.addEventListener('keydown', function(e) {
        // Ctrl/Cmd + K pour focus sur la recherche
        if ((e.ctrlKey || e.metaKey) && e.key === 'k') {
            e.preventDefault();
            if (searchInput) {
                searchInput.focus();
            }
        }
        
        // Échap pour fermer la sidebar mobile
        if (e.key === 'Escape') {
            if (sidebar && sidebar.classList.contains('active')) {
                sidebar.classList.remove('active');
            }
        }
    });
    
    // ========================================
    // PERFORMANCE - Lazy loading pour les images (si nécessaire)
    // ========================================
    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    if (img.dataset.src) {
                        img.src = img.dataset.src;
                        img.removeAttribute('data-src');
                        imageObserver.unobserve(img);
                    }
                }
            });
        });
        
        document.querySelectorAll('img[data-src]').forEach(img => {
            imageObserver.observe(img);
        });
    }
    
    console.log('🌿 Dashboard Jardin Naturel initialisé avec succès');
   });
   
   // ========================================
   // ANIMATIONS CSS ADDITIONNELLES (via JS)
   // ========================================
   
   // Ajouter le CSS pour l'effet ripple
   const style = document.createElement('style');
   style.textContent = `
    .action-card {
        position: relative;
        overflow: hidden;
    }
    
    .ripple {
        position: absolute;
        border-radius: 50%;
        background: rgba(45, 106, 79, 0.3);
        transform: scale(0);
        animation: ripple-animation 0.6s ease-out;
        pointer-events: none;
    }
    
    @keyframes ripple-animation {
        to {
            transform: scale(4);
            opacity: 0;
        }
    }
    
    @keyframes shake {
        0%, 100% { transform: translateX(0); }
        25% { transform: translateX(-5px); }
        75% { transform: translateX(5px); }
    }
    
    .tooltip {
        position: fixed;
        background: rgba(0, 0, 0, 0.9);
        color: white;
        padding: 8px 12px;
        border-radius: 6px;
        font-size: 12px;
        font-weight: 500;
        pointer-events: none;
        z-index: 10000;
        opacity: 0;
        transform: translateY(4px);
        transition: all 0.2s ease;
        white-space: nowrap;
    }
    
    .tooltip.show {
        opacity: 1;
        transform: translateY(0);
    }
    
    .tooltip::after {
        content: '';
        position: absolute;
        bottom: -4px;
        left: 50%;
        transform: translateX(-50%);
        width: 0;
        height: 0;
        border-left: 4px solid transparent;
        border-right: 4px solid transparent;
        border-top: 4px solid rgba(0, 0, 0, 0.9);
    }
  `;
  document.head.appendChild(style);
</script> -->
</html>