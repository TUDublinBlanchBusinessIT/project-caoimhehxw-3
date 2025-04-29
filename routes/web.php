<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CategoryController;

// Home route (redirect to students by default)
Route::get('/', function () {
    return redirect('/students');
});

// Student routes
Route::resource('students', StudentController::class);

// Course routes
Route::resource('courses', CourseController::class);

// Category routes for managing course categories
Route::resource('categories', CategoryController::class);

