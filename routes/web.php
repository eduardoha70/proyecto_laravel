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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/logout', 'Auth\LoginController@logout');

Route::redirect('/', '/login');

Route::group([
    'prefix' => '/admin',
    'middleware' => ['auth'],
    'namespace' => 'Admin'
], function () {
    Route::get('/', [
        'as'    =>  'admin_inicio',
        'uses'  =>  'AdminController@index',
    ]);
    Route::resource('token', 'TokenController');
});

Route::view('productos', 'apps.productos')->middleware('auth')->name('productos');
