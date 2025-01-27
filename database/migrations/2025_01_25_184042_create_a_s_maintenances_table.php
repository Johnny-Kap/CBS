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
        Schema::create('a_s_maintenances', function (Blueprint $table) {
            $table->id();
            $table->string('nom_prestataire')->nullable();
            $table->string('tel_prestataire')->nullable();
            $table->text('prestation_effectuees')->nullable();
            $table->string('statuts')->nullable();
            $table->string('observations')->nullable();
            $table->foreignId('commande_maintenance_automobile_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('a_s_maintenances');
    }
};
