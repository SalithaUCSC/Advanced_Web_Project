@extends('layouts.master')

@section('content')

    @include('partials.navbar_noscroll')

    <div class="container" style="margin-top: 100px;min-height: 1000px;">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="row">
                    <div class="col-lg-6">
                        <h2>User experiences on {{$phone->name}}</h2>
                        @if(count($reviews)>0)
                            <br><h4><span class="badge indigo">{{count($reviews)}}  Thoughts</span></h4>
                        @endif
                        <br><br>
                    </div>
                    @guest
                        <div class="col-lg-6">
                            <a class="btn btn-outline-dark btn-sm" style="float: right;" data-toggle="modal" data-target="#loginModal">ADD REVIEW</a>
                        </div>
                    @else
                        <div class="col-lg-6">
                            <a href="/phones/{{ $phone->phone_id }}" style="float: right;" class="btn btn-outline-primary btn-sm"><i class="fas fa-backward"></i> Back</a>
                            {{--<a href="/phones/reviews/{{ $phone->phone_id }}/create" id="rev-btn" style="float: right;" class="btn btn-outline-dark btn-sm"><i class="fas fa-plus"></i> add review</a>--}}
                            <a href="#" data-toggle="modal" id="add_review" style="float: right;" class="btn btn-outline-dark btn-sm"><i class="fas fa-plus"></i> add review</a>
                        </div>
                    @endif
                </div>
                <div id="reviewContent">
                    @if(count($reviews)>0)
                        @foreach($reviews as $rev)
                            <div class="card">
                                <div class="card-body">
                                    <input type="hidden" id="revId" value="{{ $rev->id }}">
                                    <h4 class="card-title">{{$rev->username}}</h4>
                                    <p>{!! $rev->review !!}</p>
                                    <small>Published at {{ date('h: i a', strtotime($rev->created_at) )}} on {{ date('F j, Y', strtotime($rev->created_at) )}}</small>
                                    <br>
                                    @if(!Auth::guest())
                                        @if(Auth::user()->id == $rev->user_id)
                                            {{--{!! Form::open(['action' => ['ReviewsController@delete', $rev->id], 'method' => 'POST']) !!}--}}
                                            {{--{{Form::hidden('_method', 'DELETE')}}--}}
                                            {{--{{Form::submit('Delete', ['class' => 'btn btn-danger btn-sm float-left'])}}--}}
                                            {{--{!! Form::close() !!}--}}
                                            {{--<a style="float: right;" class="btn btn-danger btn-sm revDelBtn" data-toggle="modal" data-target="#reviewDeleteModal" data-id="{{ $rev->id }}"><i class="fas fa-trash-alt"></i> delete</a>--}}
                                            <a href="/phones/review/{{$rev->id}}" style="background-color: #F5F5F5 !important;float: right; color: black !important;" class="btn btn-link btn-sm">view</a>
                                            {{--<button id="revEditBtn" style="float: right;" class="btn btn-info btn-sm item" value="{!! $rev->review !!}" data-id="{{ $rev->id }}" data-toggle="modal" data-target="#reviewEditModal"><i class="fas fa-edit"></i> Edit</button>--}}

                                        @else
                                            <a href="/phones/review/{{$rev->id}}" style="background-color: #F5F5F5 !important;float: right; color: black !important;" class="btn btn-link btn-sm" id="{{$rev->id}}">reply</a>
                                            <br>

                                        @endif
                                    @endif
                                </div>
                            </div>
                            <br>
                        @endforeach
                        <br>
                        {{$reviews->links()}}
                    @else
                        <h4>No Reviews</h4>
                    @endif

                </div>
            </div>
        </div>
        <br>
    </div>
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top: 100px;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5 class="text-danger text-center">You need to login to review a phone.</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="reviewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top: 50px;">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="text-center">Review a phone.</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="error text-danger"></p>
                    {!! Form::open(['action' => 'ReviewsController@postReview', 'method' => 'POST', 'data-parsley-validate' => ''])!!}
                    {{ Form::hidden('phone_id', $phone->phone_id, ['class' => 'form-control', 'id' => 'phone_id']) }}
                    <div class="form-group">
                        {{ Form::label('username', 'Your username ', ['class' => 'form-label'] )}}
                        {{ Form::text('username','', ['class' => 'form-control', 'id' => 'name', 'required' => '', 'data-parsley-required-message' => 'Your username is required']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('review', 'Your review ', ['class' => 'form-label'] )}}
                        {{ Form::textarea('review', '', ['class' => 'form-control', 'placeholder' => 'Give your review', 'id' => 'review', 'required' => '',
                        'data-parsley-required-message' => 'You can not submit without review', 'data-parsley-minlength' => '10', 'data-parsley-minlength-message' => 'Assumption : Your review is has no meaning. Give an acceptable review']) }}
                    </div>
                    <br>
                    <div class="modal-footer">
                        {{ Form::submit('Add', ['class' => 'btn btn-primary btn-sm', 'id' => 'addRevbtn']) }}
                        {!! Form::close() !!}
                        <button type="button" class="btn btn-dark btn-sm" data-dismiss="modal">Close</button>
                    </div>
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


    {{--{{ csrf_field() }}--}}
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

            $('#saveBtn').click(function (event) {
                var id = $('#reviewNewId').val();
                var value = $('#reviewNew').val();
                // console.log(value);
                $.post('updateReview', {'id' : id, 'value' : value, '_token' : $('input[name=_token]').val()}, function (data) {
                    console.log(data);
                    // $('#items').load(location.href + ' #items');
                });
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $('.revDelBtn').each(function() {
                $(this).click(function(event){
                    var id = $(this).attr('data-id');
                    $('#deleteRevId').val(id);

                });
            });

            // $('#deleteConfirm').each(function() {
                $('#deleteConfirm').click(function(event){
                    var id = $(this).attr('data-id');
                    $('#deleteRevId').val(id);
                    var idval = $(this).val(id);
                    console.log(idval);
                });
            // });
        });
    </script>

    <script>
        $(document).on('click', '#add_review', function () {
           $('#reviewModal').modal('show');

           $('#addRevbtn').click(function () {
               $.ajax({
                  type : 'POST',
                   url : 'post_review',
                   data : {
                      'username' : $('#username').val(),
                       'review' : $('#review').val()
                   },
                   success:function (data) {
                       if((data.errors)){
                           $('.error').removeClass('hidden');
                           $('.error').text(data.errors.username);
                           $('.error').text(data.errors.review);
                       }
                       else {
                           $('.error').remove();
                       }
                   }
               });
           });
        });
    </script>
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        // CKEDITOR.replace( 'review' );
        // CKEDITOR.replace( 'reviewNew' );
    </script>
@endsection
