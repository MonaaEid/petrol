<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGalleryPricingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gallery_pricing', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('pricing_id');
            $table->unsignedInteger('gallery_id');

            $table->foreign('pricing_id')->references('id')->on('pricing');
            $table->foreign('gallery_id')->references('id')->on('gallery');
            
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
        Schema::dropIfExists('gallery_pricing');
    }
}
