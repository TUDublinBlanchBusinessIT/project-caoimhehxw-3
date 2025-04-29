<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();  // Get all categories from the database
        return view('categories.index', compact('categories'));  // Return the index view with categories
    }

    public function create()
    {
        return view('categories.create');  // Return the form to create a new category
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
        ]);

        Category::create($request->all());  // Store the new category in the database

        return redirect()->route('categories.index')->with('success', 'Category added successfully!');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);  // Find the category to edit
        return view('categories.edit', compact('category'));  // Return the edit view with category data
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
        ]);

        $category = Category::findOrFail($id);
        $category->update($request->all());  // Update the category in the database

        return redirect()->route('categories.index')->with('success', 'Category updated successfully!');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();  // Delete the category from the database

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully!');
    }
}
