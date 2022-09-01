<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFields2ToOcMercadoPublicoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('oc_mercado_publico', function (Blueprint $table) {
            // $table->string('nombre_estado')->nullable();
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
            // $table->dropColumn('nombre_estado');
        });
    }
}
