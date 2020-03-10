<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRsvsalasTurnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rsvsala_turno', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('rsv_sala_id');
            $table->integer('turno_id');
            $table->string('dia');
            $table->string('semana');
            $table->string('tipo');
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
        Schema::dropIfExists('rsvsala_turno');
    }
}
