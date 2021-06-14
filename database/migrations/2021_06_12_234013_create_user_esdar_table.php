<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserEsdarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_esdar', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('esdar_id');
            $table->string('bonus_no');
            $table->string('hafza_no');
            $table->string('hesab_no');
            $table->string('company_name');
            $table->float('type_with_liters');
            
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('esdar_id')->references('id')->on('esdar');
            $table->dateTime('date');
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
        Schema::dropIfExists('user_esdar');
    }
}
