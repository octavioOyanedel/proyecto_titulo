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
            $table->unsignedInteger('cheque')->nullable();
            $table->unsignedInteger('monto')->nullable();
            $table->unsignedInteger('concepto_id')->nullable();
            $table->string('detalle')->nullable();
            $table->unsignedInteger('tipo_registro_contable_id')->nullable();
            $table->unsignedInteger('cuenta_id')->nullable();
            $table->unsignedInteger('asociado_id')->nullable();
            $table->unsignedInteger('usuario_id')->nullable();
            $table->unsignedInteger('socio_id')->nullable();
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
