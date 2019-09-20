<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistroContablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registros_contables', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish_ci';
            $table->increments('id');
            $table->date('fecha');
            $table->unsignedInteger('numero_registro');
            $table->unsignedInteger('forma_pago');
            $table->unsignedInteger('monto');
            $table->unsignedInteger('concepto_id');
            $table->unsignedInteger('tipo_registro_contable_id');
            $table->unsignedInteger('cuenta_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registros_contables');
    }
}
