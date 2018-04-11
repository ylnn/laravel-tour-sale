@extends('layout.front') 

@section('content')
<h2>Popular Tours</h2>
<div class="popularTours">
    <ul>
        @foreach ($populars as $popular)
        <li>
            <div class="border">
                @if(isset($popular->photos[0]))
                    <img width="300" src="{{ asset('storage/' . $popular->photos[0]->filename ) }}">
                @else
                    <img src="holder.js/370x220">
                @endif
                <p>{{$popular->name}}</p>
                @php 
                    $tourDetailLink = route('tour', [$popular->id]) 
                @endphp
                <a class="btn btn-primary" href="{{$tourDetailLink}}" role="button">Tarihleri göster</a>
            </div>
        </li>
        @endforeach
    </ul>
</div>

@endsection