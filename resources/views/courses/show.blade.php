@extends('layout')

@section('content')
<div class="container mt-5">
    <h2>Course Details</h2>

    <table class="table table-bordered">
        <tr>
            <th>Course Name</th>
            <td>{{ $course->course_name }}</td>
        </tr>
        <tr>
            <th>Description</th>
            <td>{{ $course->course_description }}</td>
        </tr>
        <tr>
            <th>Start Date</th>
            <td>{{ $course->start_date }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>{{ $course->status }}</td>
        </tr>
    </table>

    <a href="{{ route('courses.index') }}" class="btn btn-secondary">Back to Courses</a>
    <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-warning">Edit Course</a>
</div>
@endsection
