<?php
use App\Http\Controllers\WeaponController;
use App\Http\Controllers\ServerController;
use App\Http\Controllers\RobukController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\RuleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\StoreController;
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
Route::apiResource('/stores',StoreController::class);
Route::apiResource('/users',UserController::class);
Route::apiResource('/robuks',RobukController::class);
Route::apiResource('weapons',WeaponController::class);
Route::apiResource('/sales',SaleController::class);
Route::apiResource('/rules',RuleController::class);
Route::apiResource('/chats',ChatController::class);
Route::apiResource('/comments',CommentController::class);




// cada ruta es diferente, todas tienen post
Route::post('/games', [GameController::class, 'store']);
Route::get('/games/{id}', [GameController::class, 'show']);
Route::get('/games/', [GameController::class, 'index']);
Route::delete('/games/{id}', [GameController::class, 'destroy']);
Route::patch('/games/{id}', [GameController::class, 'update']);

Route::post('/Servers', [ServerController::class, 'store']);
Route::get('/Servers/{id}', [ServerController::class, 'show']);
Route::get('/Servers/', [ServerController::class, 'index']);
Route::patch('/Servers/{id}', [ServerController::class, 'update']);
Route::delete('/Servers/{id}', [ServerController::class, 'destroy']);
