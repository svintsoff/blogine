<?php

use App\Http\Controllers\Api\v1\ArticleController as ArticleV1;
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

Route::group(['prefix' => 'v1'], function () {
    Route::get('articles', [ArticleV1::class, 'index']);
    Route::post('articles', [ArticleV1::class, 'store']);
    Route::get('articles/{article}', [ArticleV1::class, 'show']);
    Route::put('articles/{article}', [ArticleV1::class, 'update']);
    Route::delete('articles/{article}', [ArticleV1::class, 'destroy']);
});
