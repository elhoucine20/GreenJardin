@extends('layout.admin')
@section('title-and-style')

<title>Gestion des Utilisateurs - Jardin Naturel</title>
<link rel="stylesheet" href="{{asset('css/utilisateurs.css')}}">

@endsection

@section('main-content')

<!-- Sidebar -->
<!-- <x-sidebar /> -->

<!-- Main Content -->
<main class="main-content">
    <!-- Page Header -->
    @if(session('succes'))
    <div class="alert alert-success" style="color: green; padding:10px;">
        <h3> {{ session('succes') }}</h3>

    </div>
    @endif

        @if(session('error'))
    <div class="alert alert-success" style="color: red; padding:10px;">
        <h3> {{ session('error') }}</h3>

    </div>
    @endif
    <div class="page-header">
        <div class="header-left">
            <h2 class="page-title">Gestion des Utilisateurs</h2>
            <p class="page-subtitle">Gérez les comptes et les permissions de vos utilisateurs</p>
        </div>

    </div>

    <!-- Stats Summary -->
    <div class="stats-summary">
        <div class="stat-card">
            <div class="stat-icon total">👥</div>
            <div class="stat-content">
                <span class="stat-value" id="totalUsers">{{$countUsers}}</span>
                <span class="stat-label">Total utilisateurs</span>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon admins">🔑</div>
            <div class="stat-content">
                <span class="stat-value" id="adminCount">{{$countAdmins}}</span>
                <span class="stat-label">Administrateurs</span>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon clients">👤</div>
            <div class="stat-content">
                <span class="stat-value" id="clientCount">{{$countClients}}</span>
                <span class="stat-label">Clients</span>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon active">✅</div>
            <div class="stat-content">
                <span class="stat-value" id="activeCount">{{$usersActif}}</span>
                <span class="stat-label">Comptes actifs</span>
            </div>
        </div>
    </div>


    <div class="users-grid" id="usersGrid">
        <!-- User Card 1 -->
        @foreach($users as $user)
        @if(auth()->id() != $user->id)

        <div class="user-card" data-id="1" data-role="admin" data-status="active">
            <div class="card-header">
                @if($user->role == 'client')
                <div class="user-avatar client">{{strtoupper(substr($user->name, 0, 2))}}</div>
                @else
                <div class="user-avatar admin">{{strtoupper(substr($user->name, 0, 2))}}</div>
                @endif
                <div class="user-badges">
                    <span class="role-badge admin">{{$user->role}}</span>
                    @if($user->statu == 'active')
                    <span class="status-badge active">{{$user->statu}}</span>
                    @else
                    <span class="status-badge blocked">{{$user->statu}}</span>
                    @endif
                </div>
            </div>
            <div class="card-body">
                <h3 class="user-name">{{$user->name}}</h3>
                <p class="user-email">{{$user->email}}</p>
                <div class="user-meta">
                    <span class="meta-item">
                        <span class="meta-icon">📅</span>
                        Inscrit le {{$user->created_at}}
                    </span>
                </div>
            </div>
            <div class="card-actions">
                 @if($user->statu == 'active')
                <form method="post" action="{{route('userBloquer',$user->id)}}">
                    @csrf
                    @method('PUT')

                    <button type="submit" onclick="return confirm('are you sure to bloquer ?')" class="btn-view">
                        <span class="btn-icon">🔒</span>
                        Bloquer
                    </button>
                </form>
                @else
                <form method="post" action="{{route('userDeBloquer',$user->id)}}">
                    @csrf
                    @method('PUT')

                    <button type="submit" onclick="return confirm('are you sure to debloquer ?')" class="btn-view">
                        <span class="btn-icon">🔒</span>
                        DeBloquer
                    </button>
                </form>
                @endif
            </div>
        </div>
        @endif
        @endforeach
    </div>
    {{ $users->links() }}

</main>
@endsection