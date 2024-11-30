@extends('user.home')
@section('show')

    <div class="card">
        <div class="card-header">
            Featured
        </div>
        <div class="card-body">
            <h5 class="card-title">product Name :  {{$products->product_name}}</h5><br>
            <h5 class="card-title">Description :  {{$products->description}}</h5><br>
            <h5 class="card-title">product Name :  {{$products->price}}</h5><br>
            <a href="{{route('shops.index')}}" class="btn btn-primary text-center mb-2">Products</a>

        </div>
    </div>
@endsection


