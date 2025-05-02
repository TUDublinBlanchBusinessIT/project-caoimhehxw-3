<?php
<!-- resources/views/courses/create.blade.php -->
@extends('layout')

@section('content')
<div class="container mt-5">
    <h2>Create Course</h2>

    <form action="{{ route('courses.store') }}" method="POST" class="mt-4">
        @csrf
        <div class="form-group">
            <label for="course_name">Course Name:</label>
            <input type="text" name="course_name" id="course_name" class="form-control" required>
        </div>

        <div class="form-group mt-3">
            <label for="course_description">Course Description:</label>
            <textarea name="course_description" id="course_description" class="form-control" required></textarea>
        </div>

        <div class="form-group mt-3">
            <label for="start_date">Start Date:</label>
            <input type="date" name="start_date" id="start_date" class="form-control" required>
        </div>

        <div class="form-group mt-3">
            <label for="status">Status:</label>
            <select name="status" id="status" class="form-control" required>
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success mt-3">Create Course</button>
    </form>
</div>
@endsection
