<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SouscrireAbonnement extends Model
{
    use HasFactory;

    public function abonnements(){
        return $this->belongsTo(Abonnement::class, 'abonnement_id', 'id');
    }

    public function users(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
