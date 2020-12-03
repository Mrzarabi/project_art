<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::namespace('Api\V1')->group( function() {
    Route::resource('category', 'CategoryController');
    Route::get('post/{post}', 'PostController@show')->name('post.show');
    Route::get('testimonial', 'PraisedController@index')->name('praised.index');
    Route::get('testimonial/{praised}', 'PraisedController@show')->name('praised.show');
    Route::get('exhibition', 'ExhibitionController@index')->name('exhibition.index');
});

Route::namespace('Front\V1')->group( function() {
    Route::get('/', 'IndexController@index')->name('index');
    Route::get('/about-me', 'IndexController@aboutMe')->name('about-me');
});



// Route::get('/home', 'HomeController@index')->name('home');
