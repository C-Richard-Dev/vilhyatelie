<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(): Response
    {
        $categories = Category::withCount('products')->get();
        return Inertia::render('Categories', [
            'categories' => $categories,
        ]);
    }
}