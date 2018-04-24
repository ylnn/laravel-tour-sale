@extends('layout.front') 

@section('content')
<div class="row justify-content-center">
    <div class="col-12">
        <h2>Popular Tours</h2>
        <div class="popularTours">
            <ul>
                @foreach ($populars as $popular)
                @php 
                    $tourDetailLink = route('tour', [$popular->id]) 
                @endphp
                <li>
                    <div class="homepage_tour_div">
                        <a href="{{$tourDetailLink}}">
                        <div class="tour_main_header">{{str_limit($popular->name, 30)}}</div>

                            @if(isset($popular->photos[0]))
                            <img width="325" src="{{ asset('storage/' . $popular->photos[0]->filename_thumb ) }}">
                            @else
                            <img src="holder.js/325x200">
                            @endif
                        </a>
                        {{-- <a class="btn btn-default" href="{{$tourDetailLink}}" role="button">Tarihleri göster</a> --}}
                    </div>
                </li>
                @endforeach
            </ul>
        </div>



    </div>
</div>

@endsection