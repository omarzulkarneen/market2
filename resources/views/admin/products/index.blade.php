@extends('admin.dashboard')
@section('all products')

    <a href="{{route('products.create')}}" class="btn btn-success" style="padding-left: 50px ;padding-right: 50px; margin-left: 35rem;margin-top: 5rem; "> New Product</a>

    @if($products->isEmpty())
        <p class="text-center">products not founded</p>
    @else
        <div class="container d-flex gap-4 mt-4 flex-wrap">
            @foreach($products as $product)
                <div class="card" style="width: 18rem;">
                    <img src="{{"/storage/product_image/$product->image"}}" class="card-img-top" alt="image not found">
                    <div class="card-body">
                        <h5 class="card-title">{{$product->product_name}}</h5>
                        <p class="card-text">{{$product->description}}</p>
                        <span><b>{{$product->price}}{{"$"}}</b></span>

                        <div class="card-footer">
                            <a href="{{route('products.edit', $product->id)}}" class="btn btn-primary vstack mb-2">Edit</a>

                            <form  method="post" action="{{route('products.destroy',$product->id)}}" >
                                @csrf
                                @method('delete')
                                <diV class="vstack"><input type="submit" class="btn btn-danger" value="Delete"></diV>

                            </form>
                        </div>
                    </div>
                </div>

            @endforeach
        </div>
        <div class="d-flex justify-content-center mt-3">
            {{ $products->links() }}
        </div>
    @endif

    @endsection
