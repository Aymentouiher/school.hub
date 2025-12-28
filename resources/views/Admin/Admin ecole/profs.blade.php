@php
    // Simulation de données pour les professeurs
    $teachers = [
        [
            'id' => 1,
            'name' => 'Dr. Sophie Martin',
            'email' => 'sophie.martin@schoolhub.com',
            'phone' => '+33 6 12 34 56 78',
            'subject' => 'Mathématiques',
            'school' => 'Lycée Victor Hugo',
            'status' => 'Actif',
            'students' => 145,
            'classes' => 6,
            'hired_date' => '2020-09-01',
            'avatar' => 'SM'
        ],
        [
            'id' => 2,
            'name' => 'M. Pierre Dubois',
            'email' => 'pierre.dubois@schoolhub.com',
            'phone' => '+33 6 23 45 67 89',
            'subject' => 'Physique-Chimie',
            'school' => 'Lycée Victor Hugo',
            'status' => 'Actif',
            'students' => 120,
            'classes' => 5,
            'hired_date' => '2019-09-01',
            'avatar' => 'PD'
        ],
        [
            'id' => 3,
            'name' => 'Mme. Claire Bernard',
            'email' => 'claire.bernard@schoolhub.com',
            'phone' => '+33 6 34 56 78 90',
            'subject' => 'Français',
            'school' => 'Collège Marie Curie',
            'status' => 'En Congé',
            'students' => 98,
            'classes' => 4,
            'hired_date' => '2021-09-01',
            'avatar' => 'CB'
        ],
        [
            'id' => 4,
            'name' => 'M. Ahmed Khalil',
            'email' => 'ahmed.khalil@schoolhub.com',
            'phone' => '+33 6 45 67 89 01',
            'subject' => 'Histoire-Géographie',
            'school' => 'Lycée International',
            'status' => 'Actif',
            'students' => 132,
            'classes' => 5,
            'hired_date' => '2018-09-01',
            'avatar' => 'AK'
        ],
        [
            'id' => 5,
            'name' => 'Mme. Marie Leclerc',
            'email' => 'marie.leclerc@schoolhub.com',
            'phone' => '+33 6 56 78 90 12',
            'subject' => 'Anglais',
            'school' => 'Collège Marie Curie',
            'status' => 'Actif',
            'students' => 156,
            'classes' => 7,
            'hired_date' => '2017-09-01',
            'avatar' => 'ML'
        ],
        [
            'id' => 6,
            'name' => 'M. Thomas Rousseau',
            'email' => 'thomas.rousseau@schoolhub.com',
            'phone' => '+33 6 67 89 01 23',
            'subject' => 'SVT',
            'school' => 'Lycée Victor Hugo',
            'status' => 'Inactif',
            'students' => 0,
            'classes' => 0,
            'hired_date' => '2022-09-01',
            'avatar' => 'TR'
        ],
    ];

    $stats = [
        'total' => 450,
        'active' => 425,
        'on_leave' => 15,
        'inactive' => 10
    ];
@endphp

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SchoolHub - Gestion des Professeurs</title>
    <link href="{{ asset('css/admin_ecole.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin_super.css') }}" rel="stylesheet">
</head>
<body>
    @include('layout.nav_admin_ecole')

        <main class="main-content">
            <header class="topbar">
                <div class="topbar-left">
                    <h1 class="page-title">Gestion des Professeurs</h1>
                    <p class="page-subtitle">{{ $stats['total'] }} professeurs au total</p>
                </div>
                <div class="topbar-right">
                    <button class="btn-primary" onclick="openAddTeacherModal()">
                        <svg fill="currentColor" viewBox="0 0 24 24">
                            <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"/>
                        </svg>
                        Ajouter Professeur
                    </button>
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
                        <div class="avatar">AS</div>
                    </div>
                </div>
            </header>

            <div class="dashboard-container">
                
                <!-- Statistiques Rapides -->
                <div class="teachers-stats-grid">
                    <div class="stat-card-small stat-total">
                        <div class="stat-icon-wrapper">
                            <svg fill="currentColor" viewBox="0 0 24 24">
                                <path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/>
                            </svg>
                        </div>
                        <div class="stat-content-small">
                            <p class="stat-label">Total</p>
                            <h3 class="stat-number">{{ $stats['total'] }}</h3>
                        </div>
                    </div>

                    <div class="stat-card-small stat-active">
                        <div class="stat-icon-wrapper">
                            <svg fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                            </svg>
                        </div>
                        <div class="stat-content-small">
                            <p class="stat-label">Actifs</p>
                            <h3 class="stat-number">{{ $stats['active'] }}</h3>
                        </div>
                    </div>

                    <div class="stat-card-small stat-leave">
                        <div class="stat-icon-wrapper">
                            <svg fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/>
                            </svg>
                        </div>
                        <div class="stat-content-small">
                            <p class="stat-label">En Congé</p>
                            <h3 class="stat-number">{{ $stats['on_leave'] }}</h3>
                        </div>
                    </div>

                    <div class="stat-card-small stat-inactive">
                        <div class="stat-icon-wrapper">
                            <svg fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2C6.47 2 2 6.47 2 12s4.47 10 10 10 10-4.47 10-10S17.53 2 12 2zm5 13.59L15.59 17 12 13.41 8.41 17 7 15.59 10.59 12 7 8.41 8.41 7 12 10.59 15.59 7 17 8.41 13.41 12 17 15.59z"/>
                            </svg>
                        </div>
                        <div class="stat-content-small">
                            <p class="stat-label">Inactifs</p>
                            <h3 class="stat-number">{{ $stats['inactive'] }}</h3>
                        </div>
                    </div>
                </div>

                <!-- Barre de Recherche et Filtres -->
                <div class="card filters-card">
                    <div class="filters-container">
                        <div class="search-box">
                            <svg class="search-icon" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/>
                            </svg>
                            <input type="text" placeholder="Rechercher un professeur..." id="searchInput">
                        </div>

                        <div class="filters-group">
                         

                            <select class="filter-select" id="subjectFilter">
                                <option value="">Toutes les matières</option>
                                <option value="Mathématiques">Mathématiques</option>
                                <option value="Physique-Chimie">Physique-Chimie</option>
                                <option value="Français">Français</option>
                                <option value="Histoire-Géographie">Histoire-Géographie</option>
                                <option value="Anglais">Anglais</option>
                                <option value="SVT">SVT</option>
                            </select>

                            <select class="filter-select" id="statusFilter">
                                <option value="">Tous les statuts</option>
                                <option value="Actif">Actif</option>
                                <option value="En Congé">En Congé</option>
                                <option value="Inactif">Inactif</option>
                            </select>

                            <button class="btn-secondary" onclick="resetFilters()">
                                <svg fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 5V1L7 6l5 5V7c3.31 0 6 2.69 6 6s-2.69 6-6 6-6-2.69-6-6H4c0 4.42 3.58 8 8 8s8-3.58 8-8-3.58-8-8-8z"/>
                                </svg>
                                Réinitialiser
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Liste des Professeurs -->
                <div class="card teachers-list-card">
                    <div class="teachers-grid" id="teachersGrid">
                        @foreach ($teachers as $teacher)
                        <div class="teacher-card" data-school="{{ $teacher['school'] }}" data-subject="{{ $teacher['subject'] }}" data-status="{{ $teacher['status'] }}">
                            <div class="teacher-header">
                                <div class="teacher-avatar-large">{{ $teacher['avatar'] }}</div>
                                <div class="teacher-basic-info">
                                    <h3 class="teacher-name">{{ $teacher['name'] }}</h3>
                                    <p class="teacher-subject">{{ $teacher['subject'] }}</p>
                                    <span class="status-badge status-{{ strtolower(str_replace(' ', '-', $teacher['status'])) }}">
                                        {{ $teacher['status'] }}
                                    </span>
                                </div>
                                <div class="teacher-actions-dropdown">
                                    <button class="action-menu-btn">
                                        <svg fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12 8c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zm0 2c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>

                            <div class="teacher-details">
                                <div class="detail-item">
                                    <svg fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                                    </svg>
                                    <span>{{ $teacher['email'] }}</span>
                                </div>
                                <div class="detail-item">
                                    <svg fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
                                    </svg>
                                    <span>{{ $teacher['phone'] }}</span>
                                </div>
                                <div class="detail-item">
                                    <svg fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 3L1 9l4 2.18v6L12 21l7-3.82v-6l2-1.09V17h2V9L12 3z"/>
                                    </svg>
                                    <span>{{ $teacher['school'] }}</span>
                                </div>
                            </div>

                            <div class="teacher-stats">
                                <div class="stat-mini">
                                    <span class="stat-mini-value">{{ $teacher['students'] }}</span>
                                    <span class="stat-mini-label">Étudiants</span>
                                </div>
                                <div class="stat-mini">
                                    <span class="stat-mini-value">{{ $teacher['classes'] }}</span>
                                    <span class="stat-mini-label">Classes</span>
                                </div>
                                <div class="stat-mini">
                                    <span class="stat-mini-value">{{ \Carbon\Carbon::parse($teacher['hired_date'])->format('Y') }}</span>
                                    <span class="stat-mini-label">Depuis</span>
                                </div>
                            </div>

                            <div class="teacher-footer">
                                <button class="btn-action btn-view" onclick="viewTeacher({{ $teacher['id'] }})">
                                    <svg fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/>
                                    </svg>
                                    Voir Détails
                                </button>
                                <button class="btn-action btn-edit" onclick="editTeacher({{ $teacher['id'] }})">
                                    <svg fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/>
                                    </svg>
                                    Modifier
                                </button>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Pagination -->
                <div class="pagination-container">
                    <div class="pagination-info">
                        Affichage de <strong>1-6</strong> sur <strong>{{ $stats['total'] }}</strong> professeurs
                    </div>
                    <div class="pagination-controls">
                        <button class="pagination-btn" disabled>
                            <svg fill="currentColor" viewBox="0 0 24 24">
                                <path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z"/>
                            </svg>
                            Précédent
                        </button>
                        <button class="pagination-btn active">1</button>
                        <button class="pagination-btn">2</button>
                        <button class="pagination-btn">3</button>
                        <button class="pagination-btn">...</button>
                        <button class="pagination-btn">75</button>
                        <button class="pagination-btn">
                            Suivant
                            <svg fill="currentColor" viewBox="0 0 24 24">
                                <path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"/>
                            </svg>
                        </button>
                    </div>
                </div>

            </div>
        </main>
    </div>

    <!-- Modal Ajouter Professeur -->
    <div class="modal" id="addTeacherModal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Ajouter un Nouveau Professeur</h2>
                <button class="modal-close" onclick="closeAddTeacherModal()">
                    <svg fill="currentColor" viewBox="0 0 24 24">
                        <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/>
                    </svg>
                </button>
            </div>
            <form class="modal-body" id="addTeacherForm">
                <div class="form-grid">
                    <div class="form-group">
                        <label>Nom Complet *</label>
                        <input type="text" required placeholder="Ex: Dr. Sophie Martin">
                    </div>
                    <div class="form-group">
                        <label>Email *</label>
                        <input type="email" required placeholder="email@schoolhub.com">
                    </div>
                    <div class="form-group">
                        <label>Téléphone *</label>
                        <input type="tel" required placeholder="+33 6 12 34 56 78">
                    </div>
                    <div class="form-group">
                        <label>Matière Enseignée *</label>
                        <select required>
                            <option value="">Sélectionner une matière</option>
                            <option value="Mathématiques">Mathématiques</option>
                            <option value="Physique-Chimie">Physique-Chimie</option>
                            <option value="Français">Français</option>
                            <option value="Histoire-Géographie">Histoire-Géographie</option>
                            <option value="Anglais">Anglais</option>
                            <option value="SVT">SVT</option>
                            <option value="EPS">EPS</option>
                            <option value="Informatique">Informatique</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Établissement *</label>
                        <select required>
                            <option value="">Sélectionner un établissement</option>
                            <option value="Lycée Victor Hugo">Lycée Victor Hugo</option>
                            <option value="Collège Marie Curie">Collège Marie Curie</option>
                            <option value="Lycée International">Lycée International</option>
                            <option value="Institut Technique Alpha">Institut Technique Alpha</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Date d'Embauche *</label>
                        <input type="date" required>
                    </div>
                    <div class="form-group full-width">
                        <label>Adresse</label>
                        <input type="text" placeholder="123 Rue de l'École, Paris">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-secondary" onclick="closeAddTeacherModal()">Annuler</button>
                    <button type="submit" class="btn-primary">Ajouter le Professeur</button>
                </div>
            </form>
        </div>
    </div>

    <script src="{{ asset('js/admin_ecole.js') }}"></script>
</body>
</html>