<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysOcMercadoPublicoCargasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('oc_mercado_publico_cargas', function (Blueprint $table) {
            $table->foreign('user_id', 'fk_oc_mercado_pub_carga1')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('oc_mercado_publico_cargas', function (Blueprint $table) {
            $table->dropForeign('fk_oc_mercado_pub_carga1');
        });
    }
}
