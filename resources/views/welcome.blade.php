<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SchoolHub - Système de Gestion Scolaire</title>
    
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body class="antialiased">

   @include('Layout.header')

    <main class="main-content">
        <div class="container">
            <section class="hero-section">
                <h1 class="hero-title">Plateforme complète pour gérer votre établissement scolaire</h1>
                <p class="hero-subtitle">Gestion complète de la scolarité, des finances et des ressources humaines</p>
                
                <div class="access-buttons">
                    <a href="/etudiant/login" class="btn btn-primary">
                        <svg class="btn-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        Espace Étudiant
                    </a>
                    <a href="/parent/login" class="btn btn-secondary">
                        <svg class="btn-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                        Espace Parent
                    </a>
                </div>
            </section>

            <!-- Section Vidéos Tutoriels -->
            <section class="video-section">
                <div class="container">
                    <h2>Découvrez comment fonctionne SchoolHub</h2>
                    <p class="section-description">Regardez nos tutoriels vidéo selon votre profil</p>
                    
                    <div class="videos-grid">
                        <!-- Vidéo Étudiant -->
                        <div class="video-card">
                            <div class="video-card-header">
                                <svg class="video-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                <h3 class="video-card-title">Tutoriel Étudiant</h3>
                            </div>
                            <p class="video-card-description">Consultez vos notes, emploi et absences</p>
                            <div class="video-container">
                                <!-- <iframe src="https://www.youtube.com/embed/VIDEO_ID_ETUDIANT" allowfullscreen></iframe> -->
                                <div class="video-placeholder gradient-purple">
                                    <div class="play-icon">
                                        <svg fill="white" viewBox="0 0 24 24">
                                            <path d="M8 5v14l11-7z"/>
                                        </svg>
                                    </div>
                                    <span class="video-duration">5:30</span>
                                </div>
                            </div>
                        </div>

                        <!-- Vidéo Parent -->
                        <div class="video-card">
                            <div class="video-card-header">
                                <svg class="video-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                </svg>
                                <h3 class="video-card-title">Tutoriel Parent</h3>
                            </div>
                            <p class="video-card-description">Suivez la scolarité de vos enfants en temps réel</p>
                            <div class="video-container">
                                <!-- <iframe src="https://www.youtube.com/embed/VIDEO_ID_PARENT" allowfullscreen></iframe> -->
                                <div class="video-placeholder gradient-pink">
                                    <div class="play-icon">
                                        <svg fill="white" viewBox="0 0 24 24">
                                            <path d="M8 5v14l11-7z"/>
                                        </svg>
                                    </div>
                                    <span class="video-duration">4:45</span>
                                </div>
                            </div>
                        </div>

                        <!-- Vidéo Prof/Admin -->
                        <div class="video-card">
                            <div class="video-card-header">
                                <svg class="video-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                                <h3 class="video-card-title">Tutoriel Prof / Admin</h3>
                            </div>
                            <p class="video-card-description">Gérez votre école de manière efficace</p>
                            <div class="video-container">
                                <!-- <iframe src="https://www.youtube.com/embed/VIDEO_ID_ADMIN" allowfullscreen></iframe> -->
                                <div class="video-placeholder gradient-blue">
                                    <div class="play-icon">
                                        <svg fill="white" viewBox="0 0 24 24">
                                            <path d="M8 5v14l11-7z"/>
                                        </svg>
                                    </div>
                                    <span class="video-duration">7:20</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
            <section class="pricing-section">
                <h2 class="pricing-title">Formules d'Abonnement</h2>
                <p class="pricing-subtitle">Choisissez la formule adaptée à votre établissement scolaire</p>

                <div class="billing-toggle-container" id="billingToggle">
                    <button class="billing-button active" data-period="monthly">Mensuel</button>
                    <button class="billing-button" data-period="yearly">Annuel (-20%)</button>
                </div>
                
                <div class="pricing-cards-grid">
                    
                    <div class="pricing-card">
                        <div class="pricing-header">
                            <h3 class="plan-name">Basique</h3>
                            <p class="plan-description">Pour les petites écoles</p>
                            <p class="plan-price"><span class="price-value">Gratuit</span><span class="price-unit"></span></p>
                        </div>
                        <ul class="plan-features">
                            <li class="feature-item">Jusqu'à 200 étudiants</li>
                            <li class="feature-item">Gestion des notes</li>
                            <li class="feature-item">Gestion des absences limitée</li>
                        </ul>
                        <a href="#" class="btn-select light">Choisir Gratuit</a>
                    </div>

                    <div class="pricing-card popular">
                        <span class="popular-tag">Populaire</span>
                        <div class="pricing-header">
                            <h3 class="plan-name">Professionnel</h3>
                            <p class="plan-description">Pour les établissements moyens</p>
                            <p class="plan-price"><span class="price-value" data-monthly="79" data-yearly="63">79</span>€<span class="price-unit">/mois</span></p>
                        </div>
                        <ul class="plan-features">
                            <li class="feature-item">Jusqu'à 1 000 étudiants</li>
                            <li class="feature-item">Tout du plan Basique</li>
                            <li class="feature-item">Gestion complète des absences</li>
                            <li class="feature-item">Support technique standard</li>
                        </ul>
                        <a href="#" class="btn-select dark">Choisir Professionnel</a>
                    </div>

                    <div class="pricing-card">
                        <div class="pricing-header">
                            <h3 class="plan-name">Pro+</h3>
                            <p class="plan-description">Pour les grandes institutions</p>
                            <p class="plan-price"><span class="price-value" data-monthly="199" data-yearly="159">199</span>€<span class="price-unit">/mois</span></p>
                        </div>
                        <ul class="plan-features">
                            <li class="feature-item">Étudiants illimités</li>
                            <li class="feature-item">Tout du plan Professionnel</li>
                            <li class="feature-item">Support prioritaire 24/7</li>
                            <li class="feature-item">Personnalisation avancée</li>
                        </ul>
                        <a href="#" class="btn-select light">Choisir Entreprise</a>
                    </div>
                </div>
            </section>
        </div>

  <!-- Section Nos Écoles Partenaires -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <!-- Titre -->
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-gray-800 mb-3">
                Ils nous font confiance
            </h2>
            <p class="text-lg text-gray-600">
                Plus de 100+ établissements utilisent notre plateforme
            </p>
        </div>

        <!-- Slider -->
        <div class="slider-container">
            <div class="slider-track">
                <!-- Logos -->
               <div class="slide">
                    <img src="{{ asset('schools/logo1.png') }}" alt="École 1">
               </div>
               <div class="slide">
                    <img src="{{ asset('schools/logo2.png') }}" alt="École 2">
               </div>
                <div class="slide">
                    <img width="246" height="150" class="logo-default entered lazyloaded" src="https://imbt.ma/wp-content/uploads/2022/05/logo-imbt.svg"" alt="Mohammed V" data-lazy-srcset="https://imbt.ma/wp-content/uploads/2022/05/logo-imbt.svg 2x" data-lazy-src="https://imbt.ma/wp-content/uploads/2022/05/logo-imbt.svg" data-ll-status="loaded" srcset="https://imbt.ma/wp-content/uploads/2022/05/logo-imbt.svg 2x" >
                </div>
                 <div class="slide">
                    <img src="{{ asset('schools/logo3.png') }}" alt="École 4">
               </div>
                 <div class="slide">
                    <img src="{{ asset('schools/logo4.png') }}" alt="École 4">
               </div>
                 <div class="slide">
                    <img src="{{ asset('schools/logo5.png') }}" alt="École 4">
               </div>
               
    </div>
</section>
       @include('Layout.footer')
    </main>
    
    <script src="{{ asset('js/script.js') }}"></script>
    
</body>
</html>