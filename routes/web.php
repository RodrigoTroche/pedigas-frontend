<?php

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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/sobre-nosotros', [App\Http\Controllers\PagesController::class, 'about'])->name('pages.about');
Route::get('/pedido', [App\Http\Controllers\PagesController::class, 'order'])->name('pages.order');