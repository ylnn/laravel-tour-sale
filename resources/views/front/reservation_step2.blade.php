@extends('layout.front') @push('footer_js') {{--
<script src="{{asset('js/reservation.js')}}"></script> --}} @endpush @section('content')

<div class="row justify-content-center">
    <div class="col-8">
        @include('front.includes.tour_info', ['tour' => $tour])

        <table class="table">
            <thead>
                <th>@lang('frontLang.start-date')</th>
                <th>@lang('frontLang.finish-date')</th>
                <th>@lang('frontLang.price') (@lang('frontLang.per-pax'))</th>
                <th>@lang('frontLang.pax')</th>
                <th>@lang('frontLang.total-price')</th>
            </thead>
            <tr>
                <td>{{$date->start_date->format('d/m/Y')}}</td>
                <td>{{$date->end_date->format('d/m/Y')}}</td>
                <td>{{ $date->currency }} {{$date->price}}</td>
                <td>{{$adult}}</td>
                <td>{{$currency}} {{$total_price}}</td>
            </tr>
        </table>

        <div class="card card-default">
            <div class="card-body">

                <form method="POST" action="{{url('reservation_post')}}">

                    <h3 class="res-form-header">@lang('frontLang.contact-information')</h3>

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="alert-ul">
                                @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="">@lang('frontLang.name-surname')</label>
                        <div class="row">
                            <div class="col-6">
                                <input type="text" name="name" id="name" class="form-control" placeholder="" autofocus>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">@lang('frontLang.phone')</label>
                        <div class="row">
                            <div class="col-6">
                                <input type="text" name="phone" id="phone" class="form-control" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">@lang('frontLang.email')</label>
                        <div class="row">
                            <div class="col-6">
                                <input type="text" name="email" id="email" class="form-control" placeholder="">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="address">@lang('frontLang.address')</label>
                        <div class="row">
                            <div class="col-6">
                                <textarea class="form-control" name="address" id="address" rows="3"></textarea>
                            </div>
                        </div>
                    </div>

                    <div style="margin-bottom:50px"></div>

                    <h3 class="res-form-header">@lang('frontLang.pax-information')</h3>

                        {{ csrf_field() }} @for ($i = 0; $i
                        < $adult; $i++) <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label for="">@lang('frontLang.gender')</label>
                                    <br>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-info active">
                                            <input type="radio" name="pax[{{$i}}][gender]" id="option1" value="mr" autocomplete="off" checked> Mr
                                        </label>
                                        <label class="btn btn-info">
                                            <input type="radio" name="pax[{{$i}}][gender]" id="option2" value="mrs" autocomplete="off"> Mrs
                                        </label>
                                        <label class="btn btn-info">
                                            <input type="radio" name="pax[{{$i}}][gender]" id="option3" value="miss" autocomplete="off"> Miss
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-5 col-md-5 col-sm-12">
                                <div class="form-group">
                                    <label for="">@lang('frontLang.name')</label>
                                    <input type="text" name="pax[{{$i}}][name]" id="pax{{$i}}" class="form-control" aria-describedby="helpId">
                                </div>

                            </div>
            </div>
            <hr> @endfor
            <div class="row">
                <div class="col align-self-end">
                    <button type="submit" class="btn btn-success btn-lg">@lang('frontLang.complete-res')</button>
                </div>
            </div>

            <input type="hidden" name="pax_count" value="{{$adult}}">
            <input type="hidden" name="date_id" value="{{$date->id}}">
            </form>
        </div>
    </div>


</div>
</div>


@endsection