@extends('layout.admin')

@section('content')
    <h2>@lang('adminLang.category') @lang('adminLang.edit')</h2>
    <div class="row">
        <div class="col-6">
        <form method="POST" action="{{ route($baseRoute . '.update', ['category' => $category->id]) }}">
                {{csrf_field()}}
                <div class="form-group" style="width: 50%">
                  <label for="status">@lang('adminLang.status')</label>
                  <select class="form-control" name="status" id="status">
                    <option value="1" @if($category->status == 1) selected @endif >@lang('adminLang.published')</option>
                    <option value="0" @if($category->status == 0) selected @endif >@lang('adminLang.unpublished')</option>
                  </select>
                </div>
                <div class="form-group">
                    <label for="name">@lang('adminLang.category-name')</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$category->name}}" autofocus required>
                </div>
                <div class="form-group">
                    <label for="slug">@lang('adminLang.category-seo-name')</label>
                    <input type="text" class="form-control" id="slug" name="slug" value="{{$category->slug}}">
                </div>
                <div class="form-group">
                    <label for="summernote">@lang('adminLang.description')</label>
                    <textarea id="summernote" name="description">{!! $category->description !!}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">@lang('adminLang.save')</button>
                <a href="{{ url()->previous() }}" class="btn btn-secondary">@lang('adminLang.cancel')</a>

                <input type="hidden" name="previous" value="{{ url()->previous() }}">
            </form>

        </div>
    </div>
@endsection