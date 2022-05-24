<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOcMercadoPublicoCompradorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oc_mercado_publico_comprador', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('oc_mercado_publico_id')->index('fk_oc_mercado_publi_compr1_idx');
            $table->string('codigo_organismo')->nullable();
            $table->string('nombre_organismo')->nullable();
            $table->string('rut_unidad')->nullable();
            $table->string('codigo_unidad')->nullable();
            $table->string('nombre_unidad')->nullable();
            $table->string('actividad')->nullable();
            $table->string('direccion_unidad')->nullable();
            $table->string('comuna_unidad')->nullable();
            $table->string('region_unidad')->nullable();
            $table->string('pais')->nullable();
            $table->string('nombre_contacto')->nullable();
            $table->string('cargo_contacto')->nullable();
            $table->string('fono_contacto')->nullable();
            $table->string('mail_contacto')->nullable();
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
        Schema::dropIfExists('oc_mercado_publico_comprador');
    }
}
