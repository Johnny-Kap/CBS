<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommandeFormation extends Model
{
    use HasFactory;

    public function mode_paiements(){
        return $this->belongsTo(ModePaiement::class, 'mode_paiement_id', 'id');
    }

    public function users(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function formations(){
        return $this->belongsTo(Formation::class, 'formation_id', 'id');
    }
}
