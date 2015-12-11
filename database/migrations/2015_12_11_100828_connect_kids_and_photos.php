<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConnectKidsAndPhotos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('photos', function (Blueprint $table) {
            # Add kid_id field that is unsigned
            $table->integer('kid_id')->unsigned();

            # Connect kid_id to foreign key 'id' field in kids table
            $table->foreign('kid_id')->references('id')->on('kids');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('photos', function (Blueprint $table) {

            # ref: http://laravel.com/docs/5.1/migrations#dropping-indexes
            # combine tablename + fk field name + the word "foreign"
            $table->dropForeign('photo_kid_id_foreign');
            $table->dropColumn('kid_id');
        });
    }
}
