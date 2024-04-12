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
        Schema::create('commande_locations', function (Blueprint $table) {
            $table->id();
            $table->string('date_debut');
            $table->string('date_fin');
            $table->double('tarif');
            $table->double('nombre_jours');
            $table->string('etat_paiement');
            $table->string('etat_commande');
            $table->string('photo')->nullable();
            $table->string('numero_commande')->unique()->nullable();
            $table->foreignId('mode_paiement_id')->nullable();
            $table->foreignId('location_vehicule_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commande_locations');
    }
};
