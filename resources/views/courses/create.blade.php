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

    <!-- Start Course Form -->
    <form action="{{ route('courses.store') }}" method="POST" class="mt-4">
        @csrf

        <div class="form-group mb-3">
            <label for="course" class="form-label">Course Name:</label>
            <input type="text" name="course" id="course" class="form-control" required value="{{ old('course') }}" placeholder="Enter course name">
        </div>

        <!-- Adding More UI Features: Tooltips -->
        <div class="form-group mb-3">
            <label for="course_description" class="form-label">Course Description:</label>
            <textarea name="course_description" id="course_description" class="form-control" rows="4" placeholder="Enter a brief description of the course" required>{{ old('course_description') }}</textarea>
        </div>

        <!-- Adding a Select Dropdown for Category or Type (optional) -->
        <div class="form-group mb-3">
            <label for="course_category" class="form-label">Course Category:</label>
            <select name="course_category" id="course_category" class="form-control" required>
                <option value="">Select Category</option>
                <option value="Technology" {{ old('course_category') == 'Technology' ? 'selected' : '' }}>Technology</option>
                <option value="Science" {{ old('course_category') == 'Science' ? 'selected' : '' }}>Science</option>
                <option value="Arts" {{ old('course_category') == 'Arts' ? 'selected' : '' }}>Arts</option>
                <option value="Business" {{ old('course_category') == 'Business' ? 'selected' : '' }}>Business</option>
            </select>
        </div>

        <!-- Date Picker for Course Start Date -->
        <div class="form-group mb-3">
            <label for="start_date" class="form-label">Start Date:</label>
            <input type="date" name="start_date" id="start_date" class="form-control" required value="{{ old('start_date') }}">
        </div>

        <!-- Add Toggle for Active or Inactive Status -->
        <div class="form-group mb-3">
            <label for="status" class="form-label">Course Status:</label>
            <select name="status" id="status" class="form-control" required>
                <option value="Active" {{ old('status') == 'Active' ? 'selected' : '' }}>Active</option>
                <option value="Inactive" {{ old('status') == 'Inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Save Course</button>
    </form>
    <!-- End Course Form -->
</div>
@endsection
