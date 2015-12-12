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
            'name' => 'Anonymous',
            'gender' => 'F',
            'family_code_encrypted' => \Hash::make('helloworld'),
        ]);

        DB::table('kids')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'name' => 'Jasper',
            'gender' => 'M',
            'family_code_encrypted' => \Hash::make('hellojasper'),
        ]);

        DB::table('kids')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'name' => 'Olivia',
            'gender' => 'F',
            'family_code_encrypted' => \Hash::make('hellooly'),
        ]);

        DB::table('kids')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'name' => 'Emily',
            'gender' => 'F',
            'family_code_encrypted' => \Hash::make('helloemily'),
        ]);
    }
}
