@extends('layouts.master')
@section('content')

@include('partials.navbar_noscroll')
    <div class="container">
        <h1 style="margin-top: 30px;">Create a Post</h1><br>
        <br><br>
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                @include('partials.messages')
                {!! Form::open(['action' => ['PostsController@update', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                <div class="form-group">
                    {{ Form::label('title', 'Title of the Post ', ['class' => 'form-label'] )}}
                    {{ Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' => 'Give a Title', 'id' => 'title']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('body', 'Body of the Post ', ['class' => 'form-label'] )}}
                    {{ Form::textarea('body', $post->body, ['id' => 'body', 'class' => 'form-control', 'placeholder' => 'Give a Description', 'id' => 'body']) }}
                </div>  
                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-6">
                            <p>New Image</p><br>
                            {{ Form::file('cover_image',['class' => 'dropify'])}}
                        </div>
                        <div class="col-lg-6">
                            <p>Existing Image</p><br>
                            <img src="/storage/cover_images/{{$post->cover_image}}" id="post-img-edit">
                        </div>
                    </div>
                    <br><br>
                </div>
                <br>
                <div class="row" style="margin-left: -5px;">
                    <div style="float: left;">
                        {{ Form::hidden('_method', 'PUT')}}
                        {{ Form::submit('Save changes', ['class' => 'btn btn-outline-success btn-md']) }}
                        {!! Form::close() !!}
                    </div>
                    <div style="float: right;">
                        <a href="/posts/{{ $post->id }}" class="btn btn-outline-dark btn-md"><i class="fas fa-arrow-alt-circle-left"></i> Cancel</a>
                    </div>
                </div>


            </div>
            <div class="col-lg-2"></div>
        </div>
        <br><br><br>
    </div>
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'body' );
    </script>
@endsection
