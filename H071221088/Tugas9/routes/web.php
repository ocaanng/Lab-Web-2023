<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/product', [ProductController::class, 'index'])->name('product.index');

Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');

Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');

Route::get('product/{id}/edit', [ProductController::class, 'edit']);

Route::put('product/{id}/update', [ProductController::class, 'update']);

Route::delete('product/{id}/delete', [ProductController::class, 'destroy']);

Route::get('product/{id}/show', [ProductController::class, 'show']);

Route::get('/jenis', [ProductController::class, 'search'])->name('jenis');
