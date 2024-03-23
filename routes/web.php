<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;

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

Route::get('/',  function () {
    return view('login');
})->middleware('guest')->name('login');

Route::get('/login', [LoginController::class, 'index'])->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->middleware('guest');
Route::get('/register', [LoginController::class, 'register'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');

Route::resource('/posts', PostController::class)->middleware('auth');
Route::get('/posts', [PostController::class, 'index'])->middleware('auth');
Route::post('/posts/new', [PostController::class, 'newTask'])->middleware('auth');


Route::get('/categories/{categoryName}', [CategoryController::class, 'index'])->name('categories.index')->middleware('auth');
Route::post('/categories/{postId}', [CategoryController::class, 'destroy'])->middleware('auth');

Route::post('/posts/check/{id}', [PostController::class, 'checkboxPost']);
