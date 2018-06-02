@extends('layout.admin') 
@section('content')
<h2>@lang('adminLang.reservation_detail')</h2>

<div class="row">
    <div class="col-6">
        <table class="table table-hover">
            <tr>
                <td>Reservation ID:</td>
                <td>{{$record->id}}</td>
            </tr>
            <tr>
                <td>Payment Status:</td>
                <td>
                    @if($record->payment_status == 1)
                        <span class="badge badge-success">Received</span>
                    @else
                        <span class="badge badge-secondary">Not Received</span>
                    @endif

                </td>
            </tr>
            <tr>
                <td>Received Payment:</td>
                <td>{{$record->payment->amount}} {{$record->payment->currency}}</td>
            </tr>
            <tr>
                <td>Tour:</td>
                <td>{{$record->tour->name}}</td>
            </tr>
            <tr>
                <td>Date:</td>
                <td>{{$record->date->start_date->format('d-m-Y')}} | {{$record->date->end_date->format('d-m-Y')}}</td>
            </tr>
            <tr>
                <td>Pax:</td>
                <td>{{$record->pax}}</td>
            </tr>
            <tr>
                <td>Total Price</td>
                <td>{{$record->total_price}} {{$record->currency}}</td>
            </tr>
            <tr>
                <td>User:</td>
                <td>{{$record->contact->name}}</td>
            </tr>
            <tr>
                <td>Contact:</td>
                <td>{{$record->contact->email}} - {{$record->contact->phone}}</td>
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