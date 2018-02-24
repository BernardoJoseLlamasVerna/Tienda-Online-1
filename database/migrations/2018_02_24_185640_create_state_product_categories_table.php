<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStateProductCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_categories', function (Blueprint $table) {
            $table->increments('id');
            //FK:products
            $table->integer('product_id')->unsigned()->index();
            //FK:products
            //FK:categories
            $table->integer('category_id')->unsigned()->index();
            //FK:categories
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('product_categories', function($table) {
          $table->foreign('product_id')->references('id')->on('products');
          $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_categories');
    }
}
