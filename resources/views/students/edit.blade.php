@extends('layout')

@section('content')
<div class="container mt-5">
    <h2>Edit Student</h2>

    <form action="{{ route('students.update', $student->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Name</label>
            <input name="name" type="text" class="form-control" value="{{ $student->name }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input name="email" type="email" class="form-control" value="{{ $student->email }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Date of Birth</label>
            <input name="date_of_birth" type="date" class="form-control" value="{{ $student->date_of_birth }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Student</button>
    </form>
</div>
@endsection
