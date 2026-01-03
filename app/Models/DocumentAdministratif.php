<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentAdministratif extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'statut',
        'date_demande',
        'commentaire',
        'etudiant_id'
    ];

    protected $casts = [
        'date_demande' => 'date'
    ];

    // Relation avec étudiant
    public function etudiant()
    {
        return $this->belongsTo(User::class, 'etudiant_id')->where('role', 'etudiant');
    }

    // Vérifie si le document est en attente
    public function estEnAttente()
    {
        return $this->statut === 'en_attente';
    }

    // Vérifie si le document est traité
    public function estTraite()
    {
        return $this->statut === 'traite';
    }

    // Vérifie si le document est refusé
    public function estRefuse()
    {
        return $this->statut === 'refuse';
    }

    // Marquer comme traité
    public function marquerTraite($commentaire = null)
    {
        $this->update([
            'statut' => 'traite',
            'commentaire' => $commentaire
        ]);
    }

    // Marquer comme refusé
    public function marquerRefuse($commentaire)
    {
        $this->update([
            'statut' => 'refuse',
            'commentaire' => $commentaire
        ]);
    }
}