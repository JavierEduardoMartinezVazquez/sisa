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
    {
        DB::table('business')->insert(array(
            'nombre' => 'SOLUCIONES INTEGRALES PARA TU CAMION S.A DE C.V',
            'status' => 'ALTA',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s'),
        ));
        DB::table('business')->insert(array(
            'nombre' => 'AUTOBUSES Y TRACTOCAMIONES DE QUERETARO S.A. DE C.V.',
            'status' => 'ALTA',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s'),
        ));
        DB::table('business')->insert(array(
            'nombre' => 'USADOS TRACTOCAMIONES Y PARTES REFACCIONARIAS S.A DE C.V',
            'status' => 'ALTA',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s'),
        ));
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
