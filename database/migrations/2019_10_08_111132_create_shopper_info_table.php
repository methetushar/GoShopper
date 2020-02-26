<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopperInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shopper_info', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->string('address');
            $table->string('product_receiver_name');
            $table->string('product_received_location');
            $table->string('city');
            $table->string('zip_code');
            $table->string('shopper_phone');
            $table->string('product_receiver_phone');
            $table->string('status')->default(0);
            $table->timestamps(now());
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shopper_info');
    }
}
