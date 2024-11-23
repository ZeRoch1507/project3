@extends('layouts.master_authen')
@section('content')
    <div class="limiter">
        <div class="container-login100" style="background-image: url('authen/images/bg-1.jpg');">
            <div class="wrap-login100">
                <form class="login100-form validate-form" method="POST" action="{{ route('register') }}">
                    @csrf

                    <span class="login100-form-logo"><img src="{{ asset('authen/images/mekar logo black.png') }}">
                    </span>
                    <span class="login100-form-title m-b-34 p-t-35">
                        REGISTER YOU ACCOUNT
                        <hr align="center" color="#9f9f9f" style="width: 75%; margin-left: auto; margin-right:auto">
                    </span>

                    <div class="wrap-input100 validate-input" data-validate="Enter username">
                        <input class="input100" type="text" name="name" placeholder="Enter username" required>
                        <span class="focus-input100" data-placeholder="&#xf207;"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Email incorrect">
                        <input class="input100" type="text" name="email" placeholder="Enter Email" required>
                        <span class="focus-input100" data-placeholder="&#xf159;"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Enter password">
                        <input class="input100" type="password" name="password" placeholder="Enter Password" required>
                        <span class="focus-input100" data-placeholder="&#xf190;"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Enter confirmpassword">
                        <input class="input100" type="password" name="password_confirmation"
                            placeholder="Enter Confirm Password" required>
                        <span class="focus-input100" data-placeholder="&#xf191;"></span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            REGISTER
                        </button>
                    </div>
                    <div class="form-group d-md-flex">

                        <div class="w-100 text-md-right">
                            <a href="{{ route('login') }}">LOGIN</a>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>


    </section>
@endsection
