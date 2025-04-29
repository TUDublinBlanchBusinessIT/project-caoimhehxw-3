<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Category;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::with('category')->get();  // Get all courses with their categories
        return view('courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();  // Get all categories
        return view('courses.create', compact('categories'));  // Pass categories to view
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'course' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',  // Validate the category exists
            'course_description' => 'required|string|max:500',
            'start_date' => 'required|date',
            'status' => 'required|string',
        ]);

        Course::create([
            'course_name' => $validated['course'],
            'category_id' => $validated['category_id'],
            'course_description' => $validated['course_description'],
            'start_date' => $validated['start_date'],
            'status' => $validated['status'],
        ]);

        return redirect()->route('courses.index')->with('success', 'Course added successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $course = Course::findOrFail($id);
        $categories = Category::all();  // Get all categories
        return view('courses.edit', compact('course', 'categories'));  // Pass course and categories to view
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'course' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'course_description' => 'required|string|max:500',
            'start_date' => 'required|date',
            'status' => 'required|string',
        ]);

        $course = Course::findOrFail($id);
        $course->update([
            'course_name' => $validated['course'],
            'category_id' => $validated['category_id'],
            'course_description' => $validated['course_description'],
            'start_date' => $validated['start_date'],
            'status' => $validated['status'],
        ]);

        return redirect()->route('courses.index')->with('success', 'Course updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();

        return redirect()->route('courses.index')->with('success', 'Course deleted successfully!');
    }
}
