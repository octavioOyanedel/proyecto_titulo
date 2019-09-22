<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KeysEstudiosRealizadosSociosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('estudios_realizados_socios', function (Blueprint $table) {
            $table->primary(['rut', 'estudio_realizado_id'],'PRIMARY_KEY');
            $table->foreign('rut')->references('rut')->on('socios')->onDelete('cascade');
            $table->foreign('estudio_realizado_id')->references('id')->on('estudios_realizados')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('estudios_realizados_socios', function (Blueprint $table) {
            //
        });
    }
}
