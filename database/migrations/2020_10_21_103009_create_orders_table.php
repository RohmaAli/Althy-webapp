<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('customer_id')->nullable();
            $table->string('Longitude')->nullable();
            $table->string('Latitude')->nullable();
            $table->string('OrderType')->nullable();
            $table->string('OrderStatus')->nullable();
            $table->string('DeliveryType')->nullable();
            $table->string('Transcript')->nullable();
            $table->string('Source')->nullable();
            $table->string('AdminNotes')->nullable();
            $table->string('Address')->nullable();
            $table->bigInteger('rider_id')->nullable();

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
        Schema::dropIfExists('orders');
    }
}
