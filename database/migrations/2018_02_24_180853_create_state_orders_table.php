<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('state_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('units');
            //FK:orders
            $table->integer('order_id')->unsigned()->index();
            //FK:orders
            //FK:products
            $table->integer('product_id')->unsigned()->index();
            //FK:products
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('state_orders', function($table) {
          $table->foreign('order_id')->references('id')->on('orders');
          $table->foreign('product_id')->references('id')->on('products');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('state_orders');
    }
}
