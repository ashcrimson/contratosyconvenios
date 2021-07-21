<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdenesComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordenes_compras', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->unsignedBigInteger('contrato_id')->index('fk_ord_compras_contratos1_idx');
            $table->string('numero', 45);
            $table->string('fecha_envio', 45);
            $table->string('total', 45)->nullable();
            $table->string('codigo', 45);
            $table->string('cantidad', 45)->nullable();
            $table->string('descripcion', 45)->nullable();
            $table->tinyInteger('tiene_detalles')->nullable();
            $table->unsignedBigInteger('estado_id')->index('fk_ord_compras_estados1_idx');
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
        Schema::dropIfExists('ordenes_compras');
    }
}
