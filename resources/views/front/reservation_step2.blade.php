@extends('layout.front') 

@push('footer_js')
    <script src="{{asset('js/price.js')}}"></script>
@endpush

@section('content')

<div class="row justify-content-center">
    <div class="col-8">
        @include('front.includes.tour_info', ['tour' => $tour])

        <table class="table">
            <thead>
                <th>@lang('frontLang.baslama-tarihi')</th>
                <th>@lang('frontLang.bitis-tarihi')</th>
                <th>@lang('frontLang.fiyat') (@lang('frontLang.kisi-basi'))</th>
                <th>@lang('frontLang.kisi-sayisi')</th>
                <th>@lang('frontLang.toplam-fiyat')</th>
            </thead>
                <tr>
                    <td>{{$date->start_date->format('d/m/Y')}}</td>
                    <td>{{$date->end_date->format('d/m/Y')}}</td>
                    <td>{{ $date->currency }} {{$date->price}}</td>
                    <td>{{$adult}}</td>
                    <td>{{$currency}} {{$total_price}}</td>
                </tr>
        </table>
    </div>
</div>


@endsection