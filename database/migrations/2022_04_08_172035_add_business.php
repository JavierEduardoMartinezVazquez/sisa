<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AddBusiness extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {/*
        DB::table('business')->insert(array(
            'empresa' => 'SOLUCIONES INTEGRALES PARA TU CAMION S.A DE C.V',
            'direccion' => 'xona',
            'numero' => 23,
            'status' => 'ALTA',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s'),
        ));
        DB::table('business')->insert(array(
            'empresa' => 'AUTOBUSES Y TRACTOCAMIONES DE QUERETARO S.A. DE C.V.',
            'direccion' => 'xona',
            'numero' => 18,
            'status' => 'ALTA',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s'),
        ));
        DB::table('business')->insert(array(
            'empresa' => 'USADOS TRACTOCAMIONES Y PARTES REFACCIONARIAS S.A DE C.V',
            'direccion' => 'xona',
            'numero' => 15,
            'status' => 'ALTA',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s'),
        ));*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
