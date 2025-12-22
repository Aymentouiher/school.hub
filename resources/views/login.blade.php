<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SchoolHub - Connexion</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <div class="login-container">
        <!-- Logo et titre -->
        <div class="header">
            <div class="logo">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M22 10v6M2 10l10-5 10 5-10 5z"></path>
                    <path d="M6 12v5c3 3 9 3 12 0v-5"></path>
                </svg>
                <span>SchoolHub</span>
            </div>
            <p class="subtitle">Connectez-vous à votre espace</p>
        </div>

        <!-- Formulaire -->
        <div class="form-card">
            <h2>Connexion</h2>
            <p class="form-subtitle">Choisissez votre profil et connectez-vous</p>

            <!-- Boutons de sélection de profil -->
            <div class="profile-tabs">
                <button type="button" class="tab-btn" data-role="admin">Admin</button>
                <button type="button" class="tab-btn" data-role="prof">Prof</button>
                <button type="button" class="tab-btn active" data-role="etudiant">Étudiant</button>
                <button type="button" class="tab-btn" data-role="parent">Parent</button>
            </div>

            <!-- Formulaire de connexion -->
            <form action="{{ route('login.auth') }}" method="POST" id="loginForm">
                @csrf
                <input type="hidden" name="role" id="roleInput" value="etudiant">

                <!-- Email -->
                <div class="form-group">
                    <label for="email">Email</label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        placeholder="etudiant@ecole.fr" 
                        required
                    >
                </div>

                <!-- Mot de passe -->
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        required
                    >
                </div>

                <!-- Bouton de connexion -->
                <button type="submit" class="btn-login" id="btnLogin">
                    Se connecter en tant qu'Étudiant
                </button>

                <!-- Lien retour -->
                <a href="{{ route('welcome')}}"" class="back-link">Retour à l'accueil</a>
            </form>
        </div>
    </div>

    <script src="{{ asset('js/login.js') }}"></script>
</body>
</html>