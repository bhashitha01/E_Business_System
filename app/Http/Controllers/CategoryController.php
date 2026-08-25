<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function create()
    {
        return view('admin.categories.create');
    }
    public function index()
{
    $categories = Category::latest()->get();
    return view('admin.categories.index', compact('categories'));
}

public function store(Request $request)
{

    $request->validate([
        'name' => ['required', 'string', 'max:255'],
      
    ]);

    Category::create([
        'name' => $request->name,
        'slug' => \Illuminate\Support\Str::slug($request->name),
        'icon' => $request->icon,
        'description' => $request->description,
    ]);

    return redirect()
        ->route('admin.dashboard')
        ->with('success', 'Category added successfully.');
}

}
