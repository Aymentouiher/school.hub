<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->decimal('valeur', 4, 2); // Ex: 15.50 (4 chiffres, 2 décimales)
            $table->string('semestre', 50); // Ex: "Semestre 1", "Trimestre 2"
            
            // Clés étrangères
            $table->foreignId('etudiant_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('matiere_id')->constrained('matieres')->onDelete('cascade');
            $table->foreignId('enseignant_id')->constrained('users')->onDelete('cascade');
            
            $table->timestamps();
            
            // Un étudiant ne peut pas avoir deux notes pour la même matière/semestre
            $table->unique(['etudiant_id', 'matiere_id', 'semestre']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('notes');
    }
};