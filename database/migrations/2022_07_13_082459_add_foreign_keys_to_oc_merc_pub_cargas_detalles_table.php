<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToOcMercPubCargasDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('oc_merc_pub_cargas_detalles', function (Blueprint $table) {
            $table->foreign('carga_id', 'fk_oc_merc_pub_carga_detalle1')->references('id')->on('oc_mercado_publico_cargas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('oc_merc_pub_cargas_detalles', function (Blueprint $table) {
            $table->dropForeign('fk_oc_merc_pub_carga_detalle1');
        });
    }
}
