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
        Schema::create('vehicules', function (Blueprint $table) {
            $table->id();
            $table->string('intitule');
            $table->string('numero_immatriculation');
            $table->string('modele');
            $table->string('couleur');
            $table->string('annee_fabrication')->nullable();
            $table->text('description')->nullable();
            $table->string('etat')->nullable();
            $table->string('transmission')->nullable();
            $table->string('type_moteur')->nullable();
            $table->double('nombre_kilometrage')->nullable();
            $table->string('air_conditionne')->nullable();
            $table->integer('nombre_portieres')->nullable();
            $table->text('fonctionnalites')->nullable();
            $table->text('images')->nullable();
            $table->string('image_illustrative')->nullable();
            $table->foreignId('type_vehicule_id')->constrained();
            $table->foreignId('marque_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicules');
    }
};
