@extends('adminlte::page')

@section('title', 'Update Brand and Category')

@section('content_header')
<h1>Create Brand And Category</h1>
@stop

@section('content')
@isset($success)
<div class="container">
    <div class="alert alert-success p-2">
        <p>{{$success}}</p>
    </div>
</div>
@endisset

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
</div>
<div class="container">
    <div class="row">
        <div class="d-flex justify-content-around">
            <div class="card card-success m-4">
                <div class="card-header">
                    Create Brand
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.createBrand') }}" method="post">
                        <div class="form-group">
                            @csrf
                            <label for="Brand" class="form-control-label">Brand Name</label>
                            <input type="text" name="BrandName" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-success btn-block">Create</button>
                    </form>
                </div>
            </div>
            <div class="card card-success m-4">
                <div class="card-header">
                    Create Category
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.createCategory') }}" method="post">
                        <div class="form-group">
                            @csrf
                            <label for="Brand" class="form-control-label">Category Name</label>
                            <input type="text" name="categoryName" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-success btn-block">Create</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Category Name</th>
                        <th>Number Of Products</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @if (!empty($Categories))

                    @foreach ($Categories as $Category)
                    <tr>
                        <td>{{ $Category -> id }}</td>
                        <td>{{ $Category -> categoryName }}</td>
                        <td>{{ $Category -> products -> count() }}</td>
                        <td>Action</td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        <div class="col-md-6">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Brand Name</th>
                        <th>Number Of Products</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @if (!empty($brands))

                    @foreach ($brands as $Brand)
                    <tr>
                        <td>{{ $Brand -> id }}</td>
                        <td>{{ $Brand -> BrandName }}</td>
                        <td>{{ $Brand -> products -> count() }}</td>
                        <td>Action</td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
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