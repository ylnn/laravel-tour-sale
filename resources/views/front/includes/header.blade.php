<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>TourSale Front</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}" >
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{asset('css/theme.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/lightslider.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/summernote/summernote-bs4.css')}}" rel="stylesheet">
    {{--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">  --}}
</head>
<body>
    <div class="container">

        <header class="blog-header py-3">
            <div class="row flex-nowrap justify-content-between align-items-center">
                <div class="col-4 pt-1">
                    <a class="text-muted" href="#">Subscribe</a>
                </div>
                <div class="col-4 text-center">
                    {{--  <a class="blog-header-logo text-dark" href="#">italya.org</a>  --}}
                    <a href="{{route('home')}}">
                        <h1>TourSale</h1>
                    </a>
                </div>
                <div class="col-4 d-flex justify-content-end align-items-center">
                    
                    <a class="text-muted" href="#">
                        <i class="fa fa-user-circle-o" aria-hidden="true" style="padding-right:10px;"></i>
                    </a>
                    @auth

                        <a href="{{ route('profile.show', ['id' => auth()->id()]) }}">
                            {{ auth()->user()->username }}
                        </a>
                        <a name="" id="" class="btn btn-sm btn-outline-secondary" style="margin-left:10px;" href="{{route('auth.logout')}}" role="button">Çıkış</a>
                    @endauth
                
                    @guest
                    <a class="btn btn-sm btn-outline-secondary" href="{{ route('auth.loginform') }}">Giriş yap</a>
                    &nbsp;
                    <a class="btn btn-sm btn-outline-secondary" href="{{ route('auth.register') }}">Kayıt ol</a>
                    @endguest

                </div>
            </div>
        </header>

        <div class="nav-scroller py-1 mb-5" style="">
            <nav class="nav d-flex ">
                @isset($categories)
                    @foreach ($categories as $category)
                        <a class="p-3 text-muted" href="{{ route('category', [$category->id]) }}">{{$category->name}}</a>
                    @endforeach
                @endif
            </nav>
        </div>



     

