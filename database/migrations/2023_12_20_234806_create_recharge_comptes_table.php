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
        Schema::create('recharge_comptes', function (Blueprint $table) {
            $table->id();
            $table->string('numero_recharge');
            $table->double('montant');
            $table->string('statut')->default('En attente');
            $table->foreignId('compte_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('mode_paiement_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recharge_comptes');
    }
};
