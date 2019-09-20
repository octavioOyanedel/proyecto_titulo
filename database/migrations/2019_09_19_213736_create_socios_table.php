<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSociosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('socios', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish_ci';
            $table->string('rut');
            $table->string('nombre1');
            $table->string('nombre2');
            $table->string('apellido1');
            $table->string('apellido2');   
            $table->enum('genero', array('Varón', 'Dama'));    
            $table->date('fecha_nac');   
            $table->unsignedInteger('celular');
            $table->string('correo');
            $table->string('direccion'); 
            $table->date('fecha_pucv'); 
            $table->unsignedInteger('anexo');
            $table->unsignedInteger('numero_socio');
            $table->date('fecha_sind1'); 
            $table->unsignedInteger('comuna_id');
            $table->unsignedInteger('ciudad_id');
            $table->unsignedInteger('sede_id');
            $table->unsignedInteger('area_id');
            $table->unsignedInteger('cargo_id');
            $table->unsignedInteger('estado_socio_id');
            $table->unsignedInteger('nacionalidad_id');
            $table->softDeletes();
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
        Schema::dropIfExists('socios');
    }
}
