<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ecole extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'is_premium',
        'subscription_ends', 
        'admin_email',
        'abonnement_id'
    ];

    protected $casts = [
        'is_premium' => 'boolean',
        'subscription_ends' => 'date'
    ];

    // Relation avec abonnement
    public function abonnement()
    {
        return $this->belongsTo(Abonnement::class);
    }

    // Vérifie si l'abonnement est valide
    public function abonnementValide()
    {
        if (!$this->subscription_ends) {
            return false;
        }
        return now()->lt($this->subscription_ends); // date actuelle < date fin
    }
}