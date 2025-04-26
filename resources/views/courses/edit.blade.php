@extends('layout')

@section('content')
<div class="container mt-5">
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

    <form action="{{ route('courses.update', $course->id) }}" method="POST" class="mt-4">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="course">Course Name:</label>
            <input type="text" name="course" id="course" class="form-control" value="{{ old('course', $course->course) }}" required>
        </div>
        <button type="submit" class="btn btn-success mt-3">Update Course</button>
    </form>
</div>
@endsection
