@extends('layout.front') @section('content')
<div class="row justify-content-center">
    <div class="col-8">
        <h2>{{$tour->name}}</h2>
        @if(isset($tour->photos[0]))
        <img src="{{ asset('storage/' . $tour->photos[0]->filename ) }}"> @else
        <img src="holder.js/325x200"> @endif
        <p>{!!$tour->summary!!}</p>

        <h4>@lang('frontLang.dates')</h4>
        @isset($tour->dates)
        <table class="table">
            <thead>
                <th>@lang('frontLang.start-date')</th>
                <th>@lang('frontLang.finish-date')</th>
                <th>@lang('frontLang.price')</th>
                <th>@lang('frontLang.single-price')</th>
                <th>@lang('frontLang.actions')</th>
            </thead>
            @foreach($tour->dates as $date)
            <tr>
                <td>{{$date->start_date->format('d/m/Y')}}</td>
                <td>{{$date->end_date->format('d/m/Y')}}</td>
                <td>{{$date->price}} {{ $date->currency }}</td>
                <td>{{$date->single_price}} {{ $date->currency }}</td>
                <td>
                    <a class="btn btn-info" href="{{route('reservation.show', [$date->id])}}" role="button">@lang('frontLang.make-reservation')</a>
                </td>
            </tr>
            @endforeach
        </table>
        @endif
    </div>
</div>
@endsection