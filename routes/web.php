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

Route::redirect('/', '/post/index');

Route::group(['prefix' => '/post', 'as' => 'post.'], function() {
    Route::get('/index', 'PostController@index')->name('index');
    Route::get('/create', 'PostController@create')->name('create');
    Route::get('/view/{post}', 'PostController@view')->name('view');
    Route::get('/edit/{post}', 'PostController@edit')->name('edit');
    
    Route::post('/update/{post}', 'PostController@update')->name('update');
    Route::post('/delete/{post}', 'PostController@delete')->name('delete');

    Route::post('/store', 'PostController@store')->name('store');

    Route::get('/image/{post_image}', 'PostController@image')->name('image');
    Route::post('/upload_image/{post}', 'PostController@uploadImage')->name('upload_image');
});


// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
