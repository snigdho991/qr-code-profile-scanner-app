@extends('layouts.master')
@section('title', 'Dashboard')

@section('content')

	<div class="page-content">
	    <div class="container-fluid">

	        <!-- start page title -->
	        <div class="row">
	            <div class="col-12">
	                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
	                    <h4 class="mb-sm-0 font-size-18">{{ Auth::user()->role }} Dashboard</h4>                      
	                </div>
	            </div>
	        </div>
	        <!-- end page title -->

	        <div class="row">
                <div class="col-xl-4">
                    <div class="card overflow-hidden">
                        <div class="bg-primary bg-soft" style="height: 119px !important;">
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-primary p-3">
                                        <h5 class="text-primary">Welcome Back !</h5>
                                        <p>{{ config('app.name') }} Dashboard</p>
                                    </div>
                                </div>
                                <div class="col-5 align-self-end">
                                    <img src="{{ asset('assets/images/profile-img.png') }}" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <?php $user = Auth::user(); ?>
                                        @if($user->profile_photo_path != null)
                                            <img class="img-thumbnail rounded-circle" src="{{ asset('assets/uploads/users/profile/'.$user->profile_photo_path) }}"
                                                alt="">
                                        @else
                                            <img class="img-thumbnail rounded-circle" src="{{ config('core.image.default.avatar') }}"
                                                alt="">
                                        @endif
                                    </div>
                                    <h5 class="font-size-15 text-truncate">{{ Auth::user()->name }}</h5>
                                    <p class="text-muted mb-0 text-truncate">{{ Auth::user()->role }}</p>
                                </div>

                                <div class="col-sm-8">
                                    <div class="pt-4">

                                        <div class="row">
                                            <div class="col-6">
                                                <h5 class="font-size-15">{{ $qrcodes->count() }}</h5>
                                                <p class="text-muted mb-0">QR Codes</p>
                                            </div>
                                            <div class="col-6">
                                                <h5 class="font-size-15">{{ $used->count() }}</h5>
                                                <p class="text-muted mb-0">Used</p>
                                            </div>
                                        </div>
                                        <div class="mt-4">
                                            <a href="{{ url('/user/profile') }}" style="float: right;" class="btn btn-primary waves-effect waves-light btn-sm">Edit Profile <i class="mdi mdi-arrow-right ms-1"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>

                <div class="col-xl-8">
                    <div class="row" id="deviceStandard" style="margin-top: -40px;">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <span class="badge bg-dark font-size-12">QR Codes History <i class="bx bx-caret-down"></i></span><br><br>
                        </div>
                        <div class="col-md-4"></div>
                    </div>

                    <div class="row">

                        <div class="col-md-4">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="media-body">
                                            <p class="text-muted fw-medium">Total QR Codes</p>
                                            <h4 class="mb-0">{{ $qrcodes->count() }}</h4>
                                        </div>

                                        <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                            <span class="avatar-title">
                                                <i class="bx bx-copy-alt font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="media-body">
                                            <p class="text-muted fw-medium">Used</p>
                                            <h4 class="mb-0">{{ $used->count() }}</h4>
                                        </div>

                                        <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                            <span class="avatar-title rounded-circle bg-primary">
                                                <i class="bx bx-archive-in font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="media-body">
                                            <p class="text-muted fw-medium">Unused</p>
                                            <h4 class="mb-0">{{ $unused->count() }}</h4>
                                        </div>

                                        <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                            <span class="avatar-title rounded-circle bg-primary">
                                                <i class="bx bx-purchase-tag-alt font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- end row -->
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <span class="badge bg-dark font-size-12">Apps History <i class="bx bx-caret-down"></i></span><br><br>
                        </div>
                        <div class="col-md-4"></div>
                    </div>

                    <div class="row">

                        <div class="col-md-4">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="media-body">
                                            <p class="text-muted fw-medium">Administrator</p>
                                            <h4 class="mb-0">{{ $administrators->count() }}</h4>
                                        </div>

                                        <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                            <span class="avatar-title">
                                                <i class="bx bx-copy-alt font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="media-body">
                                            <p class="text-muted fw-medium">Users</p>
                                            <h4 class="mb-0">{{ $users->count() }}</h4>
                                        </div>

                                        <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                            <span class="avatar-title rounded-circle bg-primary">
                                                <i class="bx bx-archive-in font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="media-body">
                                            <p class="text-muted fw-medium">Social Links</p>
                                            <h4 class="mb-0">{{ $socials->count() }}</h4>
                                        </div>

                                        <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                            <span class="avatar-title rounded-circle bg-primary">
                                                <i class="bx bx-purchase-tag-alt font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
	    </div>
	</div>

@endsection


@section('styles')
    <style type="text/css">
        .mt-8 {
            margin-top: 3rem !important;
        }

        @media screen and (max-width: 1199px) and (min-width: 300px) {
            #deviceStandard{
                margin-top: 10px !important;
            }

            #marBot{
                margin-top: 12px !important;
            }
        }
    </style>
@endsection