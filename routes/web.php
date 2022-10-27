<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

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
Route::middleware('userGuest')->group(function(){
    Route::get('/', 'HomeController@index')->name('index');    
    Route::post('/systemlogin','AuthController@login')->name('system.login');
});


Route::middleware('userAuth')->group(function(){
    Route::get('/panel','HomeController@panel')->name('panel');
    
    Route::get('/users','AuthController@index')->name('users.index');
    Route::get('/users/add','AuthController@create')->name('users.add');
    Route::post('/users/store','AuthController@store')->name('users.store');
    Route::get('/users/edit/{id}','AuthController@edit')->name('users.edit');
    Route::post('/users/update/{id}','AuthController@update')->name('users.update');
    Route::get('/users/delete/{id}','AuthController@destory')->name('users.delete');

    Route::get('/logout','AuthController@logout')->name('logout');

    Route::get('/system/log','LogController@index')->name('log');


    Route::get('/permissions','PermissionController@index')->name('permissions.index');
    Route::get('/permission/add','PermissionController@create')->name('permissions.add');
    Route::post('/permission/store','PermissionController@store')->name('permissions.store');
    Route::get('/permission/edit/{id}','PermissionController@edit')->name('permissions.edit');
    Route::post('/permission/update/{id}','PermissionController@update')->name('permissions.update');
    Route::get('/permission/delete/{id}','PermissionController@destory')->name('permissions.delete');

    Route::get('/settings/about', 'SettingController@about')->name('about');
    Route::post('/settings/about/update', 'SettingController@aboutUpdate')->name('about.update');



});