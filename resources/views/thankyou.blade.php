@extends('layouts.app')

@section('content')

<section class="order_details section-margin--small">
    @if (!empty($transaction))
    <div class="container">
        <p class="text-center billing-alert">Thank you. Your order has been received.</p>
        <div class="row mb-5">
            <div class="col-md-6 col-xl-4 mb-4 mb-xl-0">
                <div class="confirmation-card">
                    <h3 class="billing-title">Transaction ID</h3>
                    <table class="order-rable">
                        <tr>
                            <td>Transaction Refrence</td>
                            <td>: {{$transaction -> transactionRef}}</td>
                        </tr>
                        <tr>
                            <td>Date</td>
                            <td>: {{ date('dS F Y', strtotime($transaction -> created_at)) }}</td>
                        </tr>
                        </tr>
                        <tr>
                            <td>status</td>
                            <td>: {{$transaction -> status}}</td>
                        </tr>
                        <tr>
                            <td>Total</td>
                            <td>: {{$transaction -> amount}}</td>
                        </tr>
                        <tr>
                            <td>Payment method</td>
                            <td>: {{$transaction -> paymentMode}}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-md-6 col-xl-4 mb-4 mb-xl-0">
                <div class="confirmation-card">
                    <h3 class="billing-title">Customer Details</h3>
                    <table class="order-rable">
                        <tr>
                            <td>Name</td>
                            <td>: {{$customer ->firstname .' '. $customer ->lastname}}</td>
                        </tr>
                        <tr>
                            <td>Phone Number</td>
                            <td>: {{$customer ->phone}}</td>
                        </tr>
                        <tr>
                            <td>Email Address</td>
                            <td>: {{$customer ->emailaddress}}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-md-6 col-xl-4 mb-4 mb-xl-0">
                <div class="confirmation-card">
                    <h3 class="billing-title">Shipping Address</h3>
                    <table class="order-rable">
                        <tr>
                            <td>Post/Zip code</td>
                            <td>: {{$customer ->postcodezip}}</td>
                        </tr>
                        <tr>
                            <td>Appartment</td>
                            <td>: {{$customer ->Appartment}}</td>
                        </tr>
                        <tr>
                            <td>Street Address</td>
                            <td>: {{$customer ->streetaddress}}</td>
                        </tr>
                        <tr>
                            <td>City</td>
                            <td>: {{$customer ->towncity}}</td>
                        </tr>
                        <tr>
                            <td>country</td>
                            <td>: {{$customer ->country}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="order_details_table">
            <h2>Order Details</h2>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($content as $item)
                        <tr>
                            <td>
                                <p>{{$item -> name}}</p>
                            </td>
                            <td>
                                <h5>x {{$item -> qty}}</h5>
                            </td>
                            <td>
                                <p>${{$item -> price}}</p>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
        
    @else
        <div class="container">
            <div class="text-center mx-auto">
                <div class="confirmation-card">
                    <p>This Transaction ID is not valid</p>
            </div>
            </div>
        </div>
    @endif
</section>

@endsection