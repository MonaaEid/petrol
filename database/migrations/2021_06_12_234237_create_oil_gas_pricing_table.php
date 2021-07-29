<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOilGasPricingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oil_gas_pricing', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('oil_gas_id');
            $table->date('date');
            $table->float('sale_price');
            $table->float('purchase_price');
            $table->float('commission');
            $table->foreign('oil_gas_id')->references('id')->on('oil_gas');
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
        Schema::dropIfExists('oil_gas_pricing');
    }
}
