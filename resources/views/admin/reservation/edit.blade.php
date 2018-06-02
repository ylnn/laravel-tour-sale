@extends('layout.admin')

@section('content')
    <h2>@lang('adminLang.tour') @lang('adminLang.edit')</h2>

<div class="row">
    <div class="col-6">
        <form method="POST" action="{{ route($baseRoute . '.update', ['tour' => $tour->id]) }}">
            {{csrf_field()}}
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="status">@lang('adminLang.status')</label>
                        <select class="form-control" name="status" id="status">
                            <option value="1" @if($tour->status == 1) selected @endif >@lang('adminLang.published')</option>
                            <option value="0" @if($tour->status == 0) selected @endif >@lang('adminLang.unpublished')</option>
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="name">@lang('adminLang.category')</label>
                        <select name="category_id" id="category_id" class="form-control">
                            <option value="0">...</option>
                            @isset($categories) 
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}" @if($tour->category_id == $category->id) selected @endif>{{$category->name}}</option>
                                @endforeach 
                            @endif
                        </select>
                    </div>
                </div>
                <div class="col-6"></div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="name">@lang('adminLang.tour-name')</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$tour->name}}" autofocus required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="slug">@lang('adminLang.tour-name-seo')</label>
                        <input type="text" class="form-control" id="slug" name="slug" value="{{$tour->slug}}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="summernote">@lang('adminLang.tour-desc-short') </label>
                        <textarea id="summernote-short" name="summary">{{ $tour->summary }}</textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="summernote">@lang('adminLang.tour-desc')</label>
                        <textarea id="summernote" name="description">{{ $tour->description }}</textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">

                </div>
            </div>
            <button type="submit" class="btn btn-primary">@lang('adminLang.save')</button>
            <a href="{{ url()->previous() }}" class="btn btn-secondary">@lang('adminLang.cancel')</a>

            <input type="hidden" name="previous" value="{{ url()->previous() }}">
        </form>
    </div>
    <div class="col-6">
        <h4>@lang('adminLang.photos')</h4>
        <div id="app">
            <photo-upload-component url="{{url('/')}}" record_id="{{$tour->id}}"></photo-upload-component>
            <input type="hidden" name="csrf-token" value="{{csrf_token()}}">
        </div>
    </div>
</div>
    
    
@endsection