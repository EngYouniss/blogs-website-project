@extends('user.layout.master')
@section('content')

<article class="article main-article">
    <header>
        <h1>{{$lastArticles->title}}</h1>
        <ul class="details">
            <li>Posted on {{$lastArticles->created_at->diffForHumans()}}</li>
            <li>By <a href="#">{{$user->name}}</a></li>
        </ul>
    </header>
    <div class="main">
        <div class="featured">
            <figure>
                <img src="{{asset($lastArticles->image)}}">
                <figcaption>laptop</figcaption>
                <div class="col">
                    <a href="#" class="love"><i class="ion-android-favorite-outline"></i> <div>1220</div></a>
                </div>
            </figure>
        </div>
        <p>{{$lastArticles->content}}</p>
        <blockquote>
            Created by <a href="#">Eng.Younis Tallan </a>{{ $lastArticles->created_at->format('d M Y') }}}
        </blockquote>
    </div>

</article>


@endsection
