<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuantityProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quantity_products', function (Blueprint $table) {
            $table->increments('QTY_id');
            $table->string('QTY_description');
            $table->integer('PDT_id')->unsigned();
            $table->foreign('PDT_id')->references('PDT_id')->on('products')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('STS_id')->unsigned();
            $table->foreign('STS_id')->references('STS_id')->on('status_products')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('quantity_products');
    }
}
