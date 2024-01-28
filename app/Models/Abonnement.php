<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Abonnement extends Model
{
    use HasFactory;

    public function type_abonnements(){
        return $this->belongsTo(TypeAbonnement::class, 'type_abonnement_id', 'id');
    }

    public function souscrire_abonnements(){
        return $this->hasMany(SouscrireAbonnement::class);
    }
}
