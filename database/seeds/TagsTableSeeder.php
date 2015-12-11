<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = ['Happy','Angry','Sad','Easy','Busy','Dizzy','Crazy','Messy','Noisy'];
        foreach($data as $tagName) {
           $tag = new \P4\Tag();
           $tag->name = $tagName;
           $tag->save();
       }
    }
}
