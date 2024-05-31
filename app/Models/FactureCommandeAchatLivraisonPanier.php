<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FactureCommandeAchatLivraisonPanier extends Model
{
    use HasFactory;

    public function achat_livraisons(){
        return $this->belongsTo(LivraisonPanier::class, 'livraison_panier_id', 'id');
    }
}
