@extends('layouts.master')

@section('content')

    @include('partials.navbar_noscroll')
    <div class="col-lg-12 col-md-12 col-sm-12" style="margin-top: 100px">
        <h2 class="card-head text-center" id="card-head-phn">CATEGORIZED MOBILE PHONES</h2><br>
            <div class="container">
                <div class="row">
                    @foreach ($phone as $phn)
                        <div class="col-lg-3 col-md-4 col-sm-6" id="phone-card">
                            <div class="card" id="phone-card"><br>
                                <div id="phone-card-img"><img class="card-img-top" id="phone-img" src="/storage/phones/{{$phn->image1}}" alt="Card image cap"></div>
                                <div class="card-body">
                                    <a id="phone-path" href="/phones/{{ $phn->phone_id }}"><h5 class="card-title text-center">{{ $phn->name }}</h5></a><br>
                                    <button  style="float: left: font-size: 18px;" class="btn btn-dark btn-md">Rs. {{ $phn->price }}</button>
                                    <button style="float: right;" id="add-cart" class="btn btn-dark-green btn-md">Add</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        <br>
    </div>
@endsection





