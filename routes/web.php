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

Route::get('/', function () {
    return view('home');
})->name('dashboard');

Route::get('/home', 'HomeController@index')->name('home');


Auth::routes();

Route::group([
    'middleware'=> 'auth'
], function(){
    Route::resource('folders', 'FolderController');
    Route::resource('files', 'FileController');
    Route::resource('packages', 'PackageController');


    Route::get('/files/download/{id}', 'FileController@download');

});







