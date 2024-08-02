<?php

use App\Http\Controllers\MerchantController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileCustomerController;
use App\Http\Controllers\ProfileMerchantController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [UserController::class, 'login'])->name('auth.login');
Route::post('/login', [UserController::class, 'process_login'])->name('auth.process_login');
Route::get('/register', [UserController::class, 'register'])->name('auth.register');
Route::post('/register', [UserController::class, 'process_register'])->name('auth.process_register');
Route::get('/logout', [UserController::class, 'logout'])->name('auth.logout');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', [OrderController::class, 'home'])->name('order.home');
    Route::get('/merchant_menu', [MerchantController::class, 'menu'])->name('merchant.menu');
    Route::get('/merchant_menu/add', [MerchantController::class, 'add'])->name('merchant.add');
    Route::post('/merchant_menu/add', [MerchantController::class, 'process_add'])->name('merchant.process_add');
    Route::get('/merchant_menu/edit/{id}', [MerchantController::class, 'edit'])->name('merchant.edit');
    Route::put('/merchant_menu/edit/{id}', [MerchantController::class, 'process_edit'])->name('merchant.process_edit');
    Route::delete('/merchant_menu/delete/{id}', [MerchantController::class, 'delete'])->name('merchant.delete');

    Route::get('/merchant_profile', [ProfileMerchantController::class, 'edit'])->name('profile_merchant.edit');
    Route::put('/merchant_profile', [ProfileMerchantController::class, 'process_edit'])->name('profile_merchant.process_edit');

    Route::get('/customer_profile', [ProfileCustomerController::class, 'edit'])->name('profile_customer.edit');
    Route::put('/customer_profile', [ProfileCustomerController::class, 'process_edit'])->name('profile_customer.process_edit');

    Route::get('/order/add', [OrderController::class, 'add'])->name('order.add');
    Route::post('/order/add', [OrderController::class, 'process_add'])->name('order.process_add');
});
