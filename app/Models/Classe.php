<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'niveau',
        'annee_scolaire',
        'ecole_id'
    ];

    // Relation avec école
    public function ecole()
    {
        return $this->belongsTo(Ecole::class);
    }

    // Relation avec étudiants (table pivot à créer plus tard)
    public function etudiants()
    {
        return $this->belongsToMany(User::class, 'etudiant_classe', 'classe_id', 'etudiant_id')
                    ->where('role', 'etudiant');
    }

    // Relation avec emploi du temps (à créer plus tard)
    public function emploiDuTemps()
    {
        return $this->hasMany(EmploiDuTemps::class);
    }
}