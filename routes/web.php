<?php

use App\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index')->name('home');

Route::get('/users', 'UsersController@index')->middleware('auth', 'admin');

Route::get('/food', 'FoodController@index');

Route::get('/prescriptions', 'PrescriptionsController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/confirmation/{token}', function ($token) {
    $user = User::where('token', $token)->first();
    if(!is_null($user)) {
        $user->confirmed = 1;
        $user->token = '';
        $user->save();
        $bool = true;
    }
    if($bool) {
        return redirect(route('login'))->with('status', 'Your activation is completed');
    }
    return redirect(route('login'))->with('status', 'Something went wrong');
});

Route::resource('user', 'UserController')->middleware('auth', 'admin');
