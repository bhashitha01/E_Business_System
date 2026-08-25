<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | Categories
        |--------------------------------------------------------------------------
        */

        $categories = Category::where('status', true)
            ->orderBy('name')
            ->get();


        /*
        |--------------------------------------------------------------------------
        | Products Query
        |--------------------------------------------------------------------------
        */

        $query = Product::with('category')
            ->where('status', true);


        /*
        |--------------------------------------------------------------------------
        | Search
        |--------------------------------------------------------------------------
        */

        if ($request->filled('search')) {

            $search = $request->search;

            $query->where(function ($q) use ($search) {

                $q->where('name', 'like', '%' . $search . '%')
                  ->orWhere('description', 'like', '%' . $search . '%')
                  ->orWhere('sku', 'like', '%' . $search . '%');

            });
        }


        /*
        |--------------------------------------------------------------------------
        | Category Filter
        |--------------------------------------------------------------------------
        */

        if ($request->filled('category')) {

            $query->where('category_id', $request->category);

        }


        /*
        |--------------------------------------------------------------------------
        | Minimum Price
        |--------------------------------------------------------------------------
        */

        if ($request->filled('min_price')) {

            $query->where(function ($q) use ($request) {

                $q->where(function ($q2) use ($request) {

                    $q2->whereNotNull('discount_price')
                       ->where('discount_price', '>=', $request->min_price);

                })->orWhere(function ($q2) use ($request) {

                    $q2->whereNull('discount_price')
                       ->where('price', '>=', $request->min_price);

                });

            });
        }


        /*
        |--------------------------------------------------------------------------
        | Maximum Price
        |--------------------------------------------------------------------------
        */

        if ($request->filled('max_price')) {

            $query->where(function ($q) use ($request) {

                $q->where(function ($q2) use ($request) {

                    $q2->whereNotNull('discount_price')
                       ->where('discount_price', '<=', $request->max_price);

                })->orWhere(function ($q2) use ($request) {

                    $q2->whereNull('discount_price')
                       ->where('price', '<=', $request->max_price);

                });

            });
        }


        /*
        |--------------------------------------------------------------------------
        | Sorting
        |--------------------------------------------------------------------------
        */

        switch ($request->sort) {

            case 'price_low':
                $query->orderByRaw(
                    'COALESCE(discount_price, price) ASC'
                );
                break;

            case 'price_high':
                $query->orderByRaw(
                    'COALESCE(discount_price, price) DESC'
                );
                break;

            case 'newest':
                $query->latest();
                break;

            case 'name_asc':
                $query->orderBy('name', 'asc');
                break;

            case 'name_desc':
                $query->orderBy('name', 'desc');
                break;

            default:
                $query->latest();
                break;
        }


        /*
        |--------------------------------------------------------------------------
        | Pagination
        |--------------------------------------------------------------------------
        */

        $products = $query
            ->paginate(12)
            ->withQueryString();


        /*
        |--------------------------------------------------------------------------
        | Price Range
        |--------------------------------------------------------------------------
        */

        $maxPrice = Product::where('status', true)
            ->max('price');


        /*
        |--------------------------------------------------------------------------
        | Return Shop View
        |--------------------------------------------------------------------------
        */

        return view('shop', compact(
            'products',
            'categories',
            'maxPrice'
        ));
    }
}