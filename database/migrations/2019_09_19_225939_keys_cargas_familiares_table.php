<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KeysCargasFamiliaresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cargas_familiares', function (Blueprint $table) {
            $table->foreign('socio_id')->references('id')->on('socios')->onDelete('cascade');
            $table->foreign('parentesco_id')->references('id')->on('parentescos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cargas_familiares', function (Blueprint $table) {
            //
        });
    }
}
