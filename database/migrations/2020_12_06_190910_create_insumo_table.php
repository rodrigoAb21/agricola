<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInsumoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insumo', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre')->nullable();
            $table->string('tipo');
            $table->float('precio')->nullable();
            $table->date('f_venc')->nullable();
            $table->string('distribuidor')->nullable();
            $table->float('existencias');
            $table->string('info')->nullable();
            $table->float('envase');

            $table->unsignedInteger('unidad_id');
            $table->foreign('unidad_id')->references('id')->on('unidad');
            $table->unsignedInteger('subtipo_id');
            $table->foreign('subtipo_id')->references('id')->on('subtipo');

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
        Schema::dropIfExists('insumo');
    }
}
