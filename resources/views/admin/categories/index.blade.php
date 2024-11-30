
@extends('admin.dashboard')
@section('all categories')

<a href="{{route('categories.create')}}" class="btn btn-success text-center " style="padding-left: 50px ;padding-right: 50px; margin-left: 35rem;margin-top: 5rem; ">Add new category</a>
<div>
    @if($categories->isEmpty())
        <p class="text-center">categories not founded</p>
    @else
        <table class="table table-striped" style="width: 700px;margin-left: 300PX;">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">name</th>
                <th scope="col" style="padding-left: 142px;">action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>

                    <td>{{$category->id}}</td>
                    <td>{{$category->category_name}}</td>
                    <td>

                        <a href="{{route('categories.edit', $category->id)}}" class="btn btn-primary" style="margin-left: 100px">Edit</a>

                        <form style="display: inline;" method="post" action="{{route('categories.destroy',$category->id)}}" class="d-inline">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif

  </div>
@endsection
