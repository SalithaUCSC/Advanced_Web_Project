@extends('layouts.master')

@section('content')

@include('partials.navbar')
    <div class="container">
        <div class="col-lg-12 col-md-12 col-sm-12" style="margin-top: 150px; min-height: 500px;">
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <h3>EDIT PROFILE</h3><br>
                                {!! Form::open(['action' => ['UserController@update', $edituser->id], 'method' => 'POST', 'enctype' => 'multipart/form-data', 'data-parsley-validate' => '']) !!}
                                {{ Form::hidden('name', $edituser->id, ['class' => 'form-control']) }}
                                <div class="form-group">
                                    {{ Form::label('name', 'Username', ['class' => 'form-label'] )}}
                                    {{ Form::text('name', $edituser->name, ['class' => 'form-control']) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('email', 'Email', ['class' => 'form-label'] )}}
                                    {{ Form::text('email', $edituser->email, ['class' => 'form-control', 'data-parsley-type'=>'email', 'data-parsley-type-message' => "Provide a valid Email Address"]) }}
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-6" style="float: left;">
                                            {{ Form::label('avatar', 'Profile Picture', ['class' => 'form-label'] )}}
                                            {{ Form::file('avatar',['class' => 'dropify'])}}
                                        </div>
                                        <div class="col-lg-6" style="float: right;">
                                            <p>Current Profile Picuture</p><br>
                                            <img src="/images/avatars/{{$edituser->avatar}}" id="user-img-edit" class="img-thumbnail">
                                        </div>
                                    </div>
                                </div>
                                {{--<br><br>--}}
                                {{ Form::hidden('password', $edituser->password, ['class' => 'form-control']) }}
                                {{ Form::hidden('_method', 'PUT')}}
                                <div class="row" style="margin-left: -5px;">
                                {{ Form::submit('Save changes', ['class' => 'btn btn-outline-success btn-sm']) }}
                                {!! Form::close() !!}
                                <a href="/users/{{ auth()->user()->id }}" class="btn btn-outline-dark btn-sm" style="float: left;"><i class="fas fa-backward"></i> Go back</a>
                                </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-2"></div>
            </div>
            <br>
        </div>	
    </div>				         		
    
{{--<script>--}}
    {{--$(document).ready(function () {--}}

    {{--});--}}
{{--</script>--}}
@endsection
