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
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.css') }}">
    <!-- =============================== -->
</head>

<body>
    <header class="header_area">
        <div class="main_menu">
            <nav class="navbar navbar-expand-md" style="background-color: transparent; margin: 0">
                <div class="container">
                    <a class="navbar-brand logo_h d-none d-md-block" href="/">
                        <img src="{{ asset('images/logo.png') }}" alt="logo" class=" logo navbar-brand"
                            style="width: 50%">
                        <h6 style="align-self: center; margin-left: -6%; font-weight: 700" class="d-none d-md-block">
                            <a href="/">EMO <br /> Fragrances</a></h6>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto mr-auto">
                            <li class="nav-item active"><a class="nav-link" href="/">Home</a></li>
                            <li class="nav-item submenu dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-haspopup="true" aria-expanded="false">Shop</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a class="nav-link" href="{{ url('/shop') }}">Our Products</a></li>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="{{ url('/track') }}">Track your order</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="{{ url('/shop') }}">Shopping Cart</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{ url('/checkout') }}">Check Out</a></li>
                                </ul>
                            </li>
                            <li class="nav-item submenu dropdown">
                                <a class="nav-link" href="{{ route('blog') }}">Blog</a>
                            </li>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="{{ url('/about') }}">About Us</a></li>
                        </ul>

                        <ul class="nav-shop">
                            <li class="nav-item"><button><i class="fa fa-search"></i></button></li>
                            <li class="nav-item"><button><i class="fa fa-shopping-cart"></i><span
                                        class="nav-shop__circle">{{Cart::content()->count()}}</span></button> </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <div class="page">

        <div id="colorlib-page">

            <div id="app">
                @yield('content')
            </div>
            <!-- ================ Subscribe section start ================= -->
            <section class="subscribe-position">
                <div class="container">
                    <div class="subscribe text-center">
                        <h3 class="subscribe__title">Subscribe to Our Newsletter</h3>
                        <p>Get a notification when we upload new products</p>
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
                                    <h4 class="footer_title">Our Services</h4>
                                    <p>

                                        In view of the foregoing, we import and market perfumes, oil, colognes, and body
                                        deodorants that meet the market needs
                                        of all categories of customers with varying budget brackets, without comprising
                                        on the quality of these products.
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-6 col-sm-6">
                                <div class="single-footer-widget tp_widgets">
                                        <div class="single-footer-widget instafeed">
                                            <h3 class="footer_title">TERMS AND CONDITIONS</h3>
                                            <p>Delivery Cost Apply depending on your location and it is charged at checkout.
                                            </p>
                                        </div>
                                    
                                    </div>
                            </div>
                            <div class="col-lg-2 col-md-6 col-sm-6">
                                <div class="single-footer-widget instafeed">
                                    <h3 class="footer_title">Refund Policy</h3>
                                    <p>Products sold in good condition cannot be returned, except in a case of manufacturer's error and such cases must be
                                    reported and the products returned within 3 to 4 days from the date of lodging the complaint.
                                    </p>
                                </div>
                                
                            </div>
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

                                        {{-- <p class="sm-head">
                                            <span class="fa fa-phone"></span>
                                            Phone Number
                                        </p> --}}
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
                        <div class="row">
                            <div class="col-xs-12">
                                <ul class="d-flex flex-wrap">
                                    <li><a href="#"><i class="text-light fa fa-cc-visa"></i></a></li>
                                    <li><a href="#"><i class="text-light fa fa-credit-card"></i></a></li>
                                    <li><a href="#"><i class="text-light fa fa-cc-paypal"></i></a></li>
                                    <li><a href="#"><i class="text-light fa fa-cc-mastercard"></i></a></li>
                                    <li><a href="#"><i class="text-light fa fa-cc-discover"></i></a></li>
                                    <li><a href="#"><i class="text-light fa fa-cc-amex"></i></a></li>
                                </ul>
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
                                </script> All rights reserved | EMO COSMETICS AND PERFUMES LTD
                            </p>
                        </div>
                    </div>
                </div>
            </footer>
            <!--================ End footer Area  =================-->
            <!-- loader -->
            
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