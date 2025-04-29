@extends('layout')

@section('content')
<div class="container mt-5">
    <h2>Add New Course</h2>

    @if ($errors->any())
        <div class="alert alert-danger mt-3">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Course Creation Form -->
    <form action="{{ route('courses.store') }}" method="POST" class="mt-4">
        @csrf

        <div class="form-group mb-3">
            <label for="course" class="form-label">Course Name:</label>
            <input type="text" name="course" id="course" class="form-control" required value="{{ old('course') }}" placeholder="Enter course name">
        </div>

        <div class="form-group mb-3">
            <label for="course_description" class="form-label">Course Description:</label>
            <textarea name="course_description" id="course_description" class="form-control" rows="4" placeholder="Enter a brief description of the course" required>{{ old('course_description') }}</textarea>
        </div>

        <div class="form-group mb-3">
            <label for="course_category" class="form-label">Course Category:</label>
            <select name="category_id" id="course_category" class="form-control" required>
                <option value="">Select Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->category_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="start_date" class="form-label">Start Date:</label>
            <input type="date" name="start_date" id="start_date" class="form-control" required value="{{ old('start_date') }}">
        </div>

        <div class="form-group mb-3">
            <label for="status" class="form-label">Course Status:</label>
            <select name="status" id="status" class="form-control" required>
                <option value="Active" {{ old('status') == 'Active' ? 'selected' : '' }}>Active</option>
                <option value="Inactive" {{ old('status') == 'Inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Save Course</button>
    </form>
</div>
@endsection
