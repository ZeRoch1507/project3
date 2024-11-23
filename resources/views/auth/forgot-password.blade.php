@extends('layouts.master_authen')
@section('content')
    <div class="limiter">
        <div class="container-login100" style="background-image: url('authen/images/1.jpg');">
            <div class="wrap-login100">
                <form class="login100-form validate-form" method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <span class="login100-form-logo"><img src="{{ asset('authen/images/mekar logo black.png') }}">
                    </span>
                    <span class="login100-form-title p-b-34 p-t-35">
                        FORGOT PASSWORD
                        <hr align="center" color="#9f9f9f" style="width: 75%; margin-left: 12%;">

                        <h6 style="font-size: 11px ;"> Enter your email address to begin resetting your password
                        </h6>
                    </span>
                    <div class="wrap-input100 validate-input" data-validate="Enter Email">
                        <input class="input100" type="text" name="email" placeholder="Enter Email" required>
                        <span class="focus-input100" data-placeholder="&#xf159;"></span>
                    </div>
                    <x-auth-session-status style="color: #fff" class="mb-4 text-success" :status="session('status')" />

                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Submit
                        </button>
                    </div><br>

                    <div class="form-group d-md-flex">

                        <div class="w-100 text-md-right">
                            <a href="{{ route('login') }}">Back</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    </section>
@endsection
