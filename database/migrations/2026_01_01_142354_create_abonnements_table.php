<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('abonnements', function (Blueprint $table) {
            $table->id();
            $table->string('type', 100); // Basique, Premium, Entreprise
            $table->decimal('prix', 8, 2); // 999999.99 max
            $table->integer('duree_jours'); // 30, 365, etc.
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('abonnements');
    }
};