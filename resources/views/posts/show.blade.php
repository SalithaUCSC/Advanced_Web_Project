@extends('layouts.master')

@section('content')

@include('partials.navbar_noscroll')
    <div class="container" style="margin-bottom: 50px;">
        <h1 style="margin-top: 100px;text-align: center;">{{$post->title}}</h1><br>
        <div class="row">
            <div class="col-lg-12">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <img src="/storage/cover_images/{{$post->cover_image}}" id="post-img">
                </div>
                <br>
                <div class="card">
                    <div class="card-body">
                        <p style="font-size:20px;">{!!$post->body!!}</p>
                        <hr>
                        <p style="font-size:14px;">Written on {{ date('M j, Y h:ia', strtotime($post->created_at) )}}</p>
                        <p style="font-size:14px;">Last updated on {{ date('M j, Y h:ia', strtotime($post->updated_at) )}}</p></div>
                </div>
                <br>
                @if(!Auth::guest())
                    @if(Auth::user()->id == $post->user_id)
                        <div class="row" style="margin-left: -5px;">
                            <div style="float: left;">
                                <a href="/posts/{{$post->id}}/edit" class="btn btn-warning btn-md float-left" style="margin-right:20px;"><i class="fas fa-edit"></i> Edit</a>
                                {{--<a href="/posts" class="btn btn-outline-dark btn-md"><i class="fas fa-arrow-alt-circle-left"></i> Go Back</a>--}}

                            </div>
                            <div style="float: right;">
                                {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST']) !!}
                                {{Form::hidden('_method', 'DELETE')}}
                                {{Form::submit('Delete', ['class' => 'btn btn-danger btn-md float-left'])}}
                                {!! Form::close() !!}

                            </div>
                        </div>

                    @endif
                @endif
            </div>
        </div>
    </div>
@endsection