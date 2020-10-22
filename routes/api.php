<?php

use App\Http\Controllers\ReceipeController;
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
});
