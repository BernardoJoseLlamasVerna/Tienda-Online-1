<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assigned_rols', function (Blueprint $table) {
          $table->increments('id');
          //FK:users
          $table->integer('user_id')->unsigned()->index();
          //FK:users
          //FK:rols
          $table->integer('rol_id')->unsigned()->index();
          //FK:users
          $table->timestamps();
          $table->softDeletes();
        });

        Schema::table('assigned_rols', function($table) {
          $table->foreign('user_id')->references('id')->on('users');
          $table->foreign('rol_id')->references('id')->on('rols');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assigned_rols');
    }
}
