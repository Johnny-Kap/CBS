<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttestationServiceMaintenance extends Model
{
    use HasFactory;

    protected $fillable = ['prestation_effectuees', 'statuts', 'observations', 'commande_maintenance_automobile_id'];

    public function commandes(){
        return $this->belongsTo(CommandeMaintenanceAutomobile::class, 'commande_maintenance_automobile_id', 'id');
    }
}
