<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Controller;

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

Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('result', [HomeController::class, 'result'])->name('result');
Route::get('/result/{page?}', [HomeController::class, 'result'])->name('result');
Route::post('/regist}', [HomeController::class, 'regist'])->name('regist');
Route::delete('/books/{book_id}/delete', [HomeController::class, 'delete'])->name('delete');
