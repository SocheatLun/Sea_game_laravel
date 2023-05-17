<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\EventDetailController;
use App\Http\Controllers\StadiumController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\ZoneController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//EventHandler
Route::get('/events', [EventController::class, 'index']);
Route::get('/search/{date}', [EventController::class, 'searchByDate']);
Route::post('/events', [EventController::class, 'store']);
Route::put('/events/{id}', [EventController::class, 'update']);
Route::delete('/events/{id}', [EventController::class, 'destroy']);
Route::get('/find/{title}', [EventController::class, 'findeEventBy']);

//TicketHandler
Route::get('/tickets',[TicketController::class,'index']);
Route::post('/tickets',[TicketController::class,'store']);
Route::put('/tickets/{id}',[TicketController::class,'update']);
Route::delete('/tickets/{id}',[TicketController::class,'destroy']);

// StadiumHandler
Route::get('/stadium',[StadiumController::class,'index']);
Route::post('/stadium',[StadiumController::class,'store']);
Route::put('/stadium/{id}',[StadiumController::class,'update']);
Route::delete('/stadium/{id}',[StadiumController::class,'destroy']);

// ZoneHandler
Route::get('/zone',[ZoneController::class,'index']);
Route::post('/zone',[ZoneController::class,'store']);
Route::put('/zone/{id}',[ZoneController::class,'update']);
Route::delete('/zone/{id}',[ZoneController::class,'destroy']);

// EventDetailHandler
Route::get('/detail',[EventDetailController::class,'index']);
Route::post('/detail',[EventDetailController::class,'store']);
Route::put('/detail/{id}',[EventDetailController::class,'update']);
Route::delete('/detail/{id}',[EventDetailController::class,'destroy']);