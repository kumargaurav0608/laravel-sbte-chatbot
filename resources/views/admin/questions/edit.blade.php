@extends('layouts.app')

@section('content')
<div class="backbtn">
        <a class="btn btn-primary my-2 mx-auto  p-2 " href="{{ route('admin.questions.index') }}">Back</a>
</div>
<div class="mx-auto border border-dark w-50 h-50 p-2 ">
    <P class="text-center text-dark fw-bold ">Create Category</P>
    <form method="POST" action="{{ route('admin.questions.store') }}" class="form ">
        @csrf
        <div class="form-group">
            <label for="id">Id</label>
            <input name="id" class="form-control" required>
        </div>


        <div class="form-group">
            <label for="Question">Question</label>
            <input name="question" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="Category">Category</label>
            <input name="category" class="form-control" required>
        </div>
        
        <button class="btn btn-primary my-2 mx-auto  p-2 ">Save</button>
    </form>

</div>
@endsection
