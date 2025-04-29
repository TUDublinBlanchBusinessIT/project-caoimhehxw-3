@extends('layout')

@section('content')
<div class="container mt-5">
    <h2>Add New Course</h2>

    <form action="{{ route('courses.store') }}" method="POST">
        @csrf

        <div class="form-group mb-3">
            <label for="course">Course Name:</label>
            <input type="text" name="course" class="form-control" value="{{ old('course') }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="course_description">Course Description:</label>
            <textarea name="course_description" class="form-control" required>{{ old('course_description') }}</textarea>
        </div>

        <div class="form-group mb-3">
            <label for="category_id">Course Category:</label>
            <select name="category_id" class="form-control" required>
                <option value="">Select Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="start_date">Start Date:</label>
            <input type="date" name="start_date" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label for="status">Course Status:</label>
            <select name="status" class="form-control" required>
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Save Course</button>
    </form>
</div>
@endsection
