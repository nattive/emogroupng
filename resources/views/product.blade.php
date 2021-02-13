@extends('layouts.app')

@section('content')
<section class="w3l-banner-slider-main inner-pagehny">
    <div class="breadcrumb-infhny">

        <div class="top-header-content">

            @include('layouts.header')
            <div class="breadcrumb-contentnhy">
                <div class="container">
                    <nav aria-label="breadcrumb">
                        <h2 class="hny-title text-center">{{$product->name}}</h2>
                        <ol class="breadcrumb mb-0">
                            <li><a href="{{ route('home') }}">Home</a>
                                <span class="fa fa-angle-double-right"></span></li>
                            <li class="active">{{$product->name}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
</section>
<!-- ================ start banner area ================= -->
<product-component productId='{{$product->id}}' productName='{{$product->name}}' productAmount='{{$product->amount}}'
    productGenderSpecification='{{$product->genderSpecification}}' productStock='{{$product->stock}}'
    productBrand_id='{{$product->brand_id}}' productDescription='{{$product->description}}'
    productCarton='{{$product->carton}}' productPack='{{$product->pack}}' productImage='{{$product->image}}'
    brand='{{$product-> brand -> BrandName }}'>
</product-component>


@endsection