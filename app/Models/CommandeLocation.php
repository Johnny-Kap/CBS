<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommandeLocation extends Model
{
    use HasFactory;

    public function users(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function locations(){
        return $this->belongsTo(LocationVehicule::class, 'location_vehicule_id', 'id');
    }

    public function mode_paiements(){
        return $this->belongsTo(ModePaiement::class, 'mode_paiement_id', 'id');
    }

    public function facture_commande_locations(){
        return $this->hasMany(FactureCommandeLocation::class);
    }
}
