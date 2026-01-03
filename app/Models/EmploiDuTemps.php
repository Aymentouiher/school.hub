<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmploiDuTemps extends Model
{
    use HasFactory;

    protected $fillable = [
        'jour',
        'heure_debut',
        'heure_fin',
        'classe_id',
        'matiere_id',
        'cours_id'
    ];

    protected $casts = [
        'heure_debut' => 'datetime:H:i',
        'heure_fin' => 'datetime:H:i'
    ];

    // Relation avec classe
    public function classe()
    {
        return $this->belongsTo(Classe::class);
    }

    // Relation avec matière
    public function matiere()
    {
        return $this->belongsTo(Matiere::class);
    }

    // Relation avec cours (optionnel)
    public function cours()
    {
        return $this->belongsTo(Cours::class);
    }

    // Durée du cours en minutes
    public function duree()
    {
        $debut = \Carbon\Carbon::parse($this->heure_debut);
        $fin = \Carbon\Carbon::parse($this->heure_fin);
        return $debut->diffInMinutes($fin);
    }
}