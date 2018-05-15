@extends('layout.admin')

@section('content')
    <h2>@lang('adminLang.tour') @lang('adminLang.edit')</h2>
    
    <div class="row">
        <div class="col-6">
        <form method="POST" action="{{ route($baseRoute . '.update', [$date->id]) }}">
                {{csrf_field()}}
                <div class="form-group" style="width: 50%">
                  <label for="status">@lang('adminLang.status')</label>
                  <select class="form-control" name="status" id="status">
                    <option value="1" @if($date->status == 1) selected @endif >@lang('adminLang.published')</option>
                    <option value="0" @if($date->status == 1) selected @endif>@lang('adminLang.unpublished')</option>
                  </select>
                </div>
                <div class="form-group">
                    <label for="name">@lang('adminLang.tour-name')</label>
                    <p>
                      <b>{{ $date->tour->name }}</b>
                    </p>
                </div>
                <div class="form-group">
                    <label for="slug">@lang('adminLang.start-date')</label>
                    <p>
                      {{ $date->start_date->format('d.M.Y') }}
                    </p>
                </div>
                <div class="form-group">
                    <label for="slug">@lang('adminLang.finish-date')</label>
                    <p>
                      {{ $date->end_date->format('d.M.Y') }}
                    </p>
                </div>
                <div class="form-group">
                  <label for="min-participant">@lang('adminLang.mix-pax')</label>
                <input type="number" name="min_pax" id="min_pax" class="form-control" value="{{ $date->min_pax }}">
                </div>
                <div class="form-group">
                  <label for="max-participant">@lang('adminLang.max-pax')</label>
                  <input type="number" name="max_pax" id="max_pax" class="form-control" value="{{ $date->max_pax }}">
                </div>
                <div class="form-group">
                  <label for="currency">@lang('adminLang.currency')</label>
                  <select class="form-control" name="currency" id="currency">
                    <option value="TRY" @if($date->currency == "TRY") selected @endif >TRY</option>
                    <option value="USD" @if($date->currency == "USD") selected @endif >USD</option>
                    <option value="EUR" @if($date->currency == "EUR") selected @endif >EUR</option>
                  </select>
                </div> 
                <div class="form-group">
                  <label for="price">@lang('adminLang.price')</label>
                  <input type="number" name="price" id="price" class="form-control" value="{{ $date->price }}">
                </div>
                <button type="submit" class="btn btn-primary">@lang('adminLang.save')</button>
                <a href="{{ url()->previous() }}" class="btn btn-secondary">@lang('adminLang.cancel')</a>
                <input type="hidden" name="previous" value="{{ url()->previous() }}">
            </form>
  
        </div> 
    </div>
@endsection