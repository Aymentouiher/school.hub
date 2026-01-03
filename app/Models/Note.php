<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $fillable = [
        'valeur',
        'semestre',
        'etudiant_id',
        'matiere_id',
        'enseignant_id'
    ];

    // Relation avec étudiant
    public function etudiant()
    {
        return $this->belongsTo(User::class, 'etudiant_id')->where('role', 'etudiant');
    }

    // Relation avec matière
    public function matiere()
    {
        return $this->belongsTo(Matiere::class);
    }

    // Relation avec enseignant
    public function enseignant()
    {
        return $this->belongsTo(User::class, 'enseignant_id')->where('role', 'enseignant');
    }

    // Validation : note entre 0 et 20
    public function setValeurAttribute($value)
    {
        if ($value < 0 || $value > 20) {
            throw new \InvalidArgumentException('La note doit être entre 0 et 20');
        }
        $this->attributes['valeur'] = $value;
    }
}