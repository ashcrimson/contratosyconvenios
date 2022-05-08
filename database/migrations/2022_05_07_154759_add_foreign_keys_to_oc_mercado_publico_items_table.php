<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToOcMercadoPublicoItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('oc_mercado_publico_items', function (Blueprint $table) {
            $table->foreign('oc_mercado_publico_id', 'fk_ocmercadopublicoitem1')->references('id')->on('oc_mercado_publico');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('oc_mercado_publico_items', function (Blueprint $table) {
            $table->dropForeign('fk_ocmercadopublicoitem1');
        });
    }
}
