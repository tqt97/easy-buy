<?php

use App\Http\Controllers\Api\V1\Auth\LoginController;
use App\Http\Controllers\Api\V1\Auth\LogoutController;
use App\Http\Controllers\Api\V1\Auth\PasswordUpdateController;
use App\Http\Controllers\Api\V1\Auth\ProfileController;
use App\Http\Controllers\Api\V1\Auth\RegisterController;
use App\Http\Controllers\Api\V1\ParkingController;
use App\Http\Controllers\Api\V1\VehicleController;
use App\Http\Controllers\Api\V1\ZoneController;
use App\Models\Parking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('/v1')->group(function () {
    Route::post('auth/register', RegisterController::class);
    Route::post('auth/login', LoginController::class);

    Route::middleware('auth:sanctum')->group(function () {
        Route::get('profile', [ProfileController::class, 'show']);
        Route::put('profile', [ProfileController::class, 'update']);
        Route::put('password', PasswordUpdateController::class);

        Route::apiResource('vehicles', VehicleController::class);

        Route::get('zones', [ZoneController::class, 'index']);

        Route::get('parkings', [ParkingController::class, 'index']);
        Route::get('parkings/history', [ParkingController::class, 'history']);
        Route::post('parkings/start', [ParkingController::class, 'start']);
        Route::get('parkings/{parking}', [ParkingController::class, 'show']);
        Route::bind('activeParking', function ($id) {
            return Parking::where('id', $id)->active()->firstOrFail();
        });
        Route::put('parkings/{parking}', [ParkingController::class, 'stop']);

        Route::post('auth/logout', LogoutController::class);
    });
});
