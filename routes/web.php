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

    Route::get('profile/{user}', 'ProfileController@show')->name('profile.show');
    Route::put('profile/{user}', 'ProfileController@update')->name('profile.update');
    Route::get('profile/{user}/password', 'ProfileController@editPassword')->name('password.edit');
    Route::put('profile/{user}/password', 'ProfileController@changePassword')->name('password.change');

    Route::get('monitoring', 'MonitoringController@index')->name('monitoring.index');

    Route::group(['middleware' => ['role:admin']], function () {
        // route datatable

        Route::resource('user', 'UserController')->except(['show']);
        Route::get('user/datatable', 'UserController@datatable')->name('user.datatable');

        Route::get('table/roles', 'RolesController@dataTable')->name('table.roles');
        Route::get('table/departements', 'DepartementsController@dataTable')->name('table.departements');
        Route::get('table/kompetensi', 'KompetensiAuditorsController@dataTable')->name('table.kompetensi');
        Route::get('table/auditplans', 'AuditPlansController@dataTable')->name('table.auditplans');
        Route::get('table/temuanaudits', 'TemuanAuditsController@dataTable')->name('table.temuanaudits');

        // route fetch data
        Route::get('auditplan/departement/{id}', 'AuditPlansController@getDepartements')->name('auditplan.departement');

        Route::resource('roles', 'RolesController')->only([
            'index', 'create', 'store', 'destroy'
        ]);

        Route::resource('departements', 'DepartementsController')->except([
            'show'
        ]);
        Route::resource('kompetensi', 'KompetensiAuditorsController')->except([
            'show'
        ]);
        Route::resource('auditplan', 'AuditPlansController');
        Route::put('auditplan/{auditplan}/confirm', 'AuditPlansController@confirm')->name('auditplan.confirm');
        Route::get('auditplan/{auditplan}/report', 'AuditPlansController@report')->name('auditplan.report');
        Route::get('auditplan/{auditplan}/pdf', 'AuditPlansController@pdf')->name('auditplan.pdf');
        Route::get('auditplan/{auditplan}/print', 'AuditPlansController@print')->name('auditplan.print');

        Route::resource('temuanaudit', 'TemuanAuditsController');
        Route::put('temuanaudit/{temuanaudit}/confirm', 'TemuanAuditsController@confirm')->name('temuanaudit.confirm');
    });
});
