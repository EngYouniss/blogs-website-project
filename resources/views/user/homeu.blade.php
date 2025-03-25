@extends('user.layout.masteru')
@section('content')

<section class="container my-5">
    <h2 class="text-center mb-4">Latest Articles</h2>
    <div class="row">
        @foreach ($allarticles as $article)
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="{{ $article->image }}" class="card-img-top" alt="Article Image">
                <div class="card-body">
                    <h5 class="card-title">{{ $article->title }}</h5>
                    @if (app()->getLocale() == 'ar')
                    <p class="card-text">{{ Str::limit($article->content_ar, 100) }}
                        <a href="{{ route('details', $article->id) }}">... اقرأ المزيد</a>
                    </p>
                @else
                    <p class="card-text">{{ Str::limit($article->content, 100) }}
                        <a href="{{ route('details', $article->id) }}">... Read More</a>
                    </p>
                @endif

                    <p class="card-date"><i class="fas fa-calendar-alt"></i> {{ $article->created_at->format('M d, Y') }}</p>
                    <a href="{{ route('details', $article->id) }}" class="btn btn-primary">Read More</a> <!-- زر لعرض المقالة كاملة -->
                     {{-- Add a like button to the article card --}}
                     @if(app()->getLocale() == 'ar')
                    <button style="margin-right: 120px" class="btn btn-outline-danger like-btn" data-article-id="{{ $article->id }}">
                        <i class="fas fa-heart"></i> <span class="like-count">0</span>
                    </button>
                    @else
                    <button style="margin-left: 120px" class="btn btn-outline-danger like-btn" data-article-id="{{ $article->id }}">
                        <i class="fas fa-heart"></i> <span class="like-count">0</span>
                    </button>
                    @endif
                </div>


            </div>
        </div>


        @endforeach


    </div>
</section>

@endsection
