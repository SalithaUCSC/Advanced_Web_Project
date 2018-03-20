@extends('layouts.master')

@section('content')

@include('partials.navbar')
<section id="top">
    @include('partials.carousel') 
</section>
<section id="about" class="about">
    <div class="container">
        <div class="jumbotron">
            <h1 class="display-4">Hello, world!</h1>
            <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
            <hr class="my-4">
            <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
            <p class="lead">
                <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
            </p>
        </div>
    </div>

</section>
<section id="products" class="products">
    <h1 class="display-4 text-center"><center>PRODUCTS</center></h1>				         		
</section>
<section id="contact" class="contact">
    <h1 class="display-4 text-center"><center>CONTACT US</center></h1>
</section>

@endsection
