@extends('user.layout.master')
@section('content')

@foreach ($allarticles as $yemenarticle)
<article class="article col-md-4 mini">
    <div class="inner">
        <figure>
            <a href="{{ route('article.show', $yemenarticle->id) }}">
                <img src="{{ $yemenarticle->image }}" alt="Sample Article">
            </a>
        </figure>
        <div class="padding">
            <div class="detail">
                <div class="time">{{ $yemenarticle->created_at->format('M d, Y') }}</div>
                <div class="category"><a href="{{ route('category.show', $yemenarticle->category->id) }}">{{ $yemenarticle->category->name }}</a></div>
            </div>
            <h2><a href="{{ route('article.show', $yemenarticle->id) }}">{{ $yemenarticle->title }}</a></h2>
            <p>{{ Str::limit($yemenarticle->content, 150) }}<a href="{{ route('article.show', $yemenarticle->id) }}">... Read More</a></p>
        </div>
    </div>
</article>
@endforeach

@endsection
