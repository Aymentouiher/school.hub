<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Les attributs qu'on peut remplir
     */
    protected $fillable = [
        'name',         // Laravel
        'email',        // Laravel  
        'password',     // Laravel
        // TES attributs :
        'nom',
        'prenom',
        'role',
        'matricule',
        'date_naissance',
        'specialite',
        'telephone',
    ];

    /**
     * Les attributs à cacher
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Conversion des types
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'date_naissance' => 'date', // Convertit automatiquement en date
        ];
    }

    // ============= TES MÉTHODES =============
    
    /**
     * Vérifie si l'utilisateur est admin
     */
    public function isAdmin()
    {
        return $this->role === 'admin';
    }
    
    /**
     * Vérifie si l'utilisateur est étudiant
     */
    public function isEtudiant()
    {
        return $this->role === 'etudiant';
    }
    
    /**
     * Vérifie si l'utilisateur est enseignant
     */
    public function isEnseignant()
    {
        return $this->role === 'enseignant';
    }
    
    /**
     * Vérifie si l'utilisateur est parent
     */
    public function isParent()
    {
        return $this->role === 'parent';
    }
    
    /**
     * Récupère le nom complet
     */
    public function getNomCompletAttribute()
    {
        return $this->nom . ' ' . $this->prenom;
    }
}