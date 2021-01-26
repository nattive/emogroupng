@section('header')
<header class="tophny-header">

    <!--/nav-->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid serarc-fluid">
            <a class="navbar-brand" href="index.html">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{ asset('images/logo.png') }}" style="height:50px;" alt="logo"
                        class=" logo navbar-brand">
                </a>
                <!--/search-right-->
                {{-- <div class="search-right">

                    <a href="#search" title="search"><span class="fa fa-search mr-2" aria-hidden="true"></span>
                        <span class="search-text">Search here</span></a>
                    <!-- search popup -->
                    <div id="search" class="pop-overlay">
                        <div class="popup">

                            <form action="#" method="post" class="search-box">
                                <input type="search" placeholder="Keyword" name="search" required="required"
                                    autofocus="">
                                <button type="submit" class="btn">Search</button>
                            </form>

                        </div>
                        <a class="close" href="#">×</a>
                    </div>
                    <!-- /search popup -->
                </div> --}}
                <!--//search-right-->
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon fa fa-bars"> </span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link" href="{{ url('/shop') }}">Our Products</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/track') }}">Track your
                                order</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/cart') }}">Shopping Cart</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/checkout') }}">Check Out</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/blog') }}">Who we are</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/blog') }}">Our Blog</a>
                        </li>
                    </ul>
                </div>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="top-right-strip row">
            <!--/left-->
            <div class="top-hny-left-content col-lg-6 pl-lg-0">
                {{-- <h6>Upto 30% off on All styles , <a href="#" target="_blank"> Click here for <span
                                                        class="fa fa-hand-o-right hand-icon" aria-hidden="true"></span> <span
                                                        class="hignlaite">More details</span></a></h6> --}}
            </div>
            <!--//left-->
            <!--/right-->
            <ul class="top-hnt-right-content col-lg-6">
                <li class="transmitvcart galssescart2 cart cart box_1">

                    <a href="{{ route('cart') }}" class="top_transmitv_cart">
                        My Cart
                        <span class="fa fa-shopping-cart"></span>
                    </a>
                </li>
            </ul>
            <!--//right-->

        </div>
    </div>
    <!--//nav-->
</header>
@show