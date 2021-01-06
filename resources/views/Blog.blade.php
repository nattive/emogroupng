@extends('layouts.app')

@section('content')
<!-- ================ start banner area ================= -->
<section class="blog-banner-area" id="category">
    <div class="container h-100">
        <div class="blog-banner">
            <div class="text-center">
                <h1>Blog</h1>
                <nav aria-label="breadcrumb" class="banner-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">About</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>

<!--================Blog Area =================-->
<section class="blog_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="blog_left_sidebar">
                    @foreach ($blogs as $blog)
                    <article class="row blog_item bg-light">
                        <div class="col-md-3">
                            <div class="blog_info text-right">
                                <div class="post_tag">
                                    {{-- <a href="#">Food,</a>
                                    <a class="active" href="#">Technology,</a>
                                    <a href="#">Politics,</a> --}}
                                    <a href="#">{{$blog -> category}}</a>
                                </div>
                                <ul class="blog_meta list">
                                    <li>
                                        <a href="#">Admin
                                            <i class="lnr lnr-user"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">{{ date('dS F Y', strtotime($blog -> updated_at)) }}
                                            <i class="lnr lnr-calendar-full"></i>
                                        </a>
                                    </li>
                                    {{-- <li>
                                        <a href="#">1.2M Views
                                            <i class="lnr lnr-eye"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">06 Comments
                                            <i class="lnr lnr-bubble"></i>
                                        </a>
                                    </li> --}}
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="blog_post">
                                <img src="{{ asset('storage/'.$blog -> image) }}" class="w-100" alt="">
                                <div class="blog_details">
                                   <a href="{{ route('viewpost', $blog -> id) }}">
                                        <h2>{{$blog -> title }}</h2>
                                    </a>
                                    <p>{!! substr($blog -> body,0, 200)!!}</p>
                                    <a class="button button-blog" href="single-blog.html">View More</a>
                                </div>
                            </div>
                        </div>
                    </article>
                    @endforeach
                    <nav class="blog-pagination justify-content-center d-flex">
                        <ul class="pagination">
                            <li class="page-item">
                                <a href="#" class="page-link" aria-label="Previous">
                                    <span aria-hidden="true">
                                        <span class="lnr lnr-chevron-left"></span>
                                    </span>
                                </a>
                            </li>
                            <li class="page-item">
                                <a href="#" class="page-link">01</a>
                            </li>
                            <li class="page-item active">
                                <a href="#" class="page-link">02</a>
                            </li>
                            <li class="page-item">
                                <a href="#" class="page-link">03</a>
                            </li>
                            <li class="page-item">
                                <a href="#" class="page-link">04</a>
                            </li>
                            <li class="page-item">
                                <a href="#" class="page-link">09</a>
                            </li>
                            <li class="page-item">
                                <a href="#" class="page-link" aria-label="Next">
                                    <span aria-hidden="true">
                                        <span class="lnr lnr-chevron-right"></span>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="blog_right_sidebar">
                    {{-- <aside class="single_sidebar_widget search_widget">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search Posts">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="lnr lnr-magnifier"></i>
                                </button>
                            </span>
                        </div>
                        <!-- /input-group -->
                        <div class="br"></div>
                    </aside> --}}
                    <aside class="single_sidebar_widget popular_post_widget">
                        <h3 class="widget_title">Popular Posts</h3>
                        @foreach ($blogs as $post)
                        <div class="media post_item">
                            {{-- <img src="{{ asset('storage/'.$blog -> image) }}" class="w-100" alt=""> --}}
                            <div class="media-body">
                                <a href="{{ route('viewpost', $post -> id) }}">
                                    <h3>{{$post -> title }}</h3>
                                </a>
                                <p>{{ date('dS F Y', strtotime($post -> updated_at)) }}o</p>
                            </div>
                        </div>
                        @endforeach
                        <div class="br"></div>
                    </aside>
                    <aside class="single_sidebar_widget ads_widget">
                        <a href="#">
                            <img class="img-fluid" src="img/blog/add.jpg" alt="">
                        </a>
                        <div class="br"></div>
                    </aside>
                    <aside class="single_sidebar_widget post_category_widget">
                        <h4 class="widget_title">Post Catgories</h4>
                        <ul class="list cat-list">
                            @foreach ($categories as $category)
                            <li>
                                <a href="#" class="d-flex justify-content-between">
                                    <p>{{$category -> title}}</p>
                                    <p>37</p>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                        <div class="br"></div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection