<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KeysGradosAcademicosInstitucionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('grados_academicos_instituciones', function (Blueprint $table) {
            $table->foreign('grado_academico_id')->references('id')->on('grados_academicos')->onDelete('cascade');
            $table->foreign('institucion_id')->references('id')->on('instituciones')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('grados_academicos_instituciones', function (Blueprint $table) {
            //
        });
    }
}
