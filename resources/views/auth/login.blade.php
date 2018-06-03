@extends('layout.front')

@section('content')
        <div class="row d-flex justify-content-center">
            <div class="col-4">

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="alert-ul">
                            @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form class="bg-light p-4" method="POST" action="{{route('loginpost')}}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="text" name="email" id="email" class="form-control" placeholder="E-mail">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-secondary">Login</button>
                    </div>
                </form>
            </div>
        </div>
@endsection