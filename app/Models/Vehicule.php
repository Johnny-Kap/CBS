<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicule extends Model
{
    use HasFactory;

    protected $fillable = [
        'intitule',
        'marque_id',
        'numero_immatriculation',
        'modele',
        'couleur',
        'annee_fabrication',
        'description',
        'etat',
        'type_vehicule_id',
        'images',
        'image_illustrative',
        'fonctionnalites',
        'nombre_kilometrage',
        'nombre_portieres',
        'transmission',
        'type_moteur',
        'air_conditionne',
    ];

    protected $casts = [
        'images' => 'array',
        'fonctionnalites' => 'array'
    ];

    public function type_vehicules(){
        return $this->belongsTo(TypeVehicule::class, 'type_vehicule_id', 'id');
    }

    public function marques(){
        return $this->belongsTo(Marque::class, 'marque_id', 'id');
    }

    public function location_vehicules(){
        return $this->hasMany(LocationVehicule::class);
    }
}
