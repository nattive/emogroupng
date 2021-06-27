@extends('layouts.app')

@section('content')
<!-- ================ start banner area ================= -->
<section class="w3l-banner-slider-main inner-pagehny">
    <div class="breadcrumb-infhny">

        <div class="top-header-content">

            @include('layouts.header')
            <div class="breadcrumb-contentnhy">
                <div class="container">
                    <nav aria-label="breadcrumb">
                        <h2 class="hny-title text-center">About Us</h2>
                        <ol class="breadcrumb mb-0">
                            <li><a href="{{ route('home') }}">Home</a>
                                <span class="fa fa-angle-double-right"></span></li>
                            <li class="active">About</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
</section>
<!-- ================ end banner area ================= -->
<!--================Cart Area =================-->
<section class="ftco-section-2 bg-light p-2">
    <div class="container">
        <div class="section-2-blocks-wrapper d-flex row no-gutters">
            <div class="text col-md-12 ftco-animate">
                <div class="text-inner align-self-center text-center">

                    <h3 class="heading">Who we are</h3>
                    <p>We are an indigenous company with interests in importation and distribution of beauty and
                        healthcare products.
                        Established in November, 2014, EMO Group has gone on to become a household name in the cosmetics
                        and healthcare space.
                        The company was incorporated with the Corporate Affairs Commission and registered as EMO
                        Healthcare Limited. A few years
                        down the lane, we have grown to become a major player not only in the health sector but
                        also in the world of
                        scents and fragrances.<p>
                            Our goal in EMO Group, is to provide our customers with variety of healthy and high quality
                            personal and healthcare
                            products. We go ahead to assist them in making the right choices that best suit their
                            individual budgets and needs.
                            Simply put, availability and affordability of high quality body and healthcare products, is
                            our prerogative..</p>
                    </p>
                </div>
            </div>

        </div>

    </div>
</section>
<section class="ftco-section-2 mt-5">
    <div class="container p-4">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <h3 class="heading">Our Vision Statement</h3>
                <p>Everyone wants to smell good but not everyone knows how. To many, every first
                    impression begins with a good smell. It seems like when one is wearing an elegant fragrance, one oozes in self-confidence.
                    It is our desire in EMO Perfumes and Cosmetics Ltd, to put the power of choice in the hands of our customers. We do so by
                    ensuring availability of wide range of fragrances, from English to Arabic at highly competitive prices.</p>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="text-inner align-self-start">

                    <h3 class="heading">Our Services</h3>
                    <p>In view of the foregoing, we import and market perfumes, oil, colognes, and body
                        deodorants that meet the market needs
                        of all categories of customers with varying budget brackets, without Compromising on
                        the quality of these products. Now
                        customers can choose what they want, how they want it and how much they are willing
                        to pay.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<hr class="my-4">

<section class="ftco-section-2 mt-5">
    <div class="container p-4">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <h3 class="heading">Our Products Statement</h3>
                <p>While most body deodorants come in 150ml, 200ml and 250mls, most perfume and colognes arrive bottled
                    in 100mls. Oil
                    perfumes come in lesser volumes ranging from 3ml to 30ml. Each product brand has a wide range of
                    fragrances that keep
                    increasing with technology, time and innovation.</p>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="text-inner align-self-start">

                    <h3 class="heading">Our Core Values</h3>
                    <p>Our business philosophy is premised on the assumption that health is wealth, and that
                        cleanliness is next to
                        godliness. We would like to add that feeling good is smelling good. This philosophical approach
                        is hinged on the wheels
                        of five core values; of integrity, commitment, trust, honesty and passion. Driven by this
                        philosophy and obsessed with a
                        passion for customers’ satisfaction, we have successfully built and sustained enviable business
                        relationships with our
                        manufacturers, teeming customers, and the general public. This, has earned us a slogan “if it’s
                        from EMO, it must be of
                        high quality”. Overtime, this positive feedback has buoyed and motivated us to do even more.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Cart Area =================-->
<!-- ================ top product area start ================= -->
{{-- <product-component></product-component> --}}
<!-- ================ Blog section end ================= -->
@endsection