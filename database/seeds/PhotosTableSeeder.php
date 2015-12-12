<?php

use Illuminate\Database\Seeder;

class PhotosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kid_id = \P4\Kid::where('name','=','Jasper')->pluck('id');
        DB::table('photos')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'title' => 'Easy Jasper in basket',
            'image_url' => 'http://d3drsuq3xbnvq3.cloudfront.net/jp/pictures/201512/537083047/736D1327C4744FADBA97B2438DBCC167.jpg',
            'kid_id' => $kid_id,
        ]);

        DB::table('photos')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'title' => 'Happy Jasper on train',
            'image_url' => 'http://d3drsuq3xbnvq3.cloudfront.net/jp/pictures/201512/537083047/778FD37C1A554E73AF0824971024E6D6.jpg',
            'kid_id' => $kid_id,
        ]);

        DB::table('photos')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'title' => 'Dizzy Jasper playing on toy piano',
            'image_url' => 'http://d3drsuq3xbnvq3.cloudfront.net/jp/pictures/201512/537083429/5be3818bf638483a82d49c8cb2d17eb0.jpg',
            'kid_id' => $kid_id,
        ]);

    }
}
