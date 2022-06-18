<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOcMpTipoOrdenCompraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oc_mp_tipo_orden_compra', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('codigo');
            $table->string('abreviacion');
            $table->string('descripcion', 3000);
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
        Schema::dropIfExists('oc_mp_tipo_orden_compra');
    }
}
