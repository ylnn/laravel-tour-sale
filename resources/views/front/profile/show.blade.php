@extends('layout.front') 
@section('content')
<div class="row">
    <div class="col-9">
        @include('front.includes.title', ['title' => 'Profili Göster'])

        <div class="bg-ligh p-4">
            <div class="row" >
                <div class="col-4 text-center">
                    <img src="holder.js/200x200" alt="">
                    <div class="text-center pt-3">
                        {{ $user->name }}
                    </div>
                    <div class="pt-3">
                        @if(auth()->id() == $user->id)
                        <a name="edit" id="edit" class="btn btn-warning" href="{{route('profile.edit')}}" role="button">Düzenle</a>
                        @endif
                    </div>
                </div>
                <div class="col p-2 px-4">
                        <div class="row mb-3">
                            <div class="col-5">Yazı sayısı:</div>
                            <div class="col">3</div>
                        </div> 
                        <div class="row mb-3">
                            <div class="col-5">İlan sayısı:</div>
                            <div class="col">7</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-5">Forum konu sayısı:</div>
                            <div class="col">12</div>
                        </div> 
                        <div class="row mb-3">
                            <div class="col-5">Forum cevap sayısı:</div>
                            <div class="col">32</div>
                        </div> 
                </div>
            </div>
            
            

        </div>

        </div>
    @include('front.includes.sidebar')
        </div>
@endsection