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
        Schema::create('location_vehicules', function (Blueprint $table) {
            $table->id();
            $table->string('intitule');
            $table->text('description')->nullable();
            $table->double('tarif');
            $table->string('masked')->nullable();
            $table->foreignId('vehicule_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('location_vehicules');
    }
};
