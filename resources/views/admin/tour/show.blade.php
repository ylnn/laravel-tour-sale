@extends('layout.admin') 
@section('content')
<h2>@lang('adminLang.tour'): {{$record->name}} </h2>

<div class="row">
    <div class="col-6">
        <table class="table table-hover">
            <tr>
                <td>
                    @lang('adminLang.tour-name')
                </td>
                <td>
                    {{$record->name}}
                </td>
            </tr>
            <tr>
                <td>
                    @lang('adminLang.status')
                </td>
                <td>
                    @if($record->status == 1)
                        <span class="badge badge-success">Active</span>
                    @else
                        <span class="badge badge-warning">Not active</span>
                    @endif
                </td>
            </tr>
            <tr>
                <td>
                    @lang('adminLang.tour-name-seo')
                </td>
                <td>
                    {{$record->slug}}
                </td>
            </tr>
            <tr>
                <td>
                    @lang('adminLang.description')
                </td>
                <td>
                    {{$record->description}}
                </td>
            </tr>
        </table>
    </div>
</div>

<p>
    <a href="{{ route($baseRoute . '.index') }} " class="btn btn-primary btn-sm">@lang('adminLang.back')</a>
    <a href="{{ route($baseRoute . '.edit', ['id' => $record->id]) }} " class="btn btn-warning btn-sm">@lang('adminLang.edit')</a>
</p>
@endsection