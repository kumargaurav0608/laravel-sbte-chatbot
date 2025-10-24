
<!-- For Admin View  -->

@extends('layouts.app')

@section('content')
<div>
  <p class="text-center fst-italic bold">Answers List</p>
  <a href="{{ route('admin.answers.create') }}" class="btn btn-primary">+ New Answer</a>


  <table class="table table-bordered">
      <thead>
          <tr>
              <th>Id</th>
              <th>Question Id</th>
              <th>Question</th>
              <th>Answer</th>
              <th colspan="3" class="text-center">Action</th>
          </tr>
      </thead>
      <tbody>
        @foreach ($answers as $a )
          <tr>
            <td>{{ $a->id }}</td>
            <td>{{ $a->question_id }}</td> {{-- Consider showing question text instead of id if possible --}}
             <td>{{ $a->question ? $a->question->question_text : 'N/A' }}</td>  {{-- show question text --}}
            <td>{{ $a->answer_text }}</td>
            
            
            <td><a href="{{ route('admin.answers.edit', $a) }}" class="btn btn-sm btn-primary">Edit</a></td>
            
             <form method="POST" action="{{ route('admin.answers.destroy', $a) }}"
                              style="display:inline-block;" onsubmit="return confirm('Are you sure to delete this answer?')">
                            @csrf
                            @method('DELETE')
              <td><button class="btn btn-sm btn-danger">Delete</button></td>
              </form>
          </tr>
        @endforeach
      </tbody>
  </table>
</div>
@endsection
