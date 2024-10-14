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
    Route::post('/login', 'login')->name('login')->middleware('guest:sanctum');
    Route::post('/register', 'register')->name('register')->middleware('guest:sanctum');
    Route::post('/logout', 'logout')->name('logout')->middleware('auth:sanctum');
});

Route::apiResource('/route',RoutesController::class);//->middleware('auth:sanctum');
Route::apiResource('/vessel',VesselController::class);//->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {
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
