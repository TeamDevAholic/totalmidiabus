<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('intinerarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 50);
            $table->integer('linha_id')->unsigned();
            $table->timestamps();

            $table->foreign('linha_id')
                ->references('id')
                ->on('linhas');
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('intinerarios');
    }
};
