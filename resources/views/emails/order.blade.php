@extends('beautymail::templates.ark')


@section('content')

@include('beautymail::templates.ark.heading', [
'heading' => 'Mail from MOBILE4U',
'level' => 'h1'
])

@include('beautymail::templates.ark.contentStart')

<h4 class="secondary"><strong>Hi, {{ auth()->user()->name }}..<br>We received you order. Thank You for staying with us!</strong></h4><br>
<hr><br>
<p>This is the summary of you order </p><br>
<table class="table table-bordered">
    @foreach(Cart::content() as $item)
        <tr>
            <td align="left" width="200">{{$item->name}}</td>
            <td align="right" width="200">{{$item->qty}}</td>
            <td align="right" width="200">{{$item->price * $item->qty }}</td>
        </tr>
    @endforeach
        <tr>
            <td align="left" width="200">Total Items</td>

            <td align="right" width="200">{{Cart::count()}}</td>
            <td align="right" width="200"></td>
        </tr>
    <tr>
        <td align="left" width="200">Total</td>
        <td align="left" width="200"></td>
        <td align="right" width="200">{{Cart::subtotal()}}</td>
    </tr>
    <tr>
        <td align="left" width="200">Tax</td>
        <td align="left" width="200"></td>
        <td align="right" width="200">{{Cart::tax()}}</td>
    </tr>

    <tr>
        <td align="left" width="200"><b>Grand Total</b></td>
        <td align="left" width="200"></td>
        <td align="right" width="200"><b>{{Cart::total()}}</b></td>
    </tr>
</table><br>
<center><h3>We will deliver you order soon!</h3></center><br>
<hr>
<div align="left"><br>
    <h3>MOBILE4U</h3>
    <h5>No: 43/2</h5>
    <h5>Kavinda Place</h5>
    <h5>Kirulapana</h5>
    <h5>Contact: 0777123456</h5>
    <br>
</div>

@include('beautymail::templates.ark.contentEnd')

@endsection
