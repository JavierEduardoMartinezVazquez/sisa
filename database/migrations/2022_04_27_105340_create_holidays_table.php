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
            $table->string('nombre', 20);
            $table->string('empresa', 20);
            $table->string('departamento', 20);
            $table->string('puesto', 20);
            $table->date('fsolicitud');
            $table->date('fingreso');
            $table->integer('aniversario');
            $table->date('finicio');
            $table->date('fechafinal');
            $table->date('iniciolab');
            $table->integer('dias');
            $table->decimal('primavav');
            $table->decimal('daniant');
            $table->integer('dpendientes');
            $table->date('fautorizacion');
            $table->string('autorizo', 20);
            $table->string('status', 20);
            $table->string('periodo', 20);
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
