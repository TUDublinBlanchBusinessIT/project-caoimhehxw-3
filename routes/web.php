<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;

Route::resource('courses', CourseController::class);


Route::get('/', function () {
    return redirect('/students');
});

Route::resource('students', StudentController::class);
Route::resource('courses', CourseController::class);
