@extends('layout.admin')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
      <h1 class="h2">@lang('adminLang.payments')</h1>
      <div class="btn-toolbar mb-2 mb-md-0">
        
        <div class="btn-group mr-2">
        </div>
      </div>
    </div>

    <div class="">
        <table id="datatable" class="table table-striped table-bordered" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>#</th>
              <th>@lang('adminLang.reservation_id')</th>
              <th>@lang('adminLang.amount')</th>
              <th>@lang('adminLang.update')</th>
              <th width="200" class="text-right">@lang('adminLang.actions')</th>

            </tr>
          </thead>
          <tbody>
            @if($records)
              @foreach ($records as $record)
                <tr>
                  <td>{{$record->id}}</td>
                  <td>
                    <a href="{{route('admin.reservation.selectpax', [$record->res_id])}}">{{$record->res_id}}</a>
                  </td>
                  <td>{{$record->amount}} {{$record->currency}}</td>
                  <td>{{$record->updated_at->format('d-m-Y H:i:s')}}</td>
                  <td class="text-right">
                    <a href="{{ route($baseRoute . '.show', [$record->id]) }} " class="btn btn-primary btn-sm">@lang('adminLang.show')</a>
                    <a href="{{ route($baseRoute . '.delete', [$record->id]) }} " class="btn btn-danger btn-sm">@lang('adminLang.delete')</a>
                  </td>
                </tr>
              @endforeach
              @endif
          </tbody>
        </table>

        @if(count($records) == 0)
        <p>@lang('adminLang.not-found')</p>
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