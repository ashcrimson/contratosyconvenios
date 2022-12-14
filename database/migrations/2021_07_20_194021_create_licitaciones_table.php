<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLicitacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('licitaciones', function (Blueprint $table) {
            $table->id();
            $table->string('numero')->unique();
            $table->text('descripcion');
            $table->decimal('presupuesto', 14, 0);
            $table->unsignedBigInteger('user_crea')->nullable()->index('fk_licitaciones_users1_idx');
            $table->unsignedBigInteger('user_actualiza')->nullable()->index('fk_licitaciones_users2_idx');
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
        Schema::dropIfExists('licitaciones');
    }
}
