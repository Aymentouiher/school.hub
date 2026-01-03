<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matiere extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'ecole_id',
        'enseignant_id'
    ];

    // Relation avec école
    public function ecole()
    {
        return $this->belongsTo(Ecole::class);
    }

    // Relation avec enseignant
    public function enseignant()
    {
        return $this->belongsTo(User::class, 'enseignant_id')->where('role', 'enseignant');
    }

    // Relation avec cours (à créer plus tard)
    public function cours()
    {
        return $this->hasMany(Cours::class);
    }

    // Relation avec notes (à créer plus tard)
    public function notes()
    {
        return $this->hasMany(Note::class);
    }

    // Relation avec emploi du temps (à créer plus tard)
    public function emploiDuTemps()
    {
        return $this->hasMany(EmploiDuTemps::class);
    }
}