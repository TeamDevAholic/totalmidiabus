<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('responsaveis', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('empresa_id');
            $table->string('nome', 50);
            $table->string('email', 50);
            $table->string('whatsapp', 20);
            $table->string('celular', 20);
            $table->string('setor', 50);
            $table->date('data_aniversario');
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('responsaveis');
    }
};
