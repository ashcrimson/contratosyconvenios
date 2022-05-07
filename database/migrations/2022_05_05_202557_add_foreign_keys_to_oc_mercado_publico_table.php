<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToOcMercadoPublicoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('oc_mercado_publico', function (Blueprint $table) {
            $table->foreign('codigo_tipo', 'fk_ocmercadopubliccodtipo1')->references('id')->on('orden_compra_tipos');
            $table->foreign('tipo_moneda', 'fk_ocmercadopublictipomoneda1')->references('id')->on('unidades_monetarias');
            $table->foreign('tipo_despacho', 'fk_ocmercadopublictipodespa1')->references('id')->on('despachos_tipos');
            $table->foreign('forma_pago', 'fk_ocmercadopublicformapago1')->references('id')->on('formas_pagos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('oc_mercado_publico', function (Blueprint $table) {
            $table->dropForeign('fk_ocmercadopubliccodtipo1');
            $table->dropForeign('fk_ocmercadopublictipomoneda1');
            $table->dropForeign('fk_ocmercadopublictipodespa1');
            $table->dropForeign('fk_ocmercadopublicformapago1');
        });
    }
}
