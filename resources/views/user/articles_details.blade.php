@extends('user.layout.master')
@section('content')


		<section class="single">
			<div class="container">
				<div class="row">
					<div class="col-md-4 sidebar" id="sidebar">

						<aside>
							<h1 class="aside-title">Recent Post</h1>
							<div class="aside-body">

								@foreach ($lastArticles as $last)

                                <article class="article-mini">
									<div class="inner">
										<figure>
											<a href="single.html">
												<img src="{{asset($last->image)}}" alt="Sample Article">
											</a>
										</figure>
										<div class="padding">
											<h1><a href="{{route('lastarticles',$last->id)}}">{{Str::limit($last->content,100)}}...Read More</a></h1>
											<div class="detail">
												<div class="category"><a href="category.html">{{Str::limit($last->title,10)}}</a></div>
												<div class="time">{{$last->created_at->diffForHumans()}}</div>
											</div>
										</div>
									</div>
								</article>
                                @endforeach

							</div>
						</aside>
						<aside>
							<div class="aside-body">
								<form class="newsletter">
									<div class="icon">
										<i class="ion-ios-email-outline"></i>
										<h1>Newsletter</h1>
									</div>
									<div class="input-group">
										<input type="email" class="form-control email" placeholder="Your mail">
										<div class="input-group-btn">
											<button class="btn btn-primary"><i class="ion-paper-airplane"></i></button>
										</div>
									</div>
									<p>By subscribing you will receive new articles in your email.</p>
								</form>
							</div>
                            <div class="line">
                                <div>Author</div>
                            </div>

						</aside>
					</div>
					<div class="col-md-8">
						<ol class="breadcrumb">
						  <li><a href="#"></a></li>
						  <li class="active"></li>
						</ol>
						<article class="article main-article">
							<header>
								<h1>{{$allarticles->title}}</h1>
								<ul class="details">
									<li>Posted on {{$allarticles->created_at->diffForHumans()}}</li>
									<li>By <a href="#">{{$user->name}}</a></li>
								</ul>
							</header>
							<div class="main">
								<div class="featured">
									<figure>
										<img src="{{asset($allarticles->image)}}" style="max-height: 500px;image-sizing:cover" alt="Sample Article">
										<figcaption>laptop</figcaption>
                                        <div class="col">
                                            <a href="#" class="love"><i class="ion-android-favorite-outline"></i> <div>1220</div></a>
                                        </div>
									</figure>
								</div>
                                <p>{{$allarticles->content}}</p>
								<blockquote>
									Created by <a href="#">Eng.Younis Tallan </a>{{ $allarticles->created_at->format('d M Y') }}}
								</blockquote>
							</div>

						</article>


					</div>
				</div>
			</div>
		</section>




@endsection
