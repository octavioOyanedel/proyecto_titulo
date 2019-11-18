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
            $table->foreign('titulo_id')->references('id')->on('titulos')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('institucion_id')->references('id')->on('instituciones')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('grado_academico_id')->references('id')->on('grados_academicos')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('estado_grado_academico_id')->references('id')->on('estados_grado_academico')->onUpdate('cascade')->onDelete('set null');
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
