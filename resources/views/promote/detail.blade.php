@extends('layouts.promote')
@section('search.target',route('promote.detail'))
@section('content')

<div class="container clearfix " style="padding-top: 15% ; background-color: #222222">
    <div class="product-detail-image">
      <img src="img/menu/1.jpg" alt="Ilana Sofa Green" />
    </div>
    <div class="product-detail-info">
      <h1>spaketti</h1>
      <p>
        The dish in the image is "Black Truffle Sirloin Fettuccine" from Mekar
        Café & Bistro. It features creamy fettuccine coated in a rich black
        truffle sauce, served with perfectly sliced, tender sirloin steak,
        grilled to juicy perfection. The dish is garnished with fresh parsley,
        adding a touch of color and fragrance. The soft texture of the
        fettuccine complements the creamy sauce and tender steak, creating a
        harmonious and indulgent flavor experience.
      </p>
      <div class="price">Price : 250 ฿</div>
      <a href="menu.html">
      <button class="genric-btn default circle butmenu mid" type="submit" style="margin-top: 2%;">
        back
      </button>
      </a>
    </div>
  </div>

@endsection
