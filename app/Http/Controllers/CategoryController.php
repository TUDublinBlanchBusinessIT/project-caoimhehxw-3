<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    // Show all categories
    public function index()
    {
        $categories = Category::all();  // Fetch all categories from the database
        return view('categories.index', compact('categories'));  // Pass categories to view
    }

    // Show the form to create a new category
    public function create()
    {
        return view('categories.create');  // Show the form for creating a new category
    }

    // Store a newly created category in the database
    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'category_name' => 'required|string|max:255',  // Ensure category name is provided and valid
        ]);

        // Create the category
        Category::create([
            'category_name' => $request->category_name,  // Save the category name to the database
        ]);

        // Redirect to categories index with a success message
        return redirect()->route('categories.index')->with('success', 'Category added successfully!');
    }

    // Show the form to edit an existing category
    public function edit($id)
    {
        $category = Category::findOrFail($id);  // Fetch the category by its ID
        return view('categories.edit', compact('category'));  // Pass the category to the edit form
    }

    // Update the category in the database
    public function update(Request $request, $id)
    {
        // Validate input
        $request->validate([
            'category_name' => 'required|string|max:255',  // Ensure category name is valid
        ]);

        $category = Category::findOrFail($id);  // Find the category by ID
        $category->update([
            'category_name' => $request->category_name,  // Update the category name in the database
        ]);

        // Redirect to categories index with a success message
        return redirect()->route('categories.index')->with('success', 'Category updated successfully!');
    }

    // Delete the category from the database
    public function destroy($id)
    {
        $category = Category::findOrFail($id);  // Find the category by ID
        $category->delete();  // Delete the category

        // Redirect to categories index with a success message
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully!');
    }
}
