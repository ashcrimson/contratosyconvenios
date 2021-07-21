<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratoHasAreaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contrato_has_area', function (Blueprint $table) {
            $table->unsignedBigInteger('contrato_id')->index('fk_contratos_has_areas_contratos1_idx');
            $table->unsignedBigInteger('area_id')->index('fk_contratos_has_areas_areas1_idx');
            $table->primary(['contrato_id', 'area_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contrato_has_area');
    }
}
