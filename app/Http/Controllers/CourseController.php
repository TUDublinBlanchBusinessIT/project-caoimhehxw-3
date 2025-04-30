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
        // Get all courses with their categories
        $courses = Course::with('category')->get();
        return view('courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Get all categories for the dropdown
        $categories = Category::all();
        return view('courses.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the course input
        $validated = $request->validate([
            'course' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',  // Validate category_id exists
            'course_description' => 'required|string|max:500',
            'start_date' => 'required|date',
            'status' => 'required|string',
        ]);

        // Create the new course in the database
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
     * Display the specified resource.
     */
    public function show($id)
    {
        // Find the course by ID and pass it to the view
        $course = Course::findOrFail($id);
        return view('courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Find the course by ID and pass it to the view along with categories
        $course = Course::findOrFail($id);
        $categories = Category::all();
        return view('courses.edit', compact('course', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the course input
        $validated = $request->validate([
            'course' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'course_description' => 'required|string|max:500',
            'start_date' => 'required|date',
            'status' => 'required|string',
        ]);

        // Find the course and update its details
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
        // Find the course by ID and delete it
        $course = Course::findOrFail($id);
        $course->delete();

        return redirect()->route('courses.index')->with('success', 'Course deleted successfully!');
    }
}
