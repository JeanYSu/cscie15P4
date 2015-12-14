<?php

use Illuminate\Database\Seeder;

class KidsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kids')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'name' => 'Josephine',
            'gender' => 'F',
            'family_code' => 'helloworld',
        ]);

        DB::table('kids')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'name' => 'Jasper',
            'gender' => 'M',
            'family_code' => 'hellojasper',
        ]);

        DB::table('kids')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'name' => 'Olivia',
            'gender' => 'F',
            'family_code' => 'hellooly',
        ]);

        DB::table('kids')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'name' => 'Emily',
            'gender' => 'F',
            'family_code' => 'helloemily',
        ]);
    }
}
