<?php

use App\Http\Controllers\ApiAuthController;
use App\Http\Controllers\ApiCatController;
use App\Http\Controllers\ApiBookController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/cats', [ApiCatController::class, 'index']);
Route::get('/cats/show/{id}', [ApiCatController::class, 'show']);
Route::post('/cats/store', [ApiCatController::class, 'store'])->middleware('api-auth');
Route::post('/cats/update/{id}', [ApiCatController::class, 'update'])->middleware('api-auth');
Route::get('/cats/delete/{id}', [ApiCatController::class, 'delete'])->middleware('api-auth');



Route::get('/books', [ApiBookController::class, 'index']);
Route::get('/books/show/{id}', [ApiBookController::class, 'show']);

Route::post('/register', [ApiAuthController::class, 'register']);
Route::post('/login', [ApiAuthController::class, 'login']);
Route::get('/logout', [ApiAuthController::class, 'logout'])->middleware('api-auth');

