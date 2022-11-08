<?php

use App\Http\Controllers\frontend\ProductController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [App\Http\Controllers\GuestController::class, 'index'])->name('index');
Route::get('/gsearch', [App\Http\Controllers\GuestController::class, 'product_search'])->name('search');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile/edit/{id}', [App\Http\Controllers\HomeController::class, 'edit_profile'])->name('home.profile');
Route::put('/profile/update/{id}', [App\Http\Controllers\HomeController::class, 'update_profile'])->name('profile.update');
Route::get('/search', [App\Http\Controllers\HomeController::class, 'product_search'])->name('home.search');

// ['middleware' => ['web', 'auth']
// forntend routes
Route::group(['middleware' => ['auth', 'web'], 'prefix'=>'front'], function() { 

Route::get('/cart', [App\Http\Controllers\frontend\CartController::class, 'cart'])->name('cart');
Route::post('update-cart', [App\Http\Controllers\frontend\CartController::class, 'update'])->name('cart.update');
Route::post('delete-cart', [App\Http\Controllers\frontend\CartController::class, 'destroy'])->name('cart.delete');

Route::get('/order-index', [App\Http\Controllers\frontend\CheckoutController::class, 'index'])->name('orders.index');
Route::get('/checkout', [App\Http\Controllers\frontend\CheckoutController::class, 'checkout'])->name('order.checkout');


Route::get('/product', [App\Http\Controllers\frontend\ProductController::class, 'index'])->name('product');
Route::get('/product/details/{id}', [App\Http\Controllers\frontend\ProductController::class, 'details'])->name('product.detail');
Route::post('cart/Store', [ProductController::class, 'addToCart'])->name('cart.store');
// Route::post('update-cart', [ProductController::class, 'updateCart'])->name('product.updatecart');
Route::delete('remove-from-cart', [ProductController::class, 'destroyCart'])->name('product.destroycart');
Route::get('/product/search', [App\Http\Controllers\frontend\ProductController::class, 'product_search'])->name('product.search');


});



// backend routes
Route::group(['middleware' => ['auth', 'web'], 'prefix'=>'admin'], function() { 

    Route::get('/dashboard', [App\Http\Controllers\backend\DashboardController::class, 'index'])->name('dashboard');

    Route::get('/product', [App\Http\Controllers\backend\ProductController::class, 'index'])->name('product.index');
    Route::get('/product/create', [App\Http\Controllers\backend\ProductController::class, 'create'])->name('product.create');
    Route::post('/product/store', [App\Http\Controllers\backend\ProductController::class, 'store'])->name('product.store');
    Route::get('/product/show/{id}', [App\Http\Controllers\backend\ProductController::class, 'show'])->name('product.show');
    Route::get('/product/edit/{id}', [App\Http\Controllers\backend\ProductController::class, 'edit'])->name('product.edit');
    Route::put('/product/update/{id}', [App\Http\Controllers\backend\ProductController::class, 'update'])->name('product.update');
    Route::delete('/product/destroy/{id}', [App\Http\Controllers\backend\ProductController::class, 'destroy'])->name('product.destroy');


    Route::get('/category', [App\Http\Controllers\backend\CategoryController::class, 'index'])->name('category.index');
    Route::get('/category/create', [App\Http\Controllers\backend\CategoryController::class, 'create'])->name('category.create');
    Route::post('/category/store', [App\Http\Controllers\backend\CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/edit/{id}', [App\Http\Controllers\backend\CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/category/update/{id}', [App\Http\Controllers\backend\CategoryController::class, 'update'])->name('category.update');
    Route::delete('/category/destroy/{id}', [App\Http\Controllers\backend\CategoryController::class, 'destroy'])->name('category.destroy');


    Route::get('/user', [App\Http\Controllers\backend\UserController::class, 'index'])->name('user.index');
    Route::get('/user/show/{id}', [App\Http\Controllers\backend\UserController::class, 'show'])->name('user.show');


    Route::get('/order', [App\Http\Controllers\backend\OrderController::class, 'index'])->name('order.index');

});
