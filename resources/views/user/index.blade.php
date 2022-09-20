@extends('layouts.master')
@section('title', 'All Users/Profiles')

@section('content')
    <!-- ========================== Page Content ==================================== -->
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">All Users/Profiles</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">All Users/Profiles</li>
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
                                        <th class="align-middle">Email</th>
                                        <th class="align-middle">Unique Link</th>
                                        <th class="align-middle">Date</th> 
                                        <th class="align-middle">Profile</th>
                                    </tr>
                                </thead>


                                <tbody>
                                @foreach($users as $key => $user)
                                    <?php
                                        $link = \App\Models\QrCode::where('user_id', $user->id)->first()->link;
                                    ?>
                                    <tr>
                                        <td>
                                            {{ $key + 1 }}
                                        </td>
                                        <td id="tooltip-container">
                                            <span data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ $user->name }}">
                                                {{ $user->name }}
                                            </span>
                                        </td>
                                        <td>{{ $user->email }}
                                        </td>
                                        <td><span class="text-body fw-bold">{{ $link }}</span>
                                        </td>
                                        <td>
                                            <?php
                                                $date_time = strtotime($user->created_at);
                                                $not_date = date('d M, Y', $date_time);
                                            ?>
                                            {{ $not_date }}
                                        </td>
                                    
                                        
                                        <td>
                                            <a class="btn btn-primary btn-sm waves-effect btn-label waves-light" target="_blank" href="{{ route('frontend.profile', $link) }}" title="View Profile">
                                                <i class="bx bx-user-pin label-icon"></i> View Profile
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