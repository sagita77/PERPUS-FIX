<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BukuControllerApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::apiResource('buku', BukuControllerApi::class);

});


Route::post('login', [AuthController::class,'login']);
