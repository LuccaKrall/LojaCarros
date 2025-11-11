<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
       Schema::create('carros', function (Blueprint $table) {
        $table->id(); 
        $table->string('foto_principal_url')->nullable(); 
        $table->string('marca', 100); 
        $table->string('modelo', 100);
        $table->string('cor', 50);
        $table->integer('ano_fabricacao'); 
        $table->integer('quilometragem_atual'); 
        $table->decimal('valor_total', 10, 2); 
        $table->text('detalhes')->nullable(); 

        $table->timestamps();
                });
    }
    public function down(): void
    {
        Schema::dropIfExists('carros');
    }
};
