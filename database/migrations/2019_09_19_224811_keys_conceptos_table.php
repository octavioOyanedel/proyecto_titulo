<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KeysConceptosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('conceptos', function (Blueprint $table) {
            $table->foreign('detalle_concepto_id')->references('id')->on('detalles_concepto')->onDelete('cascade');
            $table->foreign('tipo_registro_contable_id')->references('id')->on('tipos_registro_contable')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('conceptos', function (Blueprint $table) {
            //
        });
    }
}
