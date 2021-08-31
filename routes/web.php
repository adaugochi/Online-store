<?php

use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\HomeController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('saved-items', function () {
    return view('saved-item');
})->name('saved-items');

Route::get('cart', function () {
    return view('cart');
})->name('cart');

Route::get('checkout', function () {
    return view('checkout');
})->name('checkout');

Route::get('orders', function () {
    return view('orders');
})->name('orders');

Route::get('profile', function () {
    return view('profile');
})->name('profile');

Auth::routes();

Route::get('/user/two-factor/verify', [VerificationController::class, 'show'])->name('user.verify');
Route::post('/user/two-factor/verify', [VerificationController::class, 'verify'])->name('verify');

Route::group(['prefix' => 'customer', 'middleware' => ['auth']], function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('customer.home');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    //Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});
