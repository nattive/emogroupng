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
                        <h2 class="hny-title text-center">Yout Cart</h2>
                        <ol class="breadcrumb mb-0">
                            <li><a href="{{ route('home') }}">Home</a>
                                <span class="fa fa-angle-double-right"></span></li>
                            <li class="active">Cart</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
</section>
<!-- ================ end banner area ================= -->
<!--================Cart Area =================-->
<section class="cart_area">
    <div class="container">
        <div class="cart_inner bg-light">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (Cart::instance('shopping')->content() as $cartitem)
                        <tr>
                            <td>
                                <div class="media">
                                    <div class="d-flex">
                                        <img src="img/cart/cart1.png" alt="">
                                    </div>
                                    <div class="media-body">
                                        <p>{{$cartitem -> name}}</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                {{-- <h5>₦ {{number_format($cartitem->price )}}</h5> --}}
                            <p>Bulk Quantity: {{$cartitem ->options['qtyValue']}}</p>
                            </td>
                            <td>
                                <div class="product_count">
                                <input type="text" name="qty" id="sst" maxlength="12" value="{{$cartitem->qty}}" title="Quantity:"
                                        class="input-text qty">
                                </div>
                            </td>
                            <td>
                                {{-- <h5>₦ {{number_format($cartitem -> price * $cartitem->qty)}}</h5> --}}
                            </td>
                        </tr>
                        @endforeach
                        <tr>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>
                                <h5>Subtotal</h5>
                            </td>
                            <td>
                                <h5>₦{{Cart::instance('shopping') -> subtotal }}</h5>
                            </td>
                        </tr>
                        <tr class="shipping_area">
                            <td class="d-none d-md-block">

                            </td>
                            <td>

                            </td>
                            <td>
                                <h5 class="d-none d-md-block">Shipping</h5>
                            </td>
                            <td>
                                <div class="shipping_box">
                                    <div class="d-block d-md-none text-center"><h5>Shipping</h5></div>
                                    <ul class="list">
                                        <li><a href="#">Within Lagos: ₦ 1000</a></li>
                                        <li><a href="#">Outside Lagos</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr class="out_button_area">
                            <td class="d-none-l">

                            </td>
                            <td class="">

                            </td>
                            <td>

                            </td>
                            <td>
                                <div class="checkout_btn_inner d-flex align-items-center">
                                    <a class="gray_btn" href="/shop">Continue Shopping</a>
                                    <a class="primary-btn ml-2" href="/checkout">Proceed to checkout</a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<!--================End Cart Area =================-->
<!-- ================ top product area start ================= -->
{{-- <product-component></product-component> --}}
<!-- ================ Blog section end ================= -->
@endsection