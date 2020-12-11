@extends('layouts.app')

@section('content')
<!-- ================ start banner area ================= -->
<section class="blog-banner-area" id="category">
    <div class="container h-100">
        <div class="blog-banner">
            <div class="text-center">
                <h1>Checkout</h1>
                <nav aria-label="breadcrumb" class="banner-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Shop Category</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
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