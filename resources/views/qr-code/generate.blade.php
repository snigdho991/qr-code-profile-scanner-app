@extends('layouts.master')
@section('title', 'Generate New QR Code Link')

@section('content')
    <!-- ========================== Page Content ==================================== -->
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Generate New QR Code Link</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard </a></li>
                                <li class="breadcrumb-item active" style="color: #74788d;">Generate New QR Code Link</li>
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

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <form class="needs-validation" action="{{ route('qrcode.store') }}" method="post" novalidate="">
                            @csrf

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3 position-relative">
                                            <label for="validationTooltip01" class="form-label">Code Name</label>
                                            <input type="text" class="form-control" id="validationTooltip01" placeholder="Enter Code name" name="name" value="{{ old('name') }}" required="">
                                            <div class="valid-tooltip">
                                                Looks good!
                                            </div>

                                            <div class="invalid-tooltip">
                                                Please enter qr code name.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3 position-relative">
                                            <label for="validationTooltip02" class="form-label">Profile Slug Link</label>
                                            <input type="text" class="form-control" name="link" value="{{ old('link') }}" placeholder="Enter Profile Slug" >  
                                        </div>
                                    </div>
                                                                      
                                </div>

                                <br>

                                <div class="row">
                                    
                                    <div class="col-md-12">
                                        
                                        <button class="btn btn-primary" style="margin-top: 6px !important; width: 100% !important" type="submit">Save QR Code</button>
                                        
                                    </div>
                            
                                </div>

                            </form>

                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->


            <div class="row">
                <div class="col-12">
                    <div class="page-title-box text-center">
                        <h4 class="mb-sm-0 font-size-18">OR, IMPORT CSV/EXCEL FILE TO UPLOAD</h4>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <h6 class="text-center"><a href="#" onclick="exportExcel(this);" id="someID" class="btn btn-outline-primary btn-sm"><i class="bx bxs-download" style="position: relative;top: 1px;"></i> Download the demo file to upload</a></h6>

                            <form class="needs-validation" action="{{ route('qrcode.upload.files') }}" method="post" enctype="multipart/form-data" novalidate="">
                            @csrf

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3 position-relative">
                                            <label for="validationTooltip02" class="form-label">Import File(.csv or .xlsx)</label>
                                            <input type="file" class="form-control" id="validationTooltip02" name="file" required="">
                                            <div class="valid-tooltip">
                                                Looks good!
                                            </div>

                                            <div class="invalid-tooltip">
                                                Please select a csv or xlsx file to upload.
                                            </div>
                                        </div>
                                    </div>                                            
                                </div>

                                <br>

                                <div class="row">
                                    
                                    <div class="col-md-12">
                                        <button class="btn btn-success" style="margin-top: 6px !important; width: 100% !important" type="submit">Upload List</button>
                                        
                                    </div>
                            
                                </div>

                            </form>

                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->

            
        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->                
                
@endsection

@section('scripts')
    <script type="text/javascript">
        function exportExcel(el) {

            el.setAttribute("href", "{{ asset('assets/uploads/imported-files/demo.xlsx') }}");
            el.setAttribute("download", "demo.xlsx");
            
        }
    </script>
@endsection