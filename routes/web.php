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

    Route::get('auditplan/datatable', 'AuditPlanController@datatable')->name('auditplan.datatable');
    Route::resource('auditplan', 'AuditPlanController')->parameters(['auditplan' => 'auditplan']);;
    Route::get('auditplan/{auditplan}/temuanaudit-add', 'AuditPlanController@addTemuanaudit')->name('auditplan.temuanaudit-add');
    Route::put('auditplan/{auditplan}/approved', 'AuditPlanController@approved')->name('auditplan.approved');
    Route::put('auditplan/{auditplan}/ubah-jadwal', 'AuditPlanController@ubahJadwal')->name('auditplan.ubah-jadwal');
    Route::put('auditplan/{auditplan}/update-jadwal', 'AuditPlanController@updateJadwal')->name('auditplan.update-jadwal');

    Route::get('temuanaudit/datatable', 'TemuanAuditController@datatable')->name('temuanaudit.datatable');
    Route::resource('temuanaudit', 'TemuanAuditController')->parameters(['temuanaudit' => 'temuanaudit']);
    Route::put('temuanaudit/{temuanaudit}/reopen', 'TemuanAuditController@reopen')->name('temuanaudit.reopen');

    Route::get('laporan/temuanaudit', 'LaporanController@temuanaudit');

    // route administrator
    Route::group(['middleware' => ['role:admin,auditor,auditor_lead']], function () {

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

    });
});
