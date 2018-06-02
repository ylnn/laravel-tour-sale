@extends('layout.admin') 
@section('content')
<h2>@lang('adminLang.category'): {{$record->name}} </h2>

<div class="row">
    <div class="col-6">
        <table class="table table-hover">
            <tr>
                <td>
                    @lang('adminLang.category-name')
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
                    {{$record->status}}
                </td>
            </tr>
            <tr>
                <td>
                    @lang('adminLang.category-seo-name')
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