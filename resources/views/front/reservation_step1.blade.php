@extends('layout.front') 

@push('footer_js')
    <script src="{{asset('js/price.js')}}"></script>
@endpush

@section('content')

<div class="row justify-content-center">
    <div class="col-8">
        @include('front.includes.tour_info')

        <table class="table">
            <thead>
                <th>@lang('frontLang.start-date')</th>
                <th>@lang('frontLang.finish-date')</th>
                <th>@lang('frontLang.price') (@lang('frontLang.per-pax'))</th>
            </thead>
                <tr>
                    <td>{{$date->start_date->format('d/m/Y')}}</td>
                    <td>{{$date->end_date->format('d/m/Y')}}</td>
                    <td>{{ $date->currency }} {{$date->price}}</td>
                </tr>
        </table>
    </div>
</div>
{{-- <div id="reservation">
    <reservation-form-component date_id = "123"></reservation-form-component>
</div> --}}
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Please select participant count</div>
                        <div class="card-body">
                            <div id="price">
                                <price-component 
                                    date_id={{$date->id}} 
                                    price={{$date->price}} 
                                    currency={{$date->currency}}
                                    step2_url={{url('reservation_step2')}}
                                    >
                                </price-component>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection