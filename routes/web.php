<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;

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


Route::get('/', [HomeController::class, 'index']);
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'autenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/admin/product', App\Http\Livewire\Product\Index::class)->name('admin.product')->middleware('auth');
Route::get('/counter', App\Http\Livewire\Counter::class);
Route::get('/shop', App\Http\Livewire\Shop\Index::class)->name('shop.index');
Route::get('/cart', App\Http\Livewire\Shop\Cart::class)->name('shop.cart');
Route::get('/checkout', App\Http\Livewire\Shop\Checkout::class)->name('shop.checkout');
