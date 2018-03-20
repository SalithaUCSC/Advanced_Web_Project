@extends('layouts.master')

@section('content')

@include('partials.navbar_noscroll')
    <div class="col-lg-12 col-md-12 col-sm-12" style="margin-top: 100px">
        <h2 class="card-head text-center" id="card-head-phn">MOBILE PHONES</h2><br>
        <div class="row">
            <div class="col-lg-12">
                <div class="col-lg-3" style="float: left;">
                        <h4 class="card-head text-center" name="search-item" id="card-head-phn"><i class="fas fa-search"></i> Search</h4><br>                   
                    <form>
                        <label for="defaultFormContactNameEx" class="form-label">Type phone name</label>
                        <input type="text" id="search-item" class="form-control">
                        <button class="btn btn-indigo btn-sm">Search</button>                        
                        <br>
                    </form>                    
                    <br><h4 class="card-head text-center" id="card-head-phn"><i class="fas fa-mobile-alt"></i> Available Brands</h4><br>
                    <ul class="list-group">
                        @foreach($brands as $row)
                            <a href="/brand/{{ $row->brand_id }}"><li class="list-group-item text-left">{{ $row->brand_name }} <img src="/storage/phone_brands/{{ $row->brand_image }}" class="img-thumbnail" style="width: 35px;height: 30px; float: right;"></li></a>
                        @endforeach	  
                    </ul>       
                </div>	
                <div class="col-lg-9 col-md-12" style="float: right;">
                    <div class="row">
                        @foreach($phones as $phone)
                            <div class="col-lg-3 col-md-4 col-sm-6" id="phone-card">
                                <div class="card" id="phone-card"><br>
                                    <div id="phone-card-img"><img class="card-img-top" id="phone-img" src="/storage/phones/{{$phone->image1}}" alt="Card image cap"></div>
                                    <div class="card-body">
                                        <a id="phone-path" href="/phones/{{ $phone->phone_id }}"><h5 class="card-title text-center">{{ $phone->name }}</h5></a><br>
                                        <button  style="float: left: font-size: 18px;" class="btn btn-dark btn-md">Rs. {{ $phone->price }}</button>
                                        <button style="float: right;" id="add-cart" class="btn btn-dark-green btn-md">Add</button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div> 
                    {{$phones->links()}}             
                </div>
            </div>									
        </div>
        <br>      
    </div>
@endsection
