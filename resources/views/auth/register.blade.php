{{-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
 --}}

@extends('layouts.frontend-master')

@section('content')

    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="bg-primary bg-soft">
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-primary p-4">
                                        <h5 class="text-primary">Free Register</h5>
                                        <p>Grab your free {{ config('app.name') }} account now for slug <b>{{ $link }}</b></p>
                                    </div>
                                </div>
                                <div class="col-5 align-self-end">
                                    <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0"> 
                            <div>
                                <div class="avatar-md profile-user-wid mb-4">
                                    <span class="avatar-title rounded-circle bg-light">
                                        <img src="assets/images/logo.svg" alt="" class="rounded-circle" height="34">
                                    </span>
                                </div>
                                
                            </div>
                            <div class="p-2">

                                @if(count($errors) > 0)
                                    <div class="alert alert-dismissible fade show color-box bg-danger bg-gradient p-4" role="alert">
                                        <x-jet-validation-errors class="mb-4 my-2 text-white" />
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif

                                <form class="needs-validation" action="{{ route('register') }}" method="POST" novalidate>
                                    
                                    @csrf

                                    <input type="hidden" name="link" value="{{ $link }}">

                                    <div class="mb-3 position-relative">
                                        <label for="validationTooltip01" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="validationTooltip01" placeholder="Enter your name" name="name" value="{{ old('name') }}" required="">
                                        <div class="valid-tooltip">
                                            Looks good!
                                        </div>

                                        <div class="invalid-tooltip">
                                            Please enter agency name.
                                        </div>
                                    </div>
                                
                                    <div class="mb-3 position-relative">
                                        <label for="validationTooltip02" class="form-label">E-mail</label>
                                        <input type="email" class="form-control" id="validationTooltip02" name="email" value="{{ old('email') }}" placeholder="Enter E-mail Address" required="">
                                        <div class="valid-tooltip">
                                            Looks good!
                                        </div>

                                        <div class="invalid-tooltip">
                                            Please enter valid E-mail address.
                                        </div>
                                    </div>
                                
                                    <div class="mb-3 position-relative">
                                        <label for="validationTooltip07" class="form-label">Password</label>

                                        <div class="input-group auth-pass-inputgroup">
                                            <input type="password" class="form-control" id="validationTooltip07" name="password" value="{{ old('password') }}" aria-label="Password" aria-describedby="password-addon" placeholder="Enter Password" required="">

                                            <div class="valid-tooltip">
                                                Looks good!
                                            </div>

                                            <div class="invalid-tooltip">
                                                Please enter valid password.
                                            </div>
                                            
                                            <button class="btn btn-light" type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                        </div>
                                    </div>

                                    <div class="mb-3 position-relative">
                                        <label for="validationTooltip08" class="form-label">Re-type Password</label>
                                        
                                        <div class="input-group auth-pass-inputgroup">
                                            <input type="password" class="form-control" id="validationTooltip08" placeholder="Re-type Password" aria-label="Password" name="password_confirmation" aria-describedby="password-addon-two" onkeyup="matchPassword()" required="">

                                            <div class="valid-tooltip">
                                                Looks good!
                                            </div>

                                            <div class="invalid-tooltip">
                                                Please Re-type Password again.
                                            </div>

                                            <button class="btn btn-light" type="button" id="password-addon-two" onclick="TogglePass()"><i class="mdi mdi-eye-outline"></i></button>

                                            <div class="valid-tooltip" id="matched" style="display: none;">
                                                Password Matched!
                                            </div>

                                            <div class="invalid-tooltip" id="notmatched" style="display: none;">
                                                Password not matched yet.
                                            </div>

                                        </div>
                                    </div>
                
                                    <div class="mt-4 d-grid">
                                        <button class="btn btn-primary waves-effect waves-light" type="submit">Register</button>
                                    </div>

                                    <div class="mt-4 text-center">
                                        <p class="mb-0">By registering you agree to the {{ config('app.name') }} <a href="#" class="text-primary">Terms of Use</a></p>
                                    </div>
                                </form>
                            </div>
        
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        
                        <div>
                            <p>© <script>document.write(new Date().getFullYear())</script> {{ config('app.name') }}. Crafted with <i class="mdi mdi-heart text-danger"></i> by Snigdho</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>  
        
        function matchPassword() {  
            var pw1 = document.getElementById("validationTooltip07").value;  
            var pw2 = document.getElementById("validationTooltip08").value;
            if($.trim(pw1) != ''){
                if($.trim(pw2) != ''){
                    if(pw1 != pw2)  
                    { 
                        $('#matched').css('display', 'none');  
                        $('#notmatched').css('display', 'block');
                    } else { 
                        $('#notmatched').css('display', 'none');
                        $('#matched').css('display', 'block');
                    }
                } else {
                    $('#notmatched').css('display', 'none');
                    $('#matched').css('display', 'none');
                }
            }
        }


        function TogglePass() {
            var temp = document.getElementById("validationTooltip08");
            if (temp.type === "password") {
                temp.type = "input";
            }
            else {
                temp.type = "password";
            }
        }
    
    </script>         
@endsection