@extends('layouts.app')

@section('content')

<div class="container">
    <div id="carouselExampleControls" class="card card-body carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="images/bg_1.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="images/bg_2.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="images/bg_3.jpg" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
<!-- ================ section start ================= -->

<!-- ================ section start ================= -->


<!-- ================ trending product section start ================= -->

<section class="calc-60px">
    <products-component guestId="{{$userUniqueId}}"></products-component>
</section>

<!-- ================ trending product section end ================= -->

<div class="container card card-body">
    <div class="row">
        <div class="col-xs-12 col-md-6">
            <img src="{{ asset('images/BANNER1.jpg') }}" class="w-100 img-fluid"/>
        </div>
         <div class="col-xs-12 col-md-6">
            <img src="{{ asset('images/emo 21.jpg') }}" class="w-100 img-fluid"/>
        </div>
    </div>
</div>

<!-- ================ offer section star
<section style="background-image: url({{asset('images/parallax-bg.png')}})" class="offer" id="parallax-1"
    data-anchor-target="#parallax-1" data-300-top="background-position: 20px 30px"
    data-top-bottom="background-position: 0 20px">
    <div class="container">
        <div class="row ftco-animate">
            <div class="col-xl-5">
                <div class="offer__content text-center">
                    <h3>Up To 50% Off</h3>
                    <h4>Winter Sale</h4>
                    <p>Him she'd let them sixth saw light</p>
                    <a class="button button--active mt-3 mt-xl-4" href="#">Shop Now</a>
                </div>
            </div>
        </div>
    </div>
</section>t ================= -->
<!-- ================ offer section end ================= -->

<!-- ================ trending product section end ================= -->
<section class="calc-60px">
    <products-component guestId="{{$userUniqueId}}" :categories="{{$categories}}"></products-component>
</section>
<!-- ================ trending product section end ================= -->
<!-- ================ Blog section end ============
<section class="ftco-section">
    <div class=" container">
        <div class="section-intro pb-60px">
            <p>Our News, Events and </p>
            <h2>Blog <span class="section-intro__style">Post</span></h2>
        </div>
        <div class="section row d-flex">
            <div class="col-md-3 mb-5 heading-section ftco-animate">
                <p class="mb-5">Would You like to read more or brows through our old post?</p>
                <p class="btn-view"><a href="#">View more</a></p>
            </div>
            <div class="col-md-3 d-flex ftco-animate">
                <div class="blog-entry align-self-stretch">
                    <a href="blog-single.html" class="block-20" style="background-image: url('images/image_1.jpg');">
                    </a>
                    <div class="text pt-4 d-block">
                        <div class="meta mb-3">
                            <div><a href="#">August 12, 2018</a></div>
                            <div><a href="#">Admin</a></div>
                            <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                        </div>
                        <h3 class="heading mt-3"><a href="#">Asia's Next Top Model</a></h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3 d-flex ftco-animate">
                <div class="blog-entry align-self-stretch">
                    <a href="blog-single.html" class="block-20" style="background-image: url('images/image_2.jpg');">
                    </a>
                    <div class="text pt-4 d-block">
                        <div class="meta mb-3">
                            <div><a href="#">August 12, 2018</a></div>
                            <div><a href="#">Admin</a></div>
                            <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                        </div>
                        <h3 class="heading mt-3"><a href="#">Asia's Next Top Model</a></h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3 d-flex ftco-animate">
                <div class="blog-entry align-self-stretch">
                    <a href="blog-single.html" class="block-20" style="background-image: url('images/image_3.jpg');">
                    </a>
                    <div class="text pt-4 d-block">
                        <div class="meta mb-3">
                            <div><a href="#">August 12, 2018</a></div>
                            <div><a href="#">Admin</a></div>
                            <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                        </div>
                        <h3 class="heading mt-3"><a href="#">Asia's Next Top Model</a></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>===== -->
<!-- ================ Blog section end ================= -->
@endsection