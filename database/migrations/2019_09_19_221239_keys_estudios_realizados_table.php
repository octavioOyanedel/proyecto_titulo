<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KeysEstudiosRealizadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('estudios_realizados', function (Blueprint $table) {
            $table->foreign('rut')->references('rut')->on('socios')->onDelete('cascade');
            $table->foreign('titulo_id')->references('id')->on('titulos')->onDelete('cascade');
            $table->foreign('institucion_id')->references('id')->on('instituciones')->onDelete('cascade');
            $table->foreign('grado_academico_id')->references('id')->on('grados_academicos')->onDelete('cascade');
            $table->foreign('estado_grado_academico_id')->references('id')->on('estados_grado_academico')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('estudios_realizados', function (Blueprint $table) {
            //
        });
    }
}
