@extends('layout')

@section('content')
<div class="container mt-5">
    <h2>All Courses</h2>

    <a href="{{ route('courses.create') }}" class="btn btn-primary mb-3">Add New Course</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Course Name</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($courses as $course)
                <tr>
                    <td>{{ $course->id }}</td>
                    <td>{{ $course->course }}</td>
                    <td>{{ $course->created_at->format('d M Y') }}</td>
                    <td class="d-flex gap-2">
                        <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('courses.destroy', $course->id) }}" method="POST" onsubmit="return confirm('Are you sure?');" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No courses found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
