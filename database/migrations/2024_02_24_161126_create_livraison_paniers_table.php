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
        Schema::create('livraison_paniers', function (Blueprint $table) {
            $table->id();
            $table->string('numero_commande');
            $table->string('type_prestation');
            $table->text('contenu_panier')->nullable();
            $table->string('date_livraison');
            $table->string('adresse_recuperation');
            $table->string('adresse_livraison');
            $table->double('montant')->nullable();
            $table->string('etat_commande');
            $table->string('etat_paiement')->nullable();
            $table->string('tel_destinataire')->nullable();
            $table->string('email_destinataire')->nullable();
            $table->string('image')->nullable();
            $table->string('numero_abonnement_valide')->nullable();
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
        Schema::dropIfExists('livraison_paniers');
    }
};
