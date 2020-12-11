@extends('adminlte::page')

@section('title', 'Dashboard')

{{-- @section('content_header')
<h1>Dashboard</h1>
@stop --}}

@section('content')
<script>

</script>
<div class="container">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="card">
        <div class="card-body">
            <form action="{{ route('coupon.create') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="Coupon" class="form-control-label">Enter Coupon name</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="Coupon" class="form-control-label">Enter Coupon type</label>
                            <select name="type" id="coupon_type" class="form-control">
                                <option value="FIXED" selected>FIXED</option>
                                <option value="PERCENTAGE">PERCENTAGE</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="Coupon" class="form-control-label">Enter Coupon code</label>
                            <input type="text" class="form-control" name="code">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="Coupon" class="form-control-label">Enter Coupon Amount Off</label>
                            <input type="text" class="form-control" name="amount_off" id="amount_off">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="Coupon" class="form-control-label">Enter Coupon Discount Off</label>
                            <input type="text" class="form-control" name="discount_off" id="discount_off">
                        </div>
                    </div>
                </div>
                <button class="btn btn-flat btn-success">Create Coupon</button>
            </form>
        </div>
    </div>

</div>
<div class="card">
    <!-- /.card-header -->
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Coupon name</th>
                    <th>Coupon type</th>
                    <th>Coupon code</th>
                    <th>Amount_off</th>
                    <th>Discount_off</th>
                </tr>
            </thead>
            <tbody>
                @if (!empty($Coupons))

                @foreach ($Coupons as $Coupon)
                <tr>
                    <td>
                        <p>{{ $coupon -> name}}</p>
                    </td>
                    <td>
                        <p>{{ $coupon -> type}}</p>
                    </td>
                    <td>
                        <p>{{ $coupon -> code}}</p>
                    </td>
                    <td>
                        <p>{{ $coupon -> Amount_off}}</p>
                    </td>
                    <td>
                        <p>{{ $coupon -> Discount_off}}</p>
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
</script>
@stop