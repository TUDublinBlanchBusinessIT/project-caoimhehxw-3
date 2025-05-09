@extends('layout')

@section('content')
    <div class="form-container">
        <h2>Edit Course</h2>

        @if ($errors->any())
            <div class="alert alert-danger mt-3">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('courses.update', $course->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="course_name">Course Name</label>
                <input type="text" name="course_name" id="course_name" class="form-control" value="{{ old('course_name', $course->course_name) }}" required>
            </div>

            <div class="form-group">
                <label for="course_description">Course Description</label>
                <textarea name="course_description" id="course_description" class="form-control" required>{{ old('course_description', $course->course_description) }}</textarea>
            </div>

            <div class="form-group">
                <label for="start_date">Start Date</label>
                <input type="date" name="start_date" id="start_date" class="form-control" value="{{ old('start_date', $course->start_date) }}" required>
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="active" {{ old('status', $course->status) == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ old('status', $course->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>

            <button type="submit" class="btn btn-warning mt-3">Update Course</button>
        </form>
    </div>
@endsection
