@extends('layout.admin')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
      <h1 class="h2">@lang('admin.turlar')</h1>
      <div class="btn-toolbar mb-2 mb-md-0">
        
        <div class="btn-group mr-2">
        <a href="{{ route('admin.tour.create') }}" class="btn btn-sm btn-outline-secondary">+ @lang('admin.yeni')</a>
        </div>
        {{--  <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
          This week
        </button>  --}}
      </div>
    </div>

    <div class="">
{{--          <table class="table table-striped table-sm">  --}}
        <table id="datatable" class="table table-striped table-bordered" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>#</th>
              <th>@lang('admin.durum')</th>
              <th>@lang('admin.isim')</th>
              <th>@lang('admin.tarihler')</th>
              <th>@lang('admin.ekleme')</th>
              <th>@lang('admin.guncelleme')</th>
              <th width="200" class="text-right">@lang('admin.islemler')</th>

            </tr>
          </thead>
          <tbody>
            @if($records)
              @foreach ($records as $record)
                <tr>
                  <td>{{$record->id}}</td>
                  <td>@if($record->status) @lang('admin.yayinda') @else @lang('admin.yayinda-degil') @endif</td>
                  <td>{{$record->name}}</td>
                  <td>
                      <a href="{{ route('admin.date.index', [$record->id]) }}" class="btn btn-info btn-sm">@lang('admin.tarihler') ({{ $record->dates_count }})</a>
                  </td>
                  <td>{{$record->created_at->format('d.m.y')}}</td>
                  <td>{{$record->updated_at->format('d.m.y')}}</td>
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
        <a name="" id="" class="btn btn-success btn-sm" href="{{ route( $baseRoute . '.create') }}" role="button">@lang('admin.yeni')</a>
        @endif
      </div>
@endsection

@push('css')
  {{--  <link href="{{asset('css/jquery.dataTables.min.css')}}" rel="stylesheet">  --}}
  <link href="{{asset('css/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endpush

@push('scripts')
<script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('js/dataTables.bootstrap4.min.js')}}"></script>
  <script>
    $(document).ready(
      function(){ 
        $('#datatable').DataTable(); 
      });
  </script>
@endpush