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

                                        <div class="mt-8">
                                            <a href="{{ route('frontend.profile', $qr_code->link) }}" target="_blank" style="float: right;" class="btn btn-primary waves-effect waves-light btn-sm">View Public Profile <i class="mdi mdi-arrow-right ms-1"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                    
                </div>

                <div class="col-xl-4">
                    <div class="row" id="deviceStandard" style="margin-top: -40px;">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <span class="badge bg-dark font-size-12">Scan QR Code <i class="bx bx-caret-down"></i></span><br><br>
                        </div>
                        <div class="col-md-4"></div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card overflow-hidden">
                                <div class="card-body">
                                    <div class="zoom-gallery d-flex flex-wrap">
                                                
                                        <img src="{{ asset('assets/uploads/qr-codes/'.$qr_code->link.'.svg') }}" style="height: 215px; transform: scale(0.8);" alt="qr-code" width="350">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                </div>

                <div class="col-xl-4">

                    <div class="row" id="deviceStandard" style="margin-top: -40px;">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <span class="badge bg-dark font-size-12">User Panel <i class="bx bx-caret-down"></i></span><br><br>
                        </div>
                        <div class="col-md-4"></div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-12 mb-4" style="margin-top: 18px !important;">
                                    <div class="card border mb-0">
                                        <div class="card-header">
                                            <h6 class="my-0 text-black-50 text-center">User Tool</h6>
                                        </div> 

                                        <div class="card-body bg-transparent text-center">
                                            
                                            <small class="text-success">You can edit the information of your public profile.</small>
                                            
                                        </div>
                                    </div>
                                </div>
                                                                       
                                <div class="col-md-6">
                                    <a class="btn btn-success waves-effect btn-label waves-light" href="{{ route('edit.profile') }}" style="width: 100%;"><i class="bx bx-check-double label-icon"></i> Edit Profile</a>
                                </div>

                                <div class="col-md-6">
                                    <a class="btn btn-info waves-effect btn-label waves-light" href="{{ url('/user/profile') }}" style="width: 100%;" id="marBot"><i class="bx bx-key label-icon"></i> Security Profile</a>
                                </div>

                            </div>
                        </div>

                        <div class="card-footer bg-transparent border-top text-muted text-center">
                            You are logged in as an <b>User</b>
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