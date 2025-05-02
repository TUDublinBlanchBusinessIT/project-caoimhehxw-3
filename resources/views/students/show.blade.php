@extends('layout')

@section('content')
<div class="container mt-5">
    <h2>Student Details</h2>

    <table class="table">
        <tr>
            <th>Name</th>
            <td>{{ $student->name }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $student->email }}</td>
        </tr>
        <tr>
            <th>Course</th>
            <td>{{ $student->course->course_name ?? 'No course assigned' }}</td>
        </tr>
    </table>

    <a href="{{ route('students.index') }}" class="btn btn-secondary">Back to Students</a>
    <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning">Edit Student</a>
</div>
@endsection
