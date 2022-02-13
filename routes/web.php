<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CatController;
use App\Http\Controllers\UserController;
use App\Models\Book;
use Illuminate\Support\Facades\Route;
use App\Models\Cat;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/cats', [CatController::class, 'index']);
Route::get('/cats/show/{id}', [CatController::class, 'show']);

Route::get('/cats/latest/{num}', [CatController::class, 'latest']);
Route::get('/cats/search', [CatController::class, 'search']);

Route::get('/cats/create', [CatController::class, 'create'])->middleware('auth');
Route::post('/cats/store', [CatController::class, 'store'])->middleware('auth');

Route::get('/cats/edit/{id}', [CatController::class, 'edit'])->middleware('auth');
Route::post('/cats/update/{id}', [CatController::class, 'update'])->middleware('auth');

Route::get('/cats/delete/{id}', [CatController::class, 'delete'])->middleware('auth');

Route::get('/books', [BookController::class,'index']);
Route::get('/books/show/{id}', [BookController::class, 'show']);
Route::get('/books/search', [BookController::class, 'search']);

Route::get('/books/create', [BookController::class, 'create'])->middleware('auth');
Route::post('/books/store', [BookController::class, 'store'])->middleware('auth');

Route::get('/books/edit/{id}', [BookController::class, 'edit'])->middleware('auth');
Route::post('/books/update/{id}', [BookController::class, 'update'])->middleware('auth');
Route::get('/books/delete/{id}', [BookController::class, 'delete'])->middleware('auth');


Route::get('/register', [AuthController::class, 'registerForm'])->middleware('guest');
Route::post('/register', [AuthController::class, 'register'])->middleware('guest');

Route::get('/login', [AuthController::class, 'loginForm'])->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest');

Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');

Route::get('/users',[UserController::class, 'index'])->middleware(['auth','is-admin']);
