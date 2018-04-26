@extends('layouts.master')

@section('content')

    @include('partials.navbar_noscroll')
    <div class="col-lg-12 col-md-12 col-sm-12" style="margin-top: 100px; min-height: 1000px;">
        <h3 class="text-center" id="card-head-phn"> SHOPPING CART</h3><br>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @if(count($data) != 0)
                    <div class="col-lg-9" style="float: left;">
                        <?php $count = 1;?>
                        @foreach($data as $row)
                        <div class="card" >
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div id="cart-img"><img class="card-img-top"  src="/images/phones/{{$row->options->img}}"></div>
                                    </div>
                                    <div class="col-lg-9">
                                        <div class="row">
                                            <div class="col-lg-12" style="float: right;">
                                                <table class="table">
                                                    <tr>
                                                        <th width="200px;"><h5 class="card-title">{{$row->name}}</h5></th>
                                                        <th width="200px;" class="cart_quantity">
                                                            <div class="cart_quantity_button">

                                                                <input type="hidden" value="{{$row->rowId}}" id="rowId{{ $count }}">
                                                                <input type="hidden" value="{{$row->id}}" id="id{{ $count }}">
                                                                <input type="number" size="2" min="0" value="{{$row->qty}}" name="qty" id="upCart{{ $count }}">
                                                                <br>

                                                            </div>

                                                        </th>
                                                        <th width="200px;" class="text-left">Unit Price : {{$row->price}}</th>
                                                    </tr>
                                                    <tr>
                                                        <input type="hidden" value="{{$row->rowId}}" id="rowID{{$row->id}}">
                                                        <td><a href="{{url('/cart/remove')}}/{{$row->rowId}}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Remove</a></td>
                                                        <td><a href="/cart" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> update</a></td>
                                                        <td><b>Total : {{$row->price *$row->qty}}</b></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <br>
                                <?php $count++; ?>
                        @endforeach
                    </div>
                    <div class="col-lg-3" style="float: right;">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title">Order Details</div>
                                <table class="table">
                                    <tr>
                                        <th class="text-left">Sub Total</th>
                                        <td class="text-right">{{Cart::subtotal()}}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-left">Total</th>
                                        <td class="text-right">{{Cart::total()}}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-left">Total Items</th>
                                        <td class="text-right">{{Cart::count()}}</td>
                                    </tr>
                                </table>
                                <hr>
                                <a href="/phones" class="btn btn-outline-dark btn-block btn-md" style="margin-bottom: 10px;"><i class="fas fa-shopping-cart"></i> CONTINUE SHOPPING</a>
                                <br>
                                <a href="/cart/checkout" class="btn btn-block btn-dark btn-md"><i class="fas fa-money-bill-alt"></i> CHECKOUT</a>
                            </div>
                        </div>
                    </div>
                    @else
                        <h5 class="text-center" style="margin: auto;">No items in your cart</h5><br><br>
                        <a href="/phones" class="btn btn-outline-dark btn-md" style="margin: auto; display: block ;width: 300px; margin-bottom: 10px;">CONTINUE SHOPPING</a>
                    @endif
                </div>
            </div>

            <br>
        </div>
        <br>
    </div>

@endsection
@include('js')