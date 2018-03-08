@extends('layout.admin')

@section('content')
    <h2>@lang('admin.tur') @lang('admin.duzenle')</h2>
    
    <div class="row">
        <div class="col-6">
        <form method="POST" action="{{ route($baseRoute . '.store', [$date->id]) }}">
                {{csrf_field()}}
                <div class="form-group" style="width: 50%">
                  <label for="status">@lang('admin.durum')</label>
                  <select class="form-control" name="status" id="status">
                    <option value="1">@lang('admin.yayinda')</option>
                    <option value="0">@lang('admin.yayinda-degil')</option>
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
                    <input type="date" name="start_date" class="form-control">
                </div>
                <div class="form-group">
                    <label for="summernote">@lang('admin.bitis-tarihi') </label>
                    <input type="date" name="end_date" class="form-control">
                </div>
                <div class="form-group">
                  <label for="min-participant">@lang('admin.min-katilimci')</label>
                  <input type="number" name="min_participant" id="min_participant" class="form-control">
                </div>
                <div class="form-group">
                  <label for="max-participant">@lang('admin.max-katilimci')</label>
                  <input type="number" name="max_participant" id="max_participant" class="form-control">
                </div>
                <div class="form-group">
                  <label for="currency">@lang('admin.para-birimi')</label>
                  <select class="form-control" name="currency" id="currency">
                    <option value="TRY">TRY</option>
                    <option value="USD">USD</option>
                    <option value="EUR">EUR</option>
                  </select>
                </div> 
                <div class="form-group">
                  <label for="price">@lang('admin.fiyat')</label>
                  <input type="number" name="price" id="price" class="form-control">
                </div>
                <div class="form-group">
                  <label for="single_price">@lang('admin.single-fiyat')</label>
                  <input type="number" name="single_price" id="single_price" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">@lang('admin.kaydet')</button>
                <a href="{{ url()->previous() }}" class="btn btn-secondary">@lang('admin.iptal')</a>
                <input type="hidden" name="previous" value="{{ url()->previous() }}">
            </form>

        </div>
    </div>
@endsection