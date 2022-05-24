<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToOcMercadoPublicoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('oc_mercado_publico', function (Blueprint $table) {
            $table->string('estado_proveedor')->nullable();
            $table->integer('cantidad_items')->nullable();
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
            $table->dropColumn('estado_proveedor');
            $table->dropColumn('cantidad_items');
        });
    }
}
