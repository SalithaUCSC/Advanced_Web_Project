@extends('layouts.master')

@section('content')

@include('partials.navbar')
<section id="top">
    @include('partials.carousel') 
</section>
<section id="about" class="about">
    <div class="container">
        <div class="jumbotron">

            <div class="row">
                <div class="col-lg-3">
                    <img src="/images/phones/3.png" class="img-thumbnail" style="width:200px; height: 200px">
                </div>
                <div class="col-lg-9">
                    <h1>WELCOME TO MOBILE4U</h1>
                    <hr>
                    <p class="text-justify">You are at the ideal place where you can search phone details, review and buy. PHONE SHOP is an online portal targetted for customers
                    like you to get the latest updates about mobile phones. You can engage with our blog to get new trending news also.
                    </p>
                    <a class="btn btn-primary btn-md scroll" href="#products">Look for products</a>
                    <br><br><br>
                </div>

                <div class="col-lg-4"><br>
                    <center><img src="/images/search.png" style="width:150px; height: 150px;"></center><br><br><h4 class="text-center">SEARCH</h4>
                </div>
                {{--<div class="col-lg-3"><br>--}}
                    {{--<img src="/images/blog.png" style="width:150px; height: 150px;"><br><br><h4 class="text-center">BLOG</h4>--}}
                {{--</div>--}}
                <div class="col-lg-4"><br>
                    <center><img src="/images/review.png" style="width:150px; height: 150px;"></center><br><br><h4 class="text-center">REVIEW</h4>
                </div>
                <div class="col-lg-4"><br>
                    <center><img src="/images/cart.png" style="width:150px; height: 150px;"></center><br><br><h4 class="text-center">BUY</h4>
                </div>
            </div>
        </div>

    </div>
</section>
{{--</section><section id="products" class="products">--}}
<section class="carousel slide products" id="products" data-ride="carousel" id="postsCarousel">
    <div id="products">
        <h1 class="display-4 text-center">PRODUCTS</h1>
        <br>
        <div class="container">
            <p class="text-center">We are offering you many products belongs to several mobile companies. You can select what you want after
            a comparison. <br><h4 class="text-center">Are you ready to find your choice?</h4></p>
            <center><a class="btn btn-outline-dark btn-md" href="/phones">MOBILE PHONES</a></center>
        </div>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active" style="padding-top: 50px; padding-bottom: 50px;">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4"><div class="card" style="height: 400px;"><br><img style="width:300px; height: 300px;" class="d-block w-100" src="/images/phones/9.png"><div class="card-body"><h5 class="card-title text-center">Sony Xperia XA1</h5></div></div></div>
                            {{--<div class="col-lg-4"><div class="card" style="height: 400px;"><br><img style="width:300px; height: 300px;" class="d-block w-100" src="/images/phones/2.png"></div><div class="card-body"><h5 class="card-title text-center">Sony Xperia XA1</h5></div></div>--}}
                            <div class="col-lg-4"><div class="card" style="height: 400px;"><br><img style="width:300px; height: 300px;" class="d-block w-100" src="/images/phones/7.png"><div class="card-body"><h5 class="card-title text-center">Samsung Galaxy J7 Max</h5></div></div></div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item" style="padding-top: 50px; padding-bottom: 50px;">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4"><div class="card" style="height: 400px;"><br><img style="width:300px; height: 300px;" class="d-block w-100" src="/images/phones/6.png"><div class="card-body"><h5 class="card-title text-center">Sony Xperia XZ</h5></div></div></div>
                            <div class="col-lg-4"><div class="card" style="height: 400px;"><br><img style="width:300px; height: 300px;" class="d-block w-100" src="/images/phones/5.png"><div class="card-body"><h5 class="card-title text-center">Huawei Nova 2i</h5></div></div></div>
                            <div class="col-lg-4"><div class="card" style="height: 400px;"><br><img style="width:300px; height: 300px;" class="d-block w-100" src="/images/phones/4.png"><div class="card-body"><h5 class="card-title text-center">HTC Desire 628</h5></div></div></div>
                        </div>
                    </div>

                </div>
                <div class="carousel-item" style="padding-top: 50px; padding-bottom: 50px;">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4"><div class="card" style="height: 400px;"><br><img style="width:300px; height: 300px;" class="d-block w-100" src="/images/phones/3.png"><div class="card-body"><h5 class="card-title text-center">Apple iPhone 7</h5></div></div></div>
                            {{--<div class="col-lg-4"><div class="card" style="height: 400px;"><br><img style="width:300px; height: 300px;" class="d-block w-100" src="/images/phones/2.png"><div class="card-body"><h5 class="card-title text-center">Sony Xperia XA1</h5></div></div></div>--}}
                            <div class="col-lg-4"><div class="card" style="height: 400px;"><br><img style="width:300px; height: 300px;" class="d-block w-100" src="/images/phones/1.png"><div class="card-body"><h5 class="card-title text-center">Huawei GR5 2017</h5></div></div></div>
                        </div>
                    </div>

                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</section>
<section id="contact" class="contact">
    <h1 class="display-4 text-center">CONTACT US</h1>
    <br><br>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <img src="/images/apple.png" style="width: 450px; height: 500px;">
            </div>
            <div class="col-lg-6" style="margin-left: -60px;">
                <h4>Send us a message if you need to contact us for more details...</h4>
                <form>
                <div class="form-group">
                    <label class="col-form-label" for="username"><i class="fa fa-user"></i> Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter your Username">
                </div>
                <div class="form-group">
                    <label class="col-form-label" for="email"><i class="fa fa-envelope"></i> Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your Email">
                </div>
                <div class="form-group">
                    <label for="message"><i class="fa fa-comments"></i> Message</label>
                    <textarea class="form-control" id="message" rows="3" name="message" placeholder="Type your Message" noresize="noresize"></textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-md">Send</button>
                </form>
            </div>
            <h3 class="text-center" style="margin-left: 20px;"><br>FIND US</h3><br>
            <div class="col-lg-12" id="map"><br>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.902559890263!2d79.85912631471474!3d6.902255320559278!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae25963120b1509%3A0x2db2c18a68712863!2sUniversity+of+Colombo+School+of+Computing+(UCSC)!5e0!3m2!1sen!2slk!4v1514963392001" width="1100" height="300" frameborder="0" style="border:0" allowfullscreen>
                </iframe>
            </div>
            <br><br>
        </div>
    </div>
</section>

@endsection
