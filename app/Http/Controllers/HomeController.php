<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\{ Product, Category };

class HomeController extends Controller
{
    /**
     * Display the welcome page.
     */
    public function index(): Response
    {
        $products = Product::with('category')->orderBy('created_at')->take(10)->get();

        return Inertia::render('Home', [
            'products' => $products,
            'categories' => Category::all(),
        ]);
    }
}