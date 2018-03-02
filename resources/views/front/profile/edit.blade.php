@extends('layout.front') 
@section('content')
<div class="row">
    <div class="col-9">
        @include('front.includes.title', ['title' => 'Profili Güncelle'])

        <div class="bg-ligh p-4">
            <div class="row" >
                <div class="col-4 text-center">
                    <img src="holder.js/200x200" alt="">
                    <div class="text-center pt-3">
                        {{$user->name}}
                    </div>
                    <div class="pt-3">
                    </div>
                </div>
                <div class="col p-2 px-4">
                        <div class="row mb-3">
                            <form method="POST" action="{{ route('profile.update') }}" style="width:100%;" enctype="multipart/form-data" >
                                    @include('front.includes.error')
                                {{ csrf_field() }}
                                <h3 class="border-bottom">Kişisel Bilgiler</h3>
                                <div class="form-group">
                                  <label for="name">Ad Soyad</label>
                                  <input type="text" class="form-control" name="name" id="name" placeholder="" value="{{$user->name}}">
                                </div>
                                <div class="form-group">
                                    <label for="username">Kullanıcı Adı</label>
                                    <input type="text" class="form-control" name="username" id="username" placeholder="" disabled value="{{$user->username}}">
                                </div>

                                <br>

                                <h3 class="border-bottom">Profil Fotoğrafı</h3>
                                <div class="form-group">
                                    <div class="form-group">
                                      <label for="photo">Yeni fotoğraf seçin</label>
                                      <input type="file" class="form-control-file" name="photo" id="photo" placeholder="" aria-describedby="fileHelpId">
                                      <p class="form-text text-muted small">
                                          Fotoğrafınız çok büyük olmamalı.
                                      </p>
                                    </div>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-info"><i class="fa fa-check-square-o" aria-hidden="true"></i> Kaydet</button>
                            </form>
                        </div> 
                </div>
            </div>
            
            

        </div>

        </div>
    @include('front.includes.sidebar')
        </div>
@endsection