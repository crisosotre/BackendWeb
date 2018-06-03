<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateObservacionsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('observacions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipoTutoria');
            $table->string('tiempoSuficiente');
            $table->integer('tutoriaDaHerramientas');
            $table->integer('tutor_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('tutor_id')->references('id')->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('observacions');
    }
}
