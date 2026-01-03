<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cours extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'fichier',
        'date_de_publication',
        'enseignant_id',
        'matiere_id'
    ];

    protected $casts = [
        'date_de_publication' => 'date'
    ];

    // Relation avec enseignant
    public function enseignant()
    {
        return $this->belongsTo(User::class, 'enseignant_id')->where('role', 'enseignant');
    }

    // Relation avec matière
    public function matiere()
    {
        return $this->belongsTo(Matiere::class);
    }

    // Relation avec emploi du temps (à créer plus tard)
    public function emploiDuTemps()
    {
        return $this->hasMany(EmploiDuTemps::class);
    }
}