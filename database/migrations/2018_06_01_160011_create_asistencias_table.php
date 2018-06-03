<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAsistenciasTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asistencias', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
            $table->integer('numEstudiantes');
            $table->string('tipoTutoria');
            $table->string('tipoTexto');
            $table->string('generoDiscursivo');
            $table->string('programaAcademico');
            $table->integer('tutor_id')->unsigned();
            $table->integer('estudiante_id')->unsigned();
            $table->integer('materia_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('tutor_id')->references('id')->on('usuarios');
            $table->foreign('estudiante_id')->references('id')->on('usuarios');
            $table->foreign('materia_id')->references('id')->on('materias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('asistencias');
    }
}
