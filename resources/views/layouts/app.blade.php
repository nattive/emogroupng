<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('assets/css/style-starter.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <!-- Template CSS -->
    <link href="//fonts.googleapis.com/css?family=Oswald:300,400,500,600&display=swap" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,900&display=swap" rel="stylesheet">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- =============================== -->
</head>

<body>
    <div id="app">
        @yield('content')
    </div>
    <section class="w3l-subscription-6">
        <!--/customers -->
        <div class="subscription-infhny">
            <div class="container-fluid">

                <div class="subscription-grids row">

                    <div class="subscription-right form-right-inf col-lg-6 p-md-5 p-4">
                        <div class="p-lg-5 py-md-0 py-3">
                            <h3 class="hny-title">Join us for FREE to get instant <span>email updates!</span></h3>
                            <p>Subscribe and get notified at first on the latest update and offers!</p>

                            <form action="#" method="post" class="signin-form mt-lg-5 mt-4">
                                <div class="forms-gds">
                                    <div class="form-input">
                                        <input type="email" name="" placeholder="Your email here" required="">
                                    </div>
                                    <div class="form-input"><button class="btn">Join</button></div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="subscription-left  col-lg-6 pb-5">
                        <div style="position: absolute; top: 30%; right: 0">
                           
                        </div>

                        <!--//customers -->
                    </div>
                </div>
            </div>
    </section>
    <section class="w3l-footer-22">
        <!-- footer-22 -->
        <div class="footer-hny py-5">
            <div class="container py-lg-5">
                <div class="text-txt row">
                    <div class="left-side col-lg-4">
                        <a class="navbar-brand" href="{{ route('home') }}">
                            <img src="{{ asset('images/logo.png') }}" style="height:50px;" alt="logo"
                                class=" logo navbar-brand">
                        </a>
                        <h3>Our Services</h3>
                        <p>In view of the foregoing, we import and market perfumes, oil, colognes, and body deodorants
                            that meet the market needs
                            of all categories of customers with varying budget brackets, without comprising on the
                            quality of these products.</p>
                        <ul class="social-footerhny mt-lg-5 mt-4">

                            <li><a class="facebook" href="#"><span class="fa fa-facebook" aria-hidden="true"></span></a>
                            </li>
                            <li><a class="twitter" href="#"><span class="fa fa-twitter" aria-hidden="true"></span></a>
                            </li>
                            <li><a class="google" href="#"><span class="fa fa-google-plus"
                                        aria-hidden="true"></span></a>
                            </li>
                            <li><a class="instagram" href="#"><span class="fa fa-instagram"
                                        aria-hidden="true"></span></a>
                            </li>
                        </ul>
                    </div>

                    <div class="right-side col-lg-8 pl-lg-5">
                        <h4>Delivery Cost Apply depending on your
                            location and it is charged at checkout.</h4>
                        <div class="sub-columns">
                            <div class="sub-one-left">
                                <h6>Useful Links</h6>
                                <div class="footer-hny-ul">
                                    <ul>
                                        <li><a href="/">Home</a></li>
                                        <li><a href="/about">About</a></li>
                                        <li><a href="/blog">Blog</a></li>
                                        <li><a href="/checkout">Checkout</a></li>
                                    </ul>
                                    <ul>
                                        <li><a href="/track">Track order</a></li>
                                        <li><a href="/cart">Cart</a></li>
                                        {{-- <li><a href="#">Terms and Conditions</a></li> --}}
                                        {{-- <li><a href="contact.html">Support</a></li> --}}
                                    </ul>
                                </div>

                            </div>
                            <div class="sub-two-right">
                                <h6>Head Office</h6>
                                <p class="mb-5">
                                    Plaza 22, Opposite Enugu Plaza, International Trade Fair Complex,
                                    Off Lagos/Badgry, Lagos.
                                </p>

                                <h6>We accept:</h6>
                                <ul>
                                    <li><a class="pay-method" href="#"><span class="fa fa-cc-visa"
                                                aria-hidden="true"></span></a>
                                    </li>
                                    <li><a class="pay-method" href="#"><span class="fa fa-cc-mastercard"
                                                aria-hidden="true"></span></a>
                                    </li>
                                    <li><a class="pay-method" href="#"><span class="fa fa-cc-paypal"
                                                aria-hidden="true"></span></a>
                                    </li>
                                    <li><a class="pay-method" href="#"><span class="fa fa-cc-amex"
                                                aria-hidden="true"></span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="below-section row">
                    <div class="columns col-lg-6">
                        <ul class="jst-link">
                            <li><a href="#">Privacy Policy </a> </li>
                            <li><a href="#">Term of Service</a></li>
                            <li><a href="contact.html">Customer Care</a> </li>
                        </ul>
                    </div>
                    <div class="columns col-lg-6 text-lg-right">
                        <p>©
                            <script>
                                document.write(new Date().getFullYear());
                            </script>
                            . All rights reserved. EMO COSMETICS AND PERFUMES LTD</a>
                        </p>
                    </div>
                    <button onclick="topFunction()" id="movetop" title="Go to top">
                        <span class="fa fa-angle-double-up"></span>
                    </button>
                </div>
            </div>
        </div>
        <!-- //titels-5 -->
        <!-- move top -->

        <script>
            // When the user scrolls down 20px from the top of the document, show the button
                  window.onscroll = function () {
                      scrollFunction()
                  };
        
                  function scrollFunction() {
                      if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                          document.getElementById("movetop").style.display = "block";
                      } else {
                          document.getElementById("movetop").style.display = "none";
                      }
                  }
        
                  // When the user clicks on the button, scroll to the top of the document
                  function topFunction() {
                      document.body.scrollTop = 0;
                      document.documentElement.scrollTop = 0;
                  }
        </script>
        <!-- /move top -->
    </section>
    <!--======================== Js ===================--->
    <script src="{{ asset("assets/js/jquery-3.3.1.min.js") }} "></script>
    <script src="{{ asset("assets/js/jquery-2.1.4.min.js") }} "></script>
    <!--/login-->
    <script>
        $(document).ready(function () {
    			$(".button-log a").click(function () {
    				$(".overlay-login").fadeToggle(200);
    				$(this).toggleClass('btn-open').toggleClass('btn-close');
    			});
    		});
    		$('.overlay-close1').on('click', function () {
    			$(".overlay-login").fadeToggle(200);
    			$(".button-log a").toggleClass('btn-open').toggleClass('btn-close');
    			open = false;
    		});
    </script>
    <!--//login-->
    <script>
        // optional
    		$('#customerhnyCarousel').carousel({
    				interval: 5000
        });
    </script>
    <!-- cart-js -->
    <script src="{{ asset("assets/js/minicart.js") }} "></script>
    <script>
        transmitv.render();
    
         transmitv.cart.on('transmitv_checkout', function (evt) {
             var items, len, i;
    
             if (this.subtotal() > 0) {
                 items = this.items();
    
                 for (i = 0, len = items.length; i < len; i++) {}
             }
         });
    </script>
    <!-- //cart-js -->
    <!--pop-up-box-->
    <script src="assets/js/jquery.magnific-popup.js"></script>
    <!--//pop-up-box-->
    <script>
        $(document).ready(function () {
        $('.popup-with-zoom-anim').magnificPopup({
          type: 'inline',
          fixedContentPos: false,
          fixedBgPos: true,
          overflowY: 'auto',
          closeBtnInside: true,
          preloader: false,
          midClick: true,
          removalDelay: 300,
          mainClass: 'my-mfp-zoom-in'
        });
    
      });
    </script>
    <!--//search-bar-->
    <!-- disable body scroll which navbar is in active -->

    <script>
        $(function () {
        $('.navbar-toggler').click(function () {
          $('body').toggleClass('noscroll');
        })
      });
    </script>
    <!-- disable body scroll which navbar is in active -->
    {{-- <script src="{{ asset("assets/js/bootstrap.min.js") }} "></script> --}}
    <!--======================== Js ===================--->
</body>

</html>