<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocationVehicule extends Model
{
    use HasFactory;

    protected $fillable = [
        'intitule',
        'description',
        'tarif',
        'vehicule_id',
        'user_id'
    ];

    public function vehicules(){
        return $this->belongsTo(Vehicule::class, 'vehicule_id', 'id');
    }

    public function users(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function commande_locations(){
        return $this->hasMany(CommandeLocation::class);
    }
}
