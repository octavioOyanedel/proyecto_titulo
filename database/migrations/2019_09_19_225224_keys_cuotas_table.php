<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KeysCuotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cuotas', function (Blueprint $table) {
            $table->foreign('prestamo_id')->references('id')->on('prestamos')->onDelete('cascade');
            $table->foreign('estado_deuda_id')->references('id')->on('estados_deuda')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cuotas', function (Blueprint $table) {
            //
        });
    }
}
