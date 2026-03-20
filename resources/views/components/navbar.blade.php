    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                 <i class="bi bi-tree-fill "></i>
                GardenApp
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('dashbord') ? 'active' : '' }}"   href="{{route('dashbord')}}">
                            <i class="bi bi-house-door"></i> Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('produitss') ? 'active' : '' }}" href="{{route('produitss')}}">
                            <i class="bi bi-box-seam"></i> Products
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('favorites') ? 'active' : '' }}" href="{{route('favorites')}}">
                            <i class="bi bi-heart"></i> Favorites
                        </a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link cart-link" href="{{route('dashbord')}}">
                            <i class="bi bi-cart3"></i> Cart
                            <span class="cart-badge" id="cartCount">0</span>
                        </a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link cart-link {{ request()->routeIs('checkout') ? 'active' : '' }}" href="{{route('checkout')}}">
                            <i class="bi bi-credit-card"></i> checkout
                            <!-- <span class="cart-badge" id="cartCount">0</span> -->
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link cart-link {{ request()->routeIs('commandess') ? 'active' : '' }}" href="{{route('commandess')}}">
                            <i class="bi bi-bag-check"></i> Mes Commandes
                            <!-- <span class="cart-badge" id="cartCount">0</span> -->
                        </a>
                    </li>
                        <li class="nav-item">
                        <a class="nav-link cart-link {{ request()->routeIs('paiments') ? 'active' : '' }}" href="{{route('paiments')}}">
                            <i class="bi bi-cash-stack"></i> Paiment
                            <!-- <span class="cart-badge" id="cartCount">0</span> -->
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link cart-link {{ request()->routeIs('paniers') ? 'active' : '' }}" href="{{route('paniers')}}">
                            <i class="bi  bi-cart"></i> Panier
                            <!-- <span class="cart-badge" id="cartCount">0</span> -->
                        </a>
                    </li>
                    <li class="nav-item">
                         <form method="POST" action="{{route('logout')}}">
                             @csrf
                             @method('POST')
                             <button type="submit" class="nav-link text-danger border-0 bg-transparent" class="">
                                 <i class="bi bi-box-arrow-right"></i>
                                 Déconnexion
                             </button>
                         </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>