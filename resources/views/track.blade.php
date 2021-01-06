@extends('layouts.app')

@section('content')

<section class="blog-banner-area" id="category">
    <div class="container h-100">
        <div class="blog-banner">
            <div class="text-center">
                <h1>Order Tracking</h1>
                <nav aria-label="breadcrumb" class="banner-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Order Tracking</li>
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