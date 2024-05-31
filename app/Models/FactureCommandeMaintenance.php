<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FactureCommandeMaintenance extends Model
{
    use HasFactory;

    public function commande_maintenance(){
        return $this->belongsTo(CommandeMaintenanceAutomobile::class, 'commande_maintenance_automobile_id', 'id');
    }
}
