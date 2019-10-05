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
    Route::get('/', 'MainController@home')->name('home');

    Route::get('profile/{user}', 'ProfileController@show')->name('profile.show');
    Route::put('profile/{user}', 'ProfileController@update')->name('profile.update');
    Route::get('profile/{user}/password', 'ProfileController@editPassword')->name('password.edit');
    Route::put('profile/{user}/password', 'ProfileController@changePassword')->name('password.change');

    Route::get('monitoring', 'MonitoringController@index')->name('monitoring.index');

    Route::group(['middleware' => ['role:admin,auditor,auditor_lead']], function () {
        // route datatable

        Route::resource('user', 'UserController')->except(['show']);
        Route::get('user/datatable', 'UserController@datatable')->name('user.datatable');
        Route::resource('roles', 'RolesController')->only(['index', 'create', 'store', 'destroy']);
        Route::get('roles/datatable', 'RolesController@datatable')->name('roles.datatable');
        Route::get('departemen/datatable', 'DepartemenController@datatable')->name('departemen.datatable');
        Route::resource('departemen', 'DepartemenController')->except(['show'])->parameters(['departemen' => 'departemen']);
        Route::get('kompetensi/datatable', 'KompetensiAuditorController@datatable')->name('kompetensi.datatable');
        Route::resource('kompetensi', 'KompetensiAuditorController')->except(['show'])->parameters(['kompetensiAuditor' => 'kompetensi']);
        Route::get('auditplan/datatable', 'AuditPlanController@datatable')->name('auditplan.datatable');
        Route::resource('auditplan', 'AuditPlanController');

        Route::get('table/temuanaudits', 'TemuanAuditsController@dataTable')->name('table.temuanaudits');
        Route::get('auditplan/departement/{id}', 'AuditPlansController@getDepartements')->name('auditplan.departement');

        // route fetch data


        Route::put('auditplan/{auditplan}/confirm', 'AuditPlansController@confirm')->name('auditplan.confirm');
        Route::get('auditplan/{auditplan}/report', 'AuditPlansController@report')->name('auditplan.report');
        Route::get('auditplan/{auditplan}/pdf', 'AuditPlansController@pdf')->name('auditplan.pdf');
        Route::get('auditplan/{auditplan}/print', 'AuditPlansController@print')->name('auditplan.print');

        Route::resource('temuanaudit', 'TemuanAuditsController');
        Route::put('temuanaudit/{temuanaudit}/confirm', 'TemuanAuditsController@confirm')->name('temuanaudit.confirm');
    });
});
