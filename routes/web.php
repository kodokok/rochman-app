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
    Route::get('/', 'AppController@index')->name('app');

    Route::get('profile', 'ProfileController@show')->name('profile');
    Route::put('profile/update', 'ProfileController@update')->name('profile.update');
    Route::get('password', 'PasswordController@index')->name('password');
    Route::put('password/change', 'PasswordController@update')->name('password.change');

    Route::group(['middleware' => ['role:admin']], function () {
        Route::get('table/users', 'UsersController@dataTable')->name('table.users');
        Route::get('table/roles', 'RolesController@dataTable')->name('table.roles');
        Route::get('table/departements', 'DepartementsController@dataTable')->name('table.departements');
        Route::get('table/kompetensi', 'KompetensiAuditorsController@dataTable')->name('table.kompetensi');
        Route::get('table/auditplans', 'AuditPlansController@dataTable')->name('table.auditplans');
        Route::get('table/temuanaudits', 'TemuanAuditsController@dataTable')->name('table.temuanaudits');

        Route::resource('roles', 'RolesController')->only([
            'index', 'create', 'store', 'destroy'
        ]);
        Route::resource('users', 'UsersController')->except([
            'show'
        ]);
        Route::resource('departements', 'DepartementsController')->except([
            'show'
        ]);
        Route::resource('kompetensi', 'KompetensiAuditorsController')->except([
            'show'
        ]);
        Route::resource('auditplan', 'AuditPlansController');
        Route::put('auditplan/{auditPlan}/confirm', 'AuditPlansController@confirm')->name('auditplan.confirm');

        Route::resource('temuanaudit', 'TemuanAuditsController');
    });
});
