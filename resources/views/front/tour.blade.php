@extends('layout.front') 

@section('content')
<h2>{{$tour->name}}</h2>
<img src="holder.js/370x220">
<p>{{ $tour->summary }}</p>

<h4>Dates:</h4>

{{ $tour->dates }}
@endsection