@extends('layouts.promote-w')
@section('search.target', route('promote-w.galleryw'))
@section('content')

    <section class="features-area section_gap" style="background-color: #f8f8f8">
        <div class="container">
            <div class="row">
                <div class="col text-center my-4">
                    <h1 class="fs-2s" style="color: #000;  margin-top: 5%;">
                        Gallery
                    </h1>
                    <div class="underline-2 mx-auto mt-3" style="margin-bottom: 8%"></div>
                    <!--Gallery Area-->
                    <div class="row gallery-items" id="gallery-list">

                        @foreach ($gallery as $key => $img)
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="card-body">
                                    <img class="myImg img-fluid card-img-top"
                                        src="{{ asset('backend/gallery/' . $img->image) }}"
                                        alt="{{ $img->description ?? 'Image' }}" />
                                    <div class="myModal modal">
                                        <span class="close">&times;</span>
                                        <img class="modal-content" />
                                        <div class="caption">{{ $img->description ?? 'No description available' }}</div>
                                    </div>
                                </div>
                            </div>

                    @endforeach
                    {{-- <!--gallery1-->
              <div class="col-lg-4 col-md-6 gallery-item interior">
                <img
                  id="myImg"
                  src="img/gallery/1.jpg"
                  class="img-fluid d-block mx-auto"
                />
                <div id="myModal" class="modal">
                  <span class="close">&times;</span>
                  <img class="modal-content" id="img01" />
                  <div id="caption"></div>
                </div>
              </div>
               <!--end gallery1-->
                <!--gallery2-->
              <div class="col-lg-4 col-md-6 gallery-item interior">
                <img
                  id="myImg1"
                  src="img/gallery/1.jpg"
                  class="img-fluid d-block mx-auto"
                />
                <div id="myModal" class="modal">
                  <span class="close">&times;</span>
                  <img class="modal-content" id="img02" />
                  <div id="caption"></div>
                </div>
              </div>
              <!--end gallery2-->
              <!--gallery3-->
              <div class="col-lg-4 col-md-6 gallery-item interior">
                <img
                  id="myImg2"
                  src="img/gallery/1.jpg"
                  class="img-fluid d-block mx-auto"
                />
                <div id="myModal" class="modal">
                  <span class="close">&times;</span>
                  <img class="modal-content" id="img03" />
                  <div id="caption"></div>
                </div>
              </div>
              <!--end gallery3--> --}}
                    <!--end Gallery Area-->
                </div>
            </div>
        </div>
        </div>
    </section>

@endsection
