@extends('layout.admin')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
      <h1 class="h2">@lang('adminLang.categories')</h1>
      <div class="btn-toolbar mb-2 mb-md-0">
        
        <div class="btn-group mr-2">
        <a href="{{ route('admin.category.create') }}" class="btn btn-sm btn-outline-secondary">+ @lang('adminLang.new')</a>
        </div>
        {{--  <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
          This week
        </button>  --}}
      </div>
    </div>

    <div class="controls">
      <form method="get">
        <div class="search-form">
          <div class="row">

            <div class="col-3">
              <input type="text" class="form-control" name="q" value="{{$q}}" placeholder="@lang('adminLang.search')...">
            </div>
    
            <div class="col-2">
              <button type="submit" class="btn btn-primary btn-sm">@lang('adminLang.apply-filter')</button>
            </div>
          </div>
          <input type="hidden" name="o" value="{{$o}}"></input>
        </div>
      </form>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th><a href="?q={{$q}}&o=<?php echo $o == 40 ? "41" : "40";?>">@lang('adminLang.status') </a></th>
              <th><a href="?q={{$q}}&o=<?php echo $o == 10 ? "11" : "10";?>">@lang('adminLang.name') </a></th>
              <th><a href="?q={{$q}}&o=<?php echo $o == 20 ? "21" : "20";?>">@lang('adminLang.add')</a></th>
              <th><a href="?q={{$q}}&o=<?php echo $o == 30 ? "31" : "30";?>">@lang('adminLang.update') </a></th>
              <th>@lang('adminLang.actions')</th>
            </tr>
          </thead>
          <tbody>
            @if($records)
              @foreach ($records as $record)
                <tr>
                  <td>{{$record->id}}</td>
                  <td>@if($record->status) @lang('adminLang.published') @else @lang('adminLang.unpublished') @endif</td>
                  <td>{{$record->name}}</td>
                  <td>{{$record->created_at->format('d.m.y')}}</td>
                  <td>{{$record->updated_at->format('d.m.y')}}</td>
                  <td>
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