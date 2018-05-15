@extends('layout.admin')

@section('content')
    <h2>@lang('admin.create-category')</h2>
    
    <div class="row">
        <div class="col-6">
        <form method="POST" action="{{ route($baseRoute . '.store') }}">
                {{csrf_field()}}
                <div class="form-group" style="width: 50%">
                  <label for="status">@lang('admin.status')</label>
                  <select class="form-control" name="status" id="status">
                    <option value="1">@lang('admin.published')</option>
                    <option value="0">@lang('admin.unpublished')</option>
                  </select>
                </div>
                <div class="form-group">
                    <label for="name">@lang('admin.category-name')</label>
                    <input type="text" class="form-control" id="name" name="name" autofocus required>
                </div>
                <div class="form-group">
                    <label for="slug">@lang('admin.category-seo-name')</label>
                    <input type="text" class="form-control" id="slug" name="slug">
                </div>
                <div class="form-group">
                    <label for="summernote">@lang('admin.description')</label>
                    <textarea id="summernote" name="description"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">@lang('admin.save')</button>
                <a href="{{ url()->previous() }}" class="btn btn-secondary">@lang('admin.cancel')</a>
                <input type="hidden" name="previous" value="{{ url()->previous() }}">
            </form>

        </div>
    </div>
@endsection