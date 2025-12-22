// public/js/script.js

document.addEventListener('DOMContentLoaded', function() {
    
    // ========== TOGGLE BILLING PERIOD (MONTHLY/YEARLY) ==========
    const billingButtons = document.querySelectorAll('.billing-button');
    const priceValues = document.querySelectorAll('.price-value[data-monthly]');

    billingButtons.forEach(button => {
        button.addEventListener('click', () => {
            // Remove active class from all buttons
            billingButtons.forEach(btn => btn.classList.remove('active'));
            
            // Add active class to clicked button
            button.classList.add('active');

            // Get the selected period
            const period = button.getAttribute('data-period');

            // Update all prices
            priceValues.forEach(priceValue => {
                if (period === 'yearly') {
                    priceValue.textContent = priceValue.getAttribute('data-yearly');
                } else {
                    priceValue.textContent = priceValue.getAttribute('data-monthly');
                }
            });
        });
    });

    // ========== VIDEO PLAY ICONS INTERACTION ==========
    const playIcons = document.querySelectorAll('.play-icon');
    
    playIcons.forEach(icon => {
        icon.addEventListener('click', () => {
            // Vous pouvez ajouter une action ici, par exemple :
            // - Ouvrir une modale avec la vidéo
            // - Naviguer vers une page dédiée
            console.log('Vidéo cliquée');
            
            // Exemple : Animation au clic
            icon.style.transform = 'scale(0.9)';
            setTimeout(() => {
                icon.style.transform = 'scale(1)';
            }, 200);
        });
    });

    // ========== SMOOTH SCROLL POUR LES ANCRES ==========
    const anchorLinks = document.querySelectorAll('a[href^="#"]');
    
    anchorLinks.forEach(link => {
        link.addEventListener('click', (e) => {
            const href = link.getAttribute('href');
            
            if (href !== '#' && document.querySelector(href)) {
                e.preventDefault();
                
                const target = document.querySelector(href);
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // ========== ANIMATION AU SCROLL (OPTIONAL) ==========
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -100px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);

    // Observer les cartes de vidéo et de pricing
    const animatedElements = document.querySelectorAll('.video-card, .pricing-card');
    
    animatedElements.forEach(element => {
        element.style.opacity = '0';
        element.style.transform = 'translateY(20px)';
        element.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(element);
    });

});

// the slide //
  document.addEventListener('DOMContentLoaded', function() {
        const sliderTrack = document.querySelector('.slider-track');
        
        // Vous pouvez contrôler la vitesse ici
        // sliderTrack.style.animationDuration = '20s'; // Plus rapide
        // sliderTrack.style.animationDuration = '40s'; // Plus lent
        
        console.log('Slider initialisé - défilement vers la droite');
    });

    // header //
    // Header moderne avec effets
document.addEventListener('DOMContentLoaded', function() {
    const header = document.getElementById('mainHeader');
    const scrollProgress = document.getElementById('scrollProgress');

    // Effet au scroll
    window.addEventListener('scroll', function() {
        const currentScroll = window.pageYOffset;

        // Ajouter classe 'scrolled' quand on scroll
        if (currentScroll > 50) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }

        // Barre de progression
        const scrollHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
        const scrolled = (currentScroll / scrollHeight) * 100;
        scrollProgress.style.width = scrolled + '%';
    });

    console.log('Header moderne initialisé');
});