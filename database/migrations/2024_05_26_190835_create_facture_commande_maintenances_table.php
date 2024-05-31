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
        Schema::create('facture_commande_maintenances', function (Blueprint $table) {
            $table->id();
            $table->string('numero_facture')->nullable();
            $table->string('etat')->nullable();
            $table->foreignId('commande_maintenance_automobile_id')->constrained(indexName:'co_maint');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facture_commande_maintenances');
    }
};
