<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
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


Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'save'])->name('contact.save');


Auth::routes();

// Password reset routes
Route::group(['prefix' => 'password', 'middleware' => []], function () {
    Route::post('send-reset-link', [ForgotPasswordController::class, 'sendResetLink'])->name('password.forget');
    Route::post('reset', [ResetPasswordController::class, 'reset'])->name('password.update');
    Route::get('reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
});

// Verify
Route::group(['prefix' => 'user/two-factor', 'middleware' => []], function () {
    Route::get('verify', [VerificationController::class, 'show'])->name('user.verify');
    Route::post('verify', [VerificationController::class, 'verify'])->name('verify');
    Route::post('resend-code', [VerificationController::class, 'resend'])->name('resend');
});

// Customer
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

// Admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.home');
    Route::get('/customers', [AdminController::class, 'getCustomers'])->name('admin.customers');

    // category
    Route::get('product-categories', [ProductController::class, 'getProductCategories'])->name('admin.product-categories');
    Route::post('product-category', [ProductController::class, 'saveProductCategory'])->name('admin.save.product-category');
    Route::post('product-category/update', [ProductController::class, 'updateProductCategoryStatus'])->name('admin.update.product-category');


    // product
    Route::get('/products', [ProductController::class, 'getProducts'])->name('admin.products');
    Route::get('/product/{id?}', [ProductController::class, 'addProduct'])->name('admin.product');
    Route::post('/product', [ProductController::class, 'saveProduct'])->name('admin.product.save');
    Route::post('/product/update-status', [ProductController::class, 'updateProductStatus'])->name('admin.product.update-status');


    // orders
    Route::get('/orders', [ProductController::class, 'getOrders'])->name('admin.orders');
});
