<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - Jardin Naturel</title>
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

/* Divider */
.divider {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin: 1.5rem 0;
    color: #81c784;
    font-size: 0.85rem;
}

.divider::before,
.divider::after {
    content: '';
    flex: 1;
    height: 2px;
    background: linear-gradient(90deg, transparent, #c8e6c9, transparent);
}

/* Social Login (optional) */
.social-login {
    display: flex;
    gap: 1rem;
}

.social-btn {
    flex: 1;
    padding: 1rem;
    background: white;
    border: 2px solid #c8e6c9;
    border-radius: 12px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
}

.social-btn:hover {
    background: #f1f8f4;
    border-color: #66bb6a;
    transform: translateY(-2px);
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

    <!-- Footer -->
    <footer class="footer" style="background: rgba(255, 255, 255, 0.95); padding: 2rem 0; text-align: center; box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.1);">
        <div class="footer-content" style="max-width: 1200px; margin: 0 auto; padding: 0 2rem;">
            <p style="color: #2e7d32; margin: 0.5rem 0; font-size: 0.9rem; font-weight: 600;">&copy; 2024 Jardin Naturel. Tous droits réservés.</p>
            <p style="color: #66bb6a; margin: 0.5rem 0; font-size: 0.9rem;">Plateforme de vente de produits de jardinage</p>
        </div>
    </footer>

    <!-- <script>
        // Gestion des messages
        document.addEventListener('DOMContentLoaded', function() {
            const erreur = document.querySelector('.error-message');
            const succes = document.querySelector('.success-message');
            
            setTimeout(() => {
                if (erreur) erreur.style.display = 'none';
                if (succes) succes.style.display = 'none';
            }, 4000);
        });

        // Validation du formulaire
        document.getElementById('registerForm').addEventListener('submit', function(e) {
            const password = document.getElementById('password').value;
            const passwordConfirm = document.getElementById('password_confirmation').value;
            const errorMessage = document.querySelector('.error-message');
            const errorList = document.querySelector('.error-list');

            // Reset des erreurs
            errorList.innerHTML = '';
            errorMessage.style.display = 'none';

            let errors = [];

            // Vérifier si les mots de passe correspondent
            if (password !== passwordConfirm) {
                errors.push('Les mots de passe ne correspondent pas');
            }

            // Vérifier la longueur du mot de passe
            if (password.length < 8) {
                errors.push('Le mot de passe doit contenir au moins 8 caractères');
            }

            // Afficher les erreurs
            if (errors.length > 0) {
                e.preventDefault();
                errors.forEach(error => {
                    const li = document.createElement('li');
                    li.textContent = error;
                    errorList.appendChild(li);
                });
                errorMessage.style.display = 'block';
                
                // Scroll vers le haut pour voir les erreurs
                window.scrollTo({ top: 0, behavior: 'smooth' });
            }
        });

        // Validation en temps réel de la confirmation du mot de passe
        document.getElementById('password_confirmation').addEventListener('input', function() {
            const password = document.getElementById('password').value;
            const passwordConfirm = this.value;
            
            if (passwordConfirm && password !== passwordConfirm) {
                this.setCustomValidity('Les mots de passe ne correspondent pas');
            } else {
                this.setCustomValidity('');
            }
        });
    </script> -->
</body>
</html>