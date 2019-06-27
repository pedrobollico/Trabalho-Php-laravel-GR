<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRadialistasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('radialistas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome', 20);
            $table->string('sobrenome', 50);
            $table->date('data_nascimeto');
            $table->string('sexo', 10);
            $table->string('email', 70);
            $table->string('telefone', 30);
            $table->binary('foto')->nullable();
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
        Schema::dropIfExists('radialistas');
    }
}
