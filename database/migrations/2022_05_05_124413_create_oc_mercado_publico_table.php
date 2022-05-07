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
            $table->bigInteger('codigo_licitacion')->nullable();
            $table->text('descripcion');
            $table->unsignedInteger('codigo_tipo')->index('fk_oc_tipo1_idx');
            $table->unsignedInteger('tipo_moneda')->index('fk_um1_idx');
            $table->integer('codigo_estado_proveedor');
            $table->integer('promedio_calificacion');
            $table->integer('cantidad_evaluacion');
            $table->float('descuentos');
            $table->float('cargos');
            $table->float('total_neto');
            $table->float('porcentaje_iva');
            $table->float('impuestos');
            $table->float('total');
            $table->string('financiamiento');
            $table->string('pais');
            $table->unsignedInteger('tipo_despacho')->index('fk_tipo_desp1_idx');
            $table->unsignedInteger('forma_pago')->index('fk_forma_pago1_idx');
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
