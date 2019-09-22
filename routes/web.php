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

    Route::get('profile', 'ProfileController@show')->name('profile');
    Route::put('profile/update', 'ProfileController@update')->name('profile.update');
    Route::get('password', 'PasswordController@index')->name('password');
    Route::put('password/change', 'PasswordController@update')->name('password.change');

    Route::group(['middleware' => ['role:admin']], function () {
        Route::resource('users', 'UsersController');
        Route::resource('roles', 'RolesController');
    });
});
