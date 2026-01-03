<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('document_administratifs', function (Blueprint $table) {
            $table->id();
            $table->string('type', 100); // Attestation, Certificat, Bulletin, etc.
            $table->enum('statut', ['en_attente', 'traite', 'refuse'])->default('en_attente');
            $table->date('date_demande');
            $table->text('commentaire')->nullable();
            
            // Clé étrangère vers étudiant
            $table->foreignId('etudiant_id')->constrained('users')->onDelete('cascade');
            
            $table->timestamps();
            
            // Index pour optimiser les recherches
            $table->index('statut');
            $table->index('date_demande');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('document_administratifs');
    }
};