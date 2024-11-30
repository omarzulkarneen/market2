@extends('user.home')
@section('user shop')

    <div class="container d-flex gap-4 mt-4 flex-wrap">
        @foreach($products as $product)
            <div class="card" style="width: 18rem;">
                <img src="{{asset("/storage/product_image/$product->image")}}" class="card-img-top" alt="image not found">
                <div class="card-body">
                    <h5 class="card-title">{{$product->product_name}}</h5>
                    <p class="card-text">{{$product->description}}</p>
                    <span><b>{{$product->price}}{{"$"}}</b></span>
                </div>
                <div class="card-footer">
                    <a href="{{route('shops.show', $product->id)}}" class="btn btn-success vstack mb-2">show</a>
                </div>
            </div>

        @endforeach


    </div>
    <div class="d-flex justify-content-center mt-3">
        {{ $products->links() }}
    </div>
@endsection

