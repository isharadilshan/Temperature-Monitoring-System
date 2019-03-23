@extends('admin.layouts.app')
@section('headSection')
<link href="{{ asset('admn/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('admn/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('admn/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="page-container">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card bg-dark">
                        <div class="card-header border-bottom">
                            <h4 class="card-title text-white">Current Devices</h4>
                            <a href="{{ route('device.create') }}"><button type="submit" class="float-right btn btn-common mr-3">Create New</button></a>
                        </div>
                        <div class="card-body">
                            <script>$().DataTable();</script>
                            <div class="table-responsive">
                                <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Device Name</th>
                                            <th>Assigned Watchmans</th>
                                            <th>Fitted Molds</th>
                                            <th>Created_at</th>
                                            <th>Edit</th>
                                            <th>View</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($devices as $device)
                                            <tr>
                                                <td>{{ $loop->index+1 }}</td>
                                                <td>{{ $device->name }}</td>
                                                <td>
                                                    @foreach( $device->persons as $person)
                                                        {{ $person->name }},
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @foreach( $device->molds as $mold)
                                                        {{ $mold->name }},
                                                    @endforeach
                                                </td>
                                                <td>{{ $device->created_at }}</td>
                                                <td><a href="{{ route('graph',$device->id) }}"><button class="btn btn-common">View</button></a></td>
                                                <td><a href="{{ route('device.edit',$device->id) }}"><span class="fa fa-edit"></span></a></td>
                                                <td><a href="{{ route('device.show',$device->id) }}"><span class="fa fa-eye"></span></a></td>
                                                <td>
                                                    <form method="post"id="delete-form-{{ $device->id }}" action="{{ route('device.destroy',$device->id) }}" style="dispaly: none">
                                                        {{ csrf_field()}}
                                                        {{ method_field('DELETE') }}
                                                    </form>
                                                    <a href="" onclick=" 
                                                        if(confirm('Are You Sure,You want to Delete this ?'))
                                                        {
                                                            event.preventDefault();document.getElementById('delete-form-{{ $device->id }}').submit();
                                                        }
                                                        else
                                                        {
                                                            event.preventDefault();
                                                        }"><span class="fa fa-trash"></span>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</div>
@endsection
@section('footerSection')
<script src="{{ asset('admn/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admn/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>

<script src="{{ asset('admn/plugins/datatables/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('admn/plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admn/plugins/datatables/jszip.min.js') }}"></script>
<script src="{{ asset('admn/plugins/datatables/pdfmake.min.js') }}"></script>
<script src="{{ asset('admn/plugins/datatables/vfs_fonts.js') }}"></script>
<script src="{{ asset('admn/plugins/datatables/buttons.html5.min.js') }}"></script>
<script src="{{ asset('admn/plugins/datatables/buttons.print.min.js') }}"></script>
<script src="{{ asset('admn/plugins/datatables/buttons.colVis.min.js') }}"></script>

<script src="{{ asset('admn/plugins/datatables/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('admn/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>

<script src="{{ asset('admn/js/datatables.init.js') }}"></script>
@endsection