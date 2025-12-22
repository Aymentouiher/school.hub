@php
    // Simulation de données pour le tableau de bord
    $stats = [
        ['icon' => 'users', 'title' => 'Total Étudiants', 'value' => '12,540', 'change' => '+5%', 'color' => 'blue'],
        ['icon' => 'user-tie', 'title' => 'Total Professeurs', 'value' => '450', 'change' => '+2%', 'color' => 'green'],
        ['icon' => 'credit-card', 'title' => 'Abonnements Actifs', 'value' => '120', 'change' => '+10', 'color' => 'purple'],
        ['icon' => 'chart-line', 'title' => 'Revenus Mensuels', 'value' => '€9,480', 'change' => '+15%', 'color' => 'orange'],
    ];

    $recentSubscriptions = [
        ['school' => 'Lycée Victor Hugo', 'plan' => 'Entreprise', 'status' => 'Actif', 'date' => '2025-11-28', 'amount' => '€199'],
        ['school' => 'Collège Marie Curie', 'plan' => 'Professionnel', 'status' => 'En Attente', 'date' => '2025-11-27', 'amount' => '€79'],
        ['school' => 'École Primaire Les Poussins', 'plan' => 'Basique', 'status' => 'Actif', 'date' => '2025-11-26', 'amount' => '€0'],
        ['school' => 'Institut Technique Alpha', 'plan' => 'Professionnel', 'status' => 'Actif', 'date' => '2025-11-25', 'amount' => '€79'],
        ['school' => 'Lycée International', 'plan' => 'Entreprise', 'status' => 'Actif', 'date' => '2025-11-24', 'amount' => '€199'],
    ];

    $recentActivity = [
        ['action' => 'Nouvel abonnement', 'school' => 'Lycée Victor Hugo', 'time' => 'Il y a 2 heures'],
        ['action' => 'Paiement reçu', 'school' => 'Collège Marie Curie', 'time' => 'Il y a 5 heures'],
        ['action' => 'Mise à jour du plan', 'school' => 'Institut Technique Alpha', 'time' => 'Il y a 1 jour'],
        ['action' => 'Nouvel utilisateur', 'school' => 'École Primaire Les Poussins', 'time' => 'Il y a 2 jours'],
    ];
@endphp

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SchoolHub - Tableau de Bord Admin</title>
    <link href="{{ asset('css/admin_super.css') }}" rel="stylesheet">
</head>
<body>

    <div class="admin-layout">
        
         @include('Layout.nav-admin')

        <!-- Contenu Principal -->
        <main class="main-content">
            <header class="topbar">
                <div class="topbar-left">
                    <h1 class="page-title">Tableau de Bord</h1>
                    <p class="page-subtitle">Vue d'ensemble de votre plateforme</p>
                </div>
                <div class="topbar-right">
                    <button class="icon-btn notification-btn">
                        <svg fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 22c1.1 0 2-.9 2-2h-4c0 1.1.9 2 2 2zm6-6v-5c0-3.07-1.63-5.64-4.5-6.32V4c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5 1.5v.68C7.64 5.36 6 7.92 6 11v5l-2 2v1h16v-1l-2-2zm-2 1H8v-6c0-2.48 1.51-4.5 4-4.5s4 2.02 4 4.5v6z"/>
                        </svg>
                        <span class="notification-badge">3</span>
                    </button>
                    <div class="user-profile">
                        <div class="user-info">
                            <span class="user-name">Admin SchoolHub</span>
                            <span class="user-role">Super Administrateur</span>
                        </div>
                        <div class="avatar">AS</div>
                    </div>
                </div>
            </header>

            <div class="dashboard-container">
                
                <!-- Section Statistiques -->
                <div class="stats-grid">
                    @foreach ($stats as $stat)
                    <div class="stat-card stat-{{ $stat['color'] }}">
                        <div class="stat-icon-container">
                            @if ($stat['icon'] == 'users')
                                <svg class="stat-icon" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/>
                                </svg>
                            @elseif ($stat['icon'] == 'user-tie')
                                <svg class="stat-icon" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                                </svg>
                            @elseif ($stat['icon'] == 'credit-card')
                                <svg class="stat-icon" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M20 4H4c-1.11 0-1.99.89-1.99 2L2 18c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2V6c0-1.11-.89-2-2-2zm0 14H4v-6h16v6zm0-10H4V6h16v2z"/>
                                </svg>
                            @elseif ($stat['icon'] == 'chart-line')
                                <svg class="stat-icon" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M16 6l2.29 2.29-4.88 4.88-4-4L2 16.59 3.41 18l6-6 4 4 5.59-5.59L22 12V6z"/>
                                </svg>
                            @endif
                        </div>
                        <div class="stat-content">
                            <p class="stat-title">{{ $stat['title'] }}</p>
                            <h3 class="stat-value">{{ $stat['value'] }}</h3>
                            <div class="stat-footer">
                                <span class="stat-change positive">
                                    <svg fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M7 14l5-5 5 5z"/>
                                    </svg>
                                    {{ $stat['change'] }}
                                </span>
                                <span class="stat-period">ce mois</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Section Deux Colonnes -->
                <div class="two-columns-layout">
                    <!-- Abonnements Récents -->
                    <div class="card recent-subscriptions-card">
                        <div class="card-header">
                            <h2 class="card-title">Abonnements Récents</h2>
                            <a href="/admin/subscriptions" class="view-all-link">Voir tout</a>
                        </div>
                        <div class="subscriptions-list">
                            @foreach ($recentSubscriptions as $sub)
                            <div class="subscription-item">
                                <div class="subscription-icon">
                                    <svg fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 3L1 9l4 2.18v6L12 21l7-3.82v-6l2-1.09V17h2V9L12 3z"/>
                                    </svg>
                                </div>
                                <div class="subscription-info">
                                    <h4 class="subscription-school">{{ $sub['school'] }}</h4>
                                    <div class="subscription-meta">
                                        <span class="plan-badge plan-{{ strtolower($sub['plan']) }}">{{ $sub['plan'] }}</span>
                                        <span class="subscription-date">{{ $sub['date'] }}</span>
                                    </div>
                                </div>
                                <div class="subscription-amount">{{ $sub['amount'] }}</div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Activité Récente -->
                    <div class="card recent-activity-card">
                        <div class="card-header">
                            <h2 class="card-title">Activité Récente</h2>
                            <button class="icon-btn">
                                <svg fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 8c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zm0 2c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"/>
                                </svg>
                            </button>
                        </div>
                        <div class="activity-list">
                            @foreach ($recentActivity as $activity)
                            <div class="activity-item">
                                <div class="activity-dot"></div>
                                <div class="activity-content">
                                    <p class="activity-action">{{ $activity['action'] }}</p>
                                    <p class="activity-school">{{ $activity['school'] }}</p>
                                </div>
                                <span class="activity-time">{{ $activity['time'] }}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Actions Rapides -->
                <div class="card quick-actions-card">
                    <h2 class="card-title">Actions Rapides</h2>
                    <div class="quick-actions-grid">
                        <button class="quick-action-btn">
                            <svg fill="currentColor" viewBox="0 0 24 24">
                                <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"/>
                            </svg>
                            <span>Ajouter École</span>
                        </button>
                        <button class="quick-action-btn">
                            <svg fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                            </svg>
                            <span>Valider Abonnement</span>
                        </button>
                        <button class="quick-action-btn">
                            <svg fill="currentColor" viewBox="0 0 24 24">
                                <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                            </svg>
                            <span>Envoyer Message</span>
                        </button>
                        <button class="quick-action-btn">
                            <svg fill="currentColor" viewBox="0 0 24 24">
                                <path d="M19 3h-4.18C14.4 1.84 13.3 1 12 1c-1.3 0-2.4.84-2.82 2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-7 0c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zm2 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/>
                            </svg>
                            <span>Générer Rapport</span>
                        </button>
                    </div>
                </div>

            </div>
        </main>
    </div>

    <script src="{{ asset('js/admine_super.js') }}"></script>
</body>
</html>