@extends('layouts.master')

@section('content')

    @include('partials.navbar_noscroll')

    <div class="container" style="margin-top: 100px;min-height: 1000px;">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div id="comment-content">
                    {{--<h2>Reply on {{$phone->name}}</h2><br>--}}
                    @include('partials.reviewmessages')
                    <div id="reply-review-form" style="padding-bottom: 120px;">
                        {!! Form::open(['action' => 'ReviewsController@replyReview', 'method' => 'POST'])!!}
                        {{ Form::hidden('phone_id', $phone->phone_id, ['class' => 'form-control', 'id' => 'phone_id']) }}
                        {{ Form::hidden('review_id', $review->id, ['class' => 'form-control']) }}
                        {{ Form::hidden('user_id', Auth::user()->id, ['class' => 'form-control', 'id' => 'id']) }}
                        <div class="form-group">
                            {{ Form::label('username', 'Your username ', ['class' => 'form-label'] )}}
                            {{ Form::text('username', Auth::user()->name, ['class' => 'form-control', 'id' => 'title']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('review', 'Your review ', ['class' => 'form-label'] )}}
                            {{ Form::textarea('reply_review', '', ['class' => 'form-control', 'placeholder' => 'Give your review', 'id' => 'body']) }}
                        </div>
                        <div class="row" style="float: left;margin-left: -5px;">
                            {{ Form::submit('Submit', ['class' => 'btn btn-success btn-sm']) }}
                            {!! Form::close() !!}
                        </div>
                    </div>
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
