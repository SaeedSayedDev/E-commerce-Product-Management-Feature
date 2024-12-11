<?php

use App\Http\Controllers\Product\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/




Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return redirect('/products');
    });
    Route::get('/products', [ProductController::class, 'index'])->name('/products');
    Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
    Route::put('/product/update/{product_id}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/product/delete/{product_id}', [ProductController::class, 'destroy'])->name('profile.destroy');


    Route::get('/product/details/{product_id}', [ProductController::class, 'viewProductDetails'])->name('product.details.view');

});



require __DIR__.'/auth.php';
