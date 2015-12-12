<?php

use Illuminate\Database\Seeder;

class KidUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kids =[
            'Anonymous' => ['Jill','Jamal','Jean'],
            'Jasper' => ['Jean'],
            'Olivia' => ['Jill','Jean'],
            'Emily' => ['Jamal','Jean']
        ];

        # Now loop through the above array, creating a new pivot for each kid corresponding to user
        foreach($kids as $name => $users) {
            # First get the kid name matched
            $kid = \P4\Kid::where('name','like',$name)->first();
            # Loop through all users for each kid
            foreach($users as $userName) {
                $user = \P4\User::where('name','like',$userName)->first();
                # Save the kid's users info
                $kid->users()->save($user);
            }

        }
    }
}
