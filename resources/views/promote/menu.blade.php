@extends('layouts.promote')
@section('search.target',route('promote.menu'))
@section('content')

<section style="background-color: #222222">
    <div class="container">
      <div class="row">
        <div class="col text-center my-4">
          <h1 class="fs-2s" style="color: #fff; margin-top: 14%">MENU</h1>
          <div class="underline mx-auto mt-3"></div>
        </div>
      </div>

      <div class="row mt-3 mb-4 button-group filter-button-group">

        <div class="col d-flex justify-content-center">

          <button
            type="button"
            data-filter="*"
            class="btn btn-primary mx-1 text"
          >
            All
          </button>

          @foreach ($category as $data)
            <button
                type="button"
                data-filter=".ItemId{{ $data->category_id }}"
                class="btn btn-primary mx-1 text"
            >
                {{ $data->name }}
            </button>
          @endforeach

          {{-- <button
            type="button"
            data-filter=".food"
            class="btn btn-primary mx-1 text"
          >
            Food
          </button>
          <button
            type="button"
            data-filter=".drink"
            class="btn btn-primary mx-1 text"
          >
            Drink
          </button>
          <button
            type="button"
            data-filter=".dessert"
            class="btn btn-primary mx-1 text"
          >
            Dessert
          </button> --}}
        </div>
      </div>

      <div class="row justify-content-center g-4" id="product-list">

        @foreach ($menu as $key => $item)

            <div class="col-lg-4 col-md-6 tr {{ ! empty($item->category_id) ? 'ItemId' . $item->category->category_id : null }}">
                <a href="#">
                    <div class="product-item">
                        <div class="product-img">
                            <img
                            src="{{ asset('backend/menu/' . $item->image) }}"
                            class="img-fluid d-block mx-auto prduct-img"
                            />
                        </div>
                        <div class="product-content text-center py-3">
                            <span class="d-block text-uppercase fw-bold wh">
                                Name :&nbsp;{{ $item->name }}
                            </span>
                            <span class="d-block wh">Price :&nbsp; {{ number_format($item->price, 2) }} ฿</span>
                        </div>
                    </div>
                </a>
            </div>

        @endforeach


        {{-- <div class="col-lg-4 col-md-6 tr food">
          <a href="{{ route('promote.detail') }}">
            <div class="product-item">
              <div class="product-img">
                <img
                  src="img/menu/2.jpg"
                  class="img-fluid d-block mx-auto prduct-img"
                />
              </div>
              <div class="product-content text-center py-3">
                <span class="d-block text-uppercase fw-bold wh">Spaghetti cream Ebiko</span>
                <span class="d-block wh">Price :&nbsp; 155 ฿</span>
              </div>
            </div>
          </a>
        </div> --}}

        {{-- <div class="col-lg-4 col-md-6 tr drink">
          <a href="{{ route('promote.detail') }}">
            <div class="product-item">
              <div class="product-img">
                <img
                  src="img/menu/d1.jpg"
                  class="img-fluid d-block mx-auto prduct-img"
                />
              </div>
              <div class="product-content text-center py-3">
                <span class="d-block text-uppercase fw-bold wh">Blue Sky</span>
                <span class="d-block wh">Price :&nbsp; 95 ฿</span>
              </div>
            </div>
          </a>
        </div> --}}

        {{-- <div class="col-lg-4 col-md-6 tr drink">
          <a href="{{ route('promote.detail') }}">
            <div class="product-item">
              <div class="product-img">
                <img
                  src="img/menu/d2.jpg"
                  class="img-fluid d-block mx-auto prduct-img"
                />
              </div>
              <div class="product-content text-center py-3">
                <span class="d-block text-uppercase fw-bold wh">Premium Matcha Latte</span>
                <span class="d-block wh">Price :&nbsp; 95 ฿</span>
              </div>
            </div>
          </a>
        </div> --}}

        {{-- <div class="col-lg-4 col-md-6 tr dessert">
          <a href="{{ route('promote.detail') }}">
            <div class="product-item">
              <div class="product-img">
                <img
                  src="img/menu/s1.jpg"
                  class="img-fluid d-block mx-auto prduct-img"
                />
              </div>
              <div class="product-content text-center py-3">
                <span class="d-block text-uppercase fw-bold wh"
                  >lemon tart</span
                >
                <span class="d-block wh">Price :&nbsp; 98 ฿</span>
              </div>
            </div>
          </a>
        </div> --}}

        {{-- <div class="col-lg-4 col-md-6 tr dessert">
          <a href="{{ route('promote.detail') }}"">
            <div class="product-item">
              <div class="product-img">
                <img
                  src="img/menu/s2.jpg"
                  class="img-fluid d-block mx-auto prduct-img"
                />
              </div>
              <div class="product-content text-center py-3">
                <span class="d-block text-uppercase fw-bold wh"
                  >French Fries </span
                >
                <span class="d-block wh">Price :&nbsp; 85 ฿</span>
              </div>
            </div>
          </a>
        </div> --}}

        <!--end menu card-->
      </div>
    </div>
  </section>
  <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.js"></script>
  @endsection
