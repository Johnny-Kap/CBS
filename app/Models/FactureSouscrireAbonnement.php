<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FactureSouscrireAbonnement extends Model
{
    use HasFactory;

    public function souscription_abonnements(){
        return $this->belongsTo(SouscrireAbonnement::class, 'souscrire_abonnement_id', 'id');
    }
}
