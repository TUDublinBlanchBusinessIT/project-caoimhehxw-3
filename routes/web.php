<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;

// Route for the students index page (show all students)
Route::resource('students', StudentController::class);

// Route for the courses index page (show all courses)
Route::resource('courses', CourseController::class);

// Redirect to the students page by default
Route::get('/', function () {
    return redirect('/students'); // Redirect the root to the students page
});
