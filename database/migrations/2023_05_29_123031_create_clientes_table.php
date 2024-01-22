<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{

    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 50);
            $table->date('data_nascimento');
            $table->string('cpf', 20)->unique();
            $table->string('rg', 20);
            $table->string('email', 50);
            $table->string('whatsapp', 20);
            $table->string('genero', 20);
            $table->string('cep', 20);
            $table->string('rua', 50);
            $table->string('bairro', 50);
            $table->string('cidade', 50);
            $table->string('uf', 20);
            $table->string('numero', 50)->nullable();
            $table->string('complemento', 50)->nullable();
            $table->timestamps();
            
            $table->bigInteger('criado_por')->unsigned();
            $table->foreign('criado_por')->references('id')->on('users');
            $table->bigInteger('actualizado_por')->unsigned();
            $table->foreign('actualizado_por')->references('id')->on('users');

        });
    }


    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
