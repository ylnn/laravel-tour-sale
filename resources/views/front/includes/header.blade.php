<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    @isset($pageTitle)
        <title>{{$pageTitle}}</title>
    @else
        <title>TourSale Software with Laravel</title>
    @endif
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}" >
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/theme.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/lightslider.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/summernote/summernote-bs4.css')}}" rel="stylesheet">
    @stack('header_js')
</head>
<body>
    <div class="container">

        <header class="blog-header py-3">
            <div class="row flex-nowrap justify-content-between align-items-center">
                <div class="col-4 pt-1">
                </div>
                <div class="col-4 text-center">
                    <a href="{{route('home')}}">
                        <h1>TourSale Software</h1>
                    </a>
                </div>
                <div class="col-4 d-flex justify-content-end align-items-center">
                    
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
                @auth
                    <a class="p-3 text-muted" href="{{ route('admin.category.index') }}">Admin Panel</a>
                @else
                    <a class="p-3 text-muted" href="{{ route('login') }}">Admin Login</a>
                @endif
            </nav>
        </div>



     

