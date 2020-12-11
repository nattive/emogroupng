@extends('adminlte::page')

@section('title', 'Dashboard')

{{-- @section('content_header')
<h1>Dashboard</h1>
@stop --}}

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Bordered Table</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Product Name</th>
                    <th>Image thumbnail</th>
                    <th>Amount</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @if (!empty($products))
                    
                @foreach ($products as $product)
                <tr>
                    <td>{{ $product -> id }}</td>
                    <td>{{ $product -> name }}</td>
                    <td style="width: 100px">
                        <div class="thumbnail">
                            <img src="/storage/{{$product ->image}}" alt="" class="img-thumbnail"></div>
                    </td>
                    <td>{{ $product -> amount }}</td>
                    <td>
                        <form action="{{ route('admin.destroy',$product -> id )}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-flat"><span class="fa fa-trash"></span></button>
                        </form>
                        <form action="{{ route('admin.edit',$product -> name )}}">
                            @csrf
                            <button class="btn btn-success btn-flat"><span class="fa fa-pen-square"></span></button>
                        </form>
                        
                        
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
    <div class="card-footer clearfix">
        <ul class="pagination pagination-sm m-0 float-right">
            <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
        </ul>
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