<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOcMercadoPublicoItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oc_mercado_publico_items', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('oc_mercado_publico_id')->index('fk_oc_mercado_publi_tiems1_idx');
            $table->bigInteger('correlativo')->nullable();
            $table->bigInteger('codigo_categoria')->nullable();
            $table->string('categoria', 3000)->nullable();
            $table->bigInteger('codigo_producto')->nullable();
            $table->string('producto', 3000)->nullable();
            $table->string('especificacion_comprador', 3000)->nullable();
            $table->string('especificacion_proveedor', 3000)->nullable();
            $table->integer('cantidad')->nullable();
            $table->integer('unidad')->nullable();
            $table->string('moneda')->nullable();
            $table->bigInteger('precio_neto');
            $table->bigInteger('total_cargos');
            $table->bigInteger('total_descuentos');
            $table->bigInteger('total_impuestos');
            $table->bigInteger('total');
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
        Schema::dropIfExists('oc_mercado_publico_items');
    }
}
