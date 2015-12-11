<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKidUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kid_user', function (Blueprint $table) {

            $table->increments('id');
            $table->timestamps();

            $table->integer('kid_id')->unsigned();
            $table->integer('user_id')->unsigned();

            # Make foreign keys
            $table->foreign('kid_id')->references('id')->on('kids');
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
        Schema::drop('kid_user');
    }
}
