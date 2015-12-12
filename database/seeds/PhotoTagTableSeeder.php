<?php

use Illuminate\Database\Seeder;

class PhotoTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $photos =[
            'Happy' => ['happy','busy'],
            'Easy' => ['easy','crazy'],
            'Dizzy' => ['dizzy','happy']
        ];

        # Now loop through the above array, creating a new pivot for each photo to tag
        foreach($photos as $title => $tags) {

            # First get the photo matched
            $photo = \P4\Photo::where('title','like',$title.'%')->first();

            # Loop through all tags for each photo
            foreach($tags as $tagName) {
                $tag = \P4\Tag::where('name','LIKE',$tagName)->first();

                # Save the photo's tag info
                $photo->tags()->save($tag);
            }

        }
    }
}
