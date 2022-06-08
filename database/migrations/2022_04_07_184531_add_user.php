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
        /*
        DB::table('users')->insert(array(
            'name' => 'ADMINISTRADOR',
            'email' => 'admin@admin.com',
            'email_verified_at' => date('Y-m-d H:m:s'),
            'password' => '$2y$10$RnMSJ15cCdl.UiNbXVIIp.bHLz2uecl.mkJXMbIelRp2Rg0CsxHq.',
            'id_rol' => '3',
            'remember_token' => '',
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
