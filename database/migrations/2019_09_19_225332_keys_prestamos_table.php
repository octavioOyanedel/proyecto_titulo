<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KeysPrestamosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('prestamos', function (Blueprint $table) {
            $table->foreign('socio_id')->references('id')->on('socios')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('estado_deuda_id')->references('id')->on('estados_deuda')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('interes_id')->references('id')->on('intereses')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('forma_pago_id')->references('id')->on('formas_pago')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('cuenta_id')->references('id')->on('cuentas')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('prestamos', function (Blueprint $table) {
            //
        });
    }
}
