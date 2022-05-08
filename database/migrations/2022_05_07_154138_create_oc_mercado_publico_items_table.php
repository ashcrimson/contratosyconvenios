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
            $table->bigInteger('codigo_categoria');
            $table->string('categoria');
            $table->bigInteger('codigo_producto');
            $table->string('producto');
            $table->text('especificacion_comprador')->nullable();
            $table->text('especificacion_proveedor')->nullable();
            $table->integer('cantidad');
            $table->integer('unidad')->nullable();
            $table->string('moneda');
            $table->float('precio_neto');
            $table->float('total_cargos');
            $table->float('total_descuentos');
            $table->float('total_impuestos');
            $table->float('total');
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
