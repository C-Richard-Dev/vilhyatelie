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

require __DIR__.'/auth.php';
