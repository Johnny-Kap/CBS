<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('commande_reservation_appartement_hotels', function (Blueprint $table) {
            $table->id();
            $table->string('numero_commande')->unique();
            $table->string('type_resevation');
            $table->string('date_reservation');
            $table->string('ville');
            $table->string('localite')->nullable();
            $table->double('prix_inferieur')->nullable();
            $table->double('prix_superieur')->nullable();
            $table->string('etat_commande');
            $table->string('numero_abonnement_souscris')->nullable();
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commande_reservation_appartement_hotels');
    }
};
