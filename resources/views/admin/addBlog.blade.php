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
        <button type="submit" class="btn btn-flat btn-success">Publish</button>
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
                            <input type="text" name="title" class="form-control" @error('title') is-invalid
                                @enderror value="{{ old('title') }}">

                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="" class="form-control-label">Upload Images</label>
                            <input type="file" name="image" class="form-control-file">
                        </div>
                        <div class="d-flex">
                            <div class="form-group clearfix">
                                <div class="icheck-primary d-inline mr-4">
                                    <input type="radio" id="radioPrimary1" name="PostType" value="event">
                                    <label for="radioPrimary1">
                                        An Event Post
                                    </label>
                                </div>
                                <div class="icheck-primary d-inline">
                                    <input type="radio" id="radioPrimary2" name="PostType" checked value="blog">
                                    <label for="radioPrimary2">
                                        Blog Post
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        {{-- <div class="form-group">
                            <label for="" class="form-control-label">Tags <span><a class="btn-link" href="#"
                                        onclick="$('#tags_feild').toggleClass('d-none')">or create New
                                        tags</a></span></label>
                            <select class="select2" name="tags[]" multiple="multiple" data-placeholder="Select Tags"
                                style="width: 100%;">
                                @foreach ($Tags as $Tag)
                                <option value="{{ $Tag -> tags }}">{{ $Tag -> tags }}</option>
                                @endforeach
                            </select>
                            <hr class="my-4">
                            <div class="row d-none" id="tags_feild">
                                <div class="col-7">
                                    <input type="text" name="new_Tags" id="new_Tags" class="form-control"
                                        placeholder="Tags Name">
                                    <small id="errorMesgTags" class="text-danger"></small>
                                </div>
                                <div class="col-4">
                                    <button- class="btn btn-info btn-flat" id="newTagsBtn"
                                        onclick="uodateCattag('Tags', 'tags/add')">Create</button->
                                </div>
                            </div>
                        </div> --}}
                        <div class="form-group">
                            <label for="" class="form-control-label">Categories <span><a class="btn-link" href="#"
                                        onclick="$('#cat_feild').toggleClass('d-none')">or create New
                                        Categories</a></span></label>
                            <select class="form-control" name="category" style="width: 100%;">
                                @foreach ($categories as $category)
                                <option value="{{ $category -> category }}">{{ $category -> category }}</option>
                                @endforeach
                            </select>
                            <hr class="my-4">

                            <div class="row d-none" id="cat_feild">
                                <div class="input-group input-group-lg">
                                    <input type="text" id="new_category" class="form-control"
                                        placeholder="Category Name">
                                    <input type="hidden" id="csrf" value="{{ csrf_token() }}">
                                    <span class="input-group-append">
                                        <button- class="btn btn-success btn-flat" id="newCatBtn"
                                            onclick="uodateCattag('category', 'category/add')">
                                            Create</button->
                                    </span>
                                </div>
                                <div class="d-block">

                                    <small id="errorMesgcategory" class="text-danger"></small><br>
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" id="checkboxPrimary3" id="categoryToSub"
                                            value="categoryToSub" name="categoryToSub[]">
                                        <label for="checkboxPrimary3" class="form-control-label">
                                            Add category to Blog submenu
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-wrapper box-content">
        <textarea class="textareacontent" name="body" @error('body') is-invalid @enderror" name="body"
            value="{{ old('body') }}" required></textarea>
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
    var categoryToSub = false;
    $(document).ready(function() {
        $('.textareacontent').richText();
        });

        ///
const uodateCattag = (head, url) => {
    // e.preventDefault();

    // $('input[type="checkbox"]').click(function(){
        if($('input[type="checkbox"]').is(":checked")){
            categoryToSub =true
        } else if($('input[type="checkbox"]').is(":not(:checked)")){
            categoryToSub = false
        }
    // })
    $.ajaxSetup({
        headers: {
         'X-CSRF-TOKEN': $('#csrf').val()
        }
    });
    $.ajax({
        type: "POST",
        url: '/admin/' + url,
        data: {
            category: $("#new_category").val(),
            categoryToSub: categoryToSub,
            Tags: $("#new_Tags").val(),
        },
        success: function(data) {
            $("#new_" + head).val('')
            $("#new" + head + "Btn").text('Created');
            $("#errorMesg" + head).removeClass('text-danger').addClass('text-success').text(data);
            $('#new_' +head).removeClass('border, border-danger');
            setTimeout(()=> {
                $("#new" + head + "Btn").text('Create');
                $("#errorMesg" + head).text('');
            },2000)
            console.log(data)
        },
        error: function(data) {
            console.log(data)
           $("#new" + head + "Btn").text('Error Occured');
           $("#errorMesg" + head).text(data.responseJSON.message);
            $('#new_' +head).addClass('border, border-danger');
            // console.log()
        }
    });
}

$('.select2').select2({
theme: 'bootstrap4'
})
</script>
@stop