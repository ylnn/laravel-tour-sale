@extends('layout.front') 
@section('content')

<div class="row justify-content-center">
    <div class="col-8">
        <div class="d-flex justify-content-center">
            <div class="alert alert-success">
                @lang('frontLang.payment-success')
            </div>
        </div>

        <div class="bg-light payment-success-back">
            <div class="d-flex justify-content-center">
                <h2>Your Reservation Id</h2>
            </div>
            <div class="d-flex justify-content-center">
                <h4>{{$reservation->id}}</h4>
            </div>
        </div>

    </div>
</div>
@endsection