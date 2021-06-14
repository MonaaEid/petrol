<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEsdarGasTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('esdar_gas_type', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('esdar_id');
            $table->string('gas_type');
            $table->float('gas_price');
            
            $table->foreign('esdar_id')->references('id')->on('esdar');
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
        Schema::dropIfExists('esdar_gas_type');
    }
}
