@extends('layouts.master')

@section('content')

@include('partials.navbar')
    <div class="container">
        <div class="col-lg-12 col-md-12 col-sm-12" style="margin-top: 150px; min-height: 400px;">
            <h1 class="display-4 text-center"></h1>
            <div class="row">
                <div class="col-lg-12">
                    <div class="col-lg-4" style="float: left;">
                        <div class="card user-card"><br><br>
                            <div id="user-card-img" style="border-radius: 50%;">
                                <img class="card-img-top" src="/images/avatars/{{ $user->avatar}}">
                            </div>
                        </div> 
                        
                    </div>	
                    <div class="col-lg-8" style="float: right;">
                        <div class="card user-card">
                            <div class="card-body">
                                    <h3>USER PROFILE</h3><br>
                                <ul class="list-group">
                                    <li class="list-group-item"><i class="fas fa-user-circle"></i><b> Username : </b>{{ $user->name }} </li>
                                    <li class="list-group-item"><i class="fas fa-envelope"></i><b> Email : </b>{{ $user->email }} </li>
                                </ul>
                                <br>
                                <div class="row" style="margin-left: -5px;">
                                    <a href="/users/{{$user->name}}/edit" class="btn btn-primary btn-sm" style="float: right;">Edit profile</a>
                                    {{--<a href="" class="btn btn-outline-info btn-sm" style="float: right;">Change Password</a>--}}
                                </div>
                                <br><br>
                            </div>
                        </div>           
                    </div>
                </div>
            </div>
            @if(count($orders)>0)
                <div class="container">
                    <div class="card" style="margin-top: 20px;">
                        <div class="card-body">
                            <h3>MY ORDERS</h3><br>
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <th>Order No</th>
                                    <th>Total</th>
                                    <th>Qunatity</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                </tr>
                                @foreach($orders as $row)
                                    <tr>
                                        <td>{{ $row->id }}</td>
                                        <td>{{ $row->total }}</td>
                                        <td>{{ $row->quantity }}</td>
                                        <td>{{ date('h: i a', strtotime($row->created_at) )}} on {{ date('F j, Y', strtotime($row->created_at) )}}</td>
                                        <td>
                                            @if(($row->status)==0) Pending
                                            @else
                                                Done
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                            <br>
                            {{--<div class="row" style="margin-left: -5px;">--}}
                                {{--<a href="/users/{{$user->name}}/edit" class="btn btn-primary btn-sm" style="float: right;">Edit profile</a>--}}
                                {{--<a href="" class="btn btn-outline-info btn-sm" style="float: right;">Change Password</a>--}}
                            {{--</div>--}}
                            <br><br>
                        </div>
                    </div>
                </div>
                @else
                    <br><h3 class="text-center">You have no orders</h3>
                @endif
            </div>
        <br>
    </div>

@endsection
