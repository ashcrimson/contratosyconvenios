<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOcMercadoPublicoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oc_mercado_publico', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo');
            $table->string('nombre');
            $table->bigInteger('codigo_estado')->nullable();
            $table->string('nombre_estado')->nullable();
            $table->bigInteger('codigo_licitacion')->nullable();
            $table->string('descripcion',3000)->nullable();
            $table->unsignedInteger('codigo_tipo')->index('fk_oc_tipo1_idx')->nullable();
            $table->unsignedInteger('tipo_moneda')->index('fk_um1_idx')->nullable();
            $table->bigInteger('codigo_estado_proveedor')->nullable();
            $table->bigInteger('promedio_calificacion')->nullable();
            $table->bigInteger('cantidad_evaluacion')->nullable();
            $table->bigInteger('descuentos')->nullable();
            $table->bigInteger('cargos')->nullable();
            $table->bigInteger('total_neto')->nullable();
            $table->bigInteger('porcentaje_iva')->nullable();
            $table->bigInteger('impuestos')->nullable();
            $table->bigInteger('total')->nullable();
            $table->string('financiamiento')->nullable();
            $table->string('pais')->nullable();
            $table->unsignedInteger('tipo_despacho')->index('fk_tipo_desp1_idx')->nullable();
            $table->unsignedInteger('forma_pago')->index('fk_forma_pago1_idx')->nullable();
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
        Schema::dropIfExists('oc_mercado_publico');
    }
}
