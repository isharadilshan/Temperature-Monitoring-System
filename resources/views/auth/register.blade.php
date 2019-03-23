@extends('page.layouts.app')

@section('content')

<div class="page-container bg-black">
    <div class="main-content">
        <div class="row justify-content-center" style="padding-top: 50px;">
            <div class="col-lg-5 col-md-12 col-xs-12">
                <div class="card bg-dark">
                    <div class="card-header border-bottom text-center">
                        <h4 class="card-title text-white">Register</h4>
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal m-t-20" method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group">
                                <input required="" placeholder="Username" id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <input required="" placeholder="Email" id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <input placeholder="Password" id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                            <div class="form-group text-center m-t-20">
                                <button class="btn btn-common btn-block" type="submit">Register</button>
                            </div>
                            <div class="form-group m-t-10 mb-0">
                                <div class="text-center">
                                    <a href="{{ route('login') }}" class="text-muted">Already have account?</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
