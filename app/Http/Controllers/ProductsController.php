<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Product Index
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        // Get all products with category
        $products = Product::with('category')
            ->latest()
            ->get();

        // Get all categories for Add Product form
        $categories = Category::orderBy('name')
            ->get();

        return view(
            'admin.products.index',
            compact('products', 'categories')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Store Product
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $validated = $request->validate([

            'category_id' => 'required|exists:categories,id',

            'name' => 'required|string|max:255',

            'sku' => 'required|string|max:255|unique:products,sku',

            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'description' => 'nullable|string',

            'price' => 'required|numeric|min:0',

            'discount_price' => 'nullable|numeric|min:0|lte:price',

            'stock' => 'required|integer|min:0',

            'status' => 'required|boolean',

        ]);


        /*
        |--------------------------------------------------------------------------
        | Generate Slug
        |--------------------------------------------------------------------------
        */

        $validated['slug'] = Str::slug(
            $validated['name']
        );

        // Upload image
        if ($request->hasFile('image')) {

        $validated['image'] =
            $request->file('image')
                ->store('products', 'public');
    }


        /*
        |--------------------------------------------------------------------------
        | Save Product
        |--------------------------------------------------------------------------
        */

        Product::create($validated);


        /*
        |--------------------------------------------------------------------------
        | Redirect
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('admin.products.index')
            ->with(
                'success',
                'Product added successfully.'
            );
    }
}