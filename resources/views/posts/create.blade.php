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
                {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST', 'id' => 'post-form', 'enctype' => 'multipart/form-data']) !!}
                <div class="form-group">
                    {{ Form::label('title', 'Title of the Post ', ['class' => 'form-label'] )}}
                    {{ Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Give a Title', 'id' => 'title']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('body', 'Body of the Post ', ['class' => 'form-label'] )}}
                    {{ Form::textarea('body', '', ['class' => 'form-control', 'placeholder' => 'Give a Description', 'id' => 'body']) }}
                </div>   
                <div class="form-group">
                    {{ Form::file('cover_image',['class' => 'dropify'])}}
                </div>
                <br>
                    {{ Form::submit('Post', ['class' => 'btn btn-primary btn-md']) }}     
                {!! Form::close() !!}
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
