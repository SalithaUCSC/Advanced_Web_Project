@extends('layouts.master')

@section('content')

    @include('partials.navbar_noscroll')
    <div class="col-lg-12 col-md-12 col-sm-12" style="margin-top: 100px; min-height: 1000px;">
        <h3 class="text-center" id="card-head-phn"> YOUR WISHLIST</h3><br>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @if(count($wishes) != 0)
                        <div class="col-lg-12">
                            <div class="row">
                                @foreach($wishes as $row)
                                    {{--<div class="row">--}}
                                        <div class="col-lg-3">
                                            <div class="card" >
                                                <div class="card-body">
                                                    <div id="cart-img" style="margin: auto;"><img class="card-img-top"  src="/storage/phones/{{$row->image1}}"></div>
                                                    <br><h5 class="text-center"><a href="/phones/{{ $row->phone_id }}">{{ $row->name }}</a></h5>
                                                    <input type="hidden" value="{{$row->phone_id}}">
                                                    <br>
                                                    <center>
                                                        <a href="{{url('/cart/add')}}/{{$row->phone_id}}" name="wishid" id="{{$row->id}}" class="btn btn-outline-dark btn-sm"><i class="fas fa-shopping-cart"></i> Move to cart</a>
                                                        <a href="{{url('/')}}/removeWish/{{$row->id}}" id="removeWish" style="text-decoration: none;" class="btn btn-link btn-sm"><i class="fas fa-trash-alt"></i> remove from wishlist</a>
                                                    </center>
                                                </div>
                                            </div>
                                        </div>
                                    <br>
                                @endforeach
                            </div>
                        </div>
                        @else
                            <h4 class="text-center">You haven't saved items</h4>
                        <br>
                        <center><a href="/phones" class="btn btn-outline-dark btn-sm">ADD ITEMS</a></center>
                    @endif
                </div>
            </div>

            <br>
        </div>
        <br>
    </div>

@endsection
