<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeys2ToOcMercadoPublicoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('oc_mercado_publico', function (Blueprint $table) {
            $table->foreign('contrato_id', 'fk_oc_merc_pub_contratos1')->references('id')->on('contratos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('oc_mercado_publico', function (Blueprint $table) {
            $table->dropForeign('fk_oc_merc_pub_contratos1');
        });
    }
}
