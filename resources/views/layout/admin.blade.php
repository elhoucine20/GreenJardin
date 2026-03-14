<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
@yield('title-and-style')

</head>
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
            <!-- <div class="search-box">
                <input type="search" placeholder="Rechercher...">
                <span class="search-icon">🔍</span>
            </div> -->

            <!-- <div class="notification-bell">
                <span class="bell-icon">🔔</span>
                <span class="notification-badge">3</span>
            </div> -->

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
    @yield('main-content')
</body>
</html>
