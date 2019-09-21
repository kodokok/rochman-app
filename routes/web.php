<?php

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

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/table/user', 'UsersController@dataTable')->name('table.user');

    Route::get('users/profile/{user}', 'UserProfileController@show')->name('profile');
    Route::put('users/profile/{user}', 'UserProfileController@update')->name('profile.update');

    Route::group(['middleware' => ['role:admin']], function () {
        Route::resource('users', 'UsersController');
    });
});
