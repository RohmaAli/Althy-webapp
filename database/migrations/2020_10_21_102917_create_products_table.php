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
            $table->bigIncrements('id');
            $table->string('title')->nullable();
            $table->boolean('isAvailable')->nullable();
            $table->double('purchase_price')->nullable();
            $table->double('sale_price')->nullable();
            $table->double('actual_price')->nullable();
            $table->timestamps();
            $table->tinyInteger('isFeatured')->nullable();
            $table->string('description')->nullable();
            $table->bigInteger('product_category_id')->nullable();


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
