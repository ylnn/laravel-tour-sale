@extends('layout.admin')

@section('content')
    <h2>@lang('admin.tur') @lang('admin.duzenle')</h2>
    <form method="POST" action="{{ route($baseRoute . '.update', ['tour' => $tour->id]) }}">
        {{csrf_field()}}
        <div class="row">
            <div class="col-6">
                
            </div>
            <div class="col-6">

            </div>
        </div>
       <div class="row">
           <div class="col-3">
               <div class="form-group">
                <label for="status">@lang('admin.durum')</label>
                <select class="form-control" name="status" id="status">
                    <option value="1" @if($tour->status == 1) selected @endif >@lang('admin.yayinda')</option>
                    <option value="0" @if($tour->status == 0) selected @endif >@lang('admin.yayinda-degil')</option>
                </select>
            </div>
           </div>
           <div class="col-3"></div>
       </div> 
       <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="name">@lang('admin.tur-adi')</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{$tour->name}}" autofocus required>
                </div>
            </div>
       </div>
       <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="slug">@lang('admin.tur-seo-adi')</label>
                    <input type="text" class="form-control" id="slug" name="slug" value="{{$tour->slug}}">
                </div>
            </div>
       </div>
       <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="summernote">@lang('admin.tur-aciklamasi-kisa') </label>
                    <textarea id="summernote-short" name="summary">{{ $tour->summary }}</textarea>
                </div>
            </div>
       </div>
       <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="summernote">@lang('admin.tur-aciklamasi-tamami')</label>
                    <textarea id="summernote" name="description">{{ $tour->description }}</textarea>
                </div>
            </div>
       </div>
        <button type="submit" class="btn btn-primary">@lang('admin.kaydet')</button>
        <a href="{{ url()->previous() }}" class="btn btn-secondary">@lang('admin.iptal')</a>
    
        <input type="hidden" name="previous" value="{{ url()->previous() }}">
    </form>
@endsection