@extends('page.layouts.app')

@section('content')
<div class="page-container bg-black">
    <div class="main-content">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-12 col-xs-12" style="padding-top: 100px;">
                <div class="card bg-dark">
                    <h3>You are logged in!</h3>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <h4>Hello there, please be patient till admin accept you, Thank you.</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection