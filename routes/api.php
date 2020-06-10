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

Route::prefix('users')->group(function () {
    Route::post('/register', 'UserController@register');
    Route::post('/addFollower', 'UserController@createFollower');
    Route::post('/login', 'UserController@login');
    Route::get('/{id}', 'UserController@getUserById');
    Route::middleware('auth:api')->group(function () {
        Route::get('/logout/{id}', 'UserController@logout');
        Route::put('/update/{id}', 'UserController@update');
        Route::post('/updateProfile', 'UserController@editImageProfile');
    });
});
Route::prefix('posts')->group(function () {
    Route::get('/', 'PostController@show');
    Route::middleware('auth:api')->group(function () {
        Route::put('/{id}', 'PostController@update');
        Route::delete('/{id}', 'PostController@destroy');
        Route::post('/addLike/{id}', 'LikeableController@addPostLike');
        Route::post('/addComment/{id}', 'LikeableController@addCommentLike');
        Route::put('/image/{id}', 'PostController@uploadImage');
        Route::post('/', 'PostController@create');
    });
});

// Add comment to a Post
Route::post('/addComment', 'CommentController@create');
