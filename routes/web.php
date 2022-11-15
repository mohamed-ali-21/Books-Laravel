<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/book', [App\Http\Controllers\BookController::class, 'index']);
Route::get('/book/create/page', [App\Http\Controllers\BookController::class, 'create']);
Route::post('/book/create', [App\Http\Controllers\BookController::class, 'cre']);
Route::delete('/book/delete/{id}', [App\Http\Controllers\BookController::class, 'destroy']);
Route::get('/book/edit/{id}', [App\Http\Controllers\BookController::class, 'edit']);
Route::patch('book/Update/{id}', [App\Http\Controllers\BookController::class, 'Update']);
Route::get('book/get/{id}', [App\Http\Controllers\BookController::class, 'getBook']);
Route::get('/book/returns/{id}', [App\Http\Controllers\BookController::class, 'returnBook']);
