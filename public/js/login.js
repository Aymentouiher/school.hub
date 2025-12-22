// la page du login //
    document.addEventListener('DOMContentLoaded', function() {
    const tabBtns = document.querySelectorAll('.tab-btn');
    const btnLogin = document.getElementById('btnLogin');
    const roleInput = document.getElementById('roleInput');
    const emailInput = document.getElementById('email');

    // Textes pour chaque rôle
    const roleTexts = {
        'admin': "Se connecter en tant qu'Admin",
        'prof': "Se connecter en tant que Prof",
        'etudiant': "Se connecter en tant qu'Étudiant",
        'parent': "Se connecter en tant que Parent"
    };

    // Placeholders pour chaque rôle
    const rolePlaceholders = {
        'admin': 'admin@ecole.fr',
        'prof': 'prof@ecole.fr',
        'etudiant': 'etudiant@ecole.fr',
        'parent': 'parent@ecole.fr'
    };

    // Gérer le clic sur les tabs
    tabBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            // Retirer la classe active de tous les boutons
            tabBtns.forEach(b => b.classList.remove('active'));
            
            // Ajouter la classe active au bouton cliqué
            this.classList.add('active');
            
            // Récupérer le rôle
            const role = this.getAttribute('data-role');
            
            // Mettre à jour le texte du bouton de connexion
            btnLogin.textContent = roleTexts[role];
            
            // Mettre à jour le champ caché du rôle
            roleInput.value = role;
            
            // Mettre à jour le placeholder de l'email
            emailInput.placeholder = rolePlaceholders[role];
            
            // Animation du bouton
            btnLogin.style.transform = 'scale(0.98)';
            setTimeout(() => {
                btnLogin.style.transform = 'scale(1)';
            }, 150);
        });
    });

    // Animation au focus des inputs
    const inputs = document.querySelectorAll('input[type="email"], input[type="password"]');
    inputs.forEach(input => {
        input.addEventListener('focus', function() {
            this.parentElement.style.transform = 'translateY(-2px)';
        });
        
        input.addEventListener('blur', function() {
            this.parentElement.style.transform = 'translateY(0)';
        });
    });

    // Validation du formulaire
    const form = document.getElementById('loginForm');
    form.addEventListener('submit', function(e) {
        const email = emailInput.value;
        const password = document.getElementById('password').value;
        
        if (!email || !password) {
            e.preventDefault();
            alert('Veuillez remplir tous les champs');
            return false;
        }
        
        // Ajouter un loader au bouton
        btnLogin.innerHTML = '<span>Connexion en cours...</span>';
        btnLogin.disabled = true;
    });
});