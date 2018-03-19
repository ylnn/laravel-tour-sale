@extends('layout.front') 
@section('content')
<div class="row">
    <div class="col-9">
        
        @include('front.includes.title',['title' => 'Giriş yap'])

        <div class="row">
            <div class="col-7">
                <div class="bg-light p-4" style="border: 1px solid silver;">
                    @include('front.includes.error')
                <form action="{{route('auth.login')}}" method="POST">
                        {{csrf_field()}} 
                        <div class="form-group">
                            <label for="email">E-posta</label>
                        <input type="text" name="email" id="email" class="form-control" value="{{ old('email') }}" placeholder="" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="" >
                        </div>

                        <div class="form-group">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Beni hatırla
                              </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-info">
                                   <i class="fa fa-check-square-o" aria-hidden="true"></i> Giriş yap 
                            </button>
                        </div>

                        <div class="form-group">
                            <div class="alert alert-info small" role="alert">
                            <strong>Üye değilseniz <a href="{{ route('auth.register') }}">buradan</a> kayıt olabilirsiniz.</strong>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    @include('front.includes.sidebar')
</div>
@endsection