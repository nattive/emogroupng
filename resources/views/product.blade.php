@extends('layouts.app')

@section('content')
<!-- ================ start banner area ================= -->
<product-component
productId='{{$product->id}}'
productName='{{$product->name}}'
productAmount='{{$product->amount}}'
productGenderSpecification='{{$product->genderSpecification}}'
productStock='{{$product->stock}}'
productBrand_id='{{$product->brand_id}}'
productDescription='{{$product->description}}'
productPack='{{$product->pack}}'
productImage='{{$product->image}}'
brand='{{$product-> brand -> BrandName }}'
></product-component>

@endsection