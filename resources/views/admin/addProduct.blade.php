@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Upload</h1>
@stop

@section('content')
<form role="form" action="{{ route('admin.store') }}" enctype="multipart/form-data" method="POST">
    @csrf
    @method('POST')
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
                <!-- form start -->
                <form role="form">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="p_name">Product Name</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" required autocomplete="name"  >
                        </div>
                        <div class="form-group">
                            <label for="p_amount">Amount</label>
                            <input type="number" class="form-control" name="amount" value="{{ old('amount') }}" required autocomplete="amount" >
                        </div>
                        <div class="form-group">
                            <label for="Picture">Price per Pack</label>
                            <div class="input-group">
                                <input type="number" class="form-control" name="pack" value="{{ old('pack') }}" required autocomplete="pack" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Picture">Price per Carton</label>
                            <div class="input-group">
                                <input type="number" class="form-control" name="carton" value="{{ old('pack') }}"  autocomplete="pack">
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                </form>
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
                            <div class="input-group-append">
                                <span class="input-group-text" id="">Upload</span>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                </div>

            </div>
            <div class="card card-primary">

                <!-- /.card-header -->
                <!-- form start -->
                <div class="card-body">
                    <div class="form-group">
                        <label for="p_stock">Stock</label>
                        <input type="number" class="form-control" name="stock" value="{{ old('stock') }}" required autocomplete="stock" 
                            placeholder="If Stock is 0, Product will indecate out of stock">
                    </div>
                </div>

            </div>
            <div class="card card-primary">
                <div class="card-body">
                    <div class="row mx-auto">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="brand" class="form-control-label">Select gender specification for the
                                    product</label>
                                <br>
                                <select name="genderSpecification" class="form-control">
                                    <option value="Male">For Male</option>
                                    <option value="Female">For Female</option>
                                    <option value="Unisex">Unisex</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="brand" class="form-control-label">Select Brand Name</label><br>
                                <small>Please<a href="http://"> Create one</a> if you havrn't already</small>
                                <select name="brand" class="form-control">
                                    @if (!empty($brands))
                                         @foreach ($brands as $brand)
                                            <option value="{{$brand -> id}}">{{ $brand -> BrandName }}</option>
                                        @endforeach
                                    @else
                                    <option disabled>Please create brand before proceeding</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="form-group">
                                <label for="brand" class="form-control-label">Select Category Name</label><br>
                                <small>What category does this product fails into</small><br>
                                <small>Please<a href="http://"> Create one</a> if you havrn't already</small>
                                <select name="CategoryName" class="form-control">
                                    @isset($Categories)
                                        @foreach ($Categories as $ProductCategory)
                                            <option value="{{ $ProductCategory -> id }}">{{ $ProductCategory -> categoryName }}</option>
                                        @endforeach
                                    @endisset
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-12 mx-auto">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="description" class="form-control-label">Product description</label>
                                        <textarea class="textareacontent" name="description" @error('description')
                                            is-invalid @enderror value="{{ old('description') }}" required></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 mb-4">
            <div class="float-right">
                <button id="btnSubmit" class="btn btn-success btn-flat">Upload</button>
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
    $('.textareacontent').richText();
</script>
@stop