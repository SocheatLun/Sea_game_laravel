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
Route::get('/events',[EventController::class,'index']);
Route::post('/events',[EventController::class,'store']);
Route::put('/events/{id}',[EventController::class,'update']);
Route::delete('/events/{id}',[EventController::class,'destroy']);
Route::get('/find/{title}', [EventController::class, 'findeEventBy']);
Route::get('/search/{date}', [EventController::class, 'searchByDate']);

//TicketHandler
Route::resource('tickets',TicketController::class );
Route::get('/booking/{id}',[TicketController::class,'buyTicket']);

// StadiumHandler
Route::resource('stadium',StadiumController::class );

// ZoneHandler
Route::resource('zones',ZoneController::class );

// EventDetailHandler
Route::get('/detail',[EventDetailController::class,'index']);
Route::post('/detail',[EventDetailController::class,'store']);
Route::put('/detail/{id}',[EventDetailController::class,'update']);
Route::delete('/detail/{id}',[EventDetailController::class,'destroy']);