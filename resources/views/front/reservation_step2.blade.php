@extends('layout.front') 

@push('footer_js')
    {{-- <script src="{{asset('js/reservation.js')}}"></script> --}}
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

        <div class="card card-default">
            <div class="card-body">
                
                <form method="POST" action="{{url('reservation_post')}}">

                <h3 class="res-form-header">İletişim Bilgileri</h3>
                <div class="form-group">
                  <label for="">Ad Soyad:</label>
                  <input type="text" name="name" id="name" class="form-control" placeholder="">
                </div>
                <div class="form-group">
                  <label for="">E-posta Adresi:</label>
                  <input type="text" name="email" id="email" class="form-control" placeholder="">
                </div>

                <div class="form-group">
                  <label for="address">Adres:</label>
                  <textarea class="form-control" name="address" id="address" rows="3"></textarea>
                </div>

                <div style="margin-bottom:50px"></div>

                <h3 class="res-form-header">Katılımcı Bilgileri</h4>
                <br>
                    {{ csrf_field() }}
                    @for ($i = 0; $i < $adult; $i++)
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2"><label for="">Katılımcı:</label></div>
                                <div class="col-md-3">
                                    <select name="gender[{{$i}}]" id="gender{{$i}}" class="form-control">
                                        <option value="mr">Mr.</option>
                                        <option value="mrs">Mrs.</option>
                                        <option value="miss">Ms.</option>
                                    </select>
                                </div>
                                <div class="col-md-5">
                                    <input type="text" name="pax[{{$i}}]" id="pax{{$i}}" class="form-control" placeholder="Ad Soyad" aria-describedby="helpId">
                                </div>
                            </div>
                            
                        </div>
                    @endfor
                    <div class="row">
                        <div class="col align-self-end">
                            <button type="submit" class="btn btn-primary btn-lg">Gönder</button>
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