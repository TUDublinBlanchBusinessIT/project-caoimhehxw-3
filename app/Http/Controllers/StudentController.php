<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Course;

class StudentController extends Controller
{
    /**
     * Display a listing of the students.
     */
    public function index(Request $request)
    {
        // Fetch students, optionally filter by search query
        $students = Student::when($request->search, function ($query) use ($request) {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%');
        })->get();

        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new student.
     */
    public function create()
    {
        $courses = Course::all(); // Fetch all courses for the dropdown
        return view('students.create', compact('courses')); // Pass courses to the view
    }

    /**
     * Store a newly created student in storage.
     */
    public function store(Request $request)
    {
        // Validate form input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'date_of_birth' => 'required|date',
            'course_id' => 'required|exists:courses,id', // Validate course_id exists in courses table
        ]);

        // Create the student record
        Student::create($validated);

        return redirect()->route('students.index')->with('success', 'Student added successfully!');
    }

    /**
     * Show the form for editing the specified student.
     */
    public function edit($id)
    {
        $student = Student::findOrFail($id); // Find student by ID
        $courses = Course::all(); // Fetch all courses for dropdown

        return view('students.edit', compact('student', 'courses')); // Pass student and courses to the view
    }

    /**
     * Update the specified student in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate form input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $id, // Ignore current student for email uniqueness
            'date_of_birth' => 'required|date',
            'course_id' => 'required|exists:courses,id', // Validate course_id exists in courses table
        ]);

        // Find and update student record
        $student = Student::findOrFail($id);
        $student->update($validated);

        return redirect()->route('students.index')->with('success', 'Student updated successfully!');
    }

    /**
     * Remove the specified student from storage.
     */
    public function destroy($id)
    {
        // Find and delete student record
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted successfully!');
    }
}
