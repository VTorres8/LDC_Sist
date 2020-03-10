<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRsvmaquinasTurnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rsvmaquina_turno', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('rsv_maquina_id');
            $table->integer('turno_id');
            $table->string('dia');
            $table->string('semana');
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
        Schema::dropIfExists('rsvmaquina_turno');
    }
}
