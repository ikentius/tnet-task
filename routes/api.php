<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\MarketplaceController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\UserTeamController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('guest')->group(function () {
    Route::post(uri: '/register', action: [UserManagementController::class, 'register']);
    Route::post(uri: '/login', action: [AuthenticationController::class, 'login']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::post(uri: '/logout', action: [AuthenticationController::class, 'logout']);

    Route::controller(UserTeamController::class)->prefix('user/team')->group(function () {
        Route::get(uri: '/', action: 'show');
        Route::put(uri: '/', action: 'update');
    });

    Route::controller(PlayerController::class)->prefix('player')->group(function (){
        Route::put(uri:'{player}', action: 'update');
        Route::post(uri:'{player}/publish', action: 'publish');
    });

    Route::controller(MarketplaceController::class)->prefix('marketplace')->group(function (){
        Route::get(uri: '/', action: 'index');
        Route::post(uri:'/{marketplace}', action: 'sell');
    });
});
