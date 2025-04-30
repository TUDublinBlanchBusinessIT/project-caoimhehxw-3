@extends('layout')

@section('content')
<div class="container mt-5">
    <h2>Category Details</h2>

    <table class="table table-bordered">
        <tr>
            <th>Category Name</th>
            <td>{{ $category->category_name }}</td>
        </tr>
        <tr>
            <th>Created At</th>
            <td>{{ $category->created_at->format('d M Y') }}</td>
        </tr>
    </table>

    <a href="{{ route('categories.index') }}" class="btn btn-secondary">Back to Categories</a>
    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning">Edit Category</a>
</div>
@endsection
