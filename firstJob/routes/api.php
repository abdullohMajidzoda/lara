<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\ProfileController;
use App\Http\Controllers\Api\V1\PositionController;
use App\Http\Controllers\Api\V1\ApplicationController;
use App\Http\Controllers\Api\V1\CompanyController;
use App\Http\Controllers\Api\V1\ClientController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix('v1')->group(function(){
    Route::apiResource('profile', ProfileController::class)->except(['index','destroy']);
    Route::apiResource('position', PositionController::class);
    Route::post('position/{position}/apply', [ApplicationController::class, 'apply']);
    Route::get('applications', [ApplicationController::class, 'index']);
    Route::apiResource('company', CompanyController::class)->except(['show', 'destroy']);
    Route::apiResource('admin/clients',ClientController::class);
    Route::apiResource('admin/positions',PositionController::class);
    Route::apiResource('admin/applications',ApplicationController::class);
});

