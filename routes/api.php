<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\AuthController;

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

Route::group(['prefix'=>'v1', 'namespace' => 'App\Http\Controllers'], function(){
    Route::apiResource('users',UserController::class);
    Route::apiResource('books',BooksController::class);
    Route::apiResource('reviews',ReviewController::class);
});


Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::post('books', [BooksController::class, 'store']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('books', [BooksController::class, 'store']);
    Route::get('logout', [AuthController::class, 'logout']);
});