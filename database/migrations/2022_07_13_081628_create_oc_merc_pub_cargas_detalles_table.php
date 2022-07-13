<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOcMercPubCargasDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oc_merc_pub_cargas_detalles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('orden_compra', 3000)->nullable();
            $table->string('contrato_id')->nullable();
            $table->string('estado_consulta')->nullable();
            $table->string('detalle_consulta', 3000)->nullable();
            $table->unsignedBigInteger('carga_id')->index('fk_oc_merc_pub_cargas_det_idx');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('oc_merc_pub_cargas_detalles');
    }
}
