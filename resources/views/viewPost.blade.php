@extends('layouts.app')

@section('content')
<!-- ================ start banner area ================= -->
<section class="w3l-banner-slider-main inner-pagehny">
	<div class="breadcrumb-infhny">

		<div class="top-header-content">

			@include('layouts.header')
			<div class="breadcrumb-contentnhy">
				<div class="container">
					<nav aria-label="breadcrumb">
						<h2 class="hny-title text-center">{{$post -> title }}</h2>
						<ol class="breadcrumb mb-0">
							<li><a href="{{ route('home') }}">Home</a>
								<span class="fa fa-angle-double-right"></span></li>
						<li><a href="{{ route('blog') }}">Blog</a>
								<span class="fa fa-angle-double-right"></span></li>
						
							<li class="active">{{$post -> title }}</li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
</section>



<!--================Blog Area =================-->
<section class="blog_area single-post-area py-80px section-margin--small">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 posts-list">
				<div class="single-post row">
					<div class="col-lg-3  col-md-3">
						<div class="blog_info text-right">
							<div class="post_tag">
								{{-- <a href="#">Food,</a>
						                                    <a class="active" href="#">Technology,</a>
						                                    <a href="#">Politics,</a> --}}
								<a href="#">{{$post -> category}}</a>
							</div>
							<ul class="blog_meta list">
								<li>
									<a href="#">Admin
										<i class="lnr lnr-user"></i>
									</a>
								</li>
								<li>
									<a href="#">{{ date('dS F Y', strtotime($post -> updated_at)) }}
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
					<div class="col-lg-9 col-md-9 blog_details">
						<div class="feature-img mb-4">
							<img src="{{ asset('storage/'.$post -> image) }}" class="w-100" alt="">
						</div>
						<h2>{{$post -> title }}</h2>
						<p>{!! $post ->body !!}</p>
					</div>
				</div>
				{{-- <div class="navigation-area">
					<div class="row">
						<div
							class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
							<div class="thumb">
								<a href="#">
									<img class="img-fluid" src="img/blog/prev.jpg" alt="">
								</a>
							</div>
							<div class="arrow">
								<a href="#">
									<span class="lnr text-white lnr-arrow-left"></span>
								</a>
							</div>
							<div class="detials">
								<p>Prev Post</p>
								<a href="#">
									<h4>Space The Final Frontier</h4>
								</a>
							</div>
						</div>
						<div
							class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
							<div class="detials">
								<p>Next Post</p>
								<a href="#">
									<h4>Telescopes 101</h4>
								</a>
							</div>
							<div class="arrow">
								<a href="#">
									<span class="lnr text-white lnr-arrow-right"></span>
								</a>
							</div>
							<div class="thumb">
								<a href="#">
									<img class="img-fluid" src="img/blog/next.jpg" alt="">
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="comments-area">
					<h4>05 Comments</h4>
					<div class="comment-list">
						<div class="single-comment justify-content-between d-flex">
							<div class="user justify-content-between d-flex">
								<div class="thumb">
									<img src="img/blog/c1.jpg" alt="">
								</div>
								<div class="desc">
									<h5>
										<a href="#">Emilly Blunt</a>
									</h5>
									<p class="date">December 4, 2017 at 3:12 pm </p>
									<p class="comment">
										Never say goodbye till the end comes!
									</p>
								</div>
							</div>
							<div class="reply-btn">
								<a href="#" class="btn-reply text-uppercase">reply</a>
							</div>
						</div>
					</div>
					<div class="comment-list left-padding">
						<div class="single-comment justify-content-between d-flex">
							<div class="user justify-content-between d-flex">
								<div class="thumb">
									<img src="img/blog/c2.jpg" alt="">
								</div>
								<div class="desc">
									<h5>
										<a href="#">Elsie Cunningham</a>
									</h5>
									<p class="date">December 4, 2017 at 3:12 pm </p>
									<p class="comment">
										Never say goodbye till the end comes!
									</p>
								</div>
							</div>
							<div class="reply-btn">
								<a href="#" class="btn-reply text-uppercase">reply</a>
							</div>
						</div>
					</div>
					<div class="comment-list left-padding">
						<div class="single-comment justify-content-between d-flex">
							<div class="user justify-content-between d-flex">
								<div class="thumb">
									<img src="img/blog/c3.jpg" alt="">
								</div>
								<div class="desc">
									<h5>
										<a href="#">Annie Stephens</a>
									</h5>
									<p class="date">December 4, 2017 at 3:12 pm </p>
									<p class="comment">
										Never say goodbye till the end comes!
									</p>
								</div>
							</div>
							<div class="reply-btn">
								<a href="#" class="btn-reply text-uppercase">reply</a>
							</div>
						</div>
					</div>
					<div class="comment-list">
						<div class="single-comment justify-content-between d-flex">
							<div class="user justify-content-between d-flex">
								<div class="thumb">
									<img src="img/blog/c4.jpg" alt="">
								</div>
								<div class="desc">
									<h5>
										<a href="#">Maria Luna</a>
									</h5>
									<p class="date">December 4, 2017 at 3:12 pm </p>
									<p class="comment">
										Never say goodbye till the end comes!
									</p>
								</div>
							</div>
							<div class="reply-btn">
								<a href="#" class="btn-reply text-uppercase">reply</a>
							</div>
						</div>
					</div>
					<div class="comment-list">
						<div class="single-comment justify-content-between d-flex">
							<div class="user justify-content-between d-flex">
								<div class="thumb">
									<img src="img/blog/c5.jpg" alt="">
								</div>
								<div class="desc">
									<h5>
										<a href="#">Ina Hayes</a>
									</h5>
									<p class="date">December 4, 2017 at 3:12 pm </p>
									<p class="comment">
										Never say goodbye till the end comes!
									</p>
								</div>
							</div>
							<div class="reply-btn">
								<a href="#" class="btn-reply text-uppercase">reply</a>
							</div>
						</div>
					</div>
				</div>
				<div class="comment-form">
					<h4>Leave a Reply</h4>
					<form>
						<div class="form-group form-inline">
							<div class="form-group col-lg-6 col-md-6 name">
								<input type="text" class="form-control" id="name" placeholder="Enter Name"
									onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Name'">
							</div>
							<div class="form-group col-lg-6 col-md-6 email">
								<input type="email" class="form-control" id="email" placeholder="Enter email address"
									onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'">
							</div>
						</div>
						<div class="form-group">
							<input type="text" class="form-control" id="subject" placeholder="Subject"
								onfocus="this.placeholder = ''" onblur="this.placeholder = 'Subject'">
						</div>
						<div class="form-group">
							<textarea class="form-control mb-10" rows="5" name="message" placeholder="Messege"
								onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'"
								required=""></textarea>
						</div>
						<a href="#" class="button button-postComment button--active">Post Comment</a>
					</form>
				</div> --}}
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
<!--================Blog Area =================-->


<!--================Instagram Area =================-->

@endsection