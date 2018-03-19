@extends('layout.front') 
@section('content')
<div class="row">
    <div class="col-9">
        
        @include('front.includes.title',['title' => 'Kayıt ol'])

        <div class="row">
            <div class="col-6">
                <div class="bg-light p-4" style="border: 1px solid silver;">

                    @include('front.includes.error')

                <form action="{{route('auth.save')}}" method="POST">

                        {{csrf_field()}}

                        <div class="form-group">
                            <input type="text" name="name" id="name" class="form-control" placeholder="Ad Soyad" autofocus>
                        </div>
                        <div class="form-group">
                            <input type="text" name="username" id="username" class="form-control" placeholder="Kullanıcı Adı">
                        </div>
                        <div class="form-group">
                            <input type="text" name="email" id="email" class="form-control" placeholder="E-posta" >
                        </div>
                        <div class="form-group">
                            <input type="text" name="password" id="password" class="form-control" placeholder="Şifre" >
                        </div>
                        <div class="form-group">
                            <input type="text" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Şifre (tekrar)" >
                        </div>

                        <div class="form-group">
                            <button class="btn btn-info">
                                   <i class="fa fa-check-square-o" aria-hidden="true"></i> Kayıt ol 
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    @include('front.includes.sidebar')
</div>
@endsection