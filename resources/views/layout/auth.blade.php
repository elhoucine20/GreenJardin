<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('title')
    <!-- <title>Connexion - Jardin Naturel</title> -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
@yield('style')


</head>

<body>
<header style="display: flex;position:fixed; with:100%">
    <nav>
        <a href="{{route('visiteur')}}" style="padding-left:1080px;margin:15px;">
            dashbord
        </a>
    </nav>
</header>
@yield('body-content')
    <!-- Footer -->
    <footer class="footer" style="background: rgba(255, 255, 255, 0.95); padding: 2rem 0; text-align: center; box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.1);">
        <div class="footer-content" style="max-width: 1200px; margin: 0 auto; padding: 0 2rem;">
            <p style="color: #2e7d32; margin: 0.5rem 0; font-size: 0.9rem; font-weight: 600;">&copy; 2024 Jardin Naturel. Tous droits réservés.</p>
            <p style="color: #66bb6a; margin: 0.5rem 0; font-size: 0.9rem;">Plateforme de vente de produits de jardinage</p>
        </div>
    </footer>
</body>
</html>
