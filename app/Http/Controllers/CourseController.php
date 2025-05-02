<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get all courses (no category relationship needed anymore)
        $courses = Course::all();
        return view('courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // No categories to pass anymore, just the course creation form
        return view('courses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate course input (no category validation anymore)
        $validated = $request->validate([
            'course_name' => 'required|string|max:255',
            'course_description' => 'required|string|max:500',
            'start_date' => 'required|date',
            'status' => 'required|string',
        ]);

        // Create the new course (no category_id required)
        Course::create([
            'course_name' => $validated['course_name'],
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
        // Find the course by ID
        $course = Course::findOrFail($id);
        return view('courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Find the course by ID and pass to the edit view
        $course = Course::findOrFail($id);
        return view('courses.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate course input (no category validation anymore)
        $validated = $request->validate([
            'course_name' => 'required|string|max:255',
            'course_description' => 'required|string|max:500',
            'start_date' => 'required|date',
            'status' => 'required|string',
        ]);

        // Find the course and update it
        $course = Course::findOrFail($id);
        $course->update([
            'course_name' => $validated['course_name'],
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
