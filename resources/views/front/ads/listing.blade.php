
@extends('layout.front')


@section('content')

<div class="row">
    <div class="col-9">
        <h1>İlanlar</h1>

        <div class="search-box bg-light p-3">
                <form class="">
                    <div class="row ">
                        <div class="col-5">
                                <input type="text" name="query" id="query" class="form-control" placeholder="Ara..." aria-describedby="helpQuery">
                        </div>
                        <div class="col-5">
                              <select class="form-control" name="city" id="city">
                                <option>Şehir Seçin.</option>
                                <option>Milano</option>
                                <option>Bali</option>
                              </select>
                        </div>

                        <div class="col-2 text-right">
                            <button type="submit" class="btn btn-warning"><i class="fa fa-search" aria-hidden="true"></i>  Ara</button>
                        </div>
                    </div>
                </form>
        </div>



        <div class="ilanlar">

            @include('front.includes.ad_list_item')

        </div> <!-- ilanlar -->

    </div>
        @include('front.includes.sidebar')
</div>

@endsection