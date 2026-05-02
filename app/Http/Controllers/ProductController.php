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

    public function searchProduct(Request $request): Response
    {
        $query = $request->input('query');

        $products = Product::where('name', 'like', '%' . $query . '%')
            ->orWhere('description', 'like', '%' . $query . '%')
            ->with('category')
            ->get();

        return Inertia::render('SearchResults', [
            'products' => $products,
            'query' => $query,
        ]);
    }

    public function productsByCategory($categoryId): Response
    {
        $products = Product::where('category_id', $categoryId)
            ->with('category')
            ->orderBy('created_at', 'desc')
            ->get();

        return Inertia::render('ProductsByCategory', [
            'products' => $products,
        ]);
    }
}