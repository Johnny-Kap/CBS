<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ASLocation extends Model
{
    use HasFactory;

    public function commandes(){
        return $this->belongsTo(CommandeLocation::class, 'commande_location_id', 'id');
    }
}
