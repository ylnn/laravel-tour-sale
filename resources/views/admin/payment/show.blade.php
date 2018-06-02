@extends('layout.admin') 
@section('content')
<h2>@lang('adminLang.payment_detail')</h2>

<div class="row">
    <div class="col-6">
        <table class="table table-hover">
            <tr>
                <td>Reservation ID:</td>
                <td>{{$record->res_id}}</td>
            </tr>
            <tr>
                <td>Tour:</td>
                <td>{{$record->reservation->tour->name}}</td>
            </tr>
            <tr>
                <td>Date:</td>
                <td>{{$record->reservation->date->start_date->format('d-m-Y')}} | {{$record->reservation->date->end_date->format('d-m-Y')}}</td>
            </tr>
            <tr>
                <td>Pax:</td>
                <td>{{$record->reservation->pax}}</td>
            </tr>
            <tr>
                <td>Total Price</td>
                <td>{{$record->reservation->total_price}} {{$record->reservation->currency}}</td>
            </tr>
            <tr>
                <td><b>Received</b></td>
                <td><b>{{$record->amount}} {{$record->currency}}</b></td>
            </tr>
            <tr>
                <td>User:</td>
                <td>{{$record->reservation->contact->name}}</td>
            </tr>
            <tr>
                <td>Contact:</td>
                <td>{{$record->reservation->contact->email}} - {{$record->reservation->contact->phone}}</td>
            </tr>
            <tr>
                <td>Update Date:</td>
                <td>{{$record->updated_at->format('d-m-Y H:i:s')}}</td>
            </tr>
        </table>

        <p>
            <a href="{{ route($baseRoute . '.index') }} " class="btn btn-primary btn-sm">@lang('adminLang.back')</a>
        </p>
    </div>
</div>
@endsection