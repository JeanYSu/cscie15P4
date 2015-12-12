<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/debug', function() {
    echo '<pre>';
    echo '<h1>Environment</h1>';
    echo App::environment().'</h1>';
    echo '<h1>Debugging?</h1>';
    if(config('app.debug')) echo "Yes"; else echo "No";
    echo '<h1>Database Config</h1>';
    /*
    Test db connection and show a list of databases.
    */
    echo '<h1>Test Database Connection</h1>';
    try {
        $results = DB::select('SHOW DATABASES;');
        echo '<strong style="background-color:green; padding:5px;">Connection confirmed</strong>';
        echo "<br><br>Your Databases:<br><br>";
        print_r($results);
    }
    catch (Exception $e) {
        echo '<strong style="background-color:crimson; padding:5px;">Caught exception: ', $e->getMessage(), "</strong>\n";
    }
    echo '</pre>';
});


# Show login form
Route::get('/login', 'Auth\AuthController@getLogin');
# Process login form
Route::post('/login', 'Auth\AuthController@postLogin');
# Process logout
Route::get('/logout', 'Auth\AuthController@getLogout');
# Show user registration form
Route::get('/register', 'Auth\AuthController@getRegister');
# Process user registration form
Route::post('/register', 'Auth\AuthController@postRegister');
# Confirm login status
Route::get('/confirm-login-worked', function() {
    # You may access the authenticated user via the Auth facade
    $user = Auth::user();
    if($user) {
        echo 'You are logged in.';
        dump($user->toArray());
    } else {
        echo 'You are not logged in.';
    }
    return;
});
Route::group(['middleware' => 'auth'], function() {
    Route::get('/kids/add', 'KidController@getAdd');
    Route::post('/kids/add', 'KidController@postAdd');
    Route::get('/kids/edit/{id?}', 'KidController@getEdit');
    Route::post('/kids/edit', 'KidController@postEdit');
    Route::get('/kids/confirm-delete/{id?}', 'KidController@getConfirmDelete');
    Route::get('/kids/delete/{id?}', 'KidController@getDelete');
    Route::get('/kids', 'KidController@getIndex');
    Route::get('/kids/show/{name?}', 'KidController@getShow');
});

Route::get('/photos/show/{title?}', 'PhotoController@getShow');
Route::get('/photos', 'PhotoController@getIndex');
Route::get('/photos/add', 'PhotoController@getAdd');
Route::post('/photos/add', 'PhotoController@postAdd');
Route::get('/photos/edit/{id?}', 'PhotoController@getEdit');
Route::post('/photos/edit', 'PhotoController@postEdit');
Route::get('/photos/confirm-delete/{id?}', 'PhotoController@getConfirmDelete');
Route::get('/photos/delete/{id?}', 'PhotoController@getDoDelete');
