@extends('layouts.master')

@section('content')

@include('partials.navbar_noscroll')

<div class="container">            
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="col-lg-4 col-md-12" style="margin-top: 120px;float: left;">
                    @include('partials.fanmessages')
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
                        <a href="/phones/compare/{{ $phone->phone_id }}" style="margin-bottom: 10px;" class="btn btn-danger btn-block btn-md">Compare</a>
                        {{--<button type="button" class="btn btn-deep-orange btn-block btn-md">Rate</button><br>--}}
                        <a href="{{url('/cart/add')}}/{{$phone->phone_id}}" id="add-cart" class="btn btn-primary btn-block btn-md"><i class="fas fa-shopping-cart"></i> Add to cart</a><br>
                        <hr>
                        @guest
                            <p style="text-align: center; font-weight: bold;"><a href="/login">Login</a> to save items for later </p>
                        @else
                            @if(count($wishes) < 1)
                                {!! Form::open(['action' => 'CartController@addToWishlist', 'method' => 'POST']) !!}
                                    <input type="hidden" value="{{ $phone->phone_id }}" name="phone_id">
                                    <button type="submit" class="btn btn-info btn-block btn-md"><i class="fas fa-heart"></i> save for later</button>
                                {!! Form::close() !!}
                            @else
                                <p style="text-align: center; font-weight: bold;">Already added to your <a href="/wishlist">WishList</a></p>
                            @endif
                        @endguest
                        <hr>

                        <h5>Latest Reviews</h5><hr>

                        <ul class="list-group">
                            @if(count($reviews)>0)
                                @foreach($reviews as $rev)
                                    <li class="list-group-item">{!! $rev->review !!}
                                      <small>By {{$rev->username}}</small><small> on {{ date('M j, Y h:ia', strtotime($rev->created_at) )}}</small></li>
                                @endforeach
                                <br>
                            @else
                                <small>No one has reviewed yet.</small><br>
                            @endif
                        </ul>
                        <div class="row">
                        @guest
                            <div class="col-lg-6">
                                <a href="/phones/reviews/{{ $phone->phone_id }}" class="btn btn-outline-primary btn-block btn-sm"><i class="fas fa-eye"></i> READ REVIEWS</a>
                            </div>
                            <div class="col-lg-6">
                                <a class="btn btn-outline-info btn-block btn-sm" data-toggle="modal" data-target="#loginModal"><i class="fas fa-plus-circle"></i> ADD REVIEW</a>
                            </div>
                        @else
                            <div class="col-lg-6">
                                <a href="/phones/reviews/{{ $phone->phone_id }}" class="btn btn-outline-primary btn-block btn-sm"><i class="fas fa-eye"></i> READ REVIEWS</a>
                            </div>
                            <div class="col-lg-6">
                                <a href="#" data-toggle="modal" id="add_review" style="float: right;" class="btn btn-outline-info btn-block btn-sm"><i class="fas fa-plus-circle"></i> ADD REVIEW</a>
                                {{--<a href="/phones/reviews/{{ $phone->phone_id }}/create" class="btn btn-outline-info btn-block btn-md"><i class="fas fa-plus-circle"></i> ADD REVIEW</a>--}}
                            </div>
                            @endguest
                        </div>

                    </div>
                </div>
                <div class="col-lg-8 col-md-12 col-sm-12" style="float: right;margin-top: 120px">
                    <h3 id="phone-name" style="float: left;margin-right: 30px;">{{ $phone->name }}</h3>
                    @guest
                    <div style="margin-right: -40px;"><a class="btn btn-link like" data-toggle="modal" data-target="#loginModal" style="float: right; margin-top: -25px;"><span class="badge red"><i class="fas fa-heart fa-4x" aria-hidden="true"></i> BECOME A FAN</span></a></div>
                        <span class="badge cyan"><i class="fas fa-thumbs-up fa-2x" aria-hidden="true"></i></span> <span class="badge cyan">{{ count($likeCtr) }}</span>
                    {{--<a  class="btn btn-link like" data-toggle="modal" data-target="#loginModal" style="float: left; margin-top: -15px;"><i class="fas fa-thumbs-down fa-2x"></i> DISLIKE</a>--}}
                    @else
                        <div style="margin-right: -40px;"><a class="btn btn-link like" href="/like/{{$phone->phone_id}}" style="float: right; margin-top: -25px;"><span class="badge red"><i class="fas fa-heart fa-4x" aria-hidden="true"></i> BECOME A FAN</span></a></div>
                        <span class="badge cyan"><i class="fas fa-thumbs-up fa-2x" aria-hidden="true"></i></span> <span class="badge cyan">{{ count($likeCtr) }}</span>
                        {{--<a  class="btn btn-link like" href="/dislike/{{$phone->phone_id}}" style="float: left; margin-top: -15px;"><i class="fas fa-thumbs-down fa-2x"></i> DISLIKE</a>--}}
                    @endguest
                        <br><br><br>
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
    <hr>
    <div class="container">
        <br><h4>You may also like..</h4><br>
        <div class="row">
            @foreach($relphones as $r)
                <div class="col-lg-3">
                    <div class="card" style="height: 300px;"><br>
                        <img class="img-fluid" src="/storage/phones/{{$r->image1}}" style="height: 200px; width: 180px; margin: auto;" alt="Card image cap">
                        <div class="card-body">
                            <a id="rel-path" href="/phones/{{$r->phone_id}}"><h6 class="card-title text-center">{{$r->name}}</h6></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <br><hr><br>
    </div>


<div class="modal fade" id="reviewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top: 50px;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="text-center">Review a phone.</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="error text-danger"></p>
                {!! Form::open(['action' => 'ReviewsController@postReview', 'method' => 'POST', 'data-parsley-validate' => ''])!!}
                {{ Form::hidden('phone_id', $phone->phone_id, ['class' => 'form-control', 'id' => 'phone_id']) }}
                <div class="form-group">
                    {{ Form::label('username', 'Your username ', ['class' => 'form-label'] )}}
                    {{ Form::text('username','', ['class' => 'form-control', 'id' => 'name', 'required' => '', 'data-parsley-required-message' => 'Your username is required']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('review', 'Your review ', ['class' => 'form-label'] )}}
                    {{ Form::textarea('review', '', ['class' => 'form-control', 'placeholder' => 'Give your review', 'id' => 'review', 'required' => '',
                    'data-parsley-required-message' => 'You can not submit without review', 'data-parsley-minlength' => '10', 'data-parsley-minlength-message' => 'Assumption : Your review is has no meaning. Give an acceptable review']) }}
                </div>
                <br>
                <div class="modal-footer">
                    {{ Form::submit('Add', ['class' => 'btn btn-primary btn-sm', 'id' => 'addRevbtn']) }}
                    {!! Form::close() !!}
                    <button type="button" class="btn btn-dark btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>


    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top: 100px;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5 class="text-danger text-center">You need to login to review a phone.</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<script>
    $(document).on('click', '#add_review', function () {
        $('#reviewModal').modal('show');

        $('#addRevbtn').click(function () {
            $.ajax({
                type : 'POST',
                url : 'post_review',
                data : {
                    'username' : $('#username').val(),
                    'review' : $('#review').val()
                },
                success:function (data) {
                    if((data.errors)){
                        $('.error').removeClass('hidden');
                        $('.error').text(data.errors.username);
                        $('.error').text(data.errors.review);
                    }
                    else {
                        $('.error').remove();
                    }
                }
            });
        });
    });
</script>
@endsection
