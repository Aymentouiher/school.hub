// public/js/admin-statistics.js

document.addEventListener('DOMContentLoaded', function() {
    
    // Configuration générale pour Chart.js
    Chart.defaults.font.family = '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif';
    Chart.defaults.color = '#6B7280';

    // ========== GRAPHIQUE INSCRIPTIONS ==========
    const enrollmentCtx = document.getElementById('enrollmentChart');
    if (enrollmentCtx) {
        new Chart(enrollmentCtx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin', 'Jul', 'Août', 'Sep', 'Oct', 'Nov', 'Déc'],
                datasets: [{
                    label: 'Étudiants',
                    data: [8200, 8450, 8920, 9380, 9850, 10240, 10680, 11120, 11540, 11920, 12280, 12540],
                    borderColor: '#4F46E5',
                    backgroundColor: 'rgba(79, 70, 229, 0.1)',
                    tension: 0.4,
                    fill: true,
                    pointRadius: 4,
                    pointHoverRadius: 6,
                    pointBackgroundColor: '#4F46E5',
                    pointBorderColor: '#fff',
                    pointBorderWidth: 2
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        backgroundColor: '#1F2937',
                        padding: 12,
                        titleColor: '#fff',
                        bodyColor: '#fff',
                        borderColor: '#4F46E5',
                        borderWidth: 1,
                        displayColors: false,
                        callbacks: {
                            label: function(context) {
                                return context.parsed.y.toLocaleString() + ' étudiants';
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: false,
                        ticks: {
                            callback: function(value) {
                                return value.toLocaleString();
                            }
                        },
                        grid: {
                            color: '#F3F4F6'
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });
    }

    // ========== GRAPHIQUE REVENUS ==========
    const revenueCtx = document.getElementById('revenueChart');
    if (revenueCtx) {
        new Chart(revenueCtx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin', 'Jul', 'Août', 'Sep', 'Oct', 'Nov', 'Déc'],
                datasets: [{
                    label: 'Revenus',
                    data: [5200, 5840, 6420, 6980, 7540, 8100, 8320, 8640, 8920, 9180, 9340, 9480],
                    backgroundColor: 'rgba(16, 185, 129, 0.8)',
                    borderColor: '#10B981',
                    borderWidth: 2,
                    borderRadius: 8,
                    hoverBackgroundColor: '#10B981'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        backgroundColor: '#1F2937',
                        padding: 12,
                        titleColor: '#fff',
                        bodyColor: '#fff',
                        borderColor: '#10B981',
                        borderWidth: 1,
                        displayColors: false,
                        callbacks: {
                            label: function(context) {
                                return '€' + context.parsed.y.toLocaleString();
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return '€' + value.toLocaleString();
                            }
                        },
                        grid: {
                            color: '#F3F4F6'
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });
    }

    // ========== GRAPHIQUE RÉPARTITION DES PLANS (Doughnut) ==========
    const plansCtx = document.getElementById('plansChart');
    if (plansCtx) {
        new Chart(plansCtx, {
            type: 'doughnut',
            data: {
                labels: ['Basique', 'Professionnel', 'Entreprise'],
                datasets: [{
                    data: [42, 35, 23],
                    backgroundColor: [
                        '#4F46E5',
                        '#10B981',
                        '#F59E0B'
                    ],
                    borderWidth: 3,
                    borderColor: '#fff',
                    hoverOffset: 10
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        backgroundColor: '#1F2937',
                        padding: 12,
                        titleColor: '#fff',
                        bodyColor: '#fff',
                        displayColors: true,
                        callbacks: {
                            label: function(context) {
                                return context.label + ': ' + context.parsed + '%';
                            }
                        }
                    }
                },
                cutout: '65%'
            }
        });
    }

    // ========== GRAPHIQUE TAUX DE CROISSANCE (Line) ==========
    const growthCtx = document.getElementById('growthChart');
    if (growthCtx) {
        new Chart(growthCtx, {
            type: 'line',
            data: {
                labels: ['Sem 1', 'Sem 2', 'Sem 3', 'Sem 4'],
                datasets: [{
                    label: 'Croissance',
                    data: [3.2, 4.1, 3.8, 5.2],
                    borderColor: '#8B5CF6',
                    backgroundColor: 'rgba(139, 92, 246, 0.1)',
                    tension: 0.4,
                    fill: true,
                    pointRadius: 5,
                    pointHoverRadius: 7,
                    pointBackgroundColor: '#8B5CF6',
                    pointBorderColor: '#fff',
                    pointBorderWidth: 2
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        backgroundColor: '#1F2937',
                        padding: 12,
                        titleColor: '#fff',
                        bodyColor: '#fff',
                        borderColor: '#8B5CF6',
                        borderWidth: 1,
                        displayColors: false,
                        callbacks: {
                            label: function(context) {
                                return context.parsed.y + '%';
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return value + '%';
                            }
                        },
                        grid: {
                            color: '#F3F4F6'
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });
    }

    // ========== GRAPHIQUE TAUX DE RÉTENTION (Gauge style) ==========
    const retentionCtx = document.getElementById('retentionChart');
    if (retentionCtx) {
        new Chart(retentionCtx, {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: [94.5, 5.5],
                    backgroundColor: [
                        '#10B981',
                        '#F3F4F6'
                    ],
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                circumference: 180,
                rotation: 270,
                cutout: '75%',
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        enabled: false
                    }
                }
            },
            plugins: [{
                id: 'centerText',
                afterDatasetsDraw(chart) {
                    const { ctx, chartArea: { width, height } } = chart;
                    ctx.save();
                    
                    ctx.font = 'bold 28px sans-serif';
                    ctx.fillStyle = '#1F2937';
                    ctx.textAlign = 'center';
                    ctx.textBaseline = 'middle';
                    ctx.fillText('94.5%', width / 2, height / 2 + 20);
                    
                    ctx.restore();
                }
            }]
        });
    }

    // ========== FILTRE DE PÉRIODE ==========
    const periodSelect = document.querySelector('.period-select');
    if (periodSelect) {
        periodSelect.addEventListener('change', function() {
            console.log('Période sélectionnée:', this.value);
            // Ici vous pouvez recharger les données en fonction de la période
            // Par exemple: fetchStatistics(this.value);
        });
    }

    // ========== ANIMATION DES BARRES DE PROGRESSION ==========
    const progressBars = document.querySelectorAll('.progress-fill');
    const progressObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting && !entry.target.classList.contains('animated')) {
                entry.target.classList.add('animated');
                const width = entry.target.style.width;
                entry.target.style.width = '0%';
                
                setTimeout(() => {
                    entry.target.style.width = width;
                }, 100);
            }
        });
    });

    progressBars.forEach(bar => observer.observe(bar));

    // ========== ANIMATION DES CARTES AU SCROLL ==========
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const cardObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);

    const cards = document.querySelectorAll('.card, .stat-card');
    cards.forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        cardObserver.observe(card);
    });

    // ========== EXPORT DES DONNÉES (OPTIONNEL) ==========
    const exportButtons = document.querySelectorAll('.icon-btn');
    exportButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            // Vous pouvez implémenter l'export ici
            console.log('Export demandé');
        });
    });

});
                                                    //   jss de page des abonnements admin 
                                                    // public/js/subscriptions_logic.js

// public/js/admin_super.js

document.addEventListener('DOMContentLoaded', function() {
    
    // Logique pour les boutons d'action de la table
    const actionButtons = document.querySelectorAll('.action-btn');

    actionButtons.forEach(button => {
        button.addEventListener('click', function() {
            const row = this.closest('tr');
            
            // Vérifie si la ligne existe et si la deuxième colonne (Établissement) est présente
            if (row && row.cells.length > 1) {
                const schoolName = row.cells[1].textContent;
                const action = this.textContent;

                alert(`${action} l'abonnement pour : ${schoolName}`);
            } else {
                alert(`Action cliquée : ${this.textContent}`);
            }
        });
    });

    // Logique pour le bouton "Ajouter un Abonnement"
    const addButton = document.querySelector('.btn-primary');
    if (addButton) {
        addButton.addEventListener('click', function() {
            alert('Ouverture de la modale/page d\'ajout d\'abonnement.');
        });
    }
});
