<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommandeMaintenanceAutomobile extends Model
{
    use HasFactory;

    public function users(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function mode_paiements(){
        return $this->belongsTo(ModePaiement::class, 'mode_paiement_id', 'id');
    }

    public function attestation_service(){
        return $this->belongsTo(AttestationServiceMaintenance::class);
    }
}
