@extends('user.layout.masteru')

@section('content')
<div class="container my-5">
    <div class="row">
        <!-- Article Details -->
        <div class="col-md-8">
            <article>
                <h1 class="mb-4">{{ $allarticles->title }}</h1>
                <img src="{{ $allarticles->image }}" alt="{{ $allarticles->title }}" class="img-fluid rounded mb-4" style="max-height: 550px;width: 100%;">
                <p class="text-muted"><i class="fas fa-calendar-alt"></i> {{ $allarticles->created_at->format('M d, Y') }}</p>
                <p class="article-content">{{ $allarticles->content }}</p>
            </article>

            <!-- Comments & Like Section -->
            <div class="interaction-section mt-4 d-flex align-items-center gap-3">
                <!-- Like Button -->
                <button class="btn btn-outline-danger d-flex align-items-center" id="likeButton">
                    <i class="fas fa-heart"></i> <span class="ms-1" id="likeCount">0</span>
                </button>
                <!-- Add Comment Button -->
                <button class="btn btn-outline-primary d-flex align-items-center" id="showCommentBox">
                    <i class="fas fa-comment"></i> <span class="ms-1">Add a comment</span>
                </button>
            </div>

            <!-- Comment Input Box (Initially Hidden) -->
            <form action="{{route('storeComment',$allarticles->id)}}" method="POST">
                @csrf

                <div class="card shadow-sm p-3 mt-3" id="commentBox" style="display: none;">
                    <textarea class="form-control" rows="3" placeholder="Write your comment..." name="comment"></textarea>
                    <div class="d-flex justify-content-end mt-2">
                        <a href="#" class="btn btn-secondary me-2" id="cancelComment">Cancel</a>
                        <input type="submit" value="Comment" class="btn btn-primary">                   </div>
                </div>
            </form>


            <!-- Related News Section -->
            <div class="related-news mt-5">
                <h3 class="mb-4">Related News</h3>
                <div class="row">
                    @foreach ($allarticlesforrelated as $allforrelated)
                        <div class="col-md-12">
                            <div class="card mb-4 shadow-sm p-3">
                                <div class="row g-0 align-items-center">
                                    <div class="col-md-4">
                                        <img src="{{ $allforrelated->image }}" class="img-fluid rounded-start" alt="" style="width: 100%; height: 150px; object-fit: cover;">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $allforrelated->title }}</h5>
                                            <p class="card-text">{{ Str::limit($allforrelated->content, 100) }}</p>
                                            <a href="{{ route('details', $allforrelated->id) }}" class="btn btn-outline-primary">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @if($allarticlesforrelated->isEmpty())
                        <div class="alert alert-info" role="alert">No related news found.</div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Sidebar with Related Articles -->
        <div class="col-md-4">
            <div class="sidebar">
                <h3 class="mb-4">Related Articles</h3>
                @foreach ($articlesall as $item)
                    <div class="card mb-4 related-article-card">
                        <img src="{{ $item->image }}" class="card-img-top" alt="{{ $item->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->title }}</h5>
                            <p class="card-text">{{ Str::limit($item->content, 50) }} <a href="{{ route('details', $item->id) }}">Read More</a></p>
                            <a href="{{ route('details', $item->id) }}" class="btn btn-outline-primary">Read More</a>
                        </div>
                    </div>
                @endforeach
                @if($articlesall->isEmpty())
                    <div class="alert alert-info" role="alert">No related articles found.</div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
