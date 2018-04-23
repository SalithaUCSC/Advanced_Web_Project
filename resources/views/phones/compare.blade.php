@extends('layouts.master')

@section('content')

    @include('partials.navbar_noscroll')

    <div class="container" style="margin-top: 120px;">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <h3 class="text-center">Compare a phone with {{$phone->name}}</h3>
                <div class="col-lg-4 col-md-12" style="margin-top: 40px;float: left;">
                    <div class="card" style="height: 650px;">
                        <div class="card-body">
                            <h5 class="text-center">Select a phone</h5><br>
                            <div class="form-group">
                                <select name="cphone" id="phoneNameCompare" class="form-control">
                                    <option selected disabled>Choose a phone to compare</option>
                                    @foreach($phones as $row)
                                        <option name="cphone" value="{{$row->phone_id}}">{{$row->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button name="compare" class="btn btn-primary btn-md comparison">COMPARE</button>
                            <br><br>
                            <p style="text-align: justify">Select a phone from the dropdown menu that you want to compare with <b>{{$phone->name}}</b> and compare with it this. You will
                             get a description with only the main features. Click on see more details for a detailed description.</p>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4 col-md-12" style="margin-top: 40px;float: left;">
                    <div class="card" style="height: 650px;">
                        <img src="/storage/phones/{{ $phone->image1 }}" id="compare-phone-img" style="margin: auto;">
                        <div class="card-body">
                            <h4 class="text-center">{{$phone->name}}</h4><br>
                            <ul class="list-group">
                                <li class="list-group-item"><b>RAM</b> : {{$phone->ram}}</li>
                                <li class="list-group-item"><b>Internal Memory</b> : {{$phone->internal}}</li>
                                <li class="list-group-item"><b>Back Camera</b> : {{$phone->cam_primary}}</li>
                                <li class="list-group-item"><b>Front Camera</b> : {{$phone->cam_secondary}}</li>
                                <li class="list-group-item"><b>Display Size</b> : {{$phone->display_size}}</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-12" style="margin-top: 40px;float: left;">
                    <div id="com_result">

                    </div>
                </div>
            </div>
        </div>
        <br>
    </div>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            $(".comparison").click(function(e) {
                e.preventDefault();
                var phone_id = $('#phoneNameCompare').val();
                // alert(cphone);


                $.ajax({
                    url: '{{url('/comparePhone')}}',
                    type : "GET",
                    data: 'phone_id=' + phone_id,
                    success:function(data){
                        // console.log(data);
                        $('#com_result').html(data);
                    }
                    // dataType: "json"

                });
            });

            {{--@foreach($data as $row)--}}
            {{--$('#findBtn').on('click', function () {--}}
                {{--var brand_id = $('#brandSelect').val();--}}
                {{--var price = $('#priceSelect').val();--}}
                {{--// alert(priceRange);--}}
                {{--var rowID = $('#rowID{{$row->id}}').val();--}}
                {{--// alert(rowID);--}}
                {{--$.ajax({--}}
                    {{--url: '{{url('/phoneFilter')}}',--}}
                    {{--data: 'brand_id=' + brand_id + '&price=' + price,--}}
                    {{--type: 'get',--}}
                    {{--success:function (res) {--}}
                        {{--// $('.cart-msg').show();--}}
                        {{--// console.log(res);--}}
                        {{--$('#filteredData').html(res);--}}
                    {{--}--}}
                {{--});--}}
            {{--});--}}
            {{--@endforeach--}}

        });
    </script>
@endsection
