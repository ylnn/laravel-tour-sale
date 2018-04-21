@extends('layout.front') 

@push('footer_js')
    <script src="{{asset('js/reservation.js')}}"></script>
@endpush

@section('content')

<div class="row justify-content-center">
    <div class="col-8">
        <div class="tour-info">
            <h2>{{$tour->name}}</h2>
            @if(isset($tour->photos[0]))
                <img width="300" src="{{ asset('storage/' . $tour->photos[0]->filename ) }}">
            @else
                <img src="holder.js/370x220">
            @endif
            <p>{!!$tour->summary!!}</p>
        </div>

        <table class="table">
            <thead>
                <th>@lang('frontLang.baslama-tarihi')</th>
                <th>@lang('frontLang.bitis-tarihi')</th>
                <th>@lang('frontLang.fiyat') (@lang('frontLang.kisi-basi'))</th>
            </thead>
                <tr>
                    <td>{{$date->start_date->format('d/m/Y')}}</td>
                    <td>{{$date->end_date->format('d/m/Y')}}</td>
                    <td>{{$date->price}} {{ $date->currency }}</td>
                </tr>
        </table>
    </div>
</div>
<div id="reservation">
    <reservation-form-component date_id = "123"></reservation-form-component>
</div>

@endsection