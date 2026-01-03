<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('parent_etudiant', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parent_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('etudiant_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
            
            $table->unique(['parent_id', 'etudiant_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('parent_etudiant');
    }
};