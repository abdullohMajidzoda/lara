<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\ProfileController;
use App\Http\Controllers\Api\V1\PositionController;
use App\Http\Controllers\Api\V1\ApplicationController;
use App\Http\Controllers\Api\V1\CompanyController;
use App\Http\Controllers\Api\V1\UserController;
use App\Http\Controllers\Api\V1\AuthController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('v1')->middleware(['throttle:api'])->group(function(){
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
});


Route::prefix('v1')->middleware(['throttle:api', 'auth:sanctum'])->group(function(){
    Route::apiResource('profile', ProfileController::class)->except(['index','destroy']);
    Route::apiResource('position', PositionController::class);
    Route::post('position/{position}/apply', [ApplicationController::class, 'apply']);
    Route::get('applications', [ApplicationController::class, 'index']);
    Route::apiResource('company', CompanyController::class)->except(['show', 'destroy']);
    Route::apiResource('admin/users',UserController::class)->except(['store']);
    Route::apiResource('admin/positions',PositionController::class);
    Route::apiResource('admin/applications',ApplicationController::class);
    Route::get('logout', [AuthController::class, 'logout']);
});

