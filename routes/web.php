<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;

// Route for Students
Route::resource('students', StudentController::class);

// Route for Courses
Route::resource('courses', CourseController::class);

// Default route for the home page (students list or another view)
Route::get('/', function () {
    return redirect('/students');  // Redirect to students index page
});
