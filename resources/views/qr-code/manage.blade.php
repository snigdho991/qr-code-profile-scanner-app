@extends('layouts.master')
@section('title', 'QR Code')

@section('content')
    <!-- ========================== Page Content ==================================== -->
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">QR Code</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">QR Code</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    @if($qr_code->status == "used")

                        <div class="alert bg-success bg-gradient text-white" style="text-align: center;font-weight: 550;" role="alert">
                            <i class="mdi mdi-check-all me-2"></i>
                            This QR Code has been used by a user. Scan the QR Code to see the profile of the user.

                        </div>

                    @elseif($qr_code->status == "unused")
                        <div class="alert bg-danger bg-gradient text-white" style="text-align: center;font-weight: 550;" role="alert">
                            <i class="mdi mdi-block-helper me-2"></i>
                            This QR code hasn't been used till now and available to use. Scan the QR Code to see the available profile link.

                        </div>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="media">
                                
                                <div class="media-body overflow-hidden">
                                    <h5 class="text-truncate font-size-15">QR Code Unique Link : <span class="text-primary">{{ $qr_code->link }}</span></h5>
                                    <p class="text-muted">You can track your own prefered transaction by using this qrcode link.</p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <h5 class="font-size-15 mt-4">QR Code Details :</h5>
                                    <div class="text-muted mt-4">
                                        <p><i class="mdi mdi-chevron-right text-primary me-1"></i> Name: <span style="text-transform: uppercase; font-weight: 550;">{{ $qr_code->name }}</span></p>
                                        <p><i class="mdi mdi-chevron-right text-primary me-1"></i> Status: <span style="text-transform: uppercase; font-weight: 550;">{{ $qr_code->status }}</span></p>
                                        
                                        @if($qr_code->status == "used")
                                            <p><i class="mdi mdi-chevron-right text-primary me-1"></i> Profile Link: <a href="{{ route('frontend.profile', $qr_code->link) }}" target="_blank" style="font-weight: 550;">Click Here</a></p>
                                        @endif
                                        
                                    </div>
                                </div>

                                
                                <div class="col-md-6">
                                    <div class="zoom-gallery d-flex flex-wrap">
                                            
                                        <img src="{{ asset('assets/uploads/qr-codes/'.$qr_code->link.'.svg') }}" style="height: 160px;" alt="qr-code" width="275">
                                        
                                    </div>
                                </div>

                            </div>
                            
                            <?php
                                $date_time = strtotime($qr_code->created_at);
                                $not_date = date('d M, Y', $date_time);

                                $newDateTime = date('h:i A', $date_time);
                            ?>
                            <div class="row task-dates">

                                <div class="col-sm-4 col-4">
                                    <div class="mt-4">
                                        <h5 class="font-size-14"><i class="bx bx-calendar me-1 text-primary"></i> Start Date</h5>
                                        <p class="text-muted mb-0">{{ $not_date }} - {{ $newDateTime }}</p>
                                    </div>
                                </div>

                                <div class="col-sm-4 col-4">
                                    <div class="mt-4">
                                        <h5 class="font-size-14"><i class="bx bx-calendar me-1 text-primary"></i> Since</h5>
                                        <p class="text-muted mb-0" style="margin-left: 22px;">{{ $qr_code->created_at->diffForHumans() }}</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-5">QR Code Tracker</h4>
                            <div class="">
                                <ul class="verti-timeline list-unstyled">
                                @if($qr_code->status == 'unused')
                                    <li class="event-list">
                                        <div class="event-timeline-dot">
                                            <i class="bx bx-check-circle"></i>
                                        </div>
                                        <div class="media">
                                            <div class="me-3">
                                                <i class="bx bx-copy-alt h2 text-primary"></i>
                                            </div>
                                            <div class="media-body">
                                                <div>
                                                    <h5>QR Code Created</h5>
                                                    <p class="text-muted">QR Code has been created successfully.</p>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="event-list active">
                                        <div class="event-timeline-dot">
                                            <i class="bx bx-right-arrow-circle bx-fade-right"></i>
                                        </div>
                                        <div class="media">
                                            <div class="me-3">
                                                <i class="bx bx-copy-alt h2 text-primary"></i>
                                            </div>
                                            <div class="media-body">
                                                <div>
                                                    <h5>Unused Till Now</h5>
                                                    <p class="text-muted">This QR code hasn't been used till now and available to use by any user.</p>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @else
                                    <li class="event-list">
                                        <div class="event-timeline-dot">
                                            <i class="bx bx-check-circle"></i>
                                        </div>
                                        <div class="media">
                                            <div class="me-3">
                                                <i class="bx bx-copy-alt h2 text-primary"></i>
                                            </div>
                                            <div class="media-body">
                                                <div>
                                                    <h5>QR Code Created</h5>
                                                    <p class="text-muted">QR Code has been created successfully.</p>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="event-list active">
                                        <div class="event-timeline-dot">
                                            <i class="bx bx-check-circle bx-fade-right"></i>
                                        </div>
                                        <div class="media">
                                            <div class="me-3">
                                                <i class="bx bx-copy-alt h2 text-primary"></i>
                                            </div>
                                            <div class="media-body">
                                                <div>
                                                    <h5>Used Already</h5>
                                                    <p class="text-muted">A profile has been created by using this QR Code. See the profile by noticing the 'User' nlock.</p>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endif
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-lg-4 col-sm-6" id="tooltip-container">
                    <div class="card text-center">
                    <div class="card-body">
                        <span class="badge rounded-pill badge-soft-primary font-size-11">Administrator</span>
                        <div class="avatar-sm mx-auto mb-4">
                            <br><span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-16">
                                @if($admin->profile_photo_path)
                                    <img src="{{ asset('/assets/uploads/customer/'.$admin->photo) }}" alt="admin-pic" height="40" width="40" style="border-radius: 50%;">
                                @else
                                    {{ $adminAvatar }}
                                @endif
                            </span>
                        </div>
                        <br>

                        <h5 class="font-size-15 mb-1"><a href="#" class="text-dark" data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="left" title="{{ $admin->name }}">{{ $admin->name }}</a></h5>
                        <p class="text-muted">{{ $admin->email }}</p>

                    </div>
                    </div>

                @if($qr_code->status != 'unused')
                    <div class="card">
                        <div class="card-body">
                            <div class="media">
                            <div class="avatar-md me-4">
                                <span class="avatar-title rounded-circle bg-light text-danger font-size-16">
                                    @if($user->profile_photo_path)
                                        <img src="{{ asset('/assets/uploads/users/'.$user->profile_photo_path) }}" alt="user-pic" height="30">
                                    @else
                                        {{ $userAvatar }}
                                    @endif
                                </span>
                            </div>

                            <div class="media-body overflow-hidden">
                                <span class="badge rounded-pill badge-soft-info font-size-11">User</span>
                                <h5 class="text-truncate font-size-15 mt-2"><a href="#" class="text-dark" data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="left" title="{{ $user->name }}">{{ $user->name }}</a></h5>
                                <p class="text-muted mb-4">{{ $user->email }}</p>
                                
                            </div>
                            </div>
                        </div>                   
                    </div>
                @endif
                </div>

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->                
                
@endsection