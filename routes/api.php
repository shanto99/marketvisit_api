<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ZoneController;
use App\Http\Controllers\TerritoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\OutletController;

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
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->group(function() {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/create_zone', [ZoneController::class, 'create_zone']);
    Route::get('/all_zones', [ZoneController::class, 'get_zones']);
    Route::post('/create_territory', [TerritoryController::class, 'create_territory']);
    Route::get('/all_territories', [ZoneController::class, 'get_territories']);
    Route::get('/get_user/{userId}', [UserController::class, 'get_user']);
    Route::post('/create_outlet', [OutletController::class, 'create_outlet']);
    Route::get('/all_outlets', [OutletController::class, 'get_outlets']);
    Route::post('/attendance', [AttendanceController::class, 'make_attendance']);
    Route::get('/get_subordinates/{userId}', [UserController::class, 'get_subordinates']);
});
