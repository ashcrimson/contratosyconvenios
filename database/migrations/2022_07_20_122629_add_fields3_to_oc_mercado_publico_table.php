<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFields3ToOcMercadoPublicoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('oc_mercado_publico', function (Blueprint $table) {
            $table->unsignedBigInteger('contrato_id')->nullable()->index('fk_oc_merc_pub_contratos1_idx');
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
            $table->dropColumn('contrato_id');
        });
    }
}
