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
        Schema::create('demandes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Clé étrangère liée à la table users
            $table->string('type', 255);
            $table->text('service');
            $table->text('nom_complet');
            $table->date('date_depot');
            $table->text('ecole')->nullable();
            $table->string('status')->nullable();
            $table->string('cv')->nullable(); // Ajout de la colonne pour stocker le chemin du CV
            $table->string('lettre')->nullable(); // Ajout de la colonne pour stocker le chemin du CV
            $table->timestamps();
            $table->string('email')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demandes');
    }
};
