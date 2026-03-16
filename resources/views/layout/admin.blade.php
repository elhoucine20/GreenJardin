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
            <!-- <button class="menu-toggle" id="menuToggle">
                <span></span>
                <span></span>
                <span></span>
            </button> -->
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
                <!-- @php $words = explode(' ',auth()->user()->name);
                    $intilise = '';   
                @endphp
                @foreach($words as $word)
                    @php $intilise .= substr($word,0,1); @endphp
                @endforeach 
                {{strtoupper($intilise)}} -->
                
            <div class="admin-profile">
                <div class="profile-avatar">{{strtoupper(substr(auth()->user()->name, 0, 2))}}</div>
                <div class="profile-info">
                    <span class="profile-name">{{auth()->user()->name}}</span>
                    <span class="profile-role">{{auth()->user()->role}}</span>
                </div>
                <form method="POST" action="{{route('logout')}}">

                    @csrf
                    @method('POST')
                    <button type="submit" style="background-color: red;opacity:0.6;color:aliceblue" class="logout-btn">Déconnexion</button>
                </form>
            </div>
        </div>
    </nav>
    <x-sidebar />
    @yield('main-content')
</body>
</html>
