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
<<<<<<< HEAD
    Route::resource('profiles', 'ProfileController');
=======
    //role
    Route::resource('roles','RoleController')->middleware('role:Admin');
   
    //***************** */
    
    
    //***************** */
    //get routes ******** */
    //***************** */
>>>>>>> 32d0cec047f91721387c50ec39aacfec8d680616

    //dashboard
    Route::get('dashboard','FrontendController@dashboard')->name('dashboard');
    //download
    Route::get('/files/download/{id}', 'FileController@download')->name('files.download');
<<<<<<< HEAD

    Route::put('/usernameedit/{id}', 'ProfileController@name_edit')->name('user.name.edit');

    Route::put('/userbirthdayedit/{id}', 'ProfileController@birthday_edit')->name('user.birthday.edit');

    Route::put('/usergenderedit/{id}', 'ProfileController@gender_edit')->name('user.gender.edit');

    Route::put('/userpasswordedit/{id}', 'ProfileController@password_edit')->name('user.password.edit');

    Route::put('/useremailedit/{id}', 'ProfileController@email_edit')->name('user.email.edit');

    Route::put('/userphoneedit/{id}', 'ProfileController@phone_edit')->name('user.phone.edit');
=======
    Route::get('/folders/download/{id}', 'FolderController@downloadZip')->name('folders.downloadzip');
    //payment (user_package)
    Route::get('/userpackage', 'PackageController@userpackage')->name('userpackage')->middleware('role:User');
    //buy package
    Route::get('/buypackage/{id}', 'PackageController@buypackage')->name('buypackage');
    //show files in folder
    Route::get('/showfile/{id}', 'FolderController@showfile')->name('showfolderfile');
>>>>>>> 32d0cec047f91721387c50ec39aacfec8d680616
    
    //***************** */

});








