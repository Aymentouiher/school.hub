<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->text('contenu');
            $table->string('chat')->nullable(); // ID de conversation
            $table->boolean('lu')->default(false);
            
            // Clés étrangères
            $table->foreignId('expediteur_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('destinataire_id')->constrained('users')->onDelete('cascade');
            
            $table->timestamps();
            
            // Index pour optimiser les recherches
            $table->index('chat');
            $table->index('lu');
            $table->index(['expediteur_id', 'destinataire_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};