@extends('layouts.master')

@section('content')

@include('partials.navbar_noscroll')

<div class="container">            
        <div class="row">
            <div class="col-lg-12 col-md-12">

                <div class="col-lg-4 col-md-12" style="margin-top: 120px;float: left;">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item"><a href="/phones">Phones</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $phone->brand }}</li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $phone->phone_id }}</li>
                            </ol>
                        </nav>    
                    <div id="spec-brief">
                        <img src="/storage/phones/{{ $phone->image1 }}" id="show-phone">
                        <div class="row">
                            <div class="col-lg-4"><br>
                                <a data-lightbox="roadtrip" href="/storage/phones/{{ $phone->image2 }}"><span class="roll"></span><img src="/storage/phones/{{ $phone->image2 }}" class="img-thumbnail" style="width:100px; height: 100px"></a>
                            </div>
                            <div class="col-lg-4"><br>
                                <a data-lightbox="roadtrip" href="/storage/phones/{{ $phone->image3 }}"><span class="roll"></span><img src="/storage/phones/{{ $phone->image3 }}" class="img-thumbnail" style="width:100px; height: 100px"></a>
                            </div>
                            <div class="col-lg-4"><br>
                                <a data-lightbox="roadtrip" href="/storage/phones/{{ $phone->image4 }}"><span class="roll"></span><img src="/storage/phones/{{ $phone->image4 }}" class="img-thumbnail" style="width:100px; height: 100px"></a>
                            </div>                           
                        </div><br>
                        <button type="button" class="btn btn-danger btn-block btn-md">Compare</button><br>
                        {{--  <x-star-rating>
                            <div class="star-full"></div>
                            <div class="star-full"></div>
                            <div class="star-full"></div>
                            <div class="star-full"></div>
                            <div class="star-full"></div>
                        </x-star-rating>  --}}
                        <button type="button" class="btn btn-deep-orange btn-block btn-md">Rate</button>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12 col-sm-12" style="float: right;margin-top: 120px">
                    <h3 id="phone-name">{{ $phone->name }}</h3>
                    <br>
                    <div class="row">
                        <div class="col-lg-3 col-md-12 col-sm-12" id="prod-card">
                            <div class="card">									
                                 <div class="card-body">
                                 <center><i class="fas fa-camera-retro fa-3x"></i></center><br>
                                <h5 class="card-title text-center">CAMERA</h5><br>	
                                   <h6 class="card-title text-center">{{ $phone->cam_primary }}</h6>				
                                  </div>
                            </div>								
                        </div>
                        <div class="col-lg-3 col-md-12 col-sm-12" id="prod-card">
                            <div class="card">									
                                 <div class="card-body">
                                 <center><i class="fas fa-bars fa-3x"></i></center><br>
                                <h5 class="card-title text-center">RAM</h5><br>	
                                   <h6 class="card-title text-center">{{ $phone->ram }}</h6>				
                                  </div>
                            </div>								
                        </div>
                        <div class="col-lg-3 col-md-12 col-sm-12" id="prod-card">
                            <div class="card">									
                                 <div class="card-body">
                                 <center><i class="fas fa-battery-half fa-3x"></i></center><br>
                                <h5 class="card-title text-center">BATTERY</h5><br>	
                                   <h6 class="card-title text-center">{{ $phone->battery }}</h6>				
                                  </div>
                            </div>								
                        </div>
                        <div class="col-lg-3 col-md-12 col-sm-12" id="prod-card">
                            <div class="card">									
                                 <div class="card-body">
                                 <center><i class="fas fa-desktop fa-3x"></i></center><br>
                                <h5 class="card-title text-center">DISPLAY</h5><br>	
                                   <h6 class="card-title text-center">{{ $phone->display_size }}</h6>				
                                  </div>
                            </div>								
                        </div>																					
                    </div>
                    <br>
                    <table class="table table-bordered">
                        <tr>
                            <th>Launch</th>
                            <td>Announced Time</td>
                            <td>{{ $phone->released_time }}</td>
                        </tr>
                        <tr>
                            <th rowspan="2">Body</th>
                            <td>Dimensions</td>
                            <td>{{ $phone->dimension }}</td>
                        </tr>
                        <tr>
                            <td>SIM</td>
                            <td>{{ $phone->sim }}</td>
                        </tr>
                        <tr>
                            <th rowspan="3">Display</th>
                            <td>Type</td>
                            <td>{{ $phone->display_type }}</td>
                        </tr>
                        <tr>
                            <td>Size</td>
                            <td>{{ $phone->display_size }}</td>
                        </tr>
                        <tr>
                            <td>Resolution</td>
                            <td>{{ $phone->resolution }}</td>
                        </tr>
                        <tr>
                            <th rowspan="4">Platform</th>
                            <td>OS</td>
                            <td>{{ $phone->os }}</td>
                        </tr>
                        <tr>
                            <td>Chipset</td>
                            <td>{{ $phone->chipset }}</td>
                        </tr>
                        <tr>
                            <td>CPU</td>
                            <td>{{ $phone->cpu }}</td>
                        </tr>	
                        <tr>
                            <td>GPU</td>
                            <td>{{ $phone->gpu }}</td>
                        </tr>
                        <tr>
                            <th rowspan="2">Memory</th>
                            <td>Card Slot</td>
                            <td>{{ $phone->cardslot }}</td>
                        </tr>
                        <tr>
                            <td>Internal</td>
                            <td>{{ $phone->internal }}></td>
                        </tr>
                        <tr>
                            <th rowspan="2">Camera</th>
                            <td>Primary</td>
                            <td>{{ $phone->cam_primary }}</td>
                        </tr>
                        <tr>
                            <td>Secondary</td>
                            <td>{{ $phone->cam_secondary }}</td>
                        </tr>	            				            				            			        
                        <tr>
                            <th>Battery</th>
                            <td>Capacity</td>
                            <td>{{ $phone->battery }}</td>
                        </tr>				
                    </table>
                </div>
            </div>
        </div>
    </div>					         		
    

@endsection
