@extends('layouts.master')

@section('content')

    @include('partials.navbar_noscroll')

    <div class="container" style="margin-top: 100px;min-height: 1000px;">
        <a href="/phones/{{$review->phone_id}}" class="btn btn-outline-dark btn-sm">back to phone</a>

        <br><br>
        <!--Card-->
        <div class="card">
            <!--Card content-->
            <div class="card-body">
                <!--Title-->
                <p class="card-text" style="font-size: 18px;">{!! $review->review !!}</p>
                <hr>
                <p class="card-text">Posted by <b>{{$review->username}}</b></p>
                <p class="card-text">Published at {{ date('h: i a', strtotime($review->created_at) )}} on {{ date('F j, Y', strtotime($review->created_at) )}}</p>
                @if(!Auth::guest())
                    @if(Auth::user()->id == $review->user_id)
                        <a style="float: right;" class="btn btn-danger btn-sm revDelBtn" data-toggle="modal" data-target="#reviewDeleteModal" data-id="{{ $review->id }}"><i class="fas fa-trash-alt"></i> delete</a>
                        <button id="revEditBtn" style="float: right;" class="btn btn-info btn-sm item" value="{!! $review->review !!}" data-id="{{ $review->id }}" data-toggle="modal" data-target="#reviewEditModal"><i class="fas fa-edit"></i> Edit</button>
                    @endif
                @endif
            </div>
        </div>
        <br>

        <h4>Replies for review : <span class="badge indigo" style="margin-left: 20px;background-color: #F5F5F5 !important; font-size: 14px; color: black !important;">{{count($review->replies)}} Replies</span></h4>
        <hr>
        @if(count($review->replies) > 0)
            <ul class="list-group">
            @foreach ($review->replies as $reply)
                <li class="list-group-item">
                    <div class="row">
                        {{--<li class="list-group-item">--}}
                        <div class="col-lg-9" style="float: left"><b>{{ $reply->username }}</b></div><br><br>
                        <div class="col-lg-3" style="float: right">commented on <small>{{ date('M j, Y h:ia', strtotime($reply->created_at) )}}</small><br></div>

                    </div>
                    {!!$reply->reply_review!!}<br>
                </li>
                    <hr>
            @endforeach
            </ul>
        @else
            <p>No one has replied yet. Be the first.</p><br>
        @endif
        <br><h4>Drop your comment</h4><br>
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div id="comment-content">
                    @include('partials.reviewmessages')
                    <div id="reply-review-form" style="padding-bottom: 120px;">
                        {!! Form::open(['action' => 'ReviewsController@replyReview', 'method' => 'POST', 'id' =>'addReply-{{$rev->id}}', 'data-parsley-validate' => ''])!!}
                        {{ Form::hidden('phone_id', $review->phone_id, ['class' => 'form-control', 'id' => 'phone_id']) }}
                        {{ Form::hidden('review_id', $review->id, ['class' => 'form-control', 'id' => 'id']) }}
                        {{ Form::hidden('user_id', Auth::user()->id, ['class' => 'form-control', 'id' => 'id']) }}
                        <div class="form-group">
                            {{ Form::label('username', 'Your username ', ['class' => 'form-label'] )}}
                            {{ Form::text('username', Auth::user()->name, ['class' => 'form-control', 'id' => 'title', 'required' => '', 'data-parsley-required-message' => 'Your username is required']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('review', 'Your Reply ', ['class' => 'form-label'] )}}
                            {{ Form::textarea('reply_review', '', ['class' => 'form-control', 'placeholder' => 'mention your reply', 'id' => 'body', 'required' => '',
                        'data-parsley-required-message' => 'You can not submit without review']) }}
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
    <div class="modal fade" id="reviewEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top: 50px;">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="text-center">Edit a Review</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="error text-danger"></p>
                    {!! Form::open(['action' => ['ReviewsController@updateReview', 'id' => $review->id], 'method' => 'POST', 'data-parsley-validate' => ''])!!}
                    {{ Form::hidden('phone_id', $review->phone_id, ['class' => 'form-control', 'id' => 'phone_id']) }}
                    {{ Form::hidden('id', $review->id, ['class' => 'form-control', 'id' => 'reviewNewId']) }}
                    {{ Form::hidden('user_id', auth()->user()->id, ['class' => 'form-control', 'id' => 'user_id']) }}
                    <div class="form-group">
                        {{ Form::label('username', 'Your username ', ['class' => 'form-label'] )}}
                        {{ Form::text('username',auth()->user()->name, ['class' => 'form-control', 'id' => 'name', 'required' => '', 'data-parsley-required-message' => 'Your username is required']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('review', 'Your review ', ['class' => 'form-label'] )}}
                        {{ Form::textarea('review', '', ['class' => 'form-control', 'placeholder' => 'Give your review', 'id' => 'reviewNew', 'required' => '',
                        'data-parsley-required-message' => 'You can not submit without review', 'data-parsley-minlength' => '10', 'data-parsley-minlength-message' => 'Assumption : Your review is has no meaning. Give an acceptable review']) }}
                    </div>
                    <br>
                    <div class="modal-footer">
                        {{ Form::hidden('_method', 'PUT')}}
                        {{ Form::submit('update', ['class' => 'btn btn-primary btn-sm', 'id' => 'saveBtn']) }}
                        {!! Form::close() !!}
                        <button type="button" class="btn btn-dark btn-sm" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="reviewDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top: 50px;">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="text-center">Delete Review</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are u sure you want to delete this review?</p>
                    <input type="hidden" id="{{ $review->id }}" value="{{ $review->id }}">
                    <input type="hidden" id="revPhoneId" value="{{ $review->phone_id }}">
                    <a href="/deleteReview/{{$review->id}}" class="btn btn-danger btn-sm">confirm</a>
                    <button type="button" class="btn btn-dark btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('.item').each(function() {
                $(this).click(function(event){
                    var text = $(this).val();
                    $('#reviewNew').val(text);
                    var id = $(this).attr('data-id');
                    $('#reviewNewId').val(id);
                });
            });
        });
    </script>
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        // CKEDITOR.replace( 'reply_review' );
    </script>
@endsection
