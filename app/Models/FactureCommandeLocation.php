<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FactureCommandeLocation extends Model
{
    use HasFactory;

    public function commande_locations(){
        return $this->belongsTo(CommandeLocation::class, 'commande_location_id', 'id');
    }
}
