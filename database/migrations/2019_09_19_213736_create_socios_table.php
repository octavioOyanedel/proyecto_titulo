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
            $table->increments('id');
            $table->string('rut');
            $table->string('nombre1');
            $table->string('nombre2')->nullable();
            $table->string('apellido1');
            $table->string('apellido2')->nullable();   
            $table->enum('genero', array('Varón', 'Dama'));    
            $table->date('fecha_nac')->nullable();   
            $table->unsignedInteger('celular')->nullable();
            $table->string('correo')->nullable();
            $table->string('direccion')->nullable(); 
            $table->date('fecha_pucv')->nullable();
            $table->unsignedInteger('anexo')->nullable();
            $table->unsignedInteger('numero_socio')->unique();
            $table->date('fecha_sind1')->nullable();
            $table->unsignedInteger('comuna_id')->nullable();
            $table->unsignedInteger('ciudad_id')->nullable();
            $table->unsignedInteger('sede_id');
            $table->unsignedInteger('area_id')->nullable();
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
