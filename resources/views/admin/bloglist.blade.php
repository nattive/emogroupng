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
                    <th>Title</th>
                    <th>Image</th>
                    <th>Etract</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @if (!empty($posts))
                    
                @foreach ($posts as $post)
                <tr>
                    <td>{{ $post -> id }}</td>
                    <td>{{ $post -> title }}</td>
                    <td style="width: 100px">
                        <div class="thumbnail">
                            <img src="/storage/{{$post ->image}}" alt="" class="img-thumbnail"></div>
                    </td>
                    <td>{!! substr($post -> body,0, 50)!!}</td>
                    <td>
                        <form action="{{ route('blog.destroy',$post -> id )}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-flat"><span class="fa fa-trash"></span></button>
                        </form>
                        <form action="{{ route('blog.edit',$post -> id )}}">
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