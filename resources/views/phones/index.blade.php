@extends('layouts.master')

@section('content')

    @include('partials.navbar_noscroll')
    <div class="col-lg-12 col-md-12 col-sm-12" style="margin-top: 100px">
        <h2 class="card-head text-center" id="card-head-phn">MOBILE PHONES IN OUR STORE</h2><br>
        <div class="row">
            <div class="col-lg-12">
                <div class="col-lg-3" style="float: left;">
                    <h4 class="card-head text-center" name="search-item" id="card-head-phn"><i class="fas fa-search"></i> Search</h4><br>
                    <label class="form-label">Type phone name</label>
                    <input type="text" id="search-item" name="search-item" class="form-control">
                    <br>
                    <a href="/price_list" class="btn btn-primary btn-block btn-md" id="searchBtn">Get price list</a><br><br>
                    <br><h4 class="card-head text-center" id="card-head-phn"><i class="fas fa-mobile-alt"></i> Available Brands</h4><br>
                    <div class="list-group">
                        @foreach($brands as $row)
                            <a href="/brand/{{ $row->brand }}"><li class="list-group-item text-left cat" id="{{ $row->brand_id }}" value="{{ $row->brand }}">{{ $row->brand }}<img src="/images/phone_brands/{{ $row->brand_image }}" class="img-thumbnail" id="brand-img" style="width: 35px;height: 30px; float: right;"></li></a>
                            <br>@endforeach
                    </div>
                </div>	
                <div class="col-lg-9 col-md-12" style="float: right;">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                            <select id="brandSelect" class="form-control">
                                <option value="" selected disabled>select a phone brand</option>
                                @foreach($brands as $row)
                                    <option value="{{$row->brand_id}}">{{$row->brand}}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <select name="" id="priceSelect" class="form-control">
                                <option value="" selected disabled>select price range</option>
                                <option value="10000-20000">10000-20000</option>
                                <option value="20000-30000">20000-30000</option>
                                <option value="30000-40000">30000-40000</option>
                                <option value="40000-50000">40000-50000</option>
                                <option value="50000-60000">50000-60000</option>
                                <option value="60000-70000">60000-70000</option>
                                <option value="70000-90000">70000-90000</option>
                                <option value="100000-200000">100000-200000</option>
                            </select>
                        </div>
                        <div class="col-lg-4">
                            <button id="findBtn" class="btn btn-primary btn-sm">Find</button>
                        </div>
                    </div>
                    <hr>
                        <div id="filteredData">
                        </div>
                    <br>
                    <div class="row" id="phonesList">
                        @foreach($phones as $phone)
                            <div class="col-lg-3 col-md-4 col-sm-6" id="phone-card">
                                <div class="card" id="phone-card"><br>
                                    <div id="phone-card-img"><img class="card-img-top" id="phone-img" src="/images/phones/{{$phone->image1}}" alt="Card image cap"></div>
                                    <div class="card-body">
                                        <a id="phone-path" href="/phones/{{ $phone->phone_id }}"><h5 class="card-title text-center">{{ $phone->name }}</h5></a><br>
                                        <button  class="btn btn-dark btn-sm" style="font-size: 12px;">Rs. {{ $phone->price }}</button>

                                        <a href="{{url('/cart/add')}}/{{$phone->phone_id}}" style="float: right;" id="add-cart" class="btn btn-primary btn-sm">Add</a>
                                        @guest
                                            <a id="addWish" data-toggle="modal" data-target="#loginModal" class="btn btn-link" style="text-decoration: none;"><i class="fas fa-plus-circle"></i> add to wishlist</a>
                                        @else
                                            @if($wishesHave)
                                                @foreach($wishesHave as $w)
                                                    @if($w->phone_id == $phone->phone_id)
                                                        <p class="text-center" style="font-weight: bold;margin: auto;font-size: 14px;margin-top: 10px;">Already in your wishlist
                                                            <a href="{{url('/')}}/removeWish/{{$w->id}}" id="removeWish" style="text-decoration: none; margin-left: 10px;"><i class="fas fa-trash-alt"></i></a>
                                                        </p>
                                                    @endif
                                                @endforeach
                                            @endif

                                        @endguest
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div id="pagination">{{$phones->links()}}</div>
                </div>
            </div>									
        </div>
        <br>      
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
                    <h5 class="text-danger text-center">You need to login to add a phone to wishlist.</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Phone Results</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="phone_result"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary btn-sm">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            $("#search-item").autocomplete({
                source: "{{ url('search') }}",
                focus: function( event, ui ) {
                    $( "#search" ).val( ui.item.title );
                    return false;
                },
                select: function( event, ui ) {
                    window.location.href = ui.item.url;
                }
            }).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
                var inner_html = '<a href="' + item.url + '" ><div class="image"><img src="' + item.image + '" ></div><div class="label">' + item.name + '</div></a>';
                return $( "<li></li>" )
                    .data( "item.autocomplete", item )
                    .append(inner_html)
                    .appendTo( ul );
            };

            $('#findBtn').on('click', function () {
                $('#phonesList').hide();
                $('#pagination').hide();
                var brand_id = $('#brandSelect').val();
                var price = $('#priceSelect').val();
                $.ajax({
                    url: '{{url('/phoneFilter')}}',
                    data: 'brand_id=' + brand_id + '&price=' + price,
                    type: 'get',
                    success:function (res) {
                        // console.log(res);
                        $('#filteredData').html(res);
                    }
                });
            });
        });
    </script>
@endsection
