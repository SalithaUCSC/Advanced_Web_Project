@extends('layouts.master')

@section('content')

    @include('partials.navbar_noscroll')
    <div class="container" style="margin-bottom: 50px; margin-top: 100px;">
                <p>{{$review->username}}</p><p>{{$review->review}}</p>
                <div class="row" style="margin-left: -5px;">
                    <div style="float: left;">
                        {{--<a href="/posts/{{$review->id}}/edit" class="btn btn-warning btn-md float-left" style="margin-right:20px;"><i class="fas fa-edit"></i> Edit</a>--}}
                        {{--<a href="/posts" class="btn btn-outline-dark btn-md"><i class="fas fa-arrow-alt-circle-left"></i> Go Back</a>--}}
                    </div>
                    <div style="float: right;">
                        {!! Form::open(['action' => ['ReviewsController@destroy', $review->id], 'method' => 'POST']) !!}
                          {{Form::hidden('_method', 'DELETE')}}
                        {{Form::submit('Delete', ['class' => 'btn btn-danger btn-md float-left'])}}
                        {!! Form::close() !!}

                    </div>
                </div>
    </div>
@endsection