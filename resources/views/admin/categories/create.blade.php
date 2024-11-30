@extends('admin.dashboard')
@section('create/edit-category')

    <div class="container">

        <form method="post" action="{{route('categories.store')}}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Category Name</label>
                <input type="text" class="form-control" id="name" name="name" >
            </div>
            <button type="submit" class="btn btn-primary">ADD</button>
        </form>
    </div>

@endsection
