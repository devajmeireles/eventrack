<?php

use App\Http\Controllers\Api\EventController;
use App\Http\Controllers\Api\TargetController;
use App\Http\Middleware\Api\AuthorizeEventCreation;
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

Route::post('/events/create', EventController::class)
    ->middleware(AuthorizeEventCreation::class)
    ->name('api.events.create');

Route::apiResource('/targets', TargetController::class)
    ->only(['update', 'destroy']);
