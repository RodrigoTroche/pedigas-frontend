<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\OrdersController;

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



Route::middleware(['auth'])->group(function () {
    Route::get('/mi-cuenta', [App\Http\Controllers\AccountController::class, 'index'])->name('account.index');
    Route::put('/mi-cuenta/update', [App\Http\Controllers\AccountController::class, 'update'])->name('account.update');

    Route::get('/mi-cuenta/direcciones', [App\Http\Controllers\AddressesController::class, 'index'])->name('addresses.index');
    Route::get('/mi-cuenta/direcciones/crear', [App\Http\Controllers\AddressesController::class, 'create'])->name('addresses.create');
    Route::post('/mi-cuenta/direcciones/crear', [App\Http\Controllers\AddressesController::class, 'store'])->name('addresses.store');
    Route::get('/mi-cuenta/direcciones/{id}/editar', [App\Http\Controllers\AddressesController::class, 'edit'])->name('addresses.edit');
    Route::put('/mi-cuenta/direcciones/{id}/editar', [App\Http\Controllers\AddressesController::class, 'update'])->name('addresses.update');

    Route::get('/mi-cuenta/pedidos', [App\Http\Controllers\OrdersController::class, 'index'])->name('orders.index');

    Route::get('/pedido', [App\Http\Controllers\PagesController::class, 'order'])->name('pages.order');
    Route::post('/orders', [OrdersController::class, 'store']);

    Route::get('/ajax/addresses', [App\Http\Controllers\Api\AddressesController::class, 'index']);
});