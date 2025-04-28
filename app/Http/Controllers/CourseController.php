<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    // Display the list of courses
    public function index()
    {
        $courses = Course::all();
        return view('courses.index', compact('courses'));
    }

    // Show the form for creating a new course
    public function create()
    {
        return view('courses.create');
    }

    // Store the newly created course
    public function store(Request $request)
    {
        $validated = $request->validate([
            'course' => 'required|string|max:255',
        ]);

        Course::create($validated);

        return redirect()->route('courses.index')->with('success', 'Course added successfully!');
    }

    // Show the form for editing the course
    public function edit($id)
    {
        $course = Course::findOrFail($id);
        return view('courses.edit', compact('course'));
    }

    // Update the course in the database
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'course' => 'required|string|max:255',
        ]);

        $course = Course::findOrFail($id);
        $course->update($validated);

        return redirect()->route('courses.index')->with('success', 'Course updated successfully!');
    }

    // Delete the course
    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();

        return redirect()->route('courses.index')->with('success', 'Course deleted successfully!');
    }
}
