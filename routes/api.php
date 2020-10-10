<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('v1')
    ->namespace('Api\V1')
    ->group( function() {

        Route::post('login', 'UserController@login');
    });

/**
 * This route group for user who has role 100... and he/she must logined at the first
 */
Route::middleware(['auth:api', 'role:100e82ba-e1c0-4153-8633-e1bd228f7399'])
    ->prefix('v1')
    ->namespace('Api\V1')
    ->group( function () {
        
    Route::get('user/{user}', 'UserController@show');
    Route::put('user/{user}', 'UserController@update');

    Route::resource('category', 'CategoryController');

    Route::resource('post', 'PostController');
    Route::post('post/upload/{post}', 'PostController@upload');
    Route::put('post/update/upload/{post}', 'PostController@updateUpload');
    Route::post('post/multi/delete', 'PostController@multiDelete');

    Route::resource('exhibition', 'ExhibitionController');
    Route::post('exhibition/upload/{exhibition}', 'ExhibitionController@upload');
    Route::put('exhibition/update/upload/{exhibition}', 'ExhibitionController@updateUpload');
    Route::post('exhibition/multi/delete', 'ExhibitionController@multiDelete');
    
    Route::resource('event', 'EventController');
    Route::post('event/multi/delete', 'EventController@multiDelete');
    
    Route::resource('praised', 'PraisedController');
    Route::post('praised/upload/{praised}', 'PraisedController@upload');
    Route::put('praised/update/upload/{praised}', 'PraisedController@updateUpload');
    Route::post('praised/multi/delete', 'PraisedController@multiDelete');
});

Route::prefix('free/v1')
    ->namespace('Api\V1')
    ->group( function() {
        
});
