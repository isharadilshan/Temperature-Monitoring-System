@extends('page.layouts.app')

@section('content')
<div class="page-container bg-black">
    <div class="main-content">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-12 col-xs-12" style="padding-top: 100px;">
                <div class="card bg-dark">
                    <div class="card-header border-bottom text-center">
                        <h4 class="card-title text-white">Sign In</h4>
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal m-t-20" method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group">
                                <input placeholder="Email" id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
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
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="custom-control-label text-white" for="customCheck1">Remember me</label>
                                </div>
                            </div>
                            <div class="form-group text-center m-t-20">
                                <button class="btn btn-common btn-block" type="submit">Log In</button>
                            </div>
                            <div class="form-group">
                                <div class="float-right">
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link text-white" href="{{ route('password.request') }}"><i class="lni-lock"></i>Forgot Your Password?</a>
                                    @endif
                                </div>
                                <div class="float-left">
                                    <a href="{{ route('register') }}" class="text-white"><i class="lni-user"></i> Create an account</a>
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
