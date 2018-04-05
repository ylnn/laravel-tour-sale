@extends('layout.admin')

@section('content')
    <h2>@lang('admin.tur') @lang('admin.olustur')</h2>
    
    <div class="row">
        <div class="col-6">
        <form method="POST" action="{{ route($baseRoute . '.store') }}">
                {{csrf_field()}}
                <div class="form-group" style="width: 50%">
                  <label for="status">@lang('admin.durum')</label>
                  <select class="form-control" name="status" id="status">
                    <option value="1">@lang('admin.yayinda')</option>
                    <option value="0">@lang('admin.yayinda-degil')</option>
                  </select>
                </div>

                <div class="form-group" style="width: 50%">
                    <label for="name">@lang('admin.kategori')</label>
                    <select name="category_id" id="category_id" class="form-control">
                      @isset($categories)
                        @foreach ($categories as $category)
                          <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                      @endif
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">@lang('admin.tur-adi')</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" autofocus required>
                </div>
                <div class="form-group">
                    <label for="slug">@lang('admin.tur-seo-adi')</label>
                    <input type="text" class="form-control" id="slug" name="slug">
                </div>
                <div class="form-group">
                    <label for="summernote">@lang('admin.tur-aciklamasi-kisa') </label>
                    <textarea id="summernote-short" name="summary"></textarea>
                </div>
                <div class="form-group">
                    <label for="summernote">@lang('admin.tur-aciklamasi-tamami')</label>
                    <textarea id="summernote" name="description"></textarea>
                </div>
{{--                  <div class="form-group">
                  <label for="min-participant">@lang('admin.min-katilimci') * @lang('admin-bosolabilir')</label>
                  <input type="number" name="min-participant" id="min-participant" class="form-control">
                </div>
                <div class="form-group">
                  <label for="max-participant">@lang('admin.max-katilimci') * @lang('admin-bosolabilir')</label>
                  <input type="number" name="max-participant" id="max-participant" class="form-control">
                </div>
                <div class="form-group">
                  <label for="price">@lang('admin.fiyat') * @lang('admin-bosolabilir')</label>
                  <input type="number" name="price" id="price" class="form-control">
                </div>
                <div class="form-group">
                  <label for="single_price">@lang('admin.single-fiyat') * @lang('admin-bosolabilir')</label>
                  <input type="number" name="single_price" id="single_price" class="form-control">
                </div>
                <div class="form-group">
                  <label for="currency">@lang('admin.para-birimi')</label>
                  <select class="form-control" name="currency" id="currency">
                    <option value="TRY">TRY</option>
                    <option value="USD">USD</option>
                    <option value="EUR">EUR</option>
                  </select>
                </div>   --}}
                <div id="app">
                    <photo-upload-component></photo-upload-component>
                </div>
                <button type="submit" class="btn btn-primary">@lang('admin.kaydet')</button>
                <a href="{{ url()->previous() }}" class="btn btn-secondary">@lang('admin.iptal')</a>
                <input type="hidden" name="previous" value="{{ url()->previous() }}">
            </form>

        </div>
    </div>
@endsection