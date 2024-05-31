<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FactureCommandeLivraisonPanier extends Model
{
    use HasFactory;

    public function livraisons(){
        return $this->belongsTo(LivraisonPanier::class, 'livraison_panier_id', 'id');
    }
}
