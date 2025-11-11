<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('carros', function (Blueprint $table) {
            // Renomeia a coluna antiga para Imagem 1
            $table->renameColumn('foto_principal_url', 'imagem_1_url'); 
            
            // Adiciona as novas colunas
            $table->string('imagem_2_url')->nullable()->after('imagem_1_url');
            $table->string('imagem_3_url')->nullable()->after('imagem_2_url');
        });
    }

    public function down(): void
    {
        Schema::table('carros', function (Blueprint $table) {
            // Reverte as colunas
            $table->dropColumn(['imagem_2_url', 'imagem_3_url']);
            $table->renameColumn('imagem_1_url', 'foto_principal_url');
        });
    }
};