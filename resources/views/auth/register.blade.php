@extends('layout.auth')
@section('title')
    <title>Inscription - Jardin Naturel</title>
@endsection

@section('style')
<link rel="stylesheet" href="{{asset('css/register.css')}}">
@endsection


@section('body-content')
    <div class="auth-container">
        <div class="form-wrapper">
            <div class="form-title">
                <h1>🌱 Inscription</h1>
                <p>Rejoignez notre communauté verte</p>
            </div>

            <!-- Message d'erreur (masqué par défaut) -->
            <div class="error-message" style="display: none;">
                <ul class="error-list">
                    <li>Erreur lors de l'inscription</li>
                </ul>
            </div>

            <!-- Message de succès (masqué par défaut) -->
            <div class="success-message" style="display: none;">
                ✓ Compte créé avec succès !
            </div>

            <form action="{{route('login')}}" method="POST" id="registerForm">

                @csrf
                @method('POST')
                <div class="input-group">
                    <label for="name">Nom complet</label>
                    <input type="text"
                        name="name"
                        id="name"
                        placeholder="Votre nom complet"
                        required
                        autofocus>
                </div>

                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email"
                        name="email"
                        id="email"
                        placeholder="votre@email.com"
                        required>
                </div>

                <div class="input-group">
                    <label for="password">Mot de passe</label>
                    <input type="password"
                        name="password"
                        id="password"
                        placeholder="Minimum 8 caractères"
                        required
                        minlength="8">
                </div>

                <div class="input-group">
                    <label for="password_confirmation">Confirmer le mot de passe</label>
                    <input type="password"
                        name="password2"
                        id="password_confirmation"
                        placeholder="Retapez votre mot de passe"
                        required
                        minlength="8">
                </div>

                <button type="submit">Créer mon compte</button>
            </form>

            <div class="form-footer">
                <p>Déjà un compte ? <a href="{{route('login')}}">Se connecter</a></p>
            </div>
        </div>
    </div>

@endsection