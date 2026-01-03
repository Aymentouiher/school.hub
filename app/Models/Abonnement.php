<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Abonnement extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'prix', 
        'duree_jours',
        'description'
    ];

    protected $casts = [
        'prix' => 'decimal:2'
    ];

    // Relation avec écoles (on l'ajoutera plus tard)
    public function ecoles()
    {
        return $this->hasMany(Ecole::class);
    }
}