<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('matieres', function (Blueprint $table) {
            $table->id();
            $table->string('nom', 150); // Ex: "Mathématiques", "Physique"
            
            // Clés étrangères
            $table->foreignId('ecole_id')->constrained('ecoles')->onDelete('cascade');
            $table->foreignId('enseignant_id')->nullable()->constrained('users')->onDelete('set null');
            // Note: enseignant_id référence users où role = 'enseignant'
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('matieres');
    }
};