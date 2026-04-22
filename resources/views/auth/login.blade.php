@extends('layout.auth')
@section('title')
    <title>Connexion - Jardin Naturel</title>
@endsection

@section('style')
<link rel="stylesheet" href="{{asset('css/login.css')}}">
@endsection


@section('body-content')
<div class="auth-container">
    <div class="form-wrapper">
        <div class="form-title">
                <h1>🌿 Connexion</h1>
                <p>Accédez à votre espace personnel</p>
            </div>

            <!-- Message d'erreur (masqué par défaut) -->
            @if(session('error'))
            <div class="error-message">
                <ul class="error-list">
                    <li>{{session('error')}}</li>
                </ul>
            </div>
            @endif

            <!-- Message de succès (masqué par défaut) -->
            <div class="success-message" style="display: none;">
                ✓ Inscription réussie ! Vous pouvez maintenant vous connecter.
            </div>

            <form action="{{route('dashbord-admin')}}" method="POST" id="loginForm">

                @csrf
                @method('POST')

                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email"
                        name="email"
                        id="email"
                        placeholder="votre@email.com"
                        required
                        autofocus>
                </div>

                <div class="input-group">
                    <label for="password">Mot de passe</label>
                    <input type="password"
                        name="password"
                        id="password"
                        placeholder="Votre mot de passe"
                        required>
                </div>

                <!-- <div class="remember-me">
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember">Se souvenir de moi</label>
                </div> -->

                <button type="submit">Se connecter</button>
            </form>

            <div class="form-footer">
                <p>Pas encore de compte ? <a href="{{route('inscrire')}}">Créer un compte</a></p>
            </div>
        </div>
    </div>
@endsection
