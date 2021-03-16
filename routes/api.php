<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\Auth\AuthController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->group(function() {
  Route::apiResource('todos', TodoController::class);
});

Route::prefix('auth')
  ->middleware('api')
  ->group(
    function () {
      Route::post('/login', [AuthController::class, 'login'])->name('login');
      Route::post('/logout', [AuthController::class, 'logout']);
      Route::post('/refresh', [AuthController::class, 'refresh']);
      Route::post('/me', [AuthController::class, 'me']);
    }
  );