<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(UsersTableSeeder::class);
        $this->call(KidsTableSeeder::class);
        $this->call(PhotosTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(PhotoTagTableSeeder::class);
        $this->call(KidUserTableSeeder::class);

        Model::reguard();
    }
}
