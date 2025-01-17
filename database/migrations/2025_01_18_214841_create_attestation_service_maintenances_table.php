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
        Schema::create('attestation_service_maintenances', function (Blueprint $table) {
            $table->id();
            $table->text('prestation_effectuees');
            $table->string('statuts');
            $table->string('observations');
            $table->foreignId('commande_maintenance_automobile_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attestation_service_maintenances');
    }
};
