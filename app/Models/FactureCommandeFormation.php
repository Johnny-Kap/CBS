<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FactureCommandeFormation extends Model
{
    use HasFactory;

    public function commande_formations(){
        return $this->belongsTo(CommandeFormation::class, 'commande_formation_id', 'id');
    }
}
