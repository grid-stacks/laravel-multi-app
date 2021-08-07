<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Lcobucci\JWT\Configuration;

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

Route::middleware(['auth:api', 'claim:type,admin'])->get('/user', function (Request $request) {
    $token = $request->bearerToken();
    $jwt = Configuration::forUnsecuredSigner()->parser()->parse($token);
    $type = $jwt->claims()->get('type');

    return [
        'user' => $request->user(),
        'type' => $type
    ];
});
