<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // Display all students
    public function index()
    {
        $students = Student::all();  // Retrieve all students
        return view('students.index', compact('students'));
    }

    // Show the form for creating a new student
    public function create()
    {
        $courses = Course::all(); // Retrieve all courses
        return view('students.create', compact('courses'));
    }

    // Store a newly created student
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students',
            'course_id' => 'required|exists:courses,id',  // Validate that course_id exists in courses table
        ]);

        // Create a new student
        Student::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'course_id' => $validated['course_id'],
        ]);

        return redirect()->route('students.index')->with('success', 'Student added successfully!');
    }

    // Display the specified student
    public function show($id)
    {
        $student = Student::findOrFail($id);  // Find the student by ID
        return view('students.show', compact('student'));
    }

    // Show the form for editing the specified student
    public function edit($id)
    {
        $student = Student::findOrFail($id);  // Find the student by ID
        $courses = Course::all(); // Get all courses for the dropdown
        return view('students.edit', compact('student', 'courses'));
    }

    // Update the specified student
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'course_id' => 'required|exists:courses,id',  // Validate that course_id exists
        ]);

        $student = Student::findOrFail($id); // Find the student by ID
        $student->update($validated);

        return redirect()->route('students.index')->with('success', 'Student updated successfully!');
    }

    // Remove the specified student from storage
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted successfully!');
    }
}
