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
                        <a class="nav-link {{ request()->routeIs('inscrire') ? 'active' : '' }}" href="{{route('inscrire')}}">
                            inscrire
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('login') ? 'active' : '' }}" href="{{route('login')}}">
                           Log in
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>