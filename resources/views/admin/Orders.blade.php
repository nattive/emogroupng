@extends('adminlte::page')

@section('title', 'Dashboard')

{{-- @section('content_header')
<h1>Dashboard</h1>
@stop --}}

@section('content')
<div class="card">
    <!-- /.card-header -->
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Transaction Refrence</th>
                    <th>Customer's Name</th>
                    <th>Location</th>
                    <th>Order status</th>
                    <th>Payment status</th>
                    <th>Total</th>
                    <th>Update Order</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if (!empty($transacrions))

                @foreach ($transacrions as $order)
                <tr>
                    <input type="hidden" id="csrf" value="{{ csrf_token() }}">
                    <td>
                        <p id="OrderId{{  $order -> id }}">{{ date('dS, F, Y') == date('dS F Y', strtotime($order -> updated_at)) ? 'Today' :
                        date('dS F Y', strtotime($order -> updated_at))   }}</p>
                    </td>
                    <td>{{ $order -> transactionRef }}</td>
                    <td>{{ $customer ->where('id', $order -> customer_id )->first()-> firstname }}</td>
                    <td>
                        {{ 
                            $customer ->where('id', $order -> customer_id )->first()-> Appartment .' '  .
                            $customer ->where('id', $order -> customer_id )->first()-> streetaddress .', ' .
                            $customer ->where('id', $order -> customer_id )->first()-> towncity .', ' .
                            $customer ->where('id', $order -> customer_id )->first()-> postcodezip
                        }}

                    </td>
                    <td>
                        <p id="OrderStatusTd{{  $order -> id }}">{{ $order-> status }}</p>
                    </td>
                    <td>
                        <p id="confirmPaymentId{{  $order -> id }}">
                            {{ $order-> confirmPayment == 'true' ? 'Paid' : 'Not Paid' }}</p>
                        <select class="form-control" id="confirmPayment{{  $order -> id }}"
                            onchange="confirmPayment({{  $order -> id }})">
                            <option value="{{ $order -> confirmPayment }}" disabled selected>
                                {{ $order-> confirmPayment == 'true' ? 'Paid' : 'Not Paid' }}</option>
                            <option value="true">Paid</option>
                            <option value="false">Not Paid</option>
                        </select>
                    </td>
                    <td>{{ $order-> amount }}</td>
                    <td>
                        <div class="select-wrap">
                            <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                            <select class="form-control" id="statusOption{{  $order -> id }}"
                                onchange="updateStatusOption({{  $order -> id }})">
                                <option value="{{ $order-> status }}" disabled selected>{{ $order-> status }}</option>
                                <option value="Order Recieved">Order Recieved</option>
                                <option value="Processing">Processing</option>
                                <option value="Order dispatched">Order dispatched</option>
                                <option value="Delivered">Delivered</option>
                            </select>
                        </div>
                    </td>
                    <td class="d-flex">
                        <button class="btn btn-flat btn-danger" title="delete transaction details"><i
                                class="fa fa-trash"></i></button>
                        <form action="{{ route('admin.customerDetails', $order -> customer_id) }}" method="post">
                            @csrf
                            <input type="hidden" name="transactionRef" value="{{ $order -> transactionRef }}">
                            <button title="See customer the shopping cart detaails" class="btn btn-flat btn-info"><i
                                    class="fa fa-eye"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->

</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    function updateStatusOption(id){
    //    e.preventDefault();
       var statusOption = $('#statusOption'+id).val()
       $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('#csrf').val()
        }
        });
        $.ajax({
        type: "POST",
        url: '/admin/Transaction/update/' +id,
        data: {
            status : $('#statusOption'+id).val()
        },
        success: function(data) {
            $('#OrderStatusTd'+id).text(statusOption)
        console.log(data)
        },
        error: function(data) {
        console.log('error:', data);
        }
        });
} 
function confirmPayment(id){
    //    e.preventDefault();
    console.log($('#confirmPayment' +id).val())
       $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('#csrf').val()
            }
        });
        $.ajax({
        type: "POST",
        url: '/admin/Transaction/update/' +id,
        data: {
            confirmPayment :$('#confirmPayment' + id).val()
        },
        success: function(data) {
            alert('Updated')
            $('#confirmPaymentId'+id).text($('#confirmPayment'+id).val() == 'true' ? 'Paid' : 'Not Paid')
            console.log(data.confirmPayment)
        },
        error: function(data) {
            alert('Error occured')
            console.log('error:', data);
        }
        });
}
</script>
@stop