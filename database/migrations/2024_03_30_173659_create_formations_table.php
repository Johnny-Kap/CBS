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
        Schema::create('formations', function (Blueprint $table) {
            $table->id();
            $table->string('theme');
            $table->text('description');
            $table->string('duree');
            $table->string('date_formation');
            $table->string('heure_debut');
            $table->string('heure_fin');
            $table->integer('nb_place');
            $table->string('lieu')->nullable();
            $table->string('moyen_diffusion');
            $table->double('montant');
            $table->string('categorie')->nullable();
            $table->string('is_expired');
            $table->string('is_masked')->nullable();
            $table->string('nom_formateur');
            $table->string('prenom_formateur')->nullable();
            $table->string('tel_formateur')->nullable();
            $table->string('email_formateur')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formations');
    }
};
