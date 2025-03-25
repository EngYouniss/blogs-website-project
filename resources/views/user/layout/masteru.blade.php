<!DOCTYPE html>
<html lang="en" @if (LaravelLocalization::getCurrentLocale()=='en')
dir="ltr"
@else
dir="rtl"
@endif >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogs | Home</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Custom CSS -->
<link rel="stylesheet" href="{{ asset('user/css/styleu.css') }}">

</head>
<body>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">{{ __('translation.WebsiteName') }}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('UserHomePage') }}">{{ __('translation.Home') }}
                    </a></li>

                    @foreach ($allcategories as $cat)
                    <a href="{{ route('categories', $cat->name) }}" class="nav-link">
                        {{ __('translation.' . $cat->name) }} <i class="fas fa-chevron"></i>
                    </a>
                @endforeach

                    <li class="nav-item" style="margin-left: 30px;margin-right: 7px; background-color: #dae0e7;font-color: white; border-radius: 10px"><a class="nav-link" href="{{route('login')}}">{{ __('translation.login') }}</a></li>
                    <li class="nav-item">
                        <select id="language-switcher" class="form-select" onchange="window.location.href=this.value;">
                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <option value="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                                    @if (LaravelLocalization::getCurrentLocale() == $localeCode) selected @endif>
                                    {{ $properties['native'] }}
                                </option>
                            @endforeach
                        </select>

                    </li>


                </ul>
            </div>
        </div>
    </nav>
    @if(Route::is('UserHomePage'))
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            @foreach ($lastarticles as $index => $article)
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}" aria-label="Slide {{ $index + 1 }}"></button>
            @endforeach
        </div>

        <div class="carousel-inner">
            @foreach ($lastarticles as $index => $article)
                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}" data-bs-interval="3000">
                    <img src="{{ $article->image ?? '' }}" class="d-block w-100" alt="Article Image" style="height: 400px; object-fit: cover;">
                    <div class="carousel-caption d-none d-md-block">
                        <h2>{{ $article->title ?? '' }}</h2>
                        <p>{{ Str::limit($article->content ?? '', 30) }}</p>
                        <a href="{{ route('details', $article->id ?? '') }}" class="btn btn-primary btn-lg">Read More</a>
                    </div>
                </div>
            @endforeach
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>

        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <nav class="main-nav">
        <div class="container">
            <div class="nav-wrapper">
                <ul class="nav-menu">
                    @if (isset($allcategories) && $allcategories->count() > 0)
                        @foreach ($allcategories as $cat)
                            <li class="nav-item dropdown">
                                <a href="{{ route('categories', $cat->name) }}" class="nav-link">
                                    {{ $cat->name }} <i class="fas fa-chevron-down"></i>
                                </a>
                                @if ($cat->subcategories()->count() > 0)
                                    <ul class="dropdown-menu">
                                        @foreach ($cat->subcategories as $subcat)
                                            <li><a href="{{ route('yemen_news', $subcat->name) }}">{{ $subcat->name }}</a></li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    @else
    <br><br><br>

    @endif

    <!-- Trending News -->
   <!-- Search Section -->
   <section class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="text-center mb-4">Search Articles</h2>
            <form action="{{ route('searchd') }}" method="GET">  <!-- ✅ تصحيح الـ action و method -->
                <div class="input-group">
                    <input type="text" name="query" class="form-control form-control-lg"
                           placeholder="Enter keywords to search..."
                           aria-label="Search" required> <!-- ✅ إضافة name="search" -->
                    <button class="btn btn-primary btn-lg" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>
</section>

    <!-- Carousel Section -->
    @yield('content')

    <!-- Latest Articles -->


    <!-- Newsletter Subscription -->


    <!-- Footer -->
    <footer class="footer text-center">
        <div class="container">
            <div class="social-icons mb-3">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-linkedin-in"></i></a>
            </div>
            <p>Copyright &copy; 2023 Blogs</p>
        </div>
    </footer>

    <!-- Login Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content login-section">
                <div class="modal-header">
                    <h2 class="modal-title" id="loginModalLabel">Login</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <input type="email" class="form-control" placeholder="Email" required>
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" placeholder="Password" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS for Direction Switching -->
    <script>
        document.getElementById('language-switcher').addEventListener('change', function () {
            const direction = this.value;
            document.documentElement.dir = direction;
        });
    </script>
    <script src="{{ asset('user/javascript/js.js') }}"></script>

</body>
</html>
