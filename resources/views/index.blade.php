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

<div class="container card card-body d-none d-md-block">
    <div class="row">
        <div class="col-xs-12 col-md-6">
            <img src="{{ asset('images/BANNER1.jpg') }}" class="w-100 img-fluid" />
        </div>
        <div class="col-xs-12 col-md-6">
            <img src="{{ asset('images/emo 21.jpg') }}" class="w-100 img-fluid" />
        </div>
    </div>
</div>
<div class="container card card-block d-block d-sm-none">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="{{ asset('images/BANNER1.jpg') }}" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('images/emo 21.jpg') }}" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('images/emo 20-2.jpg') }}" alt="Third slide">
            </div>
        </div>
    </div>
</div>



<!-- ================ trending product section end ================= -->
<section class="calc-60px">
    <products-component guestId="{{$userUniqueId}}" :categories="{{$categories}}"></products-component>
</section>
<!-- ================ trending product section end ================= -->
<!-- ================ Blog section end ============ -->
<section class="ftco-section">
    <div class=" container">
        <div class="section-intro pb-60px">
            <p>Our News, Events and </p>
            <h2>Blog <span class="section-intro__style">Post</span></h2>
        </div>
        <div class="section row d-flex">
            <div class="col-md-3 mb-5 heading-section ftco-animate">
                <p class="mb-5">Would You like to read more or brows through our old post?</p>
                <p class="btn-view"><a href="/blog">View more</a></p>
            </div>
            @foreach ($blogs as $post)
            <div class="col-md-3 d-flex ftco-animate">
                <div class="blog-entry align-self-stretch">
                    <a href="blog-single.html" class="block-20"
                        style="min-height: 300px; width: 100%; background-size: contain; background-image: url('{{ asset('storage/'.$post -> image) }}');">
                        ;</a>
                    <div class="text pt-4 d-block">
                        <div class="meta mb-3">
                            <div><a href="#">{{ date('dS F Y', strtotime($post -> updated_at)) }}</a></div>
                            <div><a href="{{ route('viewpost', $post -> id) }}">Admin</a></div>
                            {{-- <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div> --}}
                        </div>
                        <h3 class="heading mt-3"><a href="{{ route('viewpost', $post -> id) }}">{{$post -> title }}</a>
                        </h3>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- ================ Blog section end ================= -->
{{-- <section style="background-image: url({{asset('images/bg_2.jpg')}})" class="offer" id="parallax-1" --}}
{{-- <section class="ftco-section">
    <div class="container section mt-4">
        <div class="row ftco-animate">
            <div class="col-xl-6 col-xs-12">
                <div class="offer__content text-center py-3">
                    <h3>Our Policy</h3>
                    <p>Delivery Cost Apply depending on your location and it is charged at checkout.
                    </p>
                </div>
            </div>
            <div class="col-xl-6 col-xs-12">
                <div class="offer__content text-center">
                    <h3>Refund Policy</h3>
                    <p> Products sold in good condition cannot be returned, except in a case of manufacturer's error and
                        such cases must be
                        reported and the products returned within 3 to 4 days from the date of lodging the complaint.
                    </p>
                </div>
            </div>

        </div>
    </div>
</section> --}}

@endsection