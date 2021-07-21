<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToOrdenesComprasDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ordenes_compras_detalles', function (Blueprint $table) {
            $table->foreign('item_id', 'fk_ord_comp_detalles_items1')->references('id')->on('contratos_items');
            $table->foreign('compra_id', 'fk_ord_comp_detalles_ord_comp1')->references('id')->on('ordenes_compras');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ordenes_compras_detalles', function (Blueprint $table) {
            $table->dropForeign('fk_ord_comp_detalles_items1');
            $table->dropForeign('fk_ord_comp_detalles_ord_comp1');
        });
    }
}
