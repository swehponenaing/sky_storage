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
    
    //***************** */
    //resource routes **** */
    //***************** */

    //folder
    Route::resource('folders', 'FolderController');
    //file
    Route::resource('files', 'FileController');
    //package
    Route::resource('packages', 'PackageController')->middleware('role:Admin');
    //role
    Route::resource('roles','RoleController')->middleware('role:Admin');
   
    //***************** */
    
    
    //***************** */
    //get routes ******** */
    //***************** */

    //dashboard
    Route::get('dashboard','FrontendController@dashboard')->name('dashboard');
    //download
    Route::get('/files/download/{id}', 'FileController@download')->name('files.download');
    Route::get('/folders/download/{id}', 'FolderController@downloadZip')->name('folders.downloadzip');
    //payment (user_package)
    Route::get('/userpackage', 'PackageController@userpackage')->name('userpackage')->middleware('role:User');
    //buy package
    Route::get('/buypackage/{id}', 'PackageController@buypackage')->name('buypackage');
    //show files in folder
    Route::get('/showfile/{id}', 'FolderController@showfile')->name('showfolderfile');
    
    //***************** */

});








