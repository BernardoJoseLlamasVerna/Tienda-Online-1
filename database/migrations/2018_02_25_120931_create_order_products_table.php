<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('state_of_order', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('units');
          //FK:orders
          $table->integer('order_id')->unsigned()->index();
          $table->foreign('order_id')->references('id')->on('orders');
          //FK:orders
          //FK:products
          $table->integer('product_id')->unsigned()->index();
          $table->foreign('product_id')->references('id')->on('products');
          //FK:products
          $table->timestamps();
          $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('state_of_order');
    }
}
