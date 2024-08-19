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
        Schema::create('commande_maintenance_automobiles', function (Blueprint $table) {
            $table->id();
            $table->string('numero_commande')->unique();
            $table->string('intitule');
            $table->text('debrief')->nullable();
            $table->string('date_maintenance');
            $table->string('situation_vehicule');
            $table->string('immatriculation')->nullable();
            $table->string('marque_vehicule')->nullable();
            $table->string('modele_vehicule')->nullable();
            $table->string('type_moteur')->nullable();
            $table->string('annee_vehicule')->nullable();
            $table->string('kilometrage')->nullable();
            $table->string('numero_serie')->nullable();
            $table->text('devis')->nullable();
            $table->double('montant')->nullable();
            $table->string('etat_commande');
            $table->string('etat_paiement');
            $table->string('image')->nullable();
            $table->string('numero_abonnement_souscris')->nullable();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('mode_paiement_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commande_maintenance_automobiles');
    }
};
