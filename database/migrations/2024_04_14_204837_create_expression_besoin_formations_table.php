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
        Schema::create('expression_besoin_formations', function (Blueprint $table) {
            $table->id();
            $table->string('numero_commande')->unique()->nullable();
            $table->string('theme');
            $table->text('description')->nullable();
            $table->string('duree');
            $table->string('date_formation');
            $table->string('heure_debut');
            $table->string('heure_fin');
            $table->integer('nb_place');
            $table->string('lieu')->nullable();
            $table->string('type_cours');
            $table->double('montant')->nullable();
            $table->string('categorie')->nullable();
            $table->string('etat_paiement');
            $table->string('etat_commande');
            $table->string('nom_formateur')->nullable();
            $table->string('prenom_formateur')->nullable();
            $table->string('tel_formateur')->nullable();
            $table->string('email_formateur')->nullable();
            $table->string('image')->nullable();
            $table->string('photo_paiement')->nullable();
            $table->foreignId('mode_paiement_id')->nullable();
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expression_besoin_formations');
    }
};
