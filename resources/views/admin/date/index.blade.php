@extends('layout.admin')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
      <h1 class="h2">@lang('admin.tarihler'): <b>{{ $tour->name }}</b></h1>
      <div class="btn-toolbar mb-2 mb-md-0">
        
        <div class="btn-group mr-2">
        <a href="{{ route('admin.date.create', [$tour->id]) }}" class="btn btn-sm btn-outline-secondary">+ @lang('admin.yeni')</a>
        </div>

      </div>
    </div>

    {{--  <div class="controls">
      <form method="get">
        <div class="search-form">
          <div class="row">

            <div class="col-3">
              <input type="text" class="form-control" name="q" value="{{$q}}" placeholder="@lang('admin.search')...">
            </div>
    
            <div class="col-2">
              <button type="submit" class="btn btn-primary btn-sm">@lang('admin.filtrele')</button>
            </div>
          </div>
          <input type="hidden" name="o" value="{{$o}}"></input>
        </div>
      </form>
    </div>  --}}

    <div class="">
        <table id="datatable">
          <thead>
            <tr>
              <th>#</th>
              <th>@lang('admin.durum')</th>
              <th>@lang('admin.isim')</th>
              <th>@lang('admin.baslama-tarihi')</th>
              <th>@lang('admin.bitis-tarihi')</th>
              <th class="text-right">@lang('admin.islemler')</th>
            </tr>
          </thead>
          <tbody>
            @if($records)
              @foreach ($records as $record)
                <tr>
                  <td>{{$record->id}}</td>
                  <td>@if($record->status) @lang('admin.yayinda') @else @lang('admin.yayinda-degil') @endif</td>
                  <td>{{$record->tour->name}}</td>
                  <td>{{$record->start_date->format('d.m.y')}}</td>
                  <td>{{$record->end_date->format('d.m.y')}}</td>
                  <td class="text-right">
                    <a href="{{ route($baseRoute . '.show', [$record->id]) }} " class="btn btn-primary btn-sm">@lang('admin.goster')</a>
                    <a href="{{ route($baseRoute . '.edit', [$record->id]) }} " class="btn btn-warning btn-sm">@lang('admin.duzenle')</a>
                    <a href="{{ route($baseRoute . '.delete', [$record->id]) }} " class="btn btn-danger btn-sm">@lang('admin.sil')</a>
                  </td>
                </tr>
              @endforeach
              @endif
          </tbody>
        </table>

        @if(count($records) == 0)
        <p>@lang('admin.bulunamadi')</p>
        <a name="" id="" class="btn btn-success btn-sm" href="{{ route( $baseRoute . '.create', [$tour->id]) }}" role="button">@lang('admin.yeni')</a>
        @endif
      </div>
@endsection

@push('css')
  <link href="{{asset('css/jquery.dataTables.min.css')}}" rel="stylesheet">
@endpush

@push('scripts')
<script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
  <script>
    $(document).ready(
      function(){ 
        $('#datatable').DataTable(); 
      });
  </script>
@endpush