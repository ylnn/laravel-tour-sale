
@extends('layout.front')


@section('content')

<div class="row">
    <div class="col-9">
        <h1>Sahibinden satılık az kullanılmış bisiklet</h1>

        <div class="ilan-info">
            <div class="row justify-content-start">
                <div class="col-3">
                    <div><i class="fa fa-calendar-o" aria-hidden="true"></i> 28.02.2018</div>
                </div>
                <div class="col-3">
                    <div><i class="fa fa-map-marker" aria-hidden="true"></i> Location</div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <ul id="lightSlider">
                    <li data-thumb="{{asset('images/thumb100.png')}}" data-src="holder.js/730x500">
                        <img src="holder.js/730x500" />
                    </li>
                    <li data-thumb="{{asset('images/thumb100.png')}}" data-src="holder.js/730x500">
                        <img src="holder.js/730x500" />
                    </li>
                    <li data-thumb="{{asset('images/thumb100.png')}}" data-src="holder.js/730x500">
                        <img src="holder.js/730x500" />
                    </li>
                </ul>
            </div>
        </div>

        <div class="owner mt-3">
            <div class="row">
                <div class="col-6">
                   <img src="holder.js/70x70" alt=""> 
                   İlan sahibi: <b>Yalın Çobanoğlu</b>
                </div>
                <div class="col-3 pt-2 ml-auto text-right">
                    <div class="price">
                        €8.021
                    </div>
                </div>
            </div>
        </div>


        <div class="ilan-details">
            <div class="row ilan-detail">
                <div class="col-3 ">
                    <span class="" style=" ">
                        <i class="ilan-icon fa fa-address-card-o " aria-hidden="true"></i> 
                    </span>
                    Kategori
                </div>
                <div class="col-9">
                    <div class="" style="line-height:32px;">
                        <p>Detail</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="ilan-description">
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Non rerum neque dicta magni explicabo, accusamus voluptas accusantium obcaecati animi deserunt!</p>
        </div>

        <div class="py-3">
            <button type="button" class="btn btn-info"><i class="fa fa-eye" aria-hidden="true"></i> İletişim bilgilerini göster</button>
        </div>

        <div class="ilan-con-info bg-light">
            <div class="row">
                <div class="col-1">
                    <i class="fa fa-phone" aria-hidden="true"></i>
                    
                </div>
                <div class="col">
                   012 123 123 123 
                </div>
            </div>
            <div style="height:10px;"></div>
            <div class="row">
                <div class="col-1">
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                    
                </div>
                <div class="col">
                    mail@mail.com
                </div>
            </div>
        </div>

    </div>

    @include('front.includes.sidebar')
</div>

@endsection