@extends('layouts.app')

@section('content')
<section class="w3l-banner-slider-main">
    <div class="top-header-content">
       @include('layouts.header')
        <div class="bannerhny-content">

            <!--/banner-slider-->
            <div class="content-baner-inf">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        {{-- <li data-target="#carouselExampleIndicators" data-slide-to="3"></li> --}}
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="container">
                                <div class="carousel-caption">
                                    <h3 class="text-light">Classy Women's
                                        <br /> Fragrances</h3>
                                    <a href="/shop" class="shop-button btn">
                                        Shop Now
                                    </a>

                                </div>
                            </div>
                        </div>
                        <div class="carousel-item item2">
                            <div class="container">
                                <div class="carousel-caption">
                                    <h3 class="text-light">Shop Luxury Men's<br />
                                        Colognes</h3>
                                    <a href="#" class="shop-button btn">
                                        Shop Now
                                    </a>

                                </div>
                            </div>
                        </div>
                        <div class="carousel-item item3">
                            <div class="container">
                                <div class="carousel-caption">
                                    <h3 class="text-light">Your scent style never
                                        <br>never goes wrong</h3>
                                    <a href="#" class="shop-button btn">
                                        Shop Now
                                    </a>

                                </div>
                            </div>
                        </div>
                        {{-- <div class="carousel-item item4">
                            <div class="container">
                                <div class="carousel-caption">
                                    <h3>Men's
                                        Fashion
                                        <br>60% Off</h3>
                                    <a href="#" class="shop-button btn">
                                        Shop Now
                                    </a>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <!--//banner-slider-->
            <!--//banner-slider-->
            <div class="right-banner">
                <div class="right-1">
                    <h4>
                        classy fragrances for men </h4>
                        <a href="/shop" class="shop-button btn">
                            Shop Now
                        </a>
                </div>
            </div>

        </div>
</section>

<section class="w3l-content-w-photo-6">
    <products-component guestId="{{$userUniqueId}}" />
</section>
<section class="w3l-content-w-photo-6">
    <!-- /specification-6-->
    <div class="content-photo-6-mian py-5">
        <div class="container py-lg-5">
            <div class="align-photo-6-inf-cols row">

                <div class="photo-6-inf-right col-lg-6">
                    <h3 class="hny-title text-left">Shop Luxury Fragrances at <span>amazing discounts</span>.</p>
                        <a href="/shop" class="read-more btn">
                            Shop Now
                        </a>
                </div>
                <div class="photo-6-inf-left col-lg-6">
                    <img src="{{ asset('images/emo2.jpg') }}" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- //w3l-banner-slider-main -->
<section class="w3l-grids-hny-2">
    <!-- /content-6-section -->
    <div class="grids-hny-2-mian py-5">
        <div class="container py-lg-5">
            <h3 class="hny-title mb-0 text-center">We have it <span>all</span></h3>
            {{-- <p class="mb-4 text-center">Handpicked Favourites just for you</p> --}}
            <div class="welcome-grids row mt-5">
                @foreach ($ProductCategories as $category)
                <div class="col-lg-2 col-md-4 col-6 welcome-image">
                    <div class="boxhny13">
                        <a href="#URL">
                            <img src="assets/images/grid3.jpg" class="img-fluid" alt="" />
                            <div class="boxhny-content">
                                <h3 class="title">{{$category -> categoryName}}</h3>
                            </div>
                        </a>
                    </div>
                    <h4><a href="#URL">
                            {{$category -> categoryName}}</a></h4>


                </div>
                @endforeach
            </div>

        </div>
    </div>
</section>
<!-- //content-6-section -->

<section class="w3l-content-w-photo-6">
    <!-- /specification-6-->
    <div class="content-photo-6-mian py-5">
        <div class="container py-lg-5">
            <div class="align-photo-6-inf-cols row">
                <div class="photo-6-inf-left col-lg-6">
                    <img src="{{ asset('images/emo2.jpg') }}" class="img-fluid" alt="">
                </div>
                <div class="photo-6-inf-right col-lg-6">
                    <h3 class="hny-title text-left">Shop Luxury Fragrances at <span>amazing discounts</span>.</p>
                        <a href="/shop" class="read-more btn">
                            Shop Now
                        </a>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- //specification-6-->

{{-- <section class="w3l-video-6">
    <!-- /video-6-->
    <div class="video-66-info">
        <div class="container-fluid">
            <div class="video-grids-info row">
                <div class="video-gd-right col-lg-8">
                    <div class="video-inner text-center">
                        <!--popup-->
                        <a class="play-button btn popup-with-zoom-anim" href="#small-dialog">
                            <span class="fa fa-play" aria-hidden="true"></span>
                        </a>
                        <div id="small-dialog" class="mfp-hide">
                            <div class="search-top notify-popup">
                                <iframe src="https://player.vimeo.com/video/246139491" frameborder="0"
                                    allow="autoplay; fullscreen" allowfullscreen></iframe>
                            </div>
                        </div>
                        <!--//popup-->
                    </div>
                </div>
                <div class="video-gd-left col-lg-4 p-lg-5 p-4">
                    <div class="p-xl-4 p-0 video-wrap">
                        <h3 class="hny-title text-left">All Branded Women's Bags are Flat <span>30% Discount</span>
                        </h3>
                        <p>Visit our shop to see amazing creations from our designers.</p>
                        <a href="#" class="read-more btn">
                            Shop Now
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section> --}}
<!-- //video-6-->
<!-- //products-->
<section class="w3l-content-5">
    <!-- /content-6-section -->
    <div class="content-5-main">
        <div class="container">
            <div class="content-info-in row text-light text-center">
                <div class="col-lg-4 col-md-6 col-sm-6">

                    <h4 class="text-light">Our Services</h4>
                    <p>

                        In view of the foregoing, we import and market perfumes, oil, colognes, and body
                        deodorants that meet the market needs
                        of all categories of customers with varying budget brackets, without comprising
                        on the quality of these products.
                    </p>
                </div>
                <div class="col-md-4 col-sm-6">

                    <div class="single-footer-widget instafeed">
                        <h3 class="text-light">TERMS AND CONDITIONS</h3>
                        <p>Delivery Cost Apply depending on your location and it is charged at checkout.
                        </p>
                    </div>

                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="single-footer-widget instafeed">
                        <h3 class="text-light">Refund Policy</h3>
                        <p>Products sold in good condition cannot be returned, except in a case of manufacturer's error
                            and such cases
                            must be
                            reported and the products returned within 3 to 4 days from the date of lodging the
                            complaint.
                        </p>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>
<!-- //content-6-section -->
<section class="w3l-post-grids-6">

    <div class="post-6-mian py-5">
        <div class="container py-lg-5">
            <h3 class="hny-title text-center mb-0 ">Latest Blog <span>Posts</span></h3>
            <p class="mb-5 text-center">Handpicked Favourites just for you</p>
            <div class="post-hny-grids row mt-5">
                <div class="col-lg-3 col-md-6 grids5-info column-img" id="zoomIn">
                    @foreach ($blogs as $post)

                    <a href="{{ route('viewpost', $post -> id) }}">
                        <figure>
                            <img class="img-fluid" src='{{ asset('storage/'.$post -> image) }}' alt="blog-image">
                        </figure>
                    </a>
                    <div class="blog-thumbhny-caption">
                        <ul class="blog-info-list">
                            <li><a href="#admin">By admin</a></li>
                            <li class="date-post">
                                {{ date('dS F Y', strtotime($post -> updated_at)) }}</li>
                        </ul>
                        <h4><a href="#">{{$post -> title}}</a></h4>
                    </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</section>
<!-- //post-grids-->
{{-- <section class="w3l-customers-sec-6">
    <div class="customers-sec-6-cintent py-5">
        <!-- /customers-->
        <div class="container py-lg-5">
            <h3 class="hny-title text-center mb-0 ">Customers <span>Love</span></h3>
            <p class="mb-5 text-center">What People Say</p>
            <div class="row customerhny my-lg-5 my-4">
                <div class="col-md-12">
                    <div id="customerhnyCarousel" class="carousel slide" data-ride="carousel">

                        <ol class="carousel-indicators">
                            <li data-target="#customerhnyCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#customerhnyCarousel" data-slide-to="1"></li>
                        </ol>
                        <!-- Carousel items -->
                        <div class="carousel-inner">

                            <div class="carousel-item active">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="customer-info text-center">
                                            <div class="feedback-hny">
                                                <span class="fa fa-quote-left"></span>
                                                <p class="feedback-para">Lorem, ipsum dolor sit amet consectetur
                                                    adipisicing elit. Labore rem, dicta assumenda mollitia molestias
                                                    quas nihil quasis.</p>
                                            </div>
                                            <div class="feedback-review mt-4">
                                                <img src="assets/images/c1.jpg" class="img-fluid" alt="">
                                                <h5>Smith Roy</h5>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="customer-info text-center">
                                            <div class="feedback-hny">
                                                <span class="fa fa-quote-left"></span>
                                                <p class="feedback-para">Lorem, ipsum dolor sit amet consectetur
                                                    adipisicing elit. Labore rem, dicta assumenda mollitia molestias
                                                    quas nihil quasis.</p>
                                            </div>
                                            <div class="feedback-review mt-4">
                                                <img src="assets/images/c2.jpg" class="img-fluid" alt="">
                                                <h5>Lora Grill</h5>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="customer-info text-center">
                                            <div class="feedback-hny">
                                                <span class="fa fa-quote-left"></span>
                                                <p class="feedback-para">Lorem, ipsum dolor sit amet consectetur
                                                    adipisicing elit. Labore rem, dicta assumenda mollitia molestias
                                                    quas nihil quasis.</p>
                                            </div>
                                            <div class="feedback-review mt-4">
                                                <img src="assets/images/c3.jpg" class="img-fluid" alt="">
                                                <h5>Laura Sten</h5>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="customer-info text-center">
                                            <div class="feedback-hny">
                                                <span class="fa fa-quote-left"></span>
                                                <p class="feedback-para">Lorem, ipsum dolor sit amet consectetur
                                                    adipisicing elit. Labore rem, dicta assumenda mollitia molestias
                                                    quas nihil quasis.</p>
                                            </div>
                                            <div class="feedback-review mt-4">
                                                <img src="assets/images/c4.jpg" class="img-fluid" alt="">
                                                <h5>John Lee</h5>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--.row-->
                            </div>
                            <!--.item-->

                            <div class="carousel-item">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="customer-info text-center">
                                            <div class="feedback-hny">
                                                <span class="fa fa-quote-left"></span>
                                                <p class="feedback-para">Lorem, ipsum dolor sit amet consectetur
                                                    adipisicing elit. Labore rem, dicta assumenda mollitia molestias
                                                    quas nihil quasis.</p>
                                            </div>
                                            <div class="feedback-review mt-4">
                                                <img src="assets/images/c4.jpg" class="img-fluid" alt="">
                                                <h5>John Lee</h5>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="customer-info text-center">
                                            <div class="feedback-hny">
                                                <span class="fa fa-quote-left"></span>
                                                <p class="feedback-para">Lorem, ipsum dolor sit amet consectetur
                                                    adipisicing elit. Labore rem, dicta assumenda mollitia molestias
                                                    quas nihil quasis.</p>
                                            </div>
                                            <div class="feedback-review mt-4">
                                                <img src="assets/images/c3.jpg" class="img-fluid" alt="">
                                                <h5>Laura Sten</h5>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="customer-info text-center">
                                            <div class="feedback-hny">
                                                <span class="fa fa-quote-left"></span>
                                                <p class="feedback-para">Lorem, ipsum dolor sit amet consectetur
                                                    adipisicing elit. Labore rem, dicta assumenda mollitia molestias
                                                    quas nihil quasis.</p>
                                            </div>
                                            <div class="feedback-review mt-4">
                                                <img src="assets/images/c1.jpg" class="img-fluid" alt="">
                                                <h5>Smith Roy</h5>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="customer-info text-center">
                                            <div class="feedback-hny">
                                                <span class="fa fa-quote-left"></span>
                                                <p class="feedback-para">Lorem, ipsum dolor sit amet consectetur
                                                    adipisicing elit. Labore rem, dicta assumenda mollitia molestias
                                                    quas nihil quasis.</p>
                                            </div>
                                            <div class="feedback-review mt-4">
                                                <img src="assets/images/c2.jpg" class="img-fluid" alt="">
                                                <h5>Lora Grill</h5>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--.row-->
                            </div>
                            <!--.item-->

                        </div>
                        <!--.carousel-inner-->
                    </div>
                    <!--.Carousel-->

                </div>
            </div>
        </div>
    </div>
</section> --}}
<!-- //customers-->

<!-- //customers-6-->


@endsection