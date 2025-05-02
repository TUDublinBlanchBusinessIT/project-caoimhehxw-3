<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;

// Routes for Students
Route::resource('students', StudentController::class);  // Resource controller for students

// Routes for Courses
Route::resource('courses', CourseController::class);  // Resource controller for courses

