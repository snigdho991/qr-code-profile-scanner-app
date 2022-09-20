@extends('layouts.master')
@section('title', 'Edit Profile')

@section('content')

    <!-- Question Answer Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">How It Works?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5>Question-1: How it works?</h5>
                    <p style="font-weight: 500;">Answer: Dummy Text will be there. Dummy Text will be there. Dummy Text will be there. </p>
                </div>
                <div class="modal-footer">
                    <span style="width: 100%;text-align: center;">
                        <button type="button" class="btn btn-light text-center" data-bs-dismiss="modal">Close</button>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- ========================== Page Content ==================================== -->
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Edit Profile <i class="fas fa-question-circle" style="cursor: pointer; font-size: 18px; position: relative; top: 1px;" data-bs-toggle="modal" data-bs-target="#staticBackdrop"></i> </h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard </a></li>
                                <li class="breadcrumb-item active" style="color: #74788d;">Edit Profile</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-12">
                    
                    @if(count($errors) > 0)
                        <div class="alert alert-dismissible fade show color-box bg-danger bg-gradient p-4" role="alert">
                            <x-jet-validation-errors class="mb-4 my-2 text-white" />
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                        
                </div>
            </div>

            <?php
                $find_profile = App\Models\Profile::where('user_id', $user->id)->first();
            ?>

            <div class="row">
                <div class="col-lg-12">

                <form class="needs-validation" action="{{ route('update.profile') }}" method="post" enctype="multipart/form-data" novalidate="">
                    @csrf

                    <input type="hidden" name="user_id" value="{{ $user->id }}">

                    <div class="zoom-gallery flex-wrap">
                        @if($find_profile->cover_photo != null)
                            <a href="{{ asset('assets/uploads/users/cover/'.$find_profile->cover_photo) }}" title="{{ $find_profile->cover_photo }}">
                                <img src="{{ asset('assets/uploads/users/cover/'.$find_profile->cover_photo) }}" alt="" class="rounded" style="width: 100% !important; height: 325px;">
                            </a>
                        @else
                            <a href="{{ config('core.image.default.cover') }}" title="Cover Photo">
                                <img src="{{ config('core.image.default.cover') }}" alt="" class="rounded" style="width: 100% !important; height: 325px;">
                            </a>
                        @endif
                    </div>

                    <div class="card">

                        <div class="row">
                            <div class="col-md-5"></div>

                            <div class="col-md-2">
                                <div class="avatar-md profile-user-wid mb-4" style="display: block;margin: auto;margin-top: -180px;height: 220px; width: 220px;">
                                    <div class="zoom-gallery d-flex flex-wrap">
                                        
                                        @if($user->profile_photo_path != null)
                                            <a href="{{ asset('assets/uploads/users/profile/'.$user->profile_photo_path) }}" title="{{ $user->profile_photo_path }}">
                                                <img src="{{ asset('assets/uploads/users/profile/'.$user->profile_photo_path) }}" alt="" style="height: 220px !important; width: 220px !important;" class="img-thumbnail rounded-circle">
                                            </a>
                                        @else
                                            <a href="{{ config('core.image.default.avatar') }}" title="Profile Photo">
                                                <img src="{{ config('core.image.default.avatar') }}" alt="" style="height: 220px !important; width: 220px !important;" class="img-thumbnail rounded-circle">
                                            </a>
                                        @endif

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-5"></div>
                        </div>

                        <div class="card-body">
                            
                            <div class="row">
                                <h5 class="text-primary" style="text-align: center;">Image Section</h5>

                                <div class="col-md-6">
                                    <div class="mb-3 position-relative">
                                        <p for="validationTooltip09" class="form-label" id="sameCenter">Upload/Change Profile Photo</p>
                                        <input type="file" class="form-control" id="validationTooltip09" placeholder="Upload Profile Photo" name="profile_photo">
                                        <div class="valid-tooltip">
                                            Looks good!
                                        </div>

                                        <div class="invalid-tooltip">
                                            Please upload a profile photo.
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3 position-relative">
                                        <p for="validationTooltip10" class="form-label" id="sameCenter">Upload/Change Cover Photo</p>
                                        <input type="file" class="form-control" id="validationTooltip10" placeholder="Upload Cover Photo" name="cover_photo">
                                        <div class="valid-tooltip">
                                            Looks good!
                                        </div>

                                        <div class="invalid-tooltip">
                                            Please upload a cover photo.
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">

                            <div class="row">
                                <h5 class="text-primary mb-3" style="text-align: center;">Social & Profile Mode</h5>
                                
                                <div class="col-md-6">
                                
                                    @if($user->id == Auth::id())
                                        
                                        <p class="text-center mt-2">
                                            <a class="btn btn-light btn-sm" target="_blank" href="{{ route('social.media.links') }}"><i class="bx bxs-edit me-1" style="position: relative; top: 2px; font-size: 15px;"></i> Manage Social Links
                                            </a>
                                        </p>
                                        
                                    @endif 
                                    
                                </div>
                                
                                <div class="col-md-6">
                                    
                                    @if($user->id == Auth::id())
                                        <p class="text-center mt-2">
                                            <a class="btn btn-light btn-sm" target="_blank" href="{{ route('profile.mode') }}"><i class="bx bx-target-lock me-1" style="position: relative; top: 2px; font-size: 15px;"></i> Select Profile Mode
                                            </a>
                                        </p>
                                    @endif
                                    
                                </div>
                            </div>
                            
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">

                                <div class="row">
                                    <h5 class="text-primary" style="text-align: center;">Your Bio</h5>
                                    <div class="col-md-12">
                                        <div class="mb-3 position-relative">
                                            <p for="validationTooltip01" id="sameCenter" class="form-label" style="margin-top: 5px;"> Headline</p>
                                            <input type="text" class="form-control" id="validationTooltip01" placeholder="Enter Headline" name="headline" value="{{ old('headline', $find_profile->headline) }}">
                                            <div class="valid-tooltip">
                                                Looks good!
                                            </div>

                                            <div class="invalid-tooltip">
                                                Please enter headline.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <br>

                                <div class="row">
                                    <h5 class="text-primary" style="text-align: center;">Work Details</h5>

                                    <div class="col-md-6">
                                        <div class="mb-3 position-relative">
                                            <p for="validationTooltip02" class="form-label" id="sameCenter">Work Station</p>
                                            <input type="text" class="form-control" id="validationTooltip02" placeholder="Enter Work Station" name="work_station" value="{{ old('work_station', $find_profile->work_station) }}">
                                            <div class="valid-tooltip">
                                                Looks good!
                                            </div>

                                            <div class="invalid-tooltip">
                                                Please enter work station.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3 position-relative">
                                            <p for="validationTooltip03" class="form-label" id="sameCenter">Work Postition</p>
                                            <input type="text" class="form-control" id="validationTooltip03" placeholder="Enter Work Postition" name="work_position" value="{{ old('work_position', $find_profile->work_position) }}">
                                            <div class="valid-tooltip">
                                                Looks good!
                                            </div>

                                            <div class="invalid-tooltip">
                                                Please enter work position.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <br>

                                <div class="row">
                                    <h5 class="text-primary" style="text-align: center;">Education Details</h5>

                                    <div class="col-md-6">
                                        <div class="mb-3 position-relative">
                                            <p for="validationTooltip04" class="form-label" id="sameCenter">School</p>
                                            <input type="text" class="form-control" id="validationTooltip04" placeholder="Enter Your School" name="edu_school" value="{{ old('edu_school', $find_profile->edu_school) }}">
                                            <div class="valid-tooltip">
                                                Looks good!
                                            </div>

                                            <div class="invalid-tooltip">
                                                Please enter your school.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3 position-relative">
                                            <p for="validationTooltip05" class="form-label" id="sameCenter">Degree</p>
                                            <input type="text" class="form-control" id="validationTooltip05" placeholder="Enter Work Postition" name="edu_degree" value="{{ old('edu_degree', $find_profile->edu_degree) }}">
                                            <div class="valid-tooltip">
                                                Looks good!
                                            </div>

                                            <div class="invalid-tooltip">
                                                Please enter your degree.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <br>

                                <div class="row">
                                    <h5 class="text-primary" style="text-align: center;">Others</h5>

                                    <div class="col-md-6">
                                        <div class="mb-3 position-relative">
                                            <p for="validationTooltip06" class="form-label" id="sameCenter">Location</p>
                                            <input type="text" class="form-control" id="validationTooltip06" placeholder="Enter Location" name="location" value="{{ old('location', $find_profile->location) }}">
                                            <div class="valid-tooltip">
                                                Looks good!
                                            </div>

                                            <div class="invalid-tooltip">
                                                Please enter your location.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3 position-relative">
                                            <p for="validationTooltip07" class="form-label" id="sameCenter">Skills (Press , to spacify a particular skill)</p>
                                            
                                            <input type="text" name="skills" class="form-control tagin" id="validationTooltip07" data-duplicate="false" value="{{ old('skills', $find_profile->skills) }}">
                                            <div class="valid-tooltip">
                                                Looks good!
                                            </div>

                                            <div class="invalid-tooltip">
                                                Please enter your skills.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <br>

                                <div class="row">                                    
                                    <div class="col-md-12">                                        
                                        <button class="btn btn-primary" style="margin-top: 6px !important; width: 100% !important" type="submit">Update Profile</button>                                        
                                    </div>                   
                                </div>
                        </div>
                        <!-- end card body -->
                    </div>

                </form>
                    <!-- end card -->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->                
                
@endsection


@section('styles')
    
    <link rel="stylesheet" href="{{ asset('/assets/css/tagin.min.css') }}" />


    @if(Auth::user()->theme == 'default')
        <style type="text/css">
            #sameCenter {
                text-align: center !important;
                font-weight: 550 !important;
                color: #495057 !important;
            }
        </style>
    @else
        <style type="text/css">
            #sameCenter {
                text-align: center !important;
                font-weight: 550 !important;
                color: #fff !important;
            }
        </style>
    @endif
@endsection


@section('scripts')
    <script src="{{ asset('/assets/js/tagin.min.js') }}"></script>
    
    <script>
        for (const el of document.querySelectorAll('.tagin')) {
          tagin(el)
        }
    </script>
@endsection