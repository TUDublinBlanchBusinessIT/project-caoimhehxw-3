@extends('layout')

@section('content')
<div class="container mt-5">
    <h2>Edit Student</h2>

    @if ($errors->any())
        <div class="alert alert-danger mt-3">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('students.update', $student->id) }}" method="POST" class="mt-4">
        @csrf
        @method('PUT') <!-- This ensures we send a PUT request for updating -->

        <!-- Name Field -->
        <div class="form-group mb-3">
            <label for="name">Student Name:</label>
            <input type="text" name="name" id="name" class="form-control" required value="{{ old('name', $student->name) }}">
        </div>

        <!-- Email Field -->
        <div class="form-group mb-3">
            <label for="email">Student Email:</label>
            <input type="email" name="email" id="email" class="form-control" required value="{{ old('email', $student->email) }}">
        </div>

        <!-- Date of Birth Field -->
        <div class="form-group mb-3">
            <label for="date_of_birth">Date of Birth:</label>
            <input type="date" name="date_of_birth" id="date_of_birth" class="form-control" required value="{{ old('date_of_birth', $student->date_of_birth) }}">
        </div>

        <!-- Course Selection -->
        <div class="form-group mb-3">
            <label for="course_id">Select Course:</label>
            <select name="course_id" id="course_id" class="form-control" required>
                <option value="">Select a Course</option>
                @foreach($courses as $course)
                    <option value="{{ $course->id }}" {{ $course->id == old('course_id', $student->course_id) ? 'selected' : '' }}>
                        {{ $course->course }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Update Student</button>
    </form>
</div>
@endsection
