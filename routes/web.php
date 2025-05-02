<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;

// Routes for Students
Route::get('students', [StudentController::class, 'index'])->name('students.index');   // List all students
Route::get('students/create', [StudentController::class, 'create'])->name('students.create');   // Show form to create a new student
Route::post('students', [StudentController::class, 'store'])->name('students.store');   // Store new student
Route::get('students/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');   // Show form to edit a student
Route::put('students/{id}', [StudentController::class, 'update'])->name('students.update');   // Update student
Route::delete('students/{id}', [StudentController::class, 'destroy'])->name('students.destroy');   // Delete student

// Routes for Courses
Route::get('courses', [CourseController::class, 'index'])->name('courses.index');   // List all courses
Route::get('courses/create', [CourseController::class, 'create'])->name('courses.create');   // Show form to create a new course
Route::post('courses', [CourseController::class, 'store'])->name('courses.store');   // Store new course
Route::get('courses/{id}', [CourseController::class, 'show'])->name('courses.show');   // Show a specific course
Route::get('courses/{id}/edit', [CourseController::class, 'edit'])->name('courses.edit');   // Show form to edit a course
Route::put('courses/{id}', [CourseController::class, 'update'])->name('courses.update');   // Update course
Route::delete('courses/{id}', [CourseController::class, 'destroy'])->name('courses.destroy');   // Delete course

