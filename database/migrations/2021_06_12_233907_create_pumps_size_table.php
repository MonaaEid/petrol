<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePumpsSizeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pumps_size', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('pump_id');
            $table->string('size_in_liter');
            $table->string('distence_in_cm');
            $table->foreign('pump_id')->references('id')->on('pumps');
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
        Schema::dropIfExists('pumps_size');
    }
}
