<!-- footer.blade.php -->
<footer class="footer-area">
    <div class="container1">
        <div class="row">
            <div class="col-xs-5 col-md-5">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3875.26239395768!2d100.4733929!3d13.763043699999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e299755e36e421%3A0xfa98fd8566a1827!2sMEKAR%20Cafe%20%26%20Bistro!5e0!3m2!1sth!2sth!4v1725195591542!5m2!1sth!2sth"
                    width="500"
                    height="350"
                    style="border: 0; margin-top: 0.4cm; margin-bottom: 0.3cm; margin-right: 0.4cm; margin-left: -0.2cm;"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                ></iframe>
            </div>

            <div class="col-xs-4 col-md-4">
                <h5 style="padding-top: 15%; margin-left: 25%; color: #fff">About</h5>
                <p style="padding-top: 5%; margin-left: 25%">
                    MEKAR Cafe & Bistro <br />
                    Open every day. Parking is available. <br />
                    Open 11am - 10pm (Fri - Sat until 12am) <br />
                    Live Music: Fri, Sat, Sun 6.30pm <br />
                </p>
            </div>

            <div class="col-xs-3 col-md-3">
                <h5 style="padding-top: 20%; margin-left: 30%; color: #fff">Contact</h5>
                <p style="padding-top: 10%; margin-left: 20%">
                    <!-- phone -->
                    <button class="genric-btn default circle" style="margin-top: 10px; background-color: #101010; color: #fff; border-radius: 20px 20px;">
                        <img src="{{ asset('promote/img/icon/phone-logo white.png') }}" width="17.5" height="17.5" style="margin-left: -10px" />
                        &nbsp; :&nbsp; 0616629664
                    </button>
                    <br />

                    <!-- line -->
                    <button class="genric-btn default circle" style="margin-top: 10px; background-color: #101010; color: #fff; border-radius: 20px 20px;">
                        <img src="{{ asset('promote/img/icon/line-logo white.png') }}" width="17.5" height="17.5" style="margin-left: -10px" />
                        &nbsp; :&nbsp; @MEKAR
                    </button>
                    <br />

                    <!-- facebook -->
                    <a href="https://www.facebook.com/MEKARCafeBistro" target="_blank">
                        <button class="genric-btn default circle" style="margin-top: 10px; background-color: #101010; color: #fff; border-radius: 20px 20px;">
                            <img src="{{ asset('promote/img/icon/fb-logo white.png') }}" width="17.5" height="17.5" style="margin-left: -10px" />
                            &nbsp; :&nbsp; MEKAR Cafe & Bistro
                        </button>
                    </a>
                    <br />

                    <!-- instagram -->
                    <a href="https://www.instagram.com/mekarcafebistro" target="_blank">
                        <button class="genric-btn default circle" style="margin-top: 10px; background-color: #101010; color: #fff; border-radius: 20px 20px;">
                            <img src="{{ asset('promote/img/icon/ig-logo white.png') }}" width="17.5" height="17.5" style="margin-left: -10px" />
                            &nbsp; :&nbsp; MEKAR Cafe & Bistro
                        </button>
                    </a>
                    <br />
                </p>
            </div>
        </div>
    </div>
</footer>
<!-- End footer Area -->

<!-- Scripts -->
<script src="{{ asset('promote/js/vendor/jquery-2.2.4.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="{{ asset('promote/js/vendor/bootstrap.min.js') }}"></script>
<script src="{{ asset('promote/js/jquery.ajaxchimp.min.js') }}"></script>
<script src="{{ asset('promote/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('promote/js/jquery.sticky.js') }}"></script>
<script src="{{ asset('promote/js/nouislider.min.js') }}"></script>
<script src="{{ asset('promote/js/countdown.js') }}"></script>
<script src="{{ asset('promote/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('promote/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('promote/js/img.js') }}"></script>
<!-- isotope plugin -->
<script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.js"></script>
<!-- Google Maps JS -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY"></script>
<script src="{{ asset('promote/js/gmaps.min.js') }}"></script>
<script src="{{ asset('promote/js/main.js') }}"></script>
