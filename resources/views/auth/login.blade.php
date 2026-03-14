<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Jardin Naturel</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #e8f5e9 0%, #c8e6c9 100%);
            background-attachment: fixed;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Auth Container */
        .auth-container {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 2rem 0.5rem;
        }

        /* Form Wrapper */
        .form-wrapper {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            padding: 3rem;
            border-radius: 25px;
            box-shadow: 0 15px 50px rgba(46, 125, 50, 0.2);
            border: 2px solid rgba(129, 199, 132, 0.3);
            width: 100%;
            max-width: 450px;
            position: relative;
            overflow: hidden;
        }

        .form-wrapper::before {
            content: '🌿';
            position: absolute;
            font-size: 150px;
            top: -50px;
            right: -50px;
            opacity: 0.05;
            transform: rotate(-15deg);
        }

        /* Form Title */
        .form-title {
            text-align: center;
            margin-bottom: 2rem;
        }

        .form-title h1 {
            font-size: 2rem;
            font-weight: 800;
            color: #2e7d32;
            margin-bottom: 0.5rem;
        }

        .form-title p {
            color: #66bb6a;
            font-size: 0.95rem;
        }

        /* Form Styles */
        form {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        /* Input Group */
        .input-group {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        label {
            color: #2e7d32;
            font-weight: 600;
            font-size: 0.95rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        label::before {
            content: '🌱';
            font-size: 1.1rem;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 1rem 1.25rem;
            border: 2px solid #c8e6c9;
            border-radius: 15px;
            font-size: 0.95rem;
            background: #f1f8f4;
            color: #1b5e20;
            font-family: inherit;
            transition: all 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus {
            outline: none;
            border-color: #66bb6a;
            background: white;
            box-shadow: 0 0 0 4px rgba(102, 187, 106, 0.1);
            transform: translateY(-2px);
        }

        input::placeholder {
            color: #81c784;
        }

        /* Button */
        button[type="submit"] {
            width: 100%;
            padding: 1.25rem;
            background: linear-gradient(135deg, #66bb6a 0%, #43a047 100%);
            color: white;
            border: none;
            border-radius: 15px;
            font-size: 1rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
            box-shadow: 0 6px 20px rgba(67, 160, 71, 0.3);
            margin-top: 0.5rem;
        }

        button[type="submit"]:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(67, 160, 71, 0.4);
        }

        button[type="submit"]:active {
            transform: translateY(-1px);
        }

        /* Links */
        .form-footer {
            text-align: center;
            margin-top: 1.5rem;
            padding-top: 1.5rem;
            border-top: 2px solid #e8f5e9;
        }

        .form-footer p {
            color: #66bb6a;
            font-size: 0.95rem;
        }

        .form-footer a {
            color: #2e7d32;
            font-weight: 700;
            text-decoration: none;
            transition: all 0.3s ease;
            padding: 0.25rem 0.5rem;
            border-radius: 5px;
        }

        .form-footer a:hover {
            background: #e8f5e9;
            color: #1b5e20;
        }

        /* Error Messages */
        .error-message {
            background: #ffebee;
            color: #c62828;
            padding: 1rem 1.25rem;
            border-radius: 12px;
            border: 2px solid #ffcdd2;
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }

        .error-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .error-list li {
            padding: 0.25rem 0;
        }

        .error-list li::before {
            content: '⚠️ ';
            margin-right: 0.5rem;
        }

        /* Success Message */
        .success-message {
            background: #e8f5e9;
            color: #2e7d32;
            padding: 1rem 1.25rem;
            border-radius: 12px;
            border: 2px solid #c8e6c9;
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }

        /* Remember Me */
        .remember-me {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            color: #2e7d32;
            font-size: 0.9rem;
        }

        .remember-me input[type="checkbox"] {
            width: 20px;
            height: 20px;
            accent-color: #66bb6a;
            cursor: pointer;
        }

        .remember-me label {
            font-weight: 500;
        }

        .remember-me label::before {
            content: '';
        }

        /* Forgot Password */
        .forgot-password {
            text-align: right;
            margin-top: -0.5rem;
        }

        .forgot-password a {
            color: #66bb6a;
            font-size: 0.85rem;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .forgot-password a:hover {
            color: #2e7d32;
        }

        /* Loading State */
        button[type="submit"]:disabled {
            opacity: 0.6;
            cursor: not-allowed;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .auth-container {
                padding: 1rem;
            }

            .form-wrapper {
                padding: 2rem 1.5rem;
                max-width: 100%;
            }

            .form-title h1 {
                font-size: 1.75rem;
            }

            input[type="text"],
            input[type="email"],
            input[type="password"] {
                padding: 0.9rem 1rem;
            }

            button[type="submit"] {
                padding: 1.1rem;
            }
        }

        @media (max-width: 480px) {
            .form-wrapper {
                padding: 1.5rem 1rem;
            }

            .form-title h1 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>

<body>
    <div class="auth-container">
        <div class="form-wrapper">
            <div class="form-title">
                <h1>🌿 Connexion</h1>
                <p>Accédez à votre espace personnel</p>
            </div>

            <!-- Message d'erreur (masqué par défaut) -->
            <div class="error-message" style="display: none;">
                <ul class="error-list">
                    <li>Email ou mot de passe incorrect</li>
                </ul>
            </div>

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
<body>

    <!-- Footer -->
    <footer class="footer" style="background: rgba(255, 255, 255, 0.95); padding: 2rem 0; text-align: center; box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.1);">
        <div class="footer-content" style="max-width: 1200px; margin: 0 auto; padding: 0 2rem;">
            <p style="color: #2e7d32; margin: 0.5rem 0; font-size: 0.9rem; font-weight: 600;">&copy; 2024 Jardin Naturel. Tous droits réservés.</p>
            <p style="color: #66bb6a; margin: 0.5rem 0; font-size: 0.9rem;">Plateforme de vente de produits de jardinage</p>
        </div>
    </footer>

</body>
</html>
