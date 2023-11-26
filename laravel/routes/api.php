<?php

use App\Http\Controllers\CatalogController;
use App\Http\Controllers\NewsController;
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

Route::group(['prefix' => 'news'], function(){
    Route::get('/{name?}', [NewsController::class, 'index']);
});

Route::group(['prefix' => 'catalog'], function(){
    Route::get('/{manufacturer?}/{model_autos?}/{product?}', [CatalogController::class, 'index']);
});

Route::get('/filters/{width?}/{height?}/{diameter?}', [CatalogController::class, 'filter']);

