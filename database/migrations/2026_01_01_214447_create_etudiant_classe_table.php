<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('etudiant_classe', function (Blueprint $table) {
            $table->id();
            $table->foreignId('etudiant_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('classe_id')->constrained('classes')->onDelete('cascade');
            $table->timestamps();
            
            // Un étudiant ne peut être qu'une fois dans une classe
            $table->unique(['etudiant_id', 'classe_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('etudiant_classe');
    }
};