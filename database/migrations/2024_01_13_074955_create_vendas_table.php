<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        
        Schema::create('vendas', function (Blueprint $table) {
            $table->increments('id');
            $table->text('lista_produtos');
            $table->integer('numero_pi')->nullable();
            $table->integer('qtd_parcelas')->nullable();
            $table->date('inicio_campanha')->nullable();
            $table->string('anexo_pdf', 100)->nullable();
            $table->string('numero_nf', 20)->nullable();
            $table->string('valor_bruto', 20)->nullable();
            $table->string('valor_imposto', 20)->nullable();
            $table->string('valor_depositado', 20)->nullable();
            $table->string('pagamento_colagem')->nullable();
            $table->string('pagamento_garagem')->nullable();
            $table->string('fotos_comprovacao')->nullable();
            $table->string('fluxo')->default('vendedor');
            $table->string('status')->default('orçamento');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('vendas');
    }
};
