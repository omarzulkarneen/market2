@extends('auth.layout.auth')
@section('register')
    <div class="container mt-5">
        <form method="post" action="{{route('auth.store')}}">
            @csrf
            <div class="mb-3">
                <label for="exampleInputName1" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" >
            </div>
            @error('name')
            <span class="d-block text-success">{{$message}}</span>
            @enderror
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="text" class="form-control" id="email" name="email" >
            </div>
            @error('email')
            <span class="d-block text-success">{{$message}}</span>
            @enderror
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            @error('password')
            <span class="d-block text-success">{{$message}}</span>
            @enderror
            <button type="submit" class="btn btn-primary">register</button>
            <a href="{{route('auth.login')}}" class="text-danger d-block mt-4" > already have an account</a>
        </form>
    </div>
@endsection

