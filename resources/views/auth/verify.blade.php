@extends('page.layouts.app')

@section('content')
<div class="page-container bg-black">
    <div class="main-content">
        <div class="row justify-content-center" style="padding-top: 200px;">
            <div class="col-md-8">
                <div class="card bg-dark text-white">
                    <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('A fresh verification link has been sent to your email address.') }}
                            </div>
                        @endif

                        {{ __('Before proceeding, please check your email for a verification link.') }}
                        {{ __('If you did not receive the email') }}, <a style="color:#cc0066;" href="{{ route('verification.resend') }}"><strong>{{ __('click here to request another') }}</strong></a>.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
