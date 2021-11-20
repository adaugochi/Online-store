<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\SiteController;
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

Route::get('/', [SiteController::class, 'index']);
Route::get('/faqs', [SiteController::class, 'faqs'])->name('faqs');
Route::get('cart', [SiteController::class, 'cart'])->name('cart');


Auth::routes();

Route::group(['prefix' => 'user/two-factor', 'middleware' => []], function () {
    Route::get('verify', [VerificationController::class, 'show'])->name('user.verify');
    Route::post('verify', [VerificationController::class, 'verify'])->name('verify');
    Route::post('resend-code', [VerificationController::class, 'resend'])->name('resend');
});


Route::group(['prefix' => 'customer', 'middleware' => []], function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('customer.home');
    Route::get('saved-items', function () {
        return view('sites.saved-item');
    })->name('saved-items');

    Route::get('checkout', function () {
        return view('sites.checkout');
    })->name('checkout');

    Route::get('orders', function () {
        return view('sites.orders');
    })->name('orders');

    Route::get('profile', function () {
        return view('sites.profile');
    })->name('profile');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.home');
    Route::get('/customers', [AdminController::class, 'getCustomers'])->name('admin.customers');
    Route::get('/item-categories', [ItemController::class, 'getItemCategories'])->name('admin.item-categories');
    Route::get('/items', [ItemController::class, 'getItems'])->name('admin.items');
    Route::get('/orders', [ItemController::class, 'getOrders'])->name('admin.orders');
});
