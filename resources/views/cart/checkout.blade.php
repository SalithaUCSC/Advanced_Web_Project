@extends('layouts.master')

@section('content')

    @include('partials.navbar_noscroll')
    <div class="col-lg-12 col-md-12 col-sm-12" style="margin-top: 100px; min-height: 1000px;">
        <div class="container">
            <h4 class="text-center" id="card-head-phn"> Proceed Your Order</h4><br>
            <div class="row">
                <div class="col-lg-12" style="float: right;">
                    <div class="card">
                        <div class="row">
                            <div class="col-lg-3" style="float: left;">
                                <i style="margin: auto; margin-top: 50px;display: block;" class="fas fa-shopping-cart fa-8x"></i>
                            </div>
                            <div class="col-lg-9" style="float: right;">
                                <div class="card-body">
                                    <table class="table">
                                        <tr>
                                            <th class="text-left">Total</th>
                                            <td class="text-right">{{Cart::subtotal()}}</td>
                                        </tr>
                                        <tr>
                                            <th class="text-left">Tax</th>
                                            <td class="text-right">{{Cart::tax()}}</td>
                                        </tr>

                                        <tr>
                                            <th class="text-left" style="font-size: 18px;font-weight: bold;">Grand Total</th>
                                            <td class="text-right" style="font-size: 18px;font-weight: bold;">{{Cart::total()}}</td>
                                        </tr>
                                    </table>
                                    <hr>
                                    <div class="row">
                                        @include('cart.paypal')
                                        <button href="" id="cod" class="btn btn-outline-primary btn-md">Cash on delivery</button>
                                    </div>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br><hr><br>
            <h4>Delivery Details</h4>
            <br><hr>
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div style="color:red; font-size:18px !important;"> {{ $error }}</div>
                @endforeach
            @endif
            <div class="row">
                <div class="col-lg-12" style="float: right;">
                    {!! Form::open(['action' => 'CartController@order', 'method' => 'POST', 'id' => 'ship-form', 'data-parsley-validate' => '']) !!}
                        <div class="form-row">
                            <div class="col">
                                {{ Form::label('name', 'Your Registered Name ', ['class' => 'form-label'] )}}
                                {{ Form::text('name', Auth::user()->name, ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'Your must provide your Registered Name', 'required' => '',
                                'data-parsley-required-message' => 'Your registered name is required']) }}
                            </div>
                            <div class="col">
                                {{ Form::label('email', 'Your Email Address', ['class' => 'form-label'] )}}
                                {{ Form::text('email', '', ['class' => 'form-control', 'id' => 'email', 'placeholder' => 'Display Email', 'required', 'data-parsley-trigger' => 'change',
                                'data-parsley-type'=>'email', 'data-parsley-type-message' => 'Provide a valid email for order confirmation', 'data-parsley-required-message' => 'Email is required']) }}
                            </div>
                        </div>
                        <br>
                        <div class="form-row">
                            <div class="col">
                                {{ Form::label('address', 'Your Permanent Address ', ['class' => 'form-label'] )}}
                                {{ Form::textarea('address', '', ['class' => 'form-control', 'id' => 'address', 'placeholder' => 'Give a correct address', 'required' => '',
                                'data-parsley-required-message' => 'Address is required to deliver the product', 'data-parsley-minlength' => '20', 'data-parsley-minlength-message' => 'Address should be a valid one']) }}
                            </div>
                            <div class="col">
                                {{ Form::label('number', 'Your Working Mobile Number ', ['class' => 'form-label'] )}}
                                {{ Form::text('number', '', ['class' => 'form-control', 'id' => 'number', 'placeholder' => 'Contact Number', 'required' => '',
                                'data-parsley-required-message' => 'Mobile number is required', 'data-parsley-type' => 'digits', 'data-parsley-type-message' => 'Not a valid phone number',
                                'data-parsley-maxlength' => 10, 'data-parsley-maxlength-message' => 'Mobile number should contain 10 numbers',
                                'data-parsley-minlength' => 10, 'data-parsley-minlength-message' => 'Mobile number should contain 10 numbers']) }}
                                <br>
                                {{ Form::submit('Send', ['class' => 'btn btn-primary btn-md']) }}
                                <input type="hidden" id="total" name="total" value="{{ Cart::total() }}">
                                <input type="hidden" id="total" name="total" value="{{ Cart::count() }}">
                            </div>
                        </div>
                        <br>

                    {!! Form::close() !!}
                    <br>
                </div>
            </div>
            <br>
        </div>
        <br>
    </div>

@endsection
