@extends('layouts.master')
@section('title', 'Used QR Codes')

@section('content')
    <!-- ========================== Page Content ==================================== -->
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Used QR Codes</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Used QR Codes</li>
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

                            <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th style="width: 20px;">
                                            SL
                                        </th>
                                        <th class="align-middle">Name</th>
                                        <th class="align-middle">Slug Link</th>
                                        <th class="align-middle">Date</th> 
                                        <th class="align-middle">Profile</th>
                                        <th class="align-middle">Status</th>
                                        <th class="align-middle">View Details</th>
                                    </tr>
                                </thead>


                                <tbody>
                                @foreach($used_codes as $key => $used_code)
                                    <tr>
                                        <td>
                                            {{ $key + 1 }}
                                        </td>
                                        <td id="tooltip-container">
                                            <span data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ $used_code->name }}">
                                                {{ substr(strip_tags($used_code->name), 0, 12) . '...' }}
                                            </span>
                                        </td>
                                        <td><span class="text-body fw-bold">{{ $used_code->link }}</span>
                                        </td>
                                        
                                        <td>
                                            <?php
                                                $date_time = strtotime($used_code->created_at);
                                                $not_date = date('d M, Y', $date_time);
                                            ?>
                                            {{ $not_date }}
                                        </td>
                                    
                                        <td>
                                            <a href="{{ route('frontend.profile', $used_code->link) }}">View</a>
                                        </td>

                                        <td>
                                            @if($used_code->status == 'unused')
                                                <span class="badge badge-pill badge-soft-warning font-size-11">Unused</span>
                                            
                                            @else
                                                <span class="badge badge-pill badge-soft-success font-size-11">Used</span>
                                            
                                            @endif

                                        </td>

                                        
                                        <td>
                                            <!-- Button trigger modal -->
                                            <a href="{{ route('qrcode.manage', $used_code->link) }}" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light">
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