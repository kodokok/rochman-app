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
    Route::put('profile/{user}/change-password', 'ProfileController@changePassword')->name('profile.change-password');
    Route::get('klausul/select/{id}', 'KlausulController@select')->name('klausul.select');
    Route::get('departemen/{id}/kadept', 'DepartemenController@kadept')->name('departemen.kadept');

    Route::get('monitoring', 'MonitoringController@index')->name('monitoring.index');

    Route::group(['middleware' => ['role:admin,auditor,auditor_lead']], function () {
        // route datatable

        Route::resource('user', 'UserController')->except(['show']);
        Route::get('user/datatable', 'UserController@datatable')->name('user.datatable');

        Route::resource('roles', 'RolesController')->only(['index', 'create', 'store', 'destroy']);
        Route::get('roles/datatable', 'RolesController@datatable')->name('roles.datatable');

        Route::get('departemen/datatable', 'DepartemenController@datatable')->name('departemen.datatable');
        Route::resource('departemen', 'DepartemenController')->except(['show'])->parameters(['departemen' => 'departemen']);

        Route::get('klausul/datatable', 'KlausulController@datatable')->name('klausul.datatable');
        Route::resource('klausul', 'KlausulController')->except(['show'])->parameters(['klausul' => 'klausul']);

        Route::get('kompetensi/datatable', 'KompetensiAuditorController@datatable')->name('kompetensi.datatable');
        Route::resource('kompetensi', 'KompetensiAuditorController')->except(['show'])->parameters(['kompetensiAuditor' => 'kompetensi']);

        Route::get('auditplan/datatable', 'AuditPlanController@datatable')->name('auditplan.datatable');
        Route::resource('auditplan', 'AuditPlanController')->parameters(['auditplan' => 'auditplan']);;


        // route fetch data


        // Route::put('auditplan/{auditplan}/confirm', 'AuditPlanController@confirm')->name('auditplan.confirm');
        // Route::get('auditplan/{auditplan}/report', 'AuditPlanController@report')->name('auditplan.report');
        // Route::get('auditplan/{auditplan}/pdf', 'AuditPlanController@pdf')->name('auditplan.pdf');
        // Route::get('auditplan/{auditplan}/print', 'AuditPlanController@print')->name('auditplan.print');

        Route::get('table/temuanaudits', 'TemuanAuditsController@dataTable')->name('table.temuanaudits');
        Route::resource('temuanaudit', 'TemuanAuditsController');
        Route::put('temuanaudit/{temuanaudit}/confirm', 'TemuanAuditsController@confirm')->name('temuanaudit.confirm');
    });
});
