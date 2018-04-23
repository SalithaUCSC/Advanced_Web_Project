@extends('layouts.master')

@section('content')

    @include('partials.navbar_noscroll')

    <div class="container" style="margin-top: 100px;min-height: 1000px;">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div id="comment-content">
                    <h2>Comment on {{$phone->name}}</h2><br>
                    @include('partials.reviewmessages')
                    {!! Form::open(['action' => 'ReviewsController@addReview', 'method' => 'POST'])!!}
                        {{ Form::hidden('phone_id', $phone->phone_id, ['class' => 'form-control', 'id' => 'phone_id']) }}
                    <div class="form-group">
                        {{ Form::label('username', 'Your username ', ['class' => 'form-label'] )}}
                        {{ Form::text('username', Auth::user()->name, ['class' => 'form-control', 'id' => 'title']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('review', 'Your review ', ['class' => 'form-label'] )}}
                        {{ Form::textarea('review', '', ['class' => 'form-control', 'placeholder' => 'Give your review', 'id' => 'body']) }}
                    </div>
                    <br>
                    <div class="row" style="float: left;">
                    {{ Form::submit('Add', ['class' => 'btn btn-primary btn-md']) }}
                    {!! Form::close() !!}
                    <a style="float: right;" class="btn btn-outline-dark btn-md" href="/phones/reviews/{{$phone->phone_id}}">Back to reviews</a>
                    </div><br>
                </div>
            </div>
        </div>
        <br>
    </div>
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'review' );
    </script>
@endsection
