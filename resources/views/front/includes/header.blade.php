<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>italya.org | forumlar, yazılar & ilanlar</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}" >
    <link href="https://fonts.googleapis.com/css?family=Comfortaa|Open+Sans" rel="stylesheet">
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Custom styles for this template -->
    {{--  <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">  --}}
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
                        <img width="220" src="{{asset('images/italya.png')}}" alt="">
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
                <a class="p-3 text-muted" href="{{ route('forum.index') }}"><i class="fa fa-commenting-o" aria-hidden="true"></i> Forumlar</a>
                <a class="p-3 text-muted" href="{{ route('ad.categories') }}"><i class="fa fa-shopping-cart" aria-hidden="true"></i> İlanlar</a>
                <a class="p-3 text-muted" href="{{ route('ad.myads') }}"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Benim ilanlarım</a>
                <a class="p-3 text-muted" href="{{ route('post.index') }}"><i class="fa fa-file-text-o" aria-hidden="true"></i> Yazılar</a>
                <a class="p-3 text-muted" href="{{ route('profile.show', ['id' => 1]) }}"><i class="fa fa-file-text-o" aria-hidden="true"></i> Profil</a>
                <a class="p-3 text-muted" href="{{ route('profile.edit') }}"><i class="fa fa-file-text-o" aria-hidden="true"></i> Profili Düzenle</a>
            </nav>
        </div>



     