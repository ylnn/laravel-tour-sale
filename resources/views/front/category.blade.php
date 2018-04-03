@extends('layout.front')

@section('content')
    <h2>{{$category->name}}</h2>

    @isset($tours)
        <ul class="tour-list">
            @foreach ($tours as $tour)
                <li class="border">
                    <div class="row">
                        <div class="col-2">
                            <img src="holder.js/170x120">
                        </div>
                        <div class="col">
                            <h5>{{$tour->name}}</h5>
                            <p>{{$tour->summary}}</p>
                            <p>
                                <a name="" id="" class="btn btn-primary" href="#" role="button">Tarihleri göster</a>
                            </p>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    @endisset
@endsection