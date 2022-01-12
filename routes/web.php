<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DeliveryFeeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use \App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\SavedItemController;
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

// Contact
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'save'])->name('contact.save');

// Cart
Route::group(['prefix' => 'cart', 'middleware' => ['auth']], function () {
    Route::post('/remove', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/update', [CartController::class, 'update'])->name('cart.update');
    Route::get('/increase-one', [CartController::class, 'increaseOneProduct'])->name('cart.increase-one');
    Route::get('/add', [CartController::class, 'addToCart'])->name('cart.add');
    Route::get('/', [CartController::class,'index'])->name('cart');
    Route::get('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
});

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
Route::group(['prefix' => 'customer', 'middleware' => ['auth']], function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('customer.home');

    // Order
    Route::get('/orders', [OrderController::class, 'index'])->name('customer.orders');
    Route::get('/order/{id}', [OrderController::class, 'getOrder'])->name('customer.order');
    Route::post('/order/billing', [OrderController::class, 'billing'])->name('order.billing');
    Route::get('/payment/stripe', [OrderController::class,  'stripePayment'])->name('order.payment.stripe');
    Route::get('/payment/payment', [OrderController::class,  'paypalPayment'])->name('order.payment.paypal');
    Route::post('/payment', [OrderController::class,  'pay'])->name('order.pay');


    Route::get('saved-items', [SavedItemController::class, 'index'])->name('customer.saved-items');
    Route::post('/product/save', [SavedItemController::class, 'saveItem'])->name('customer.save-item');
    Route::post('/product/remove', [SavedItemController::class, 'removeItem'])->name('customer.remove-item');


    Route::get('/profile', [HomeController::class, 'profile'])->name('customer.profile');
    Route::post('/profile', [HomeController::class, 'updateProfile'])->name('update.profile');

    Route::get('/change-password', [HomeController::class, 'account'])->name('customer.account');
    Route::post('/change-password', [HomeController::class, 'changePassword'])->name('change-password');
});

// Admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.home');
    Route::get('/customers', [AdminController::class, 'getCustomers'])->name('admin.customers');
    Route::get('/customers/{id}/orders', [AdminController::class, 'getCustomerOrders'])->name('admin.customer.orders');

    // Delivery Fee
    Route::get('/delivery-fee', [DeliveryFeeController::class, 'index'])->name('admin.delivery-fee');
    Route::post('/delivery-fee', [DeliveryFeeController::class, 'create'])->name('admin.save.delivery-fee');

    // category
    Route::get('product-categories', [ProductController::class, 'getProductCategories'])->name('admin.product-categories');
    Route::post('product-category', [ProductController::class, 'saveProductCategory'])->name('admin.save.product-category');
    Route::post('product-category/update', [ProductController::class, 'updateProductCategoryStatus'])->name('admin.update.product-category');

    // product
    Route::get('/products', [ProductController::class, 'getProducts'])->name('admin.products');
    Route::get('/products/item/{id?}', [ProductController::class, 'addProduct'])->name('admin.product');
    Route::post('/product', [ProductController::class, 'saveProduct'])->name('admin.product.save');
    Route::post('/product/update-status', [ProductController::class, 'updateProductStatus'])->name('admin.product.update-status');

    // orders
    Route::get('/orders', [AdminOrderController::class, 'index'])->name('admin.orders');
    Route::get('/orders/{id}', [AdminOrderController::class, 'viewOrder'])->name('admin.order');
    Route::post('/order', [AdminOrderController::class, 'updateOrderStatus'])->name('admin.order.status');
});
