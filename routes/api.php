<?php
use App\Http\Controllers\WeaponController;
use App\Http\Controllers\RobukController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\UserController;
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
Route::post('/login', [App\Http\Controllers\AuthenticationController::class, 'login']);

Route::apiResource('/users',UserController::class);
Route::apiResource('/robuks',RobukController::class);
Route::apiResource('/weapons',WeaponController::class);




Route::post('/games', [GameController::class, 'store']);
Route::post('/games/{id}', [GameController::class, 'show']);
Route::post('/games/', [GameController::class, 'index']);
Route::post('/games/{id}', [GameController::class, 'destroy']);
Route::post('/games/{id}', [GameController::class, 'update']);
