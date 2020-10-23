<?php

use App\Http\Controllers\IngredientController;
use App\Http\Controllers\ReceipeController;
use App\Http\Controllers\StepController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'receipes'], function () {
    Route::get('/', [ReceipeController::class, 'index']);
    Route::get('/{receipe}', [ReceipeController::class, 'show']);
    Route::post('/', [ReceipeController::class, 'store']);
    Route::patch('/{receipe}', [ReceipeController::class, 'update']);
    Route::delete('/{receipe}', [ReceipeController::class, 'delete']);

    Route::group(['prefix' => '/{receipe}/ingredients'], function() {
        Route::get('/', [IngredientController::class, 'index']);
        Route::get('/{ingredient}', [IngredientController::class, 'show']);
        Route::post('/', [IngredientController::class, 'store']);
        Route::patch('/{ingredient}', [IngredientController::class, 'update']);
        Route::delete('/{ingredient}', [IngredientController::class, 'delete']);
    });

    Route::group(['prefix' => '/{receipe}/steps'], function() {
        Route::get('/', [StepController::class, 'index']);
        Route::get('/{step}', [StepController::class, 'show']);
        Route::post('/', [StepController::class, 'store']);
        Route::patch('/{step}', [StepController::class, 'update']);
        Route::delete('/{step}', [StepController::class, 'delete']);
    });
});
