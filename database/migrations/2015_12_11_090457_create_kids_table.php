<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kids', function (Blueprint $table) {
            # auto increments id field
            $table->increments('id');
            # `created_at` and `updated_at` columns for keeping track of changes of a record
            $table->timestamps();
            # add title and image_url field for the photo
            $table->string('name');
            $table->string('gender');
            $table->string('family_code_encrypted');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('kids');
    }
}
