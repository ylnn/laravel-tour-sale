@extends('layout.front')


@section('content')

    <div class="row">
        <div class="col-9">
            <h1>İlanlarım</h1>
            @include('front.includes.ad_list_item_links')
            @include('front.includes.ad_list_item_links')
        </div>


        @include('front.includes.sidebar')

    </div>


    
@endsection