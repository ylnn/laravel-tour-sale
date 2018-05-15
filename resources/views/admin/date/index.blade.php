@extends('layout.admin')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
      <h1 class="h2">@lang('adminLang.dates'): <b>{{ $tour->name }}</b></h1>
      <div class="btn-toolbar mb-2 mb-md-0">
        
        <div class="btn-group mr-2">
        <a href="{{ route('admin.date.create', [$tour->id]) }}" class="btn btn-sm btn-outline-secondary">+ @lang('adminLang.new')</a>
        </div>

      </div>
    </div>


    <div class="">
        <table id="datatable" class="table table-striped table-bordered" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>#</th>
              <th>@lang('adminLang.status')</th>
              <th>@lang('adminLang.name')</th>
              <th>@lang('adminLang.start-date')</th>
              <th>@lang('adminLang.finish-date')</th>
              <th class="text-right">@lang('adminLang.actions')</th>
            </tr>
          </thead>
          <tbody>
            @if($records)
              @foreach ($records as $record)
                <tr>
                  <td>{{$record->id}}</td>
                  <td>@if($record->status) @lang('adminLang.published') @else @lang('adminLang.unpublished') @endif</td>
                  <td>{{$record->tour->name}}</td>
                  <td>{{$record->start_date->format('d.m.y')}}</td>
                  <td>{{$record->end_date->format('d.m.y')}}</td>
                  <td class="text-right">
                    <a href="{{ route($baseRoute . '.show', [$record->id]) }} " class="btn btn-primary btn-sm">@lang('adminLang.show')</a>
                    <a href="{{ route($baseRoute . '.edit', [$record->id]) }} " class="btn btn-warning btn-sm">@lang('adminLang.edit')</a>
                    <a href="{{ route($baseRoute . '.delete', [$record->id]) }} " class="btn btn-danger btn-sm">@lang('adminLang.delete')</a>
                  </td>
                </tr>
              @endforeach
              @endif
          </tbody>
        </table>

        @if(count($records) == 0)
        <p>@lang('adminLang.not-found')</p>
        <a name="" id="" class="btn btn-success btn-sm" href="{{ route( $baseRoute . '.create', [$tour->id]) }}" role="button">@lang('adminLang.new')</a>
        @endif
      </div>
@endsection

@push('css')
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