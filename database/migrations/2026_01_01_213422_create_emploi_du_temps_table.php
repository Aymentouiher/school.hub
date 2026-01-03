<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('emploi_du_temps', function (Blueprint $table) {
            $table->id();
            $table->string('jour', 20); // Lundi, Mardi, Mercredi...
            $table->time('heure_debut');
            $table->time('heure_fin');
            
            // Clés étrangères
            $table->foreignId('classe_id')->constrained('classes')->onDelete('cascade');
            $table->foreignId('matiere_id')->constrained('matieres')->onDelete('cascade');
            $table->foreignId('cours_id')->nullable()->constrained('cours')->onDelete('set null');
            
            $table->timestamps();
            
            // Empêche les chevauchements dans une même classe
            $table->unique(['classe_id', 'jour', 'heure_debut']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('emploi_du_temps');
    }
};