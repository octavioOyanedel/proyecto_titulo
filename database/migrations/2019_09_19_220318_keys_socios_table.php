<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KeysSociosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('socios', function (Blueprint $table) {
            $table->foreign('comuna_id')->references('id')->on('comunas')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('ciudad_id')->references('id')->on('ciudades')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('sede_id')->references('id')->on('sedes')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('area_id')->references('id')->on('areas')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('cargo_id')->references('id')->on('cargos')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('estado_socio_id')->references('id')->on('estados_socio')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('nacionalidad_id')->references('id')->on('nacionalidades')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('socios', function (Blueprint $table) {
            //
        });
    }
}
