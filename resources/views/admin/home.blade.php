@extends('admin.layout.master')

@section('content')

<div class="container">
    <h2 class="mb-5 text-center text-primary">Dashboard</h2>

    <!-- Top row displaying the main cards -->
    <div class="row">
        <div class="col-md-3 mb-4">
            <div class="card shadow-sm rounded-lg border-primary">
                <div class="card-body text-center">
                    <i class="fas fa-newspaper fa-3x text-primary"></i>
                    <h5 class="card-title text-primary">Published Articles</h5>
                    <h3 class="display-4">{{$all_articles->count()}}</h3>
                    <small class="text-muted">Total published articles</small>
                    <a href="{{ route('view_articles') }}" class="btn btn-outline-primary mt-3">View More</a>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card shadow-sm rounded-lg border-warning">
                <div class="card-body text-center">
                    <i class="fas fa-clock fa-3x text-warning"></i>
                    <h5 class="card-title text-warning">Pending Articles</h5>
                    <h3 class="display-4">{{$allpendingarticles->count()}}</h3>
                    <small class="text-muted">Articles pending review</small>
                    <button class="btn btn-outline-warning mt-3">View More</button>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card shadow-sm rounded-lg border-success">
                <div class="card-body text-center">
                    <i class="fas fa-comments fa-3x text-success"></i>
                    <h5 class="card-title text-success">Comments</h5>
                    <h3 class="display-4">{{$all_comments->count()}}</h3>
                    <small class="text-muted">Total comments on articles</small>
                    <a href="{{ route('viewComments')}}" class="btn btn-outline-success mt-3">View More</a>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card shadow-sm rounded-lg border-danger">
                <div class="card-body text-center">
                    <i class="fas fa-users fa-3x text-danger"></i>
                    <h5 class="card-title text-danger">Users</h5>
                    <h3 class="display-4">{{$all_users->count()}}</h3>
                    <small class="text-muted">Registered users count</small>
                    <a href="{{ route('view_users') }}" class="btn btn-outline-primary mt-3">View More</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Middle row displaying latest articles and comments -->
    <div class="row">
        <!-- Latest Articles -->
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm rounded-lg">
                <div class="card-header bg-light">
                    <h5 class="text-primary">Latest Articles</h5>


                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($latestarticle as $LatestTwoArticle)
                        <li class="list-group-item">
                            <a href="#">{{$LatestTwoArticle->title}}</a>
                            <span class="badge bg-secondary float-end">{{$LatestTwoArticle->created_at->diffForHumans()}}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="card shadow-sm rounded-4 border-0">
                <div class="card-header bg-white border-0 d-flex align-items-center justify-content-between">
                    <h5 class="text-success mb-0"><i class="bi bi-chat-dots-fill"></i> أحدث التعليقات</h5>
                    <a href="#" class="text-muted small">عرض الكل</a>
                </div>

                <div class="card-body p-3">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex align-items-center">
                        <div class="me-3">
                            <img src="{{ asset('assets/images/يونس.jpg') }}" class="rounded-circle border" alt="User">
                        </div>
                        <div class="flex-grow-1">
                            <strong class="d-block"></strong>
                            <span class="text-muted small"></span>
                        </div>
                        <span class="badge bg-info ms-3 small"></span>
                    </li>
                </ul>
            </div>
            </div>
        </div>

    </div>

    <!-- Bottom row displaying search component -->
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card shadow-sm rounded-lg">
                <div class="card-header bg-light">
                    <h5 class="text-primary">Search Article</h5>
                </div>
                <div class="card-body">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for an article..." id="searchInput" onkeyup="filterArticles()">
                        <button class="btn btn-outline-primary" onclick="clearSearch()">Clear Search</button>
                    </div>
                    <ul class="list-group mt-3" id="articleList">
@foreach ($all_articles as $article)
<li class="list-group-item"><a href="#">{{$article->title}}</a> <span class="badge bg-secondary float-end">{{$article->created_at->diffForHumans()}}</span></li>

@endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

</script>

@endsection
