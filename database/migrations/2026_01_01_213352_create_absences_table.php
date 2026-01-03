<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('absences', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->text('justification')->nullable();
            
            // Clés étrangères
            $table->foreignId('etudiant_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('enseignant_id')->constrained('users')->onDelete('cascade');
            
            $table->timestamps();
            
            // Un étudiant ne peut pas être absent deux fois le même jour (pour éviter les doublons)
            $table->unique(['etudiant_id', 'date']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('absences');
    }
};