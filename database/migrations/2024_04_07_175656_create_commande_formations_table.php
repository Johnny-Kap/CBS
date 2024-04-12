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
        Schema::create('commande_formations', function (Blueprint $table) {
            $table->id();
            $table->string('numero_commande')->unique()->nullable();
            $table->double('montant_total');
            $table->integer('nb_place_commande');
            $table->string('etat_paiement');
            $table->string('etat_commande');
            $table->string('photo')->nullable();
            $table->string('type_cours')->nullable();
            $table->foreignId('mode_paiement_id')->nullable();
            $table->foreignId('formation_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commande_formations');
    }
};
