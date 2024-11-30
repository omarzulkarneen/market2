@extends('user.home')
@section('all categories')



    <table class="table table-striped" style="width: 700px;margin-left: 300PX;">
        <thead>
        <tr>
            <th scope="col">name</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <td> <a href="{{route("categories.products",$category->id)}}" >{{$category->category_name}}</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>


@endsection


