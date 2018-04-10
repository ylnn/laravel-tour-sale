@extends('layout.admin')

@section('content')
    <h2>@lang('admin.tur') @lang('admin.duzenle')</h2>
    
    <div class="row">
        <div class="col-6">
        <form method="POST" action="{{ route($baseRoute . '.update', [$date->id]) }}">
                {{csrf_field()}}
                <div class="form-group" style="width: 50%">
                  <label for="status">@lang('admin.durum')</label>
                  <select class="form-control" name="status" id="status">
                    <option value="1" @if($date->status == 1) selected @endif >@lang('admin.yayinda')</option>
                    <option value="0" @if($date->status == 1) selected @endif>@lang('admin.yayinda-degil')</option>
                  </select>
                </div>
                <div class="form-group">
                    <label for="name">@lang('admin.tur-adi')</label>
                    <p>
                      <b>{{ $date->tour->name }}</b>
                    </p>
                </div>
                <div class="form-group">
                    <label for="slug">@lang('admin.baslama-tarihi')</label>
                    <p>
                      {{ $date->start_date->format('d.M.Y') }}
                    </p>
                </div>
                <div class="form-group">
                    <label for="slug">@lang('admin.bitis-tarihi')</label>
                    <p>
                      {{ $date->end_date->format('d.M.Y') }}
                    </p>
                </div>
                <div class="form-group">
                  <label for="min-participant">@lang('admin.min-katilimci')</label>
                <input type="number" name="min_participant" id="min_participant" class="form-control" value="{{ $date->min_participant }}">
                </div>
                <div class="form-group">
                  <label for="max-participant">@lang('admin.max-katilimci')</label>
                  <input type="number" name="max_participant" id="max_participant" class="form-control" value="{{ $date->max_participant }}">
                </div>
                <div class="form-group">
                  <label for="currency">@lang('admin.para-birimi')</label>
                  <select class="form-control" name="currency" id="currency">
                    <option value="TRY" @if($date->currency == "TRY") selected @endif >TRY</option>
                    <option value="USD" @if($date->currency == "USD") selected @endif >USD</option>
                    <option value="EUR" @if($date->currency == "EUR") selected @endif >EUR</option>
                  </select>
                </div> 
                <div class="form-group">
                  <label for="price">@lang('admin.fiyat')</label>
                  <input type="number" name="price" id="price" class="form-control" value="{{ $date->price }}">
                </div>
                <button type="submit" class="btn btn-primary">@lang('admin.kaydet')</button>
                <a href="{{ url()->previous() }}" class="btn btn-secondary">@lang('admin.iptal')</a>
                <input type="hidden" name="previous" value="{{ url()->previous() }}">
            </form>
  
        </div> 
    </div>
@endsection