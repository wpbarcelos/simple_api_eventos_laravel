<?php

use App\Http\Controllers\API\EventController;
use App\Http\Controllers\API\InviteController;
use App\Http\Controllers\API\AuthController;
use Illuminate\Support\Facades\Route;

Route::post('/sanctum/token', [AuthController::class, 'login']);

Route::middleware(['middleware' => 'auth:sanctum'])->group(function () {

    Route::get('/user', [AuthController::class, 'show']);

    Route::apiResource('event', EventController::class);
    Route::post('event/upload/{event}', [EventController::class, 'uploadImage']);

    Route::get('event/{event}/invite', [InviteController::class,'index']);
    Route::post('event/{event}/invite', [InviteController::class,'store']);

    Route::delete('invite/{invite}', [InviteController::class,'destroy']);

});
