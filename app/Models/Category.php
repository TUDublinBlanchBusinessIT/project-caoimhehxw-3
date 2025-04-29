<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    // Show the form for editing a category
    public function edit($id)
    {
        $category = Category::findOrFail($id);  // Get the category by ID
        return view('categories.edit', compact('category'));
    }

    // Update the category
    public function update(Request $request, $id)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',  // Validate the category name
        ]);

        $category = Category::findOrFail($id);  // Find the category by ID
        $category->update([
            'category_name' => $request->category_name,  // Update the category name
        ]);

        return redirect()->route('categories.index')->with('success', 'Category updated successfully');
    }
}
