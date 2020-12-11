@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
@isset($message)
<div class="row">
    <div class="col-xs-12">
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-check"></i> Success!</h5>
            {{ $message }}
        </div>
    </div>
</div>
@endisset
<div class="container">
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-light">
                <div class="inner">
                    <h3>{{ $unread  }}</h3>

                    <p>New Messages</p>
                </div>
                <div class="icon">
                    <i class="fa fa-envelope"></i>
                </div>
                <a href="{{ route('message.index') }}" class="small-box-footer">Check inbox <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-light">
                <div class="inner">
                    <h3>{{ $products-> count()  }}<sup style="font-size: 20px"></sup></h3>

                    <p>Uploaded Products</p>
                </div>
                <div class="icon">
                    <i class="fa fa-shopping-basket"></i>
                </div>
                <a href="{{ url('/admin/product/list') }}" class="small-box-footer"> View all products <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-light">
                <div class="inner">
                    <h3>{{ number_format($sum) }}</h3>

                    <p>Total Transactions</p>
                </div>
                <div class="icon">
                    <i><b>₦</b></i>
                </div>
                <a href="{{ route('admin.Order') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-light">
                <div class="inner">
                    <h3>{{ $transacrions -> count() }}</h3>

                    <p> transacrions </p>
                </div>
                <div class="icon">
                    <i class="fas fa-th"></i>
                </div>
              <a href="{{ route('admin.Order') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-6">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Upload testimonial</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{ route('admin.Testimony') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group row">
                            {{-- <label for="inputEmail3" class="col-sm-2 control-label">Name</label> --}}
                            <div class="col-sm-12">
                                <input type="text" class="form-control" placeholder="Name" name="name">
                            </div>
                        </div>
                        <hr>

                        <div class="form-group">
                            <label for="inputPassword3" class="ontrol-label">Image</label>
                            <div class="col-sm-12">
                                <input type="file" class="form-control-file" placeholder="Image" name="Image">
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            {{-- <label for="inputPassword3" class="col-sm-2 control-label">testimonial</label> --}}
                            <div class="col-sm-12">
                                <textarea class="form-control" placeholder="testimonial" name="Body"
                                    required></textarea>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">Upload</button>
                    </div>
                    <!-- /.card-footer -->
                </form>
            </div>
        </div>
        <div class="col-sm-12 col-md-6">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Upload Gallery Image</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{ route('GalleryImage.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputPassword3" class="ontrol-label">Image</label>
                            <div class="col-sm-12">
                                <input type="file" class="form-control-file" placeholder="Image" name="image">
                            </div>
                        </div>
                        <div class="form-group row">
                            {{-- <label for="inputEmail3" class="col-sm-2 control-label">Name</label> --}}
                            <div class="col-sm-12">
                                {{-- <input type="text" class="form-control" placeholder="Caption" name="caption"> --}}
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">Upload</button>
                    </div>
                    <!-- /.card-footer -->
                </form>
            </div>
        </div>
    </div>
</div>


@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Hi!'); 
</script>
@stop