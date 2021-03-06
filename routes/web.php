<?php

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

Route::get('/', 'HomeController@index')->name('index');
Route::get('/posts', 'PostController@index')->name('guest.post.index');
Route::get('/posts/{slug}', 'PostController@show')->name('guest.post.show');
Route::get('/contact', 'HomeController@contact')->name('guest.contact');
Route::post('/contact', 'HomeController@contactSent')->name('guest.contact.sent');

Auth::routes();

Route::prefix('admin')->namespace('Admin')->middleware('auth')->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('/post', 'PostController');
    Route::get('/tags', 'TagController@index')->name('post.tags');
    Route::get('/profile','HomeController@profile')->name('profile');
    Route::post('/genera-token', 'HomeController@generaToken')->name('genera-token');
});
