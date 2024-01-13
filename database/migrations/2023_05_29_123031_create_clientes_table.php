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
            $table->string('nome');
            $table->string('data_nascimento');
            $table->string('cpf')->unique();
            $table->string('rg');
            $table->string('email');
            $table->string('whatsapp');
            $table->string('genero');
            $table->string('cep');
            $table->string('rua');
            $table->string('bairro');
            $table->string('cidade');
            $table->string('uf');
            $table->string('numero')->nullable();
            $table->string('complemento')->nullable();
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
