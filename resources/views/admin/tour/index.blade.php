@extends('layout.admin')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
      <h1 class="h2">@lang('admin.turlar')</h1>
      <div class="btn-toolbar mb-2 mb-md-0">
        
        <div class="btn-group mr-2">
        <a href="{{ route('admin.tour.create') }}" class="btn btn-sm btn-outline-secondary">+ @lang('admin.yeni')</a>
        </div>
      </div>
    </div>

    <div class="">
        <table id="datatable" class="table table-striped table-bordered" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>#</th>
              <th>@lang('admin.durum')</th>
              <th>@lang('admin.isim')</th>
              <th>@lang('admin.tarihler')</th>
              <th>@lang('admin.kategori')</th>
              <th>@lang('admin.fotograflar')</th>
              <th>@lang('admin.guncelleme')</th>
              <th width="200" class="text-right">@lang('admin.islemler')</th>

            </tr>
          </thead>
          <tbody>
            @if($records)
              @foreach ($records as $record)
                <tr>
                  <td>{{$record->id}}</td>
                  <td>@if($record->status == 1) 
                        <span class="badge badge-success">@lang('admin.yayinda')</span>
                      @elseif($record->status == 0) 
                        <span class="badge badge-danger">@lang('admin.yayinda-degil')</span>
                      @elseif($record->status == 2) 
                        <span class="badge badge-warning">@lang('admin.taslak')</span>   
                      @endif</td>
                  <td>{{$record->name}}</td>
                  <td>
                      <a href="{{ route('admin.date.index', [$record->id]) }}" class="btn btn-info btn-sm">@lang('admin.tarihler') ({{ $record->dates_count }})</a>
                  </td>
                  <td>{{$record->category->name ?? '...'}}</td>
                <td>
                  @php
                    $count = $record->photos->count()
                  @endphp
                  
                  @if($count == 0 ) <b>No Photo</b> @else {{$count}} @endif </td>
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