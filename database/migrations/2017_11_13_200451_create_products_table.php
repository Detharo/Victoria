<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('PDT_id');
            $table->string('PDT_name');
            $table->string('PDT_brand');
            $table->integer('PDT_price');
            $table->integer('TPR_type')->unsigned();
            $table->foreign('TPR_type')->references('TPR_id')->on('type_products')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('PDT_weight');
            $table->integer('WGT_type')->unsigned();
            $table->foreign('WGT_type')->references('WGT_id')->on('weight_products')->onDelete('cascade')->onUpdate('cascade');
            $table->string('PDT_code');
            $table->string('PDT_description');
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
        Schema::dropIfExists('products');
    }
}
