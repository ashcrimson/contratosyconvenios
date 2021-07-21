<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdenesComprasDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordenes_compras_detalles', function (Blueprint $table) {
            $table->id();
            $table->integer('compra_id')->index('fk_ordenes_compras_detalles_ordenes_compras1_idx');
            $table->integer('item_id')->index('fk_ordenes_compras_detalles_contratos_items1_idx');
            $table->decimal('precio', 14);
            $table->decimal('cantidad', 14);
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
        Schema::dropIfExists('ordenes_compras_detalles');
    }
}