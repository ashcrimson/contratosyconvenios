<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToContratoHasAreaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contrato_has_area', function (Blueprint $table) {
            $table->foreign('area_id', 'fk_contrato_area_areas1')->references('id')->on('areas');
            $table->foreign('contrato_id', 'fk_contrato_area_contratos1')->references('id')->on('contratos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contrato_has_area', function (Blueprint $table) {
            $table->dropForeign('fk_contrato_area_areas1');
            $table->dropForeign('fk_contrato_area_contratos1');
        });
    }
}
