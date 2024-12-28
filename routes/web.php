<?php

use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\ProductCartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Customer\CustomerDashboardController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


//Admin Routes
Route::middleware(['auth','role:admin'])->prefix('admin')->group(function(){
    Route::get('/dashboard',[AdminDashboardController::class,'index'])->name('admin.dashboard');

    //Category Routes
    Route::get('/product-category',[CategoryController::class,'index'])->name('admin.product-category.index');
    Route::get('/product-category/create',[CategoryController::class,'create'])->name('admin.product-category.create');
    Route::post('/product-category/create',[CategoryController::class,'store'])->name('admin.product-category.store');
    Route::get('/product-category/edit/{id}',[CategoryController::class,'edit'])->name('admin.product-category.edit');
    Route::put('/product-category/edit/{id}',[CategoryController::class,'update'])->name('admin.product-category.update');
    Route::delete('/product-category/delete/{id}',[CategoryController::class,'destroy'])->name('admin.product-category.delete');

    //Product Routes
    Route::get('/product',[ProductController::class,'index'])->name('admin.product.index');
    Route::get('/product/create',[ProductController::class,'create'])->name('admin.product.create');
    Route::post('/product/create',[ProductController::class,'store'])->name('admin.product.store');
    Route::get('/product/edit/{id}',[ProductController::class,'edit'])->name('admin.product.edit');
    Route::put('/product/edit/{id}',[ProductController::class,'update'])->name('admin.product.update');
    Route::delete('/product/delete/{id}',[ProductController::class,'destroy'])->name('admin.product.delete');

    //Order update route
    Route::get('/order',[AdminOrderController::class,'index'])->name('admin.order.index');
    Route::get('/order/edit/{id}',[AdminOrderController::class,'orderEdit'])->name('admin.order.edit');
    Route::put('/order/edit/{id}',[AdminOrderController::class,'updateOrderStatus'])->name('admin.order.update');
    Route::delete('/order/delete/{id}',[AdminOrderController::class,'orderDestroy'])->name('admin.order.delete');
});

//Product Cart Routes
Route::middleware(['auth'])->group(function(){
    Route::get('/',[ProductCartController::class,'index'])->name('product.index');
    Route::get('/product/cart',[ProductCartController::class,'cart'])->name('product.cart');
    Route::get('cart', [ProductCartController::class, 'cart'])->name('cart');
    Route::get('add-to-cart/{id}', [ProductCartController::class, 'addToCart'])->name('add.to.cart');
    Route::patch('update-cart', [ProductCartController::class, 'update'])->name('update.cart');
    Route::delete('remove-from-cart', [ProductCartController::class, 'remove'])->name('remove.from.cart');

    //Checkout Routes
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
    Route::post('/checkout', [CheckoutController::class, 'placeOrder'])->name('checkout.placeOrder');

});

//Home Routes
Route::get('/',[HomeController::class,'index'])->name('home');



//Customer Routes
Route::middleware(['auth','role:customer'])->prefix('customer')->group(function(){
    Route::get('/dashboard',[CustomerDashboardController::class,'index'])->name('customer.dashboard');

    //Show Customer Order
    Route::get('/order',[CustomerDashboardController::class,'order'])->name('customer.order.index');
});




require __DIR__.'/auth.php';
