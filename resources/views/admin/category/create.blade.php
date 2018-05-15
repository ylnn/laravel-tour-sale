@extends('layout.admin')

@section('content')
    <h2>@lang('adminLang.create-category')</h2>
    
    <div class="row">
        <div class="col-6">
        <form method="POST" action="{{ route($baseRoute . '.store') }}">
                {{csrf_field()}}
                <div class="form-group" style="width: 50%">
                  <label for="status">@lang('adminLang.status')</label>
                  <select class="form-control" name="status" id="status">
                    <option value="1">@lang('adminLang.published')</option>
                    <option value="0">@lang('adminLang.unpublished')</option>
                  </select>
                </div>
                <div class="form-group">
                    <label for="name">@lang('adminLang.category-name')</label>
                    <input type="text" class="form-control" id="name" name="name" autofocus required>
                </div>
                <div class="form-group">
                    <label for="slug">@lang('adminLang.category-seo-name')</label>
                    <input type="text" class="form-control" id="slug" name="slug">
                </div>
                <div class="form-group">
                    <label for="summernote">@lang('adminLang.description')</label>
                    <textarea id="summernote" name="description"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">@lang('adminLang.save')</button>
                <a href="{{ url()->previous() }}" class="btn btn-secondary">@lang('adminLang.cancel')</a>
                <input type="hidden" name="previous" value="{{ url()->previous() }}">
            </form>

        </div>
    </div>
@endsection