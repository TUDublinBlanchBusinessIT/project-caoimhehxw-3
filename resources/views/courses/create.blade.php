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

    <form action="{{ route('courses.store') }}" method="POST" class="mt-4">
        @csrf

        <div class="form-group mb-3">
            <label for="course">Course Name:</label>
            <input type="text" name="course" id="course" class="form-control" required value="{{ old('course') }}">
        </div>

        <button type="submit" class="btn btn-primary">Add Course</button>
    </form>
</div>
@endsection
