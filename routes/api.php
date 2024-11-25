<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\FareController;
use App\Http\Controllers\Api\FareDiscountController;
use App\Http\Controllers\Api\TicketController;
use App\Http\Controllers\Api\VesselController;
use App\Http\Controllers\Api\RoutesController;
use App\Http\Controllers\Api\WeightController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('jwt-auth');

Route::group(['controller' => AuthController::class], function (){
    Route::post('/login', 'login')->name('login')->middleware('guest-auth');
    Route::post('/register', 'register')->name('register')->middleware('guest-auth');
    Route::post('/logout', 'logout')->name('logout')->middleware('jwt-auth');
});
Route::middleware(['jwt-auth'])->group(function () {
    Route::apiResource('/route',RoutesController::class);
    Route::apiResource('/vessel',VesselController::class);
    Route::apiResource('/fare',FareController::class);
    Route::apiResource('/weight',WeightController::class);
    Route::post('/fare/transactionFare',FareDiscountController::class);
    Route::prefix('ticket/trashed')->group(function () {
        Route::get('', [TicketController::class, 'trashed'])->name('ticket.trashed');
        Route::post('/restore/{ticket}', [TicketController::class, 'restore'])->name('ticket.trashed.restore');
    });
    Route::apiResource('ticket', TicketController::class)->names('ticket');
    Route::put('/ticket/{ticket}',[TicketController::class, 'replace'])->name('ticket.replace');
});



// Route::get('/ticket/trashed',[TicketController::class, 'trashed'])->middleware('auth:sanctum')->name('ticket_trashed');
// Route::apiResource('/ticket',TicketController::class)->middleware('auth:sanctum')->names('ticket');
// Route::post('/ticket/trashed/restore/{id}',[TicketController::class, 'restore'])->middleware('auth:sanctum')->name('ticket_trashed_restore');
// Route::patch('/ticket/{id}',[TicketController::class, 'update'])->middleware('auth:sanctum')->name('ticket_update');
// Route::put('/ticket/{id}',[TicketController::class, 'replace'])->middleware('auth:sanctum')->name('ticket_replace');
