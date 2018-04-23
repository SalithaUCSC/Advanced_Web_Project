<div class="row">
    @foreach($phones as $phone)
        <div class="col-lg-3 col-md-4 col-sm-6" id="phone-card">
            <div class="card" id="phone-card"><br>
                <div id="phone-card-img"><img class="card-img-top" id="phone-img" src="/storage/phones/{{$phone->image1}}" alt="Card image cap"></div>
                <div class="card-body">
                    <a id="phone-path" href="/phones/{{ $phone->phone_id }}"><h5 class="card-title text-center">{{ $phone->name }}</h5></a><br>
                    <button  style="float: left: font-size: 18px;" class="btn btn-dark btn-md">Rs. {{ $phone->price }}</button>
                    <a href="{{url('/cart/add')}}/{{$phone->phone_id}}" style="float: right;" id="add-cart" class="btn btn-primary btn-md">Add</a>
                </div>
            </div>
        </div>
    @endforeach
</div>