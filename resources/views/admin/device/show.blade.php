@extends('admin.layouts.app')
@section('content')
    <div class="page-container">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 grid-margin">
                        <div class="card bg-dark">
                            <div class="card-header border-bottom">
                                <h4 class="card-title text-white">View Device Details</h4>
                            </div>
                            <div class="card-body">
                                <form class="form-sample">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label text-white">Device Name</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="name" id="name" class="form-control text-dark" value="{{ $device->name }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label text-white">Subject</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="subject" id="subject" class="form-control text-dark" value="{{ $device->subject }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label text-white">Assigned Watchmans</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="persons[]" id="persons[]" class="form-control text-dark" value=
                                                        @foreach( $device->persons as $person)
                                                            {{ $person->name }}, 
                                                        @endforeach
                                                    readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label text-white">Fitted Models</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="molds" id="molds" class="form-control text-dark" value=
                                                        @foreach( $device->molds as $mold)
                                                            {{ $mold->name }},
                                                        @endforeach
                                                    readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
