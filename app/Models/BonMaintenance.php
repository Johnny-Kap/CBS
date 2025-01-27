<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BonMaintenance extends Model
{
    use HasFactory;

    public function commandes(){
        return $this->belongsTo(CommandeMaintenanceAutomobile::class, 'commande_maintenance_automobile_id', 'id');
    }
}
