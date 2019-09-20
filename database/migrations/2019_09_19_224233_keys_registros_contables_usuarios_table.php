<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KeysRegistrosContablesUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('registros_contables_usuarios', function (Blueprint $table) {
            $table->primary(['usuario_id', 'registro_contable_id'],'PRIMARY_KEY');
            $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('cascade');
            $table->foreign('registro_contable_id')->references('id')->on('registros_contables')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('registros_contables_usuarios', function (Blueprint $table) {
            //
        });
    }
}
