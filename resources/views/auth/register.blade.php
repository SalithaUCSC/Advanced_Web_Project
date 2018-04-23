@extends('layouts.master')

@section('content')
@include('partials.navbar_noscroll')
<div class="container" style="margin-top: 150px;min-height: 500px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Register</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" data-parsley-validate="">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right"><i class="fas fa-user-circle"></i></label>

                            <div class="col-md-6">
                                <input id="name" type="text" placeholder="Username" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" autofocus required="" data-parsley-required-message="Username is required">

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right"><i class="fas fa-envelope"></i></label>

                            <div class="col-md-6">
                                <input id="email" type="email" placeholder="E-Mail Address" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" autofocus
                               required="" data-parsley-required-message="Email is required" data-parsley-trigger="change focusout" data-parsley-type="email" data-parsley-type-message="Provide a valid Email Address">

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right"><i class="fas fa-lock"></i></label>

                            <div class="col-md-6">
                                <input id="password" type="password" placeholder="Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                               required="" data-parsley-required-message="Password is required" data-parsley-minlength="6" data-parsley-minlength-message="Password should contain at least 6 characters">

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right"><i class="fas fa-lock"></i></label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" placeholder="Confirm Password" class="form-control" name="password_confirmation"
                               required="" data-parsley-required-message="Confirm Password is required" data-parsley-equalto="#password"
                               data-parsley-equalto-message="Confirm Password should be matched with Password" data-parsley-minlength="6"
                               data-parsley-minlength-message="Confirm Password should contain at least 6 characters">
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary btn-md" style="margin-left: 0px;">
                                    SIGN UP
                                </button>
                                {{--<a href="/login/google"><img src="/images/gplus.png" style="width: 200px; height: 46px;"></a>--}}

                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
