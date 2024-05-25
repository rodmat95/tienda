<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CommissionController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\Admin\DistributionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;

Route::get('', [HomeController::class, 'index'])->middleware('can:admin.home')->name('admin.home');

Route::resource('users', UserController::class)->only(['index', 'edit', 'update'])->names('admin.users');

Route::resource('roles', RoleController::class)->except('show')->names('admin.roles');

Route::resource('categories', CategoryController::class)->except('show')->names('admin.categories');

Route::resource('products', ProductController::class)->except('show')->names('admin.products');

Route::resource('commissions', CommissionController::class)->except('show')->names('admin.commissions');

Route::resource('suppliers', SupplierController::class)->only(['index', 'edit', 'update', 'destroy'])->names('admin.suppliers');

Route::resource('distributions', DistributionController::class)->except('show')->names('admin.distributions');