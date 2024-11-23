@extends('layouts.master_authen')
@section('content')
    <div class="limiter">
        <div class="container-login100" style="background-image: url('authen/images/bg-1.jpg');">
            <div class="wrap-login100">

                <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                    @csrf

                    <span class="login100-form-logo"><img src="{{ asset('authen/images/mekar logo black.png') }}">
                    </span>
                    <span class="login100-form-title m-b-34 p-t-27" style="color: #2b2b2b">
                        LOG IN
                        <hr align="center" color="#9f9f9f" style="width: 65%; margin-left: auto; margin-right:auto ;">
                    </span>


                    <div class="wrap-input100 validate-input" data-validate="username">
                        <input class="input100" type="text" name="name" placeholder="Enter Username"
                            autocomplete="off">
                        <span class="focus-input100" data-placeholder="&#xf207;"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="password">
                        <input class="input100" type="password" name="password" placeholder="Enter Password"
                            autocomplete="off">
                        <span class="focus-input100" data-placeholder="&#xf191;"></span>
                    </div>
                    <div class="form-group d-md-flex">

                        <div class="w-100 text-md-right ">
                            <a href="{{ route('register') }}">REGISTER</a>
                        </div>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            <a href=""></a>
                            LOG IN
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>


    </section>
@endsection
