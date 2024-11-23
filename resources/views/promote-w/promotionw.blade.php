@extends('layouts.promote-w')
@section('search.target', route('promote-w.promotionw'))
@section('content')

    <section style="background-color: #f8f8f8">
        <div class="container">
            <div class="row">
                <div class="col text-center my-4">
                    <h1 class="fs-2s" style="color: #000; margin-top: 14%">Promotion</h1>
                    <div class="underline-1 mx-auto mt-3"></div>
                </div>
            </div>

            <section class="features-area section_gap">
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
            </section>
            <!--end promotion card-->
    </section>

@endsection
{{-- @if ($promotion->isNotEmpty())
        @foreach ($promotion as $pro)
            <!-- Display promotion details -->
            <section class="banner" style="margin-top: 2%">
                <img src="{{ asset('backend/promotion/' . $pro->image) }}">
            </section>
        @endforeach
    @else
        <section class="banner" style="margin-top: 2%">
            ไม่มีโปรโมชั่นในตอนนี้
        </section>
    @endif --}}
