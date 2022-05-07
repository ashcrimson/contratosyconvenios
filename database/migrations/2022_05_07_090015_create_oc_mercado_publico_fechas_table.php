<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOcMercadoPublicoFechasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oc_mercado_publico_fechas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('oc_mercado_publico_id')->index('fk_oc_mercado_publi1_idx');
            $table->date('fecha_creacion')->nullable();
            $table->date('fecha_envio')->nullable();
            $table->date('fecha_aceptacion')->nullable();
            $table->date('fecha_cancelacion')->nullable();
            $table->date('fecha_ultima_modificacion')->nullable();
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
        Schema::dropIfExists('oc_mercado_publico_fechas');
    }
}
