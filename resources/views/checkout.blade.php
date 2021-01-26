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
                        <h2 class="hny-title text-center">Checkout</h2>
                        <ol class="breadcrumb mb-0">
                            <li><a href="{{ route('home') }}">Home</a>
                                <span class="fa fa-angle-double-right"></span></li>
                            <li class="active">Checkout</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
</section>
</section>
<!-- ================ end banner area ================= -->
<checkout-component
total="{{ str_replace(',','',Cart::instance('shopping')->total()) }}"
:cartContent="{{ Cart::instance('shopping')->content() }}"
></checkout-component>
<!--================End Checkout Area =================-->
<!-- ================ top product area start ================= -->
{{-- <product-component></product-component> --}}
<!-- ================ Blog section end ================= -->
@endsection

@section('js')

<script>

</script>
    
@endsection