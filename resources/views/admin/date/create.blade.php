@extends('layout.admin')

@section('content')
    <h2>@lang('admin.date') @lang('admin.create')</h2>
    
    <div class="row">
        <div class="col-6">
        <form method="POST" action="{{ route($baseRoute . '.store', [$tour->id]) }}">
                {{csrf_field()}}
                <div class="form-group" style="width: 50%">
                  <label for="status">@lang('admin.status')</label>
                  <select class="form-control" name="status" id="status">
                    <option value="1">@lang('admin.published')</option>
                    <option value="0">@lang('admin.unpublished')</option>
                  </select>
                </div>
                <div class="form-group">
                    <label for="name">@lang('admin.tour-name')</label>
                    <p>{{ $tour->name }}</p>
                </div>
                <div class="form-group">
                    <label for="slug">@lang('admin.start-date')</label>
                    <input type="date" name="start_date" class="form-control">
                </div>
                <div class="form-group">
                    <label for="summernote">@lang('admin.finish-date') </label>
                    <input type="date" name="end_date" class="form-control">
                </div>
                <div class="form-group">
                  <label for="min-participant">@lang('admin.mix-pax')</label>
                  <input type="number" name="min_pax" id="min_pax" class="form-control">
                </div>
                <div class="form-group">
                  <label for="max-participant">@lang('admin.max-pax')</label>
                  <input type="number" name="max_pax" id="max_pax" class="form-control">
                </div>
                <div class="form-group">
                  <label for="currency">@lang('admin.currency')</label>
                  <select class="form-control" name="currency" id="currency">
                    <option value="TRY">TRY</option>
                    <option value="USD">USD</option>
                    <option value="EUR">EUR</option>
                  </select>
                </div> 
                <div class="form-group">
                  <label for="price">@lang('admin.price')</label>
                  <input type="number" name="price" id="price" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">@lang('admin.save')</button>
                <a href="{{ url()->previous() }}" class="btn btn-secondary">@lang('admin.cancel')</a>
                <input type="hidden" name="previous" value="{{ url()->previous() }}">
            </form>

        </div>
    </div>
@endsection