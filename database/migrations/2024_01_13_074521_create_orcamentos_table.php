<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{



    public function up(): void
    {
        Schema::create('orcamentos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cliente_id')->unsigned();
            $table->string('nome_campanha', 100)->nullable();

            $table->timestamps();
            $table->foreign('cliente_id')
                ->references('id')
                ->on('clientes');
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('orcamentos');
    }
};
