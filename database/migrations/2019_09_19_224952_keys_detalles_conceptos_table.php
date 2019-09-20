<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KeysDetallesConceptosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detalles_concepto', function (Blueprint $table) {
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
        Schema::table('detalles_concepto', function (Blueprint $table) {
            //
        });
    }
}
