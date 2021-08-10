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

// Route::middleware('auth:api')->get('/blog', function (Request $request) {
//     return $request->user();
// });

Route::prefix('v1/blog')->group(function () {
    Route::middleware('auth:api')->group(function () {
        Route::get('/auth', function (Request $request) {
            return $request;
        });

        // How to route multi level
        Route::resource('posts', BlogController::class);
        Route::resource('posts.categories', BlogController::class)->only('index', 'show');
    });

    Route::middleware('guest')->group(function () {
        Route::get('/guest', function (Request $request) {
            return $request;
        });
    });
});
