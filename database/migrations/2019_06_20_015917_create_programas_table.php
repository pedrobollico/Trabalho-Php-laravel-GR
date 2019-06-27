<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgramasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome', 20);
            $table->string('descricao', 100);
            $table->string('dia_hora', 100);
            $table->integer('evento_id')->unsigned();
            $table->foreign('evento_id')->references('id')->on('tipo_eventos');
            $table->integer('classificacao_id')->unsigned();
            $table->foreign('classificacao_id')->references('id')->on('classificacaos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('programas');
    }
}
