@extends('layouts.app')

@section('content')
<div class="backbtn">
        <a class="btn btn-primary my-2 mx-auto  p-2 " href="{{ route('admin.categories.index') }}">Back</a>
</div>
<div class="mx-auto border border-dark w-50 h-50 p-2 ">
    <P class="text-center text-dark fw-bold ">Create Category</P>
    <form method="POST" action="{{ route('admin.categories.store') }}" class="form ">
        @csrf
        <label>Name: <input name="name" class="form-control" required></label><br>
        <label>Parent:
            <select name="parent_id" class="form-select">
                <option value="">None</option>
                @foreach ($parents as $p)
                    <option value="{{ $p->id }}">{{ $p->name }}</option>
                @endforeach
            </select>
        </label><br>
        <button class="btn btn-primary my-2 mx-auto  p-2 ">Save</button>
    </form>

</div>
@endsection
