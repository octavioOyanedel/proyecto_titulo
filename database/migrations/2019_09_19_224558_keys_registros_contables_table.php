<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KeysRegistrosContablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('registros_contables', function (Blueprint $table) {
            $table->foreign('concepto_id')->references('id')->on('conceptos')->onDelete('cascade');
            $table->foreign('tipo_registro_contable_id')->references('id')->on('tipos_registro_contable')->onDelete('cascade');
            $table->foreign('cuenta_id')->references('id')->on('cuentas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('registros_contables', function (Blueprint $table) {
            //
        });
    }
}
