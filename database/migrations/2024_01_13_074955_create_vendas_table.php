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
        Schema::create('vendas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('numero_pi');
            $table->integer('qtd_parcelas');
            $table->date('inicio_campanha');
            $table->string('anexo_pdf');
            $table->integer('numero_nf');
            $table->string('valor_bruto');
            $table->string('valor_imposto');
            $table->string('valor_depositado');
            $table->string('data_vencimento');
            $table->string('data_pagamento');
            $table->string('vendedor');
            $table->string('custos');
            $table->text('explicacao');
            $table->string('pagamento_colagem');
            $table->string('pagamento_garagem');
            $table->string('fotos_comprovacao');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendas');
    }
};
