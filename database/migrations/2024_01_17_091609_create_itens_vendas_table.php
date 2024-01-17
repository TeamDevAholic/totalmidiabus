<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('itens_vendas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('orcamento_id')->unsigned();
            $table->integer('venda_id')->unsigned();
            $table->integer('produto_id');
            $table->integer('qtd_produto');
            $table->date('data_inicio');
            $table->date('data_final');
            $table->string('valor', 10);
            $table->string('custo_colagem_produto', 10);
            $table->string('custo_linha_onibus', 10);
            $table->timestamps();

            $table->foreign('orcamento_id')
                ->references('id')
                ->on('orcamentos');
            $table->foreign('venda_id')
                ->references('id')
                ->on('vendas');
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('itens_vendas');
    }
};
