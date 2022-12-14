<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orderdetails', function (Blueprint $table) {
            $table->integer('id');
            $table->integer('product_id');
            $table->integer('order_id');
            $table->integer('price');
            $table->char('size', 4);
            $table->integer('total_money');
            $table->foreign('order_id')->references('orders')->on('id')->onDelete('cascade');
            $table->foreign('product_id')->references('products')->on('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orderdetails');
    }
};
