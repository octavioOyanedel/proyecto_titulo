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
            $table->foreign('usuario_id')->references('id')->on('usuarios')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('socio_id')->references('id')->on('socios')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('concepto_id')->references('id')->on('conceptos')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('tipo_registro_contable_id')->references('id')->on('tipos_registro_contable')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('cuenta_id')->references('id')->on('cuentas')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('asociado_id')->references('id')->on('asociados')->onUpdate('cascade')->onDelete('set null');
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
