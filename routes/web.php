<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReciboCompras;
use App\Http\Controllers\DistributionController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\ShoppingCartController;

Route::get('/', [DistributionController::class, 'index'])->name('distributions.index');

Route::patch('cart/{distribution}', [DistributionController::class, 'addToCart'])->name('distributions.addToCart');

Route::get('distributions/{distribution}', [DistributionController::class, 'show'])->name('distributions.show');

Route::get('category/{category}', [DistributionController::class, 'category'])->name('distributions.category');

Route::get('supplier/{supplier}', [DistributionController::class, 'supplier'])->name('distributions.supplier');

Route::get('cart', [ShoppingCartController::class, 'index'])->name('shopping_carts.index');

Route::delete('cart/{item}', [ShoppingCartController::class, 'deleteFromCart'])->name('shopping_carts.delete');

Route::resource('sales', SaleController::class)->names('sales');

Route::get('/sales/getProvinces/{departmentId}', [SaleController::class, 'getProvinces']);

Route::middleware(['auth:sanctum','verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('recibos', function () {

    Mail::to('rodmat0905@gmail.com')
    ->send(new ReciboCompras);

    return redirect()->back()->with('info', 'Su compra fue realizada con éxito, se le envió un correo electrónico');

})->name('recibos');

/* Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
}); */