<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{  HomeController, ProductController };
use Inertia\Inertia;

Route::get('/', [HomeController::class, 'index'])
    ->name('home');
Route::get('/{product}/details', [ProductController::class, 'details'])
    ->name('product.details');
Route::get('/search', [ProductController::class, 'searchProduct'])
    ->name('product.search');
Route::get('/categorias', [App\Http\Controllers\CategoryController::class, 'index'])
    ->name('categories.index');
Route::get('/category/{categoryId}/products', [ProductController::class, 'productsByCategory'])
    ->name('products.byCategory');


require __DIR__.'/auth.php';
