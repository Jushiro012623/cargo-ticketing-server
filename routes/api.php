<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\FareController;
use App\Http\Controllers\Api\TicketController;
use App\Models\Fare;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    // dd($request->user());
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth:sanctum');

Route::apiResource('/fare',FareController::class);
Route::apiResource('/ticket',TicketController::class)->middleware('auth:sanctum');


Route::get('/routes', function (Request $request) {
    dd($request);
    return Fare::where('transportation_type', $request)->get();
});