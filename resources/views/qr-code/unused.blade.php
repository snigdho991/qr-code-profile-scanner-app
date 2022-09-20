@extends('layouts.master')
@section('title', 'Unused QR Codes')

@section('content')
    <!-- ========================== Page Content ==================================== -->
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Unused QR Codes</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Unused QR Codes</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            @if(Session::has('qrerror-message'))
                                <div class="alert alert-dismissible fade show color-box bg-danger bg-gradient p-4" role="alert">
                                    <span class="mb-4 my-2 text-white">{{ Session::get('qrerror-message') }}</span>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th style="width: 20px;">
                                            SL
                                        </th>
                                        <th class="align-middle">Name</th>
                                        <th class="align-middle">Slug Link</th>
                                        <th class="align-middle">Date</th> 
                                        <th class="align-middle">Status</th>
                                        <th class="align-middle">View Details</th>
                                    </tr>
                                </thead>


                                <tbody>
                                @foreach($unused_codes as $key => $unused_code)
                                    <tr>
                                        <td>
                                            {{ $key + 1 }}
                                        </td>
                                        <td id="tooltip-container">
                                            <span data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ $unused_code->name }}">
                                                {{ substr(strip_tags($unused_code->name), 0, 12) . '...' }}
                                            </span>
                                        </td>
                                        <td><span class="text-body fw-bold">{{ $unused_code->link }}</span>
                                        </td>
                                        <td>
                                            <?php
                                                $date_time = strtotime($unused_code->created_at);
                                                $not_date = date('d M, Y', $date_time);
                                            ?>
                                            {{ $not_date }}
                                        </td>
                                    
                                        
                                        <td>
                                            @if($unused_code->status == 'unused')
                                                <span class="badge badge-pill badge-soft-warning font-size-11">Unused</span>
                                            
                                            @else
                                                <span class="badge badge-pill badge-soft-success font-size-11">Used</span>
                                            
                                            @endif

                                        </td>

                                        
                                        <td>
                                            <!-- Button trigger modal -->
                                            <a href="{{ route('qrcode.manage', $unused_code->link) }}" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light">
                                                View Details
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->                
                
@endsection