<aside class="sidebar" id="sidebar">
    <nav class="sidebar-nav">
        <a href="{{ route('Dashbord-Admin') }}" 
           class="nav-item {{ request()->routeIs('Dashbord-Admin') ? 'active' : '' }}">
            <span class="nav-icon">📊</span>
            <span class="nav-text">Tableau de bord</span>
        </a>
        <a href="{{ route('categories.index') }}" 
           class="nav-item {{ request()->routeIs('categories.*') ? 'active' : '' }}">
            <span class="nav-icon">🏷️</span>
            <span class="nav-text">Catégories</span>
            <span class="nav-badge">10</span>
        </a>
        <a href="{{ route('produits.index') }}" 
           class="nav-item {{ request()->routeIs('produits.*') ? 'active' : '' }}">
            <span class="nav-icon">🌱</span>
            <span class="nav-text">Produits</span>
            <span class="nav-badge">48</span>
        </a>
        <a href="{{ route('commandesAdmin.index') }}" 
           class="nav-item {{ request()->routeIs('commandesAdmin.*') ? 'active' : '' }}">
            <span class="nav-icon">📦</span>
            <span class="nav-text">Commandes</span>
            <span class="nav-badge">12</span>
        </a>
        <a href="{{ route('utilisateurs-admin') }}" 
           class="nav-item {{ request()->routeIs('utilisateurs-admin') ? 'active' : '' }}">
            <span class="nav-icon">👥</span>
            <span class="nav-text">Utilisateurs</span>
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