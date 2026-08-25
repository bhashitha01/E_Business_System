<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::where('status', true)
            ->latest()
            ->get();

        $products = Product::with('category')
            ->where('status', true)
            ->latest()
            ->take(8)
            ->get();

        return view('index', compact(
            'categories',
            'products'
        ));
    }
}
