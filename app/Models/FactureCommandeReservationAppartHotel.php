<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FactureCommandeReservationAppartHotel extends Model
{
    use HasFactory;

    public function reservations_appart_hotel(){
        return $this->belongsTo(CommandeReservationAppartementHotel::class, 'commande_reservation_appartement_hotels_id', 'id');
    }
}
