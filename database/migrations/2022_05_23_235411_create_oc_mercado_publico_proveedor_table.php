<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOcMercadoPublicoProveedorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oc_mercado_publico_proveedor', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('oc_mercado_publico_id')->index('fk_oc_mercado_publi_prove1_idx');
            $table->string('codigo')->nullable();
            $table->string('nombre')->nullable();
            $table->string('actividad')->nullable();
            $table->string('codigo_sucursal')->nullable();
            $table->string('nombre_sucursal')->nullable();
            $table->string('rut_sucursal')->nullable();
            $table->string('direccion')->nullable();
            $table->string('comuna')->nullable();
            $table->string('region')->nullable();
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
        Schema::dropIfExists('oc_mercado_publico_proveedor');
    }
}
