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
                            <div id="phone-card-img"><img class="card-img-top" src="/images/user.png" alt="Card image cap"></div>
                            <div class="card-body">
                            </div>

                        </div> 
                        
                    </div>	
                    <div class="col-lg-8" style="float: right;">
                        <div class="card">
                            <div class="card-body">
                                    <h3>EDIT PROFILE</h3><br>
                                <ul class="list-group">
                                    <form action="PagesController@update">
                                        <div class="form-group">
                                            <input type="text" value="{{ Auth::user()->name }}" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" value="{{ Auth::user()->email }}" class="form-control">
                                        </div>    
                                    </form>                                   
                                </ul><br>
                                <a href="/edit_user" class="btn btn-outline-success btn-rounded waves-effect btn-md" style="width: 150px;margin:auto;">Update</a><br><br> 
                            </div>
                        </div>           
                    </div>
                </div>									
            </div>
            <br>      
        </div>	
    </div>				         		
    

@endsection
