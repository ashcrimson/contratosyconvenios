<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOcMercadoPublicoCargasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oc_mercado_publico_cargas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('fecha_carga');
            $table->string('nombre_archivio', 245);
            $table->dateTime('fecha_datos')->nullable();
            $table->integer('total_registros');
            $table->integer('total_nuevos');
            $table->integer('total_actualizados');
            $table->string('tipo');
            $table->unsignedBigInteger('user_id')->index('fx_oc_mercado_pub_cargas_idx');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('oc_mercado_publico_cargas');
    }
}
