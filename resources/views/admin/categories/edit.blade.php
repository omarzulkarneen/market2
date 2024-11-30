@extends('admin.dashboard')
@section('create/edit-category')

    <div class="container">

        <form method="post" action="{{route('categories.update',$element->id)}}">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="name" class="form-label">Category Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$element->category_name}}">
            </div>
            <button type="submit" class="btn btn-primary">update</button>
        </form>
    </div>

@endsection
