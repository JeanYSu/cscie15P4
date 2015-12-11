<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotoTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photo_tag', function (Blueprint $table) {

            $table->increments('id');
            $table->timestamps();

            $table->integer('photo_id')->unsigned();
            $table->integer('tag_id')->unsigned();

            # Make foreign keys
            $table->foreign('photo_id')->references('id')->on('photos');
            $table->foreign('tag_id')->references('id')->on('tags');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('photo_tag');
    }
}
