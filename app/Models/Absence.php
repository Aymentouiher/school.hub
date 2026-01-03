<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'justification',
        'etudiant_id',
        'enseignant_id'
    ];

    protected $casts = [
        'date' => 'date'
    ];

    // Relation avec étudiant
    public function etudiant()
    {
        return $this->belongsTo(User::class, 'etudiant_id')->where('role', 'etudiant');
    }

    // Relation avec enseignant
    public function enseignant()
    {
        return $this->belongsTo(User::class, 'enseignant_id')->where('role', 'enseignant');
    }

    // Vérifie si l'absence est justifiée
    public function estJustifiee()
    {
        return !empty($this->justification);
    }
}