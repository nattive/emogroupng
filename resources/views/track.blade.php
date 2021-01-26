@extends('layouts.app')

@section('content')
<section class="w3l-banner-slider-main inner-pagehny">
    <div class="breadcrumb-infhny">

        <div class="top-header-content">

            @include('layouts.header')
            <div class="breadcrumb-contentnhy">
                <div class="container">
                    <nav aria-label="breadcrumb">
                        <h2 class="hny-title text-center">Track Order</h2>
                        <ol class="breadcrumb mb-0">
                            <li><a href="{{ route('home') }}">Home</a>
                                <span class="fa fa-angle-double-right"></span></li>
                            <li class="active">Track Order</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
</section>
<section class="tracking_box_area section-margin--small">
    <div class="container">
        <div class="tracking_box_inner">
            <p>To track your order please enter your transaction ID in the box below and press the "Track" button. This
                was given to you on your receipt and in the confirmation email you should have received.</p>
            <form class="row tracking_form" action="{{ route('track') }}" method="post" novalidate="novalidate">
               @csrf
                <div class="col-md-12 form-group">
                    <input type="text" class="form-control" id="order" name="order" placeholder="Order ID"
                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Order ID'">
                </div>
                <div class="col-md-12 form-group">
                    <button type="submit" value="submit" class="button button-tracking">Track Order</button>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection