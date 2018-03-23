@extends('layouts.master')

@section('content')

@include('partials.navbar')
    <div class="container">
        <div class="col-lg-12 col-md-12 col-sm-12" style="margin-top: 150px">
                <h1 class="display-4 text-center"><center></center></h1>
            <div class="row">
                <div class="col-lg-12">
                    <div class="col-lg-4" style="float: left;">
                        <div class="card"><br><br>
                            <div id="user-card-img" style="border-radius: 50%;"><img class="card-img-top" src="/images/user.png" alt="Card image cap"></div>
                            <div class="card-body">
                                <!-- <h5 class="card-title text-center">Upload profie picture</h5> -->
                            </div>
                        </div> 
                        
                    </div>	
                    <div class="col-lg-8" style="float: right;">
                        <div class="card">
                            <div class="card-body">
                                    <h3>USER PROFILE</h3><br>
                                <ul class="list-group">
                                    <li class="list-group-item"><i class="fas fa-user-circle"></i><b> Username : </b>{{ Auth::user()->name }} </li>
                                    <li class="list-group-item"><i class="fas fa-envelope"></i><b> Email : </b>{{ Auth::user()->email }} </li>                                
                                </ul><br>
                                <a href="/user/edit" class="btn btn-outline-info btn-sm" style="margin:auto;float: right;">Edit profile</a><br><br><br><br> 
                            </div>
                        </div>           
                    </div>
                </div>									
            </div>
            <br>      
        </div>	
    </div>				         		
    

@endsection
