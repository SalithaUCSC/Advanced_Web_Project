@foreach($phones as $phone)
<div class="col-lg-3 col-md-12 col-sm-12" id="phone-card">
    <div class="card" id="phone-card"><br>
        <div id="phone-card-img"><img class="card-img-top" id="phone-img" src="/storage/phones/{{$phone->image1}}" alt="Card image cap"></div>
        <div class="card-body">
            <a id="phone-path" href="/phones/{{ $phone->phone_id }}"><h5 class="card-title text-center">{{ $phone->name }}</h5></a>
            <span class="badge badge-dark">Rs. {{ $phone->price }}</span>
        </div>
    </div>
</div>
@endforeach