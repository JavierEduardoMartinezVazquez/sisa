<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHolidaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('holidays', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('empleado')->nullable();
            $table->string('paterno')->nullable();
            $table->string('materno')->nullable();
            $table->date('solicitud')->nullable();
            $table->string('departamento')->nullable();
            $table->string('puesto')->nullable();
            $table->date('ingreso')->nullable();
            $table->date('inicio')->nullable();
            $table->date('final')->nullable();
            $table->integer('disponibles')->nullable();
            $table->string('status',5)->nullable();
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
        Schema::dropIfExists('holidays');
    }
}

