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
        Schema::create('souscrire_abonnements', function (Blueprint $table) {
            $table->id();
            $table->string('numero_abonnement')->unique();
            $table->string('etat');
            $table->string('date_expiration');
            $table->string('is_expired');
            $table->string('is_buy');
            $table->string('montant');
            $table->string('image')->nullable();
            $table->foreignId('abonnement_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('souscrire_abonnements');
    }
};
