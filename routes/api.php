<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PlayersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//Public Routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/players', [PlayersController::class, 'index']);
Route::get('/players/{id}', [PlayersController::class, 'show']);
Route::get('/players/search/{nama}', [PlayersController::class, 'search']);
//Protected Routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/players', [PlayersController::class, 'store']);
    Route::put('/players/{id}', [PlayersController::class, 'update']);
    Route::delete('/players/{id}', [PlayersController::class, 'destroy']);
    Route::post('/logout', [AuthController::class, 'logout']);
});
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
