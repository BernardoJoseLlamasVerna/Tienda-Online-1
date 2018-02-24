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
            $table->increments('id');
            $table->date('date_order');
            $table->date('date_delivery');
            $table->string('telephone_delivery')->unique();
            $table->string('address_delivery');
            $table->string('postcode_delivery');
            $table->string('province_delivery');
            $table->integer('price');
            //FK:users
            $table->integer('user_id')->unsigned()->index();
            //FK:users
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('orders', function($table) {
          $table->foreign('user_id')->references('id')->on('users');
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
