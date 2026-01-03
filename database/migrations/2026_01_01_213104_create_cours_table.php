<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cours', function (Blueprint $table) {
            $table->id();
            $table->string('titre', 200);
            $table->string('fichier'); // Chemin du fichier PDF/Word/etc.
            $table->date('date_de_publication');
            
            // Clés étrangères
            $table->foreignId('enseignant_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('matiere_id')->constrained('matieres')->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cours');
    }
};