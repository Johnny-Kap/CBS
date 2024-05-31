<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'prenom',
        'email',
        'profession',
        'tel',
        'adresse',
        'niu',
        'numero_cni',
        'date_delivrance_cni',
        'numero_passport',
        'date_delivrance_passport',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function hasRole(string $role): bool
    {
        return $this->getAttribute('role') === $role;
    }

    public function commande_locations(){
        return $this->hasMany(CommandeLocation::class);
    }

    public function souscrire_abonnements(){
        return $this->hasMany(SouscrireAbonnement::class);
    }

    public function commande_maintenances(){
        return $this->hasMany(CommandeMaintenanceAutomobile::class);
    }

    public function bibliotheques(){
        return $this->hasMany(Bibliotheque::class);
    }

    public function reservation_hotel_apparts(){
        return $this->hasMany(CommandeReservationAppartementHotel::class);
    }
}