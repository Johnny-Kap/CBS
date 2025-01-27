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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('prenom')->nullable();
            $table->string('email')->unique();
            $table->string('date_naiss')->nullable();
            $table->string('image')->nullable();
            $table->text('bio')->nullable();
            $table->string('profession')->nullable();
            $table->string('tel');
            $table->string('adresse');
            $table->string('ville')->nullable();
            $table->string('pays')->nullable();
            $table->string('niu')->nullable();
            $table->string('residence')->nullable();
            $table->string('numero_cni')->nullable();
            $table->string('date_delivrance_cni')->nullable();
            $table->string('numero_passport')->nullable();
            $table->string('date_delivrance_passport')->nullable();
            $table->string('numero_compte_entreprise')->nullable();
            $table->string('boite_postale')->nullable();
            $table->string('siret')->nullable();
            $table->string('siren')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('role', ['user','admin'])->default('user');
            $table->string('type_user')->nullable();
            $table->enum('is_activated', ['true','false'])->default('true');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};