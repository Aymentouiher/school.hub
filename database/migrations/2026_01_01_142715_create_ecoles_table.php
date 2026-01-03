<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ecoles', function (Blueprint $table) {
            $table->id();
            $table->string('nom', 200);
            $table->boolean('is_premium')->default(false);
            $table->date('subscription_ends')->nullable();
            $table->string('admin_email')->unique();
            
            // Clé étrangère vers abonnements (table maintenant existante)
            $table->foreignId('abonnement_id')->nullable()->constrained('abonnements')->onDelete('set null');
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ecoles');
    }
};