@extends('layout.front') 

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <h2>Popular Tours</h2>
            <div class="popularTours">
                <div class="row">
                    @foreach ($populars as $popular)
                    @php 
                        $tourDetailLink = route('tour', [$popular->id]) 
                    @endphp
                        <div class="col-4 border">
                            <a href="{{$tourDetailLink}}">
                                <div class="img-box">
                                    @if(isset($popular->photos[0]))
                                    <img width="200" src="{{ asset('storage/' . $popular->photos[0]->filename_thumb ) }}">
                                    @else
                                    <img src="holder.js/200x123">
                                    @endif
                                    <div class="title-on-image">
                                        {{str_limit($popular->name, 30)}}
                                    </div>
                                </div>
                            </a>
                            {{-- <a class="btn btn-default" href="{{$tourDetailLink}}" role="button">Tarihleri göster</a> --}}
                        </div>
                    @endforeach
                </div>
            </div>



        </div>
    </div>
</div>

@endsection