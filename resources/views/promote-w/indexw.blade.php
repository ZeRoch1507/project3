@extends('layouts.promote-w')

@section('search.target', route('promote-w.indexw'))

@section('content')

    <section class="banner-area-w">
        <div class="container">
            <div class="row fullscreen align-items-center justify-content-start">
                <div class="col-lg-12"></div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->

    <!-- Start Menu Area -->
    <section class="features-area section_gap" id="menuSection" style="background-color: #f8f8f8">
        <div class="container">
            <div class="col text-center my-4">
                <h1 class="fs-2s" style="color: #000000; margin-top:0px">MENU</h1>
                <div class="underline mx-auto mt-3"></div>
            </div>
            <div class="row">
                <!-- menu1 -->
                <div class="col-xs-4 col-md-4">
                    <div class="card">
                        <h5 class="menu mid">Foods</h5>
                        <img src="{{ asset('promote/img/menu/1.jpg') }}"
                            style="width: 85%; border-radius: 10%; margin-top: 5%; margin-left: auto; margin-bottom: 5%; margin-right: auto;" />
                        <center>
                            <a href="{{ route('promote.menu') }}">
                                <button class="genric-btn default circle butmenu mid">more</button>
                            </a>
                        </center>
                    </div>
                </div>
                <!-- end menu1 -->

                <!-- menu2 -->
                <div class="col-xs-4 col-md-4">
                    <div class="card">
                        <h5 class="menu mid">Drinks</h5>
                        <img src="{{ asset('promote/img/menu/d1.jpg') }}"
                            style="width: 85%; border-radius: 10%; margin-top: 5%; margin-left: auto; margin-bottom: 5%; margin-right: auto;" />
                        <center>
                            <a href="{{ route('promote.menu') }}">
                                <button class="genric-btn default circle butmenu mid">more</button>
                            </a>
                        </center>
                    </div>
                </div>
                <!-- end menu2 -->

                <!-- menu3 -->
                <div class="col-xs-4 col-md-4">
                    <div class="card">
                        <h5 class="menu mid">Desserts</h5>
                        <img src="{{ asset('promote/img/menu/s1.jpg') }}"
                            style="width: 85%; border-radius: 10%; margin-top: 5%; margin-left: auto; margin-bottom: 5%; margin-right: auto;" />
                        <center>
                            <a href="{{ route('promote.menu') }}">
                                <button class="genric-btn default circle butmenu mid">more</button>
                            </a>
                        </center>
                    </div>
                </div>
                <!-- end menu3 -->
            </div>
        </div>
    </section>
    <!-- End Menu Area -->

    <!-- Promotion Area -->
    <section class="features-area section_gap" style="background-color: #f8f8f8">
        <div class="col text-center my-4">
            <h1 class="fs-2s" style="color: #000; margin-top: 14%">PROMOTION</h1>
            <div class="underline-1 mx-auto mt-3"></div>
        </div>
        <div class="container">

            @if (!empty($promotion) && $promotion->isNotEmpty())
                @foreach ($promotion as $key => $pro)
                    <section class="banner" style="margin-top: 2%">
                        <img src="{{ asset('backend/promotion/' . $pro->image) }}">
                    </section>
                @endforeach
            @else
                <section class="banner" style="margin-top: 2%">
                    <img src="{{ asset('promote/img/promotion/nonew.png') }}">
                </section>
            @endif




            <a href="{{ route('promote.promotion') }}"">
                <button class="genric-btn default circle butmenu d-me"
                    style="margin-top: 2%; width: 95%; margin-left: 2%">more</button>
            </a>
        </div>

        {{-- <div class="container">
        <div class="col text-center my-4">
            <h1 class="fs-2s" style="color: #fff; margin-top:0px">PROMOTION</h1>
            <div class="underline-1 mx-auto mt-3"></div>
        </div>

        <section class="banner" style="margin-top: 2%">
            <img src="{{ asset('promote/img/promotion/Halloween.png') }}" alt="Banner" />
        </section>
        <a href="{{ route('promote.promotion') }}"">
            <button class="genric-btn default circle butmenu d-me" style="margin-top: 2%; width: 95%; margin-left: 2%">more</button>
        </a>
    </div> --}}

    </section>
    <!-- End Promotion Area -->
@endsection
