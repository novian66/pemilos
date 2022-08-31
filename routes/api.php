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

Route::middleware(['checkHeader'])->group(function () {
    Route::post('school', [App\Http\Controllers\Api\IndexController::class, 'school']);
    Route::post('election', [App\Http\Controllers\Api\IndexController::class, 'election']);
    Route::post('candidate', [App\Http\Controllers\Api\IndexController::class, 'candidate']);
    Route::post('vote', [App\Http\Controllers\Api\IndexController::class, 'vote']);
    Route::post('user', [App\Http\Controllers\Api\IndexController::class, 'user']);
    Route::post('user/school', [App\Http\Controllers\Api\IndexController::class, 'user_school']);
});
