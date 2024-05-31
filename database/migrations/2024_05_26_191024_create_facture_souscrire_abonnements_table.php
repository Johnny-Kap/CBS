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
        Schema::create('facture_souscrire_abonnements', function (Blueprint $table) {
            $table->id();
            $table->string('numero_facture')->nullable();
            $table->string('etat')->nullable();
            $table->foreignId('souscrire_abonnement_id')->constrained(indexName:'sous_bo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facture_souscrire_abonnements');
    }
};
