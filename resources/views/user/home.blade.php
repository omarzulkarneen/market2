<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('/assets/css/bootstrap.css')}}">
    <title>home</title>
    <style>
        .justify-content-between >div:last-child >div:first-child{
            display: none;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><b>SHOP</b></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('shops.index')}}">products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{route('CATEGORIES.INDEX')}}">categories</a>
                </li>
            </ul>
            <form class="d-flex" role="search" action="{{route("product.Search")}}">
                <input class="form-control me-2" type="search" name="q" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>

            @if(Auth()->user())
                <form method="post" action="{{route('auth.logout')}}">
                    @csrf
                    <input type="submit" class="btn btn-secondary me-3" value="logout">
                </form>
                <span><b>{{Str::of(Auth()->user()->name)}}</b></span>
            @else
                <a class="btn btn-secondary me-3" href="{{route('auth.login')}}">login</a>
            @endif

{{--            @if(Auth::user()->role==='user'){--}}
{{--            <span><b>User</b></span>--}}
{{--            }--}}
{{--            @endif--}}

        </div>
    </div>
</nav>

@yield('user shop')
@yield('all categories')
@yield('show')

<script src="{{asset('/assets/js/bootstrap.bundle.js')}}"></script>
</body>
</html>
