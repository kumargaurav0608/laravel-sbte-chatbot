@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h2>Questions</h2>

        <a href="{{ route('admin.questions.create') }}" class="btn btn-primary mb-3">+ New Question</a>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Question</th>
                    <th>Category</th>
                    <th>Parent Question Id</th>
                    <th>Order</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($questions as $q)
                    <tr>
                        <td>{{ $q->id }}</td>
                        <td>{{ $q->question_text }}</td>
                        <td>{{ $q->category->name ?? 'N/A' }}</td>
                        <td>{{ $q->parent_question_id }}</td>
                        <td>{{ $q->order}}</td>
                        <td>
                            <a href="{{ route('admin.questions.edit', $q) }}" class="btn btn-sm btn-warning">Edit</a>
                            
                             <form method="POST" action="{{ route('admin.questions.destroy', $q) }}"
                              style="display:inline-block;" onsubmit="return confirm('Are you sure to delete this category?')">
                            @csrf
                            @method('DELETE')
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">No questions found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
