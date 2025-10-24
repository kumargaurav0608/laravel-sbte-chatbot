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
            <label for="Question">Question</label>
            <input name="question_text" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="Category">Category</label>
            <select name="category_id" id="category_id" class="form-select" required>
                    <option value="" selected disabled> Please Select</option>
                    @foreach ($category as $c )
                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                     @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="pqid">Parent Question ID</label>
            <select name="Parent_Ques_id" id="Parent_Ques_id" class="form-select text-dark" >
                    <option value="" selected disabled> Please Select</option>
                    @foreach ($questions as $q )
                        <option class="text-dark" value="{{ $q->id }}">{{ $q->question_text }}</option>
                     @endforeach
            </select>
        </div>





        
        
        <button class="btn btn-primary my-2 mx-auto  p-2 " type="submit">Save</button>
        <button class="btn btn-primary my-2 mx-auto  p-2 " type="reset">Reset</button>
    </form>

</div>
@endsection
