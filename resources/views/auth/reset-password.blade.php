@extends('layouts.master_authen')
@section('content')
    <div class="limiter">
        <div class="container-login100" style="background-image: url({{ asset('authen/images/1.jpg') }});">
            <div class="wrap-login100">
                <form class="login100-form validate-form" method="POST" action="{{ route('password.store') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <span class="login100-form-logo"><img src="{{ asset('authen/images/mekar logo black.png') }}">
                    </span>
                    <span class="login100-form-title p-b-34 p-t-27">
                        RESET PASSWORD
                        <hr align="center" color="#9f9f9f" style="width: 75%; margin-left: auto; margin-right:auto">
                    </span>

                    <div class="wrap-input100 validate-input" data-validate="Enter Email">
                        <input class="input100" type="text" name="email" placeholder="Enter Email"
                            value="{{ $request->email }}">
                        <span class="focus-input100" data-placeholder="&#xf159;"></span>
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />

                    <div class="wrap-input100 validate-input" data-validate="Enter password">
                        <input class="input100" type="password" name="password" placeholder="Enter Password" required>
                        <span class="focus-input100" data-placeholder="&#xf190;"></span>
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />

                    <div class="wrap-input100 validate-input" data-validate="Enter confirmpassword">
                        <input class="input100" type="password" name="password_confirmation"
                            placeholder="Enter Confirm Password" required>
                        <span class="focus-input100" data-placeholder="&#xf191;"></span>
                    </div>
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            {{ __('RESET PASSWORD') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    </section>
@endsection
