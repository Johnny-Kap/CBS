<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpressionBesoinFormation extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero_commande',
        'theme',
        'description',
        'duree',
        'date_formation',
        'heure_debut',
        'heure_fin',
        'nb_place',
        'lieu',
        'type_cours',
        'etat_paiement',
        'etat_commande',
        'categorie',
        'montant',
        'nom_formateur',
        'prenom_formateur',
        'tel_formateur',
        'email_formateur',
        'photo_paiement',
        'mode_paiement_id',
        'user_id',
    ];

    public function mode_paiements(){
        return $this->belongsTo(ModePaiement::class, 'mode_paiement_id', 'id');
    }

    public function users(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
