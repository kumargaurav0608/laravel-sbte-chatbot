@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Categories</h2>
    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary mb-3">+ New Category</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Category Name</th>
                <th>Parent Id</th>
                <th>Order</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $category)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><strong>{{ $category->name }}</strong></td>
                    <td>
                        @if ($category->subcategories->count())
                            <ul class="mb-0">
                                @foreach ($category->subcategories as $sub)
                                    <li>{{ $sub->name }}</li>
                                @endforeach
                            </ul>
                        @else
                            <em>No subcategories</em>
                        @endif
                    </td>
                    <td>{{ $category->order }}</td>
                    <td>
                        <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-sm btn-warning">Edit</a>

                        <form method="POST" action="{{ route('admin.categories.destroy', $category) }}"
                              style="display:inline-block;" onsubmit="return confirm('Are you sure to delete this category?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No categories found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
