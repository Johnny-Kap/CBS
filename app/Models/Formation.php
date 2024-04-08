<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    use HasFactory;

    protected $fillable = [
        'theme',
        'description',
        'duree',
        'date_formation',
        'heure_debut',
        'heure_fin',
        'nb_place',
        'lieu',
        'moyen_diffusion',
        'montant',
        'is_expired',
        'is_masked',
        'nom_formateur',
        'prenom_formateur',
        'tel_formateur',
        'email_formateur',
    ];
}
