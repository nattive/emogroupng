@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Add blog post</h1>
@stop

@section('content')
<form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('post')
    <div class="float-right m-4">
        <button type="submit" class="btn btn-flat btn-success">Update</button>
    </div>
    <div class="clearfix"></div>
    <div class="container">
        <div class="row">
            <div class="col-9 mx-auto">
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
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="" class="form-control-label">Title</label>
                            <input type="text" name="title" id="" class="form-control-file" @error('title') is-invalid
                                @enderror value="{{ $post -> title  }}" >

                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="" class="form-control-label">Upload Images</label>
                            <input type="file" name="image" id="" class="form-control-file">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="" class="form-control-label">Tags <span></label>
                            <input type="text" name="tags" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="" class="form-control-label">Categories <span><a href="">or create New
                                        Categories</a></span></label>
                            <input type="text" name="category" id="" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-wrapper box-content">
            <textarea class="textareacontent" name="body" @error('body') is-invalid @enderror" name="body"
                required>{{ $post -> title  }}</textarea>
            @error('body')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
</form>
@stop

@section('css')
{{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
<style>
    textarea {
        background-color: aliceblue !important;
        color: black !important;
    }
</style>
@stop

@section('js')
<script>
    $(document).ready(function() {
        $('.textareacontent').richText();
        });
</script>
@stop