@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Upload</h1>
@stop

@section('content')
<form role="form" action="{{ $product -> id == null ? route('admin.store') : route('admin.update', $product -> id)}}"
    enctype="multipart/form-data" method="POST">
    @csrf
    @if ($product -> id == null)
    @method('POST')
    @else
    @method('PUT')
    @endif
    <div class="col-12">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
    <div class="row">
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">

                <!-- /.card-header -->
                <!-- <form role="form">form start -->

                <div class="card-body">
                    <div class="form-group">
                        <label for="p_name">Product Name</label>
                        <input type="text" class="form-control" name="name" value="{{$product -> name ?? ''}}">
                    </div>
                    <div class="form-group">
                        <label for="p_amount">Amount</label>
                        <input type="number" class="form-control" name="amount" value="{{$product -> amount ?? ''}}">
                    </div>
                    <div class="form-group">
                        <label for="p_stock">Stock</label>
                        <input type="number" class="form-control" name="stock" value="{{$product -> stock ?? ''}}"
                            placeholder="If Stock is 0, Product will indecate out of stock">
                    </div>
                    <div class="form-group">
                        <label for="p_category">category</label>
                        <input type="text" class="form-control" name="category" value="{{$product -> category ?? ''}}">
                        <input type="hidden" name="id" value="{{$product -> id ?? null}}">
                    </div>

                </div>
                <!--</form> /.card-body -->


            </div>

        </div>

        <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">

                <!-- /.card-header -->
                <!-- form start -->
                <div class="card-body">
                    <div class="form-group">
                        <label for="Picture">Product picture</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="Picture">
                                <label class="custom-file-label" for="Picture">Choose file</label>
                            </div>
                            <!--        <div class="input-group-append">
                                <span class="input-group-text" id="">Upload</span>
                            </div> -->

                        </div>
                    </div>
                    <!-- /.card-body -->

                </div>

            </div>
            <div class="card card-primary">

                <!-- /.card-header -->
                <!-- form start -->
                <div>
                    <div class="card-body">
                        <button type="submit" id="btnSubmit" class="btn btn-success btn-flat">Upload</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>

</script>
@stop