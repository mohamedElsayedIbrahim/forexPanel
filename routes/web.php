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

    Route::get('/articals','ArticalController@index')->name('articals.index');
    Route::get('/artical/add','ArticalController@create')->name('articals.add');
    Route::post('/artical/store','ArticalController@store')->name('articals.store');
    Route::get('/artical/edit/{id}','ArticalController@edit')->name('articals.edit');
    Route::post('/artical/update/{id}','ArticalController@update')->name('articals.update');
    Route::get('/artical/delete/{id}','ArticalController@destroy')->name('articals.delete');

    Route::get('/brokers','BrokerController@index')->name('broker.index');
    Route::get('/broker/add','BrokerController@create')->name('broker.add');
    Route::post('/broker/store','BrokerController@store')->name('broker.store');
    Route::get('/broker/edit/{id}','BrokerController@edit')->name('broker.edit');
    Route::post('/broker/update/{id}','BrokerController@update')->name('broker.update');
    Route::get('/broker/delete/{id}','BrokerController@destroy')->name('broker.delete');

    Route::get('/settings/about', 'SettingController@about')->name('about');
    Route::post('/settings/about/update/{id}', 'SettingController@aboutUpdate')->name('about.update');

    Route::get('/contacts','ContactController@index')->name('contacts.index');
    Route::get('/depoisters','DepoisterController@index')->name('depoisters.index');

});