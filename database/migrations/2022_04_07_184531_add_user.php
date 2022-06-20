<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
class AddUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        DB::table('users')->insert(array(
            'name' => 'JAVIER EDUARDO',
            'email' => 'javier.martinez@socasa.com',
            //'email_verified_at' => date('Y-m-d H:m:s'),
            'password' => '$2y$10$RnMSJ15cCdl.UiNbXVIIp.bHLz2uecl.mkJXMbIelRp2Rg0CsxHq.',
            'lastname_p' => 'MARTINEZ',
            'lastname_m' => 'VAZQUEZ',
            //'id_rol' => '3',
            //'remember_token' => '',
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
