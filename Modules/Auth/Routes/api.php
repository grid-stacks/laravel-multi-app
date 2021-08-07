<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Auth\Http\Controllers\AuthController;

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

// Route::middleware('auth:api')->get('/auth', function (Request $request) {
//     return $request->user();
// });

Route::prefix('v1/auth')->group(function () {
    Route::middleware('auth:api')->group(function () {
        Route::post('/issue-refresh-token', [AuthController::class, 'issueRefreshToken']);
    });

    Route::middleware('guest')->group(function () {
        Route::post('/login', [AuthController::class, 'login']);
        Route::post('/login-with-oauth', [AuthController::class, 'loginWithOAuth']);
        Route::post('/register', [AuthController::class, 'register']);
    });
});
