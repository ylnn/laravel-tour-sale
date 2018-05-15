@extends('layout.admin')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
      <h1 class="h2">@lang('adminLang.tours')</h1>
      <div class="btn-toolbar mb-2 mb-md-0">
        
        <div class="btn-group mr-2">
        <a href="{{ route('admin.tour.create') }}" class="btn btn-sm btn-outline-secondary">+ @lang('adminLang.new')</a>
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
              <th>@lang('adminLang.dates')</th>
              <th>@lang('adminLang.category')</th>
              <th>@lang('adminLang.photos')</th>
              <th>@lang('adminLang.update')</th>
              <th width="200" class="text-right">@lang('adminLang.actions')</th>

            </tr>
          </thead>
          <tbody>
            @if($records)
              @foreach ($records as $record)
                <tr>
                  <td>{{$record->id}}</td>
                  <td>@if($record->status == 1) 
                        <span class="badge badge-success">@lang('adminLang.published')</span>
                      @elseif($record->status == 0) 
                        <span class="badge badge-danger">@lang('adminLang.unpublished')</span>
                      @elseif($record->status == 2) 
                        <span class="badge badge-warning">@lang('adminLang.draft')</span>   
                      @endif</td>
                  <td>{{$record->name}}</td>
                  <td class="text-center">
                      <button class="btn btn-info btn-sm" data-toggle="popover" data-placement="top" data-html="true" 
                    data-content="
                    @isset($record->dates)
                      @foreach ($record->dates as $item)
                          {{$item->start_date->format('d.m.Y')}} - {{$item->end_date->format('d.m.Y')}} <br />
                      @endforeach
                    @endif
                  
                    ">
                        {{ $record->dates_count }} 
                      </button>
                      <a href="{{ route('admin.date.index', [$record->id]) }}" class="btn btn-warning btn-sm">@lang('adminLang.edit')</a>
                  </td>
                  <td>{{$record->category->name ?? '...'}}</td>
                <td class="text-center">
                  @php
                    $count = $record->photos->count()
                  @endphp
                  
                  @if($count == 0 ) <b>@lang('adminLang.no-photos')</b> @else {{$count}} @endif </td>
                  <td>{{$record->updated_at->format('d.m.y')}}</td>
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
        <a name="" id="" class="btn btn-success btn-sm" href="{{ route( $baseRoute . '.create') }}" role="button">@lang('adminLang.new')</a>
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