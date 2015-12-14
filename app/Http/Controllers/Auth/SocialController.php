<?php

namespace P4\Http\Controllers\Auth;

use Illuminate\Http\Request;
use P4\User;
use P4\Http\Requests;
use P4\Http\Controllers\Controller;
use Auth;
use Socialite;


class SocialController extends Controller
{
    /**
     * Redirect the user to the Facebook authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from Facebook.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('facebook')->user();

        $authUser = $this->findOrCreateUser($user);

        Auth::login($authUser, true);

        return redirect()->back();
    }

    /**
     * Return user if exists; create and return if doesn't
     *
     * @param $fbUser
     * @return User
     */
    private function findOrCreateUser($fbUser)
    {
        //check if FB account already exists
        if ($authUser = User::where('facebook_id', $fbUser->id)->first()) {
            return $authUser;
        }

        //if FBUser's email is the same as an user's email account, directly log in as that user
        $user = User::where('email', $fbUser->email)->first();
        if (sizeof($user) > 0){
            //user account exists with same email addresss
            return $user;
        }
        return User::create([
            'name' => $fbUser->name,
            'email' => $fbUser->email,
            'facebook_id' => $fbUser->id,
        ]);

    }
}
