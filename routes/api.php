<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\TicketController;
use App\Http\Controllers\Api\VesselController;
use App\Http\Controllers\Api\RoutesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    // dd($request->user());
    return $request->user();
})->middleware('auth:sanctum');

Route::group(['controller' => AuthController::class], function (){
    Route::post('/login')->name('login');
    Route::post('/register')->name('register');
    Route::post('/logout')->name('logout')->middleware('auth:sanctum');
});


Route::apiResource('/routes',RoutesController::class);
Route::apiResource('/vessel',VesselController::class);
Route::apiResource('/ticket',TicketController::class)->middleware('auth:sanctum');
