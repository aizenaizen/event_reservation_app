<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\EventController;
use App\Http\Controllers\API\OrganizerController;
use App\Http\Controllers\API\ReservationController;
use App\Http\Controllers\API\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(['middleware' => 'auth:sanctum'], function() {
    Route::apiResource('/events', EventController::class);
    Route::apiResource('/reservations', ReservationController::class);

    Route::get('/organizers/{id}', [OrganizerController::class, 'show'])->name('organizers');
    Route::get('/reservers/{id}', [ReserverController::class, 'show'])->name('reservers');

    Route::get('/user', UserController::class);
});