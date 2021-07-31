<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratosItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contratos_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('contrato_id')->index('fk_ctr_items_contratos1_idx');
            $table->string('codigo', 45);
            $table->string('descripcion');
            $table->decimal('cantidad_total', 14);
            $table->decimal('precio', 14);
            $table->string('presentacion_prod_soli')->nullable();
            $table->string('f_f')->nullable();
            $table->string('desc_tec_prod_ofertado')->nullable();
            $table->string('u_entrega_oferente')->nullable();
            $table->string('saldo');
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
        Schema::dropIfExists('contratos_items');
    }
}
