<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGainOrLoseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gain_or_lose', function (Blueprint $table) {
            $table->increments('id');
            $table->float('gas_liter_no');
            $table->float('solar_liter_no');
            $table->date('date');
            $table->float('withdrawls');
            $table->float('payments');
            $table->float('gain_loss');
            

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
        Schema::dropIfExists('gain_or_lose');
    }
}
