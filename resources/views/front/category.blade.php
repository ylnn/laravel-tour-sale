@extends('layout.front')

@section('content')
    <h2>{{$category->name}}</h2>

    @isset($tours)
        <ul>
            @foreach ($tours as $tour)
                <li>
                    {{$tour->name}}
                </li>
            @endforeach
        </ul>
    @endisset
@endsection