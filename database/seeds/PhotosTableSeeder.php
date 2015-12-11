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
            'title' => 'Jasper 20 month moment',
            'image_url' => 'http://d3drsuq3xbnvq3.cloudfront.net/jp/pictures/201512/537083047/736D1327C4744FADBA97B2438DBCC167.jpg',
            'kid_id' => $kid_id,
        ]);

        DB::table('photos')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'title' => 'Jasper first time on train',
            'image_url' => 'https://lh3.googleusercontent.com/7sB45ASBd9UFlJGMiMqbzZU5wC_ePNctH2Nw3NJt687lCM5Uft24vhqZbtpcqxjOzpxKW3FL3x0am5-Wa23kijRnObVAYsCLlnfbfxAE50ZOwNpqfJN9sxTq4B2QKs-RrNcM9yYtZryKjL-q9cAy9heJ3gHxjGCAfMSmH8Fxo3EPUFBbBHrXxte0SJm6ld9gj686JWaa3MT5KQg3j3OjXuzZmBXItAC2j1vJe4EEK_UIq4wuerzm6M-jJjKCc_iN1oICpCcKTS1FG8PYu_W7qm5DkIo8b7Di9SUBnq0FiqBBNx7uU8fiJTz6uOBZaMnOJZRiJjSNbisSvBtbrjD-draqyW4dTZx6VR-2tSue-pHm8BKcmKr-jY6Q4KH-ciuXV1IV6zoHylne6koU90uJpBKHhuAcSqy1XApOgCUIKEbugXgoYfxMexBI-t3kjbUcC8iIPFekqv-hFFt-8BYUyZ-4rkDNoBzbSGbVFb1VNnCbh3apDFSISOi8_KRkGi6KhJsSLHjLebZrc93cU51xsPAlXFYAE37tJNMFtwTciHhvNN_lLorivaXQ8H-2UR0hhf1d6w=w960-h1280-no',
            'kid_id' => $kid_id,
        ]);

        DB::table('photos')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'title' => 'Jasper playing on toy piano',
            'image_url' => 'http://d3drsuq3xbnvq3.cloudfront.net/jp/pictures/201512/537083429/5be3818bf638483a82d49c8cb2d17eb0.jpg',
            'kid_id' => $kid_id,
        ]);

    }
}
