
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

class CreateBusinessreporteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('businessreporte', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('empresa',100)->nullable();
            $table->string('direccion')->nullable();
            $table->integer('numero')->nullable();
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
        Schema::dropIfExists('businessreporte');
    }
}
