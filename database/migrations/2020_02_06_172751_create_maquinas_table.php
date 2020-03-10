<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaquinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maquinas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ip');
            $table->string('sistema_operativo');
            $table->integer('ram');
            $table->integer('disco_duro');
            $table->text('programas');
            $table->integer('sala_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('maquinas');
    }
}
