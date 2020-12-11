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
                    <th>Tracking Number</th>
                    <th>Customer's Name</th>
                    <th>Location</th>
                    <th>phone</th>
                    <th>emailaddress</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$customer -> id }}</td>
                    <td>{{$transaction -> transactionRef }}</td>
                    <td>{{$customer -> firstname. ' '.$customer -> lastname }}</td>
                    <td>{{$customer -> Appartment ?? '' .
                        ' '.$customer -> streetaddress.
                        ','. $customer -> towncity.
                        ','. $customer -> country.
                        ', Zip code:'. $customer -> postcodezip
                    }}</td>

                    <td>{{$customer -> phone }}</td>
                    <td>{{$customer -> emailaddress }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->

</div>
<h4 class="text-center">Shopping  Details</h4>
<div class="card">
    <!-- /.card-header -->
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Product</th>
                    <th>Price </th>
                    <th>Quantity</th>
                    <th>Total </th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
              {{ dd(Cart::restore('GAC-6425149-15'))}}
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
</script>
@stop