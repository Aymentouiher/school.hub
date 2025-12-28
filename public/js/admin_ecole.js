// public/js/teachers.js

document.addEventListener('DOMContentLoaded', function() {
    
    // ========== RECHERCHE EN TEMPS RÉEL ==========
    const searchInput = document.getElementById('searchInput');
    const teachersGrid = document.getElementById('teachersGrid');
    const teacherCards = teachersGrid.querySelectorAll('.teacher-card');

    if (searchInput) {
        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase().trim();
            
            teacherCards.forEach(card => {
                const teacherName = card.querySelector('.teacher-name').textContent.toLowerCase();
                const teacherEmail = card.querySelector('.detail-item span').textContent.toLowerCase();
                const teacherSubject = card.querySelector('.teacher-subject').textContent.toLowerCase();
                
                if (teacherName.includes(searchTerm) || 
                    teacherEmail.includes(searchTerm) || 
                    teacherSubject.includes(searchTerm)) {
                    card.style.display = '';
                } else {
                    card.style.display = 'none';
                }
            });

            updateResultsCount();
        });
    }

    // ========== FILTRES ==========
    const schoolFilter = document.getElementById('schoolFilter');
    const subjectFilter = document.getElementById('subjectFilter');
    const statusFilter = document.getElementById('statusFilter');

    function applyFilters() {
        const schoolValue = schoolFilter.value;
        const subjectValue = subjectFilter.value;
        const statusValue = statusFilter.value;
        const searchTerm = searchInput.value.toLowerCase().trim();

        teacherCards.forEach(card => {
            const cardSchool = card.getAttribute('data-school');
            const cardSubject = card.getAttribute('data-subject');
            const cardStatus = card.getAttribute('data-status');
            
            const teacherName = card.querySelector('.teacher-name').textContent.toLowerCase();
            const teacherEmail = card.querySelector('.detail-item span').textContent.toLowerCase();

            let showCard = true;

            // Filtre par école
            if (schoolValue && cardSchool !== schoolValue) {
                showCard = false;
            }

            // Filtre par matière
            if (subjectValue && cardSubject !== subjectValue) {
                showCard = false;
            }

            // Filtre par statut
            if (statusValue && cardStatus !== statusValue) {
                showCard = false;
            }

            // Filtre par recherche
            if (searchTerm && !teacherName.includes(searchTerm) && 
                !teacherEmail.includes(searchTerm) && 
                !cardSubject.toLowerCase().includes(searchTerm)) {
                showCard = false;
            }

            card.style.display = showCard ? '' : 'none';
        });

        updateResultsCount();
    }

    if (schoolFilter) schoolFilter.addEventListener('change', applyFilters);
    if (subjectFilter) subjectFilter.addEventListener('change', applyFilters);
    if (statusFilter) statusFilter.addEventListener('change', applyFilters);

    // ========== RÉINITIALISER LES FILTRES ==========
    window.resetFilters = function() {
        if (searchInput) searchInput.value = '';
        if (schoolFilter) schoolFilter.value = '';
        if (subjectFilter) subjectFilter.value = '';
        if (statusFilter) statusFilter.value = '';
        
        teacherCards.forEach(card => {
            card.style.display = '';
        });

        updateResultsCount();
    };

    // ========== METTRE À JOUR LE COMPTEUR DE RÉSULTATS ==========
    function updateResultsCount() {
        const visibleCards = Array.from(teacherCards).filter(card => card.style.display !== 'none');
        const paginationInfo = document.querySelector('.pagination-info');
        
        if (paginationInfo) {
            const total = teacherCards.length;
            const visible = visibleCards.length;
            paginationInfo.innerHTML = `Affichage de <strong>${visible}</strong> sur <strong>${total}</strong> professeurs`;
        }
    }

    // ========== GESTION DU MODAL ==========
    window.openAddTeacherModal = function() {
        const modal = document.getElementById('addTeacherModal');
        if (modal) {
            modal.classList.add('active');
            document.body.style.overflow = 'hidden';
        }
    };

    window.closeAddTeacherModal = function() {
        const modal = document.getElementById('addTeacherModal');
        if (modal) {
            modal.classList.remove('active');
            document.body.style.overflow = '';
            
            // Réinitialiser le formulaire
            const form = document.getElementById('addTeacherForm');
            if (form) form.reset();
        }
    };

    // Fermer le modal en cliquant en dehors
    const modal = document.getElementById('addTeacherModal');
    if (modal) {
        modal.addEventListener('click', function(e) {
            if (e.target === modal) {
                closeAddTeacherModal();
            }
        });
    }

    // ========== SOUMETTRE LE FORMULAIRE ==========
    const addTeacherForm = document.getElementById('addTeacherForm');
    if (addTeacherForm) {
        addTeacherForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Récupérer les données du formulaire
            const formData = new FormData(this);
            
            // Ici vous pouvez envoyer les données au serveur
            console.log('Ajout d\'un nouveau professeur');
            console.log('Données du formulaire:', Object.fromEntries(formData));
            
            // Simuler l'ajout
            setTimeout(() => {
                alert('Professeur ajouté avec succès !');
                closeAddTeacherModal();
                // Recharger la page ou mettre à jour la liste
                // location.reload();
            }, 500);
        });
    }

    // ========== ACTIONS SUR LES PROFESSEURS ==========
    window.viewTeacher = function(teacherId) {
        console.log('Voir le professeur ID:', teacherId);
        // Rediriger vers la page de détails
        // window.location.href = '/admin/teachers/' + teacherId;
        alert('Affichage des détails du professeur #' + teacherId);
    };

    window.editTeacher = function(teacherId) {
        console.log('Modifier le professeur ID:', teacherId);
        // Ouvrir un modal d'édition ou rediriger
        alert('Modification du professeur #' + teacherId);
    };

    // ========== MENU ACTIONS (3 POINTS) ==========
    const actionMenuBtns = document.querySelectorAll('.action-menu-btn');
    actionMenuBtns.forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.stopPropagation();
            // Ici vous pouvez implémenter un menu déroulant
            console.log('Menu actions ouvert');
        });
    });

    // ========== ANIMATION DES CARTES AU SCROLL ==========
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting && !entry.target.classList.contains('animated')) {
                entry.target.classList.add('animated');
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);

    teacherCards.forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
        observer.observe(card);
    });

    // ========== PAGINATION ==========
    const paginationBtns = document.querySelectorAll('.pagination-btn:not([disabled])');
    paginationBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            if (!this.classList.contains('active')) {
                // Retirer la classe active de tous les boutons
                paginationBtns.forEach(b => b.classList.remove('active'));
                
                // Ajouter la classe active au bouton cliqué (sauf pour Précédent/Suivant)
                if (!this.textContent.includes('Précédent') && !this.textContent.includes('Suivant')) {
                    this.classList.add('active');
                }
                
                // Ici vous pouvez charger les données de la page
                console.log('Page changée:', this.textContent);
                
                // Scroll vers le haut
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            }
        });
    });

    // ========== STATISTIQUES ANIMÉES ==========
    function animateStats() {
        const statNumbers = document.querySelectorAll('.stat-number');
        
        statNumbers.forEach(stat => {
            const target = parseInt(stat.textContent);
            let current = 0;
            const increment = target / 30;
            
            const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    current = target;
                    clearInterval(timer);
                }
                stat.textContent = Math.floor(current);
            }, 30);
        });
    }

    // Animer au chargement
    setTimeout(animateStats, 300);

    // ========== EXPORT DES DONNÉES (OPTIONNEL) ==========
    window.exportTeachers = function(format) {
        console.log('Export au format:', format);
        // Implémenter l'export CSV, PDF, etc.
        alert('Export des professeurs au format ' + format);
    };

    // ========== TOUCHES CLAVIER ==========
    document.addEventListener('keydown', function(e) {
        // ESC pour fermer le modal
        if (e.key === 'Escape') {
            closeAddTeacherModal();
        }
        
        // CTRL/CMD + K pour focus sur la recherche
        if ((e.ctrlKey || e.metaKey) && e.key === 'k') {
            e.preventDefault();
            if (searchInput) {
                searchInput.focus();
            }
        }
    });

    // ========== INITIALISER LE COMPTEUR ==========
    updateResultsCount();

});