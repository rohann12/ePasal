<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::with('products')->get();
        return view('category.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories',
            'description' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,gif|',
        ]);
        if ($request->hasFile('photo')) {

            $photoPath = $request->file('photo')->store('photos', 'public');
            $validated['photo_path'] = $photoPath;
        }
        Category::create($validated);

        return redirect()->route('category.index')->with('success', 'Category created successfully!');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('category.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'photo' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048', // Validating the photo
    ]);

    $category->update([
        'name' => $validated['name'],
        'description' => $validated['description'] ?? null, // Optional description field
    ]);

    // Handle the photo upload if a new photo is provided
    if ($request->hasFile('photo')) {
        // Store the new photo and update the category record
        $photoPath = $request->file('photo')->store('photo', 'public');
        $category->update(['photo' => $photoPath]);
    }

    return redirect()->route('category.index')->with('success', 'Category updated successfully!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('category.index')->with('success', 'Category deleted successfully!');
    }
}
