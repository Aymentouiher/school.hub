<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SchoolHub - Statistiques</title>
    <link href="{{ asset('css/admin_super.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

    <div class="admin-layout">
        
        <!-- Sidebar de Navigation -->
       @include('Layout.nav-admin')

        <!-- Contenu Principal -->
        <main class="main-content">
            <header class="topbar">
                <div class="topbar-left">
                    <h1 class="page-title">Statistiques Avancées</h1>
                    <p class="page-subtitle">Analyse détaillée des performances</p>
                </div>
                <div class="topbar-right">
                    <!-- Filtre de période -->
                 
                    <button class="icon-btn notification-btn">
                        <svg fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 22c1.1 0 2-.9 2-2h-4c0 1.1.9 2 2 2zm6-6v-5c0-3.07-1.63-5.64-4.5-6.32V4c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5 1.5v.68C7.64 5.36 6 7.92 6 11v5l-2 2v1h16v-1l-2-2z"/>
                        </svg>
                        <span class="notification-badge">3</span>
                    </button>
                    <div class="user-profile">
                        <div class="user-info">
                            <span class="user-name">Admin SchoolHub</span>
                            <span class="user-role">Super Administrateur</span>
                        </div>
                        <div class="avatar">AT</div>
                    </div>
                </div>
            </header>

            <div class="dashboard-container">
                
                <!-- Graphiques Principaux -->
                <div class="charts-row">
                    <!-- Graphique Inscriptions -->
                    <div class="card chart-card">
                        <div class="card-header">
                            <div>
                                <h2 class="card-title">Évolution des Inscriptions</h2>
                                <p class="card-subtitle">Croissance mensuelle des étudiants</p>
                            </div>
                            <button class="icon-btn">
                                <svg fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M19 3h-4.18C14.4 1.84 13.3 1 12 1c-1.3 0-2.4.84-2.82 2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-7 0c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1z"/>
                                </svg>
                            </button>
                        </div>
                        <div class="chart-container">
                            <canvas id="enrollmentChart"></canvas>
                        </div>
                    </div>

                    <!-- Graphique Revenus -->
                    <div class="card chart-card">
                        <div class="card-header">
                            <div>
                                <h2 class="card-title">Revenus par Mois</h2>
                                <p class="card-subtitle">Performance financière</p>
                            </div>
                            <button class="icon-btn">
                                <svg fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1.41 16.09V20h-2.67v-1.93c-1.71-.36-3.16-1.46-3.27-3.4h1.96c.1 1.05.82 1.87 2.65 1.87 1.96 0 2.4-.98 2.4-1.59 0-.83-.44-1.61-2.67-2.14-2.48-.6-4.18-1.62-4.18-3.67 0-1.72 1.39-2.84 3.11-3.21V4h2.67v1.95c1.86.45 2.79 1.86 2.85 3.39H14.3c-.05-1.11-.64-1.87-2.22-1.87-1.5 0-2.4.68-2.4 1.64 0 .84.65 1.39 2.67 1.91s4.18 1.39 4.18 3.91c-.01 1.83-1.38 2.83-3.12 3.16z"/>
                                </svg>
                            </button>
                        </div>
                        <div class="chart-container">
                            <canvas id="revenueChart"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Graphiques Secondaires -->
                <div class="charts-row-three">
                    <!-- Répartition des Plans -->
                    <div class="card chart-card-small">
                        <div class="card-header">
                            <h3 class="card-title">Répartition des Plans</h3>
                        </div>
                        <div class="chart-container-small">
                            <canvas id="plansChart"></canvas>
                        </div>
                        <div class="chart-legend">
                            <div class="legend-item">
                                <span class="legend-dot" style="background: #4F46E5;"></span>
                                <span>Basique (42%)</span>
                            </div>
                            <div class="legend-item">
                                <span class="legend-dot" style="background: #10B981;"></span>
                                <span>Pro (35%)</span>
                            </div>
                            <div class="legend-item">
                                <span class="legend-dot" style="background: #F59E0B;"></span>
                                <span>Entreprise (23%)</span>
                            </div>
                        </div>
                    </div>

                    <!-- Taux de Croissance -->
                    <div class="card chart-card-small">
                        <div class="card-header">
                            <h3 class="card-title">Taux de Croissance</h3>
                        </div>
                        <div class="chart-container-small">
                            <canvas id="growthChart"></canvas>
                        </div>
                    </div>

                    <!-- Taux de Rétention -->
                    <div class="card chart-card-small">
                        <div class="card-header">
                            <h3 class="card-title">Taux de Rétention</h3>
                        </div>
                        <div class="chart-container-small">
                            <canvas id="retentionChart"></canvas>
                        </div>
                        <div class="retention-stats">
                            <div class="retention-item">
                                <span class="retention-label">Ce mois</span>
                                <span class="retention-value">94.5%</span>
                            </div>
                            <div class="retention-item">
                                <span class="retention-label">Mois dernier</span>
                                <span class="retention-value">92.1%</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tableaux de Données -->
                <div class="data-tables-row">
                    <!-- Top Établissements -->
                    <div class="card data-table-card">
                        <div class="card-header">
                            <h2 class="card-title">Top 5 Établissements</h2>
                            <a href="{{ route('admin.abonnements')}}" class="view-all-link">Voir tout</a>
                        </div>
                        <table class="data-table">
                            <thead>
                                <tr>
                                    <th>Rang</th>
                                    <th>Établissement</th>
                                    <th>Étudiants</th>
                                    <th>Revenus</th>
                                    <th>Croissance</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><span class="rank-badge gold">1</span></td>
                                    <td>Lycée Victor Hugo</td>
                                    <td>2,840</td>
                                    <td>€199/mois</td>
                                    <td><span class="trend-positive">+12%</span></td>
                                </tr>
                                <tr>
                                    <td><span class="rank-badge silver">2</span></td>
                                    <td>Institut Technique Alpha</td>
                                    <td>1,920</td>
                                    <td>€199/mois</td>
                                    <td><span class="trend-positive">+8%</span></td>
                                </tr>
                                <tr>
                                    <td><span class="rank-badge bronze">3</span></td>
                                    <td>Collège Marie Curie</td>
                                    <td>1,450</td>
                                    <td>€79/mois</td>
                                    <td><span class="trend-positive">+15%</span></td>
                                </tr>
                                <tr>
                                    <td><span class="rank-badge">4</span></td>
                                    <td>Lycée International</td>
                                    <td>980</td>
                                    <td>€79/mois</td>
                                    <td><span class="trend-positive">+5%</span></td>
                                </tr>
                                <tr>
                                    <td><span class="rank-badge">5</span></td>
                                    <td>École Primaire Les Poussins</td>
                                    <td>650</td>
                                    <td>Gratuit</td>
                                    <td><span class="trend-neutral">0%</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Performance par Région -->
                    <div class="card data-table-card">
                        <div class="card-header">
                            <h2 class="card-title">Performance par Région</h2>
                        </div>
                        <div class="region-stats">
                            <div class="region-item">
                                <div class="region-header">
                                    <span class="region-name">Île-de-France</span>
                                    <span class="region-value">45</span>
                                </div>
                                <div class="progress-bar">
                                    <div class="progress-fill" style="width: 75%;"></div>
                                </div>
                            </div>
                            <div class="region-item">
                                <div class="region-header">
                                    <span class="region-name">Auvergne-Rhône-Alpes</span>
                                    <span class="region-value">32</span>
                                </div>
                                <div class="progress-bar">
                                    <div class="progress-fill" style="width: 55%;"></div>
                                </div>
                            </div>
                            <div class="region-item">
                                <div class="region-header">
                                    <span class="region-name">Provence-Alpes-Côte d'Azur</span>
                                    <span class="region-value">28</span>
                                </div>
                                <div class="progress-bar">
                                    <div class="progress-fill" style="width: 45%;"></div>
                                </div>
                            </div>
                            <div class="region-item">
                                <div class="region-header">
                                    <span class="region-name">Occitanie</span>
                                    <span class="region-value">15</span>
                                </div>
                                <div class="progress-bar">
                                    <div class="progress-fill" style="width: 25%;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </main>
    </div>

    <script src="{{ asset('js/admin_super.js') }}"></script>
</body>
</html>