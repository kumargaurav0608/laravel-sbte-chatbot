@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Answer</h2>

    <form action="{{ route('admin.answers.update', $answer->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="question_id" class="form-label">Question</label>
            <select name="question_id" class="form-select" required>
                @foreach($questions as $q)
                    <option value="{{ $q->id }}" {{ $answer->question_id == $q->id ? 'selected' : '' }}>
                        {{ $q->question_text }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="answer_text" class="form-label">Answer</label>
            <input type="text" class="form-control" name="answer_text" value="{{ $answer->answer_text }}" required>
        </div>

        

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
