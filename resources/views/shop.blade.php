@extends('layouts.app')

@section('content')
<section class="w3l-banner-slider-main inner-pagehny">
    <div class="breadcrumb-infhny">

        <div class="top-header-content">

            @include('layouts.header')
            <div class="breadcrumb-contentnhy">
                <div class="container">
                    <nav aria-label="breadcrumb">
                        <h2 class="hny-title text-center">Shop</h2>
                        <ol class="breadcrumb mb-0">
                            <li><a href="{{ route('home') }}">Home</a>
                                <span class="fa fa-angle-double-right"></span></li>
                            <li class="active">Shop</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
</section>
@if (!empty($search_products))
    <shop-component :search_products="{{$search_products }}"></shop-component>
@else
    <shop-component></shop-component>
@endif

<!-- ================ Blog section end ================= -->
@endsection