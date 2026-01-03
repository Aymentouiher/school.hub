<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->string('nom', 100); // Ex: "1ère A", "Terminale B"
            $table->string('niveau', 50); // Ex: "Première", "Terminale"
            $table->string('annee_scolaire', 20); // Ex: "2024-2025"
            
            // Clé étrangère vers ecole (une classe appartient à une école)
            $table->foreignId('ecole_id')->constrained('ecoles')->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('classes');
    }
};