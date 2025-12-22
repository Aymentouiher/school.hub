@php
    $subscriptions = [
        ['id' => 101, 'school' => 'Lycée Victor Hugo', 'plan' => 'Entreprise', 'status' => 'Actif', 'renewal' => '2025-12-01', 'students' => 2500, 'revenue' => 159],
        ['id' => 102, 'school' => 'Collège Marie Curie', 'plan' => 'Professionnel', 'status' => 'En Attente', 'renewal' => '2025-11-15', 'students' => 850, 'revenue' => 63],
        ['id' => 103, 'school' => 'École Primaire Les Poussins', 'plan' => 'Basique', 'status' => 'Actif', 'renewal' => 'N/A', 'students' => 150, 'revenue' => 0],
        ['id' => 104, 'school' => 'Institut Technique Alpha', 'plan' => 'Professionnel', 'status' => 'Expiré', 'renewal' => '2025-10-20', 'students' => 1100, 'revenue' => 63],
        ['id' => 105, 'school' => 'Lycée International', 'plan' => 'Entreprise', 'status' => 'Actif', 'renewal' => '2026-03-10', 'students' => 3200, 'revenue' => 159],
        ['id' => 106, 'school' => 'Collège Saint-Exupéry', 'plan' => 'Basique', 'status' => 'Actif', 'renewal' => 'N/A', 'students' => 210, 'revenue' => 0],
    ];
@endphp

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Abonnements</title>
    <link href="{{ asset('css/admin_super.css') }}" rel="stylesheet">
</head>
<body class="admin-page">

<div class="admin-layout">
    @include('Layout.nav-admin')

    <main class="main-content" style="flex-grow: 1;">
        <header class="topbar" style="background-color: #FFFFFF; padding: 1rem 2rem; border-bottom: 1px solid #E5E7EB;">
            <div class="topbar-left">
                <h1 class="page-title">Gestion des Abonnements</h1>
                <p class="page-subtitle">Vue d'ensemble et administration des plans SchoolHub</p>
            </div>
        </header>

        <div class="page-content" style="padding: 2rem;">
            <div class="card">

                <!-- BUTTON "AJOUTER UN ABONNEMENT" SUPPRIMÉ ICI -->
                <div class="card-header">
                    <h3 class="card-title">Liste des Abonnements Actuels</h3>
                </div>

                <div class="table-responsive">
                    <table class="subscription-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Établissement</th>
                                <th>Plan</th>
                                <th>Statut</th>
                                <th>Étudiants</th>
                                <th>Revenu Mensuel (€)</th>
                                <th>Renouvellement</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subscriptions as $sub)
                            <tr>
                                <td>#{{ $sub['id'] }}</td>
                                <td>{{ $sub['school'] }}</td>
                                <td>
                                    <span class="plan-badge plan-{{ strtolower($sub['plan']) }}">
                                        {{ $sub['plan'] }}
                                    </span>
                                </td>
                                <td>
                                    <span class="status-badge status-{{ strtolower(str_replace(' ', '-', $sub['status'])) }}">
                                        {{ $sub['status'] }}
                                    </span>
                                </td>
                                <td>{{ number_format($sub['students'], 0, ',', ' ') }}</td>
                                <td>{{ $sub['revenue'] > 0 ? $sub['revenue'].'€' : 'N/A' }}</td>
                                <td>{{ $sub['renewal'] }}</td>
                                <td>
                                    <button style="background-color: red; color: white;" class="action-btn danger-btn">
                                        supprimer
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </main>
</div>

<script src="{{ asset('js/admin_super.js') }}"></script>
</body>
</html>
