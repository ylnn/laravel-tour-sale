@extends('layout.front') 

@section('content')
<h2>{{$tour->name}}</h2>
<img src="holder.js/370x220">
<p>{!!$tour->summary!!}</p>

<h4>Dates:</h4>
<div class="row">
    <div class="col-8">
        <table class="table">
            <thead>
                <th>@lang('frontLang.baslama-tarihi')</th>
                <th>@lang('frontLang.bitis-tarihi')</th>
                <th>@lang('frontLang.fiyat')</th>
                <th>@lang('frontLang.single-fiyat')</th>
            </thead>
                <tr>
                    <td>{{$date->start_date->format('d/m/Y')}}</td>
                    <td>{{$date->end_date->format('d/m/Y')}}</td>
                    <td>{{$date->price}} {{ $date->currency }}</td>
                    <td>{{$date->single_price}} {{ $date->currency }}</td>
                </tr>
        </table>
    </div>
</div>
<div id="app">
    <reservation-form-component></reservation-form-component>
</div>

@endsection