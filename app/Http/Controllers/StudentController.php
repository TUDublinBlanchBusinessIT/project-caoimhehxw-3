<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all(); // Get all students
        return view('students.index', compact('students')); // Pass to index view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::all();  // Fetch all courses for the select dropdown
        return view('students.create', compact('courses'));  // Pass to create student form
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate student input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:students',
            'course_id' => 'required|exists:courses,id', // Ensure the selected course exists
        ]);

        // Create the new student
        Student::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'course_id' => $validated['course_id'],  // Assign the course to the student
        ]);

        return redirect()->route('students.index')->with('success', 'Student added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $student = Student::with('course')->findOrFail($id); // Get student with related course
        return view('students.show', compact('student')); // Pass student data to view
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $student = Student::findOrFail($id);  // Get student
        $courses = Course::all();  // Get all courses for the select dropdown
        return view('students.edit', compact('student', 'courses'));  // Pass to edit form
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:students,email,' . $id,
            'course_id' => 'required|exists:courses,id', // Ensure the selected course exists
        ]);

        $student = Student::findOrFail($id); // Find student by ID
        $student->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'course_id' => $validated['course_id'],
        ]);

        return redirect()->route('students.index')->with('success', 'Student updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $student = Student::findOrFail($id);  // Find student by ID
        $student->delete();  // Delete student

        return redirect()->route('students.index')->with('success', 'Student deleted successfully!');
    }
}
