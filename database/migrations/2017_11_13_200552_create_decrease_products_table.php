<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDecreaseProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('decrease_products', function (Blueprint $table) {
            $table->increments('DCS_id');
            $table->integer('PDT_id')->unsigned();
            $table->foreign('PDT_id')->references('PDT_id')->on('products')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('DCS_quantity');
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
        Schema::dropIfExists('decrease_products');
    }
}
