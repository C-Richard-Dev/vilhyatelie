<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\Product;

class ProductController extends Controller
{
    public function details(Product $product): Response
    {
        $product->load('category', 'fabrics');
        return Inertia::render('ProductDetails', [
            'product' => $product,
        ]);
    }
}