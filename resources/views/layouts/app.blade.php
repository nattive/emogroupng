<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    {{-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- =============================== -->
    {{-- <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
     --}}
    <link rel="stylesheet" href="{{ asset('css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">

    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ asset('css/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('css/ionicons.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.timepicker.css') }}">


    <link rel="stylesheet" href="{{ asset('css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.css') }}">
    <!-- =============================== -->
</head>

<body>

    <div class="page">
        <nav id="colorlib-main-nav" role="navigation">
            <a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle active"><i></i></a>
            <div class="js-fullheight colorlib-table">
                <div class="img" style="background-image: url(images/bg_2.jpg);"></div>
                <div class="colorlib-table-cell js-fullheight">
                    <div class="row no-gutters">
                        <div class="col-md-12 text-center">
                            Menu
                            <ul>
                                <li class="active"><a href="/"><span><small>01</small>Home</span></a></li>
                                <li><a href="{{ url('/shop') }}"><span><small>02</small>Shop</span></a></li>
                                <li><a href="{{ url('/about') }}"><span><small>03</small>About Us</span></a></li>
                                {{-- <li><a href="{{ url('/blog') }}"><span><small>04</small>Blog</span></a></li> --}}
                                <li><a href="{{ route('contact') }}"><span><small>05</small>Contact Us</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <div id="colorlib-page">
            <header style="position: fixed bg-light">
                <div class="colorlib-navbar-brand">
                    <div class="d-flex align-content-center">
                        <img src="{{ asset('images/logo.png') }}" alt="logo" class="mb-1 logo navbar-brand"
                            style="width: 3%">
                        <h6 style="align-self: center"><a href="/">EMO</a></h6>
                    </div>
                </div>
                <a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
            </header>

            <div id="app">
                @yield('content')
            </div>
            <!-- ================ Subscribe section start ================= -->
            <section class="subscribe-position">
                <div class="container">
                    <div class="subscribe text-center">
                        <h3 class="subscribe__title">Get Update From Anywhere</h3>
                        <p>Bearing Void gathering light light his eavening unto dont afraid</p>
                        <div id="mc_embed_signup">
                            <form target="_blank"
                                action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
                                method="get" class="subscribe-form form-inline mt-5 pt-1">
                                <div class="form-group ml-sm-auto">
                                    <input class="form-control mb-1" type="email" name="EMAIL"
                                        placeholder="Enter your email" onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Your Email Address '">
                                    <div class="info"></div>
                                </div>
                                <button class="button button-subscribe mr-auto mb-1" type="submit">Subscribe
                                    Now</button>
                                <div style="position: absolute; left: -5000px;">
                                    <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value=""
                                        type="text">
                                </div>

                            </form>
                        </div>

                    </div>
                </div>
            </section>
            <!-- ================ Subscribe section end ================= -->



            </main>


            <!--================ Start footer Area  =================-->
            <footer class="footer">
                <div class="footer-area">
                    <div class="container">
                        <div class="row section_gap">
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="single-footer-widget tp_widgets">
                                    <h4 class="footer_title large_title">Our Services</h4>
                                    <p>

                                        In view of the foregoing, we import and market perfumes, oil, colognes, and body
                                        deodorants that meet the market needs
                                        of all categories of customers with varying budget brackets, without comprising
                                        on the quality of these products. <p>Now
                                            customers can choose what they want, how they want it and how much they are
                                            willing to pay.</p>
                                    </p>
                                </div>
                            </div>
                            <div class="offset-lg-1 col-lg-2 col-md-6 col-sm-6">
                                <div class="single-footer-widget tp_widgets">
                                    <h4 class="footer_title">Quick Links</h4>
                                    <ul class="list">
                                        <li><a href="/">Home</a></li>
                                        <li><a href="/shop">Shop</a></li>
                                        <li><a href="/about">About Us</a></li>
                                    </ul>
                                </div>
                            </div>
                            {{--    <div class="col-lg-2 col-md-6 col-sm-6">
                        <div class="single-footer-widget instafeed">
                            <h4 class="footer_title">Gallery</h4>
                            <ul class="list instafeed d-flex flex-wrap">
                                <li><img src="img/gallery/r1.jpg" alt=""></li>
                                <li><img src="img/gallery/r2.jpg" alt=""></li>
                                <li><img src="img/gallery/r3.jpg" alt=""></li>
                                <li><img src="img/gallery/r5.jpg" alt=""></li>
                                <li><img src="img/gallery/r7.jpg" alt=""></li>
                                <li><img src="img/gallery/r8.jpg" alt=""></li>
                            </ul>
                        </div>
                    </div> --}}
                            <div class="offset-lg-1 col-lg-3 col-md-6 col-sm-6">
                                <div class="single-footer-widget tp_widgets">
                                    <h4 class="footer_title">Contact Us</h4>
                                    <div class="ml-40">
                                        <p class="sm-head">
                                            <span class="fa fa-location-arrow"></span>
                                            Head Office
                                        </p>
                                        <p>Plaza 22, Opposite Enugu Plaza,
                                            International Trade Fair Complex,
                                            Off Lagos/Badgry, Lagos.</p>

                                        <p class="sm-head">
                                            <span class="fa fa-phone"></span>
                                            Phone Number
                                        </p>
                                        {{-- <p>
                                            +123 456 7890 <br>
                                            +123 456 7890
                                        </p> --}}

                                        <p class="sm-head">
                                            <span class="fa fa-envelope"></span>
                                            Email
                                        </p>
                                        <p>
                                            info@emofragrances.com <br>
                                            www.emofragrances.com
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="footer-bottom">
                    <div class="container">
                        <div class="row d-flex">
                            <p class="col-lg-12 footer-text text-center">
                                Copyright &copy;<script>
                                    document.write(new Date().getFullYear());
                                </script> All rights reserved | EMO Group Ltd
                            </p>
                        </div>
                    </div>
                </div>
            </footer>
            <!--================ End footer Area  =================-->
            <!-- loader -->
            <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
                    <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
                    <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
                        stroke="#F96D00" /></svg></div>

        </div>


    </div>


    <!--======================== Js ===================--->
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/jquery-migrate-3.0.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('js/aos.js') }}"></script>
    <script src="{{ asset('js/jquery.animateNumber.min.js') }}"></script>
    <script src="{{ asset('js/scrollax.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('js/jquery.timepicker.min.js') }}"></script>
    {{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script> --}}
    {{-- <script src="{{ asset('js/google-map.js') }}"></script> --}}
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
</body>

</html>