<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'contenu',
        'chat',
        'lu',
        'expediteur_id',
        'destinataire_id'
    ];

    protected $casts = [
        'lu' => 'boolean'
    ];

    // Relation avec expéditeur
    public function expediteur()
    {
        return $this->belongsTo(User::class, 'expediteur_id');
    }

    // Relation avec destinataire
    public function destinataire()
    {
        return $this->belongsTo(User::class, 'destinataire_id');
    }

    // Marquer comme lu
    public function marquerCommeLu()
    {
        $this->update(['lu' => true]);
    }

    // Marquer comme non lu
    public function marquerCommeNonLu()
    {
        $this->update(['lu' => false]);
    }

    // Vérifier si le message peut être lu par un utilisateur
    public function peutEtreLuPar(User $user)
    {
        return $user->id === $this->expediteur_id || $user->id === $this->destinataire_id;
    }

    // Récupérer la conversation entre deux utilisateurs
    public static function conversation($userId1, $userId2)
    {
        return self::where(function($query) use ($userId1, $userId2) {
            $query->where('expediteur_id', $userId1)
                  ->where('destinataire_id', $userId2);
        })->orWhere(function($query) use ($userId1, $userId2) {
            $query->where('expediteur_id', $userId2)
                  ->where('destinataire_id', $userId1);
        })->orderBy('created_at', 'asc')->get();
    }
}