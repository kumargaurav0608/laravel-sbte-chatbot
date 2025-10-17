@extends('layouts.app')

@section('content')
<div class="form-container w-50 m-auto border p-2 m-2 border-dark">
    <form action="{{ route('admin.answers.store') }}" method="post">
    @csrf
        <div class="form-group">
            <div class="question">
                <label for="Question">Question</label>
                 <select name="question" id="question" class="form-select" required>
                    <option value="" selected disabled> Please Select</option>
                    @foreach ($questions as $q )
                        <option value="{{ $q->id }}">{{ $q->question_text }}</option>
                     @endforeach
                 </select>
            </div>
        </div>

        <div class="form-group">
            <div class="Answer">
                <label for="Answer">Answer</label>
               <input type="text" name="answer" class="form-control" required>
            </div>
        </div>
        
        <div class="form-group">
            <button class="btn btn-primary p-2 m-2 " type="submit">Save</button>
        </div>
        
    </form>

</div>
@endsection