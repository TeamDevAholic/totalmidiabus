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
        Schema::create('linhas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('numero_linha', 20);
            $table->string('municipio', 100);
            $table->string('nome', 50);
            $table->integer('empresa_id');
            $table->text('itinerarios');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('linhas');
    }
};
