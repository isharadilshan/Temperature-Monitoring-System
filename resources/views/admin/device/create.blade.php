@extends('admin.layouts.app')
@section('headSection')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('admn/select2/css/select2.min.css') }}">
@endsection
@section('content')
    <div class="page-container">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 grid-margin">
                        <div class="card bg-dark">
                            <div class="card-header border-bottom">
                                <h4 class="card-title text-white">Create a Device</h4>
                            </div>
                            @include('admin.includes.message')
                            <div class="card-body">
                                <form class="form-sample" action="{{ route('device.store') }}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label text-white">Device Name</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="name" id="name" placeholder="Enter Device Name" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label text-white">Subject</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="subject" id="subject" placeholder="Enter Subject" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top:18px;">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label text-white">Assign Molds</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Assign a Mold" style="width: 100%;" tabindex="-1" aria-hidden="true" name="molds[]">
                                                        @foreach($molds as $mold )
                                                            <option value="{{ $mold->id}}">{{ $mold->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label text-white">Assigned Watchmans</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Assign a Watchman" style="width: 100%;" tabindex="-1" aria-hidden="true" name="persons[]">
                                                        @foreach($persons as $person )
                                                            <option value="{{ $person->id}}">{{ $person->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-common mr-3">Submit</button>
                                    <a href="{{ route('device.index') }}" class="btn btn-light">Back</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>
@endsection
@section('footerSection')
    <!-- Select2 -->
    <script src="{{ asset('admn/select2/js/select2.min.js') }}"></script>
    <script>
        $(document).ready(function(){
            $(".select2").select2();
        });
    </script>
@endsection