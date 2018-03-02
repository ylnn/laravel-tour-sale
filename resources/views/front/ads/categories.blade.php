@extends('layout.front')


@section('content')
<div class="row">
    <div class="col-9">
        <h1>İlan kategorileri</h1>

        <div class="categories">
            <div class="row">
                
                <div class="col-3 category-box">
                    <div class="card">
                        <div class="text-center pt-3">
                            <i class="card-img-top fa fa-3x fa-car" aria-hidden="true"></i>
                        </div>
                        <div class="card-body text-center">
                            <p class="card-text"><a href="{{route('ad.listing')}}">Category (10)</a></p>
                        </div>
                    </div>                
                </div>
                
                <div class="col-3 category-box">
                    <div class="card">
                        <div class="text-center pt-3">
                            <i class="card-img-top fa fa-3x fa-motorcycle" aria-hidden="true"></i>
                        </div>
                        <div class="card-body text-center">
                            <p class="card-text">Category (10)</p>
                        </div>
                    </div>                
                </div>

                <div class="col-3 category-box">
                    <div class="card">
                        <div class="text-center pt-3">
                            <i class="card-img-top fa fa-3x fa-car" aria-hidden="true"></i>
                        </div>
                        <div class="card-body text-center">
                            <p class="card-text">Category (10)</p>
                        </div>
                    </div>                
                </div>
                
                <div class="col-3 category-box">
                    <div class="card">
                        <div class="text-center pt-3">
                            <i class="card-img-top fa fa-3x fa-motorcycle" aria-hidden="true"></i>
                        </div>
                        <div class="card-body text-center">
                            <p class="card-text">Category (10)</p>
                        </div>
                    </div>                
                </div>

                 <div class="col-3 category-box">
                    <div class="card">
                        <div class="text-center pt-3">
                            <i class="card-img-top fa fa-3x fa-car" aria-hidden="true"></i>
                        </div>
                        <div class="card-body text-center">
                            <p class="card-text">Category (10)</p>
                        </div>
                    </div>                
                </div>
                
                <div class="col-3 category-box">
                    <div class="card">
                        <div class="text-center pt-3">
                            <i class="card-img-top fa fa-3x fa-motorcycle" aria-hidden="true"></i>
                        </div>
                        <div class="card-body text-center">
                            <p class="card-text">Category (10)</p>
                        </div>
                    </div>                
                </div>               
                <div class="col-3 category-box">
                    <div class="card">
                        <div class="text-center pt-3">
                            <i class="card-img-top fa fa-3x fa-car" aria-hidden="true"></i>
                        </div>
                        <div class="card-body text-center">
                            <p class="card-text">Category (10)</p>
                        </div>
                    </div>                
                </div>
                
                <div class="col-3 category-box">
                    <div class="card">
                        <div class="text-center pt-3">
                            <i class="card-img-top fa fa-3x fa-motorcycle" aria-hidden="true"></i>
                        </div>
                        <div class="card-body text-center">
                            <p class="card-text">Category (10)</p>
                        </div>
                    </div>                
                </div>
            </div>
        </div>

    </div>
    
        @include('front.includes.sidebar')
</div>
@endsection