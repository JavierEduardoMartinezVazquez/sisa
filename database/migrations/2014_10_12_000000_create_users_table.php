<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',40)->nullable();
            $table->string('lastname_p',20)->nullable();
            $table->string('lastname_m',20)->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('edad')->nullable();
            $table->string('sucursal', 60)->nullable();
            $table->string('area', 20)->nullable();
            $table->date('ingreso')->nullable();
            $table->time('hentrada')->nullable();
            $table->time('hsalida')->nullable();
            $table->string('rol')->nullable();
            /*
            $table->dateTime('fechaingresocorp')->nullable();
            $table->dateTime('fechaingresoemp')->nullable();
            $table->dateTime('fechabaja')->nullable();
            $table->string('id_horario',3)->nullable();
            $table->string('id_empresa',3)->nullable();
            $table->string('id_area',3)->nullable();
            $table->string('id_rol',3)->nullable();*/
            $table->string('status',5)->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
