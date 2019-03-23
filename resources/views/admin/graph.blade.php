@extends('admin.layouts.app')
@section('headSection')
    
@endsection
@section('content')
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>  --}}
    <div class="page-container">
        <div class="main-content">
            <div class="container-fluid">
                @foreach ($data_array as $item)
                {{ dd($item) }}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card bg-dark">
                                <div class="card-header">
                                    <h5 class="card-title text-white">Business Overview</h5>
                                    <div class="float-right">
                                        <ul class="list-inline d-none d-sm-block">
                                            <li>
                                                <span class="status bg-primary"></span>
                                                <span class="text-white text-semibold">Sales</span>
                                            </li>
                                            <li>
                                                <span class="status bg-success"></span>
                                                <span class="text-white text-semibold">Expense</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div id="morris-line-example" style="height: 300px"></div>
                                </div>
                            </div>
                        </div>
                    </div>   
                @endforeach
            </div>
        </div> 
    </div>
@endsection