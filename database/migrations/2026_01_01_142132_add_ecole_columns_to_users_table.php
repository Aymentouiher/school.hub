<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // ===== TES COLONNES SPÉCIFIQUES =====
            
            // 1. Nom et prénom (en plus de "name" qui existe déjà)
            $table->string('nom')->nullable()->after('name');
            $table->string('prenom')->nullable()->after('nom');
            
            // 2. Rôle (admin, etudiant, enseignant, parent)
            $table->enum('role', ['admin', 'etudiant', 'enseignant', 'parent'])
                  ->default('etudiant')->after('password');
            
            // 3. Pour étudiants seulement
            $table->string('matricule')->nullable()->unique()->after('role');
            $table->date('date_naissance')->nullable()->after('matricule');
            
            // 4. Pour enseignants seulement
            $table->string('specialite')->nullable()->after('date_naissance');
            
            // 5. Pour parents seulement
            $table->string('telephone')->nullable()->after('specialite');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Si on annule la migration, supprime ces colonnes
            $table->dropColumn([
                'nom',
                'prenom', 
                'role',
                'matricule',
                'date_naissance',
                'specialite',
                'telephone'
            ]);
        });
    }
};