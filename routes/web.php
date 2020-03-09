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
})->name('home');


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

    //profile
    Route::resource('profiles', 'ProfileController');


    //role
    Route::resource('roles','RoleController')->middleware('role:Admin');

    Route::resource('users','UserController')->middleware('role:Admin');
   
    //***************** */


     //***************** */
    //post routes ******** */
    //***************** */

    //File Upload Inside Folder
    Route::post('/folder/fileupload', 'FolderController@uploadfile')->name('folder.file.upload');

    //***************** */
    
    //***************** */
    //get routes ******** */
    //***************** */


    //dashboard
    Route::get('/dashboard','FrontendController@dashboard')->name('dashboard');


    

    //download
    Route::get('/files/download/{id}', 'FileController@download')->name('files.download');


    Route::put('/userphotoedit/{id}', 'ProfileController@photo_edit')->name('user.photo.edit');

    Route::put('/usernameedit/{id}', 'ProfileController@name_edit')->name('user.name.edit');

    Route::put('/userbirthdayedit/{id}', 'ProfileController@birthday_edit')->name('user.birthday.edit');

    Route::put('/usergenderedit/{id}', 'ProfileController@gender_edit')->name('user.gender.edit');

    Route::put('/userpasswordedit/{id}', 'ProfileController@password_edit')->name('user.password.edit');

    Route::put('/useremailedit/{id}', 'ProfileController@email_edit')->name('user.email.edit');

    Route::put('/userphoneedit/{id}', 'ProfileController@phone_edit')->name('user.phone.edit');




    Route::get('/folders/download/{id}', 'FolderController@downloadZip')->name('folders.downloadzip');


    //payment (user_package)
    Route::get('/userpackage', 'PackageController@userpackage')->name('userpackage')->middleware('role:User');
    
    //buy package
    Route::get('/buypackage/{id}', 'PackageController@buypackage')->name('buypackage');
    
    //show files in folder
    Route::get('/showfile/{id}', 'FolderController@showfile')->name('showfolderfile');

    
    //file temporary delete
    Route::get('/filetemporarydelete/{id}', 'FileController@temporarydelete')->name('filetemporarydelete');

    //folder temporary delete
    Route::get('/foldertemporarydelete/{id}', 'FolderController@temporarydelete')->name('foldertemporarydelete');
    
    //trash
    Route::get('/trash', 'TrashController@index')->name('trash.index');

    //restore
    Route::get('/trash/filerestore/{id}', 'TrashController@filerestore')->name('filerestore');
    Route::get('/trash/folderrestore/{id}', 'TrashController@folderrestore')->name('folderrestore');


    //***************** */


});








