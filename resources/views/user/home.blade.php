

@extends('user.layout.master')
@section('content')
{{-- <div id="news-slider" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        @foreach ($allarticles as $key => $article)
        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
            <img src="{{ $article->image }}" class="d-block w-100" style="height: 250px; object-fit: cover;" alt="{{ $article->title }}">
            <div class="carousel-caption d-none d-md-block">
                <h5>{{ $article->title }}</h5>
                <p>{{ Str::limit($article->content, 100) }}</p>
                <a href="{{ route('details', $article->id) }}" class="btn btn-primary">Read More</a>
            </div>
        </div>
        @endforeach
    </div>
    <a class="carousel-control-prev" href="#news-slider" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#news-slider" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div> --}}

<div class="col-xs-6 col-md-4 sidebar" id="sidebar">
    <div class="sidebar-title for-tablet">Sidebar</div>

    <aside>
        <h1 class="aside-title">Popular <a href="#" class="all">See All <i class="ion-ios-arrow-right"></i></a></h1>
        <div class="aside-body">
           @foreach ($allarticles as $article)
           <article class="article-mini">
            <div class="inner">
                <figure>
                    <a href="{{route('details',$article->id)}}">
                        <img src="{{ $article->image }}" alt="Sample Article">
                    </a>
                </figure>
                <div class="padding">
                    <p>{{Str::limit($article->content, 100)}}<a href="{{route('details',$article->id)}}">... Read More</a></p>
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
    </aside>


</div>
@foreach ($allarticles as $article)
<article class="article col-md-4 mini">
    <div class="inner">
        <figure>
            <a href="{{route('details',$article->id)}}">
                <img src="{{$article->image}}" alt="Sample Article">
            </a>
        </figure>
        <div class="padding">
            <div class="detail">
                <div class="time">{{$article->created_at->format('M d, Y')}}</div>
                <div class="category"><a href="#">2636</a></div>
            </div>
            <h2><a href="{{route('details',$article->id)}}">{{$article->title}}</a></h2>
            <p>{{Str::limit($article->content, 150)}}<a href="{{route('details',$article->id)}}">... Read More</a></p>
        </div>
    </div>
</article>
@endforeach

@endsection



