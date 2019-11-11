<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrestamosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestamos', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish_ci';
            $table->increments('id');
            $table->date('fecha_solicitud');
            $table->unsignedInteger('numero_egreso')->unique();
            $table->unsignedInteger('cuenta_id');
            $table->unsignedInteger('cheque')->nullable()->unique();
            $table->date('fecha_pago_deposito')->nullable();
            $table->unsignedInteger('monto');
            $table->unsignedInteger('numero_cuotas')->nullable();
            $table->unsignedInteger('socio_id');
            $table->unsignedInteger('estado_deuda_id');
            $table->unsignedInteger('interes_id')->nullable();
            $table->unsignedInteger('forma_pago_id');
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
        Schema::dropIfExists('prestamos');
    }
}
