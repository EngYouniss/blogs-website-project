<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="Younis is a HTML5 & CSS3 magazine template based on Bootstrap 3.">
    <meta name="author" content="Kodinger">
    <meta name="keyword" content="younis, html5, css3, template, magazine template">

    <!-- Social Media Meta Tags -->
    <meta property="og:title" content="HTML5 & CSS3 magazine template based on Bootstrap 3">
    <meta property="og:type" content="article">
    <meta property="og:url" content="http://github.com/nauvalazhar/Younis">
    <meta property="og:image" content="https://raw.githubusercontent.com/nauvalazhar/Younis/master/images/preview.png">

    <title>Younis - Responsive HTML5 & CSS3 Magazine Template</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('user/scripts/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('user/scripts/ionicons/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('user/scripts/toast/jquery.toast.min.css') }}">
    <link rel="stylesheet" href="{{ asset('user/scripts/owlcarousel/dist/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('user/scripts/owlcarousel/dist/assets/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('user/scripts/magnific-popup/dist/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('user/scripts/sweetalert/dist/sweetalert.css') }}">
    <link rel="stylesheet" href="{{ asset('user/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('user/css/skins/all.css') }}">
    <link rel="stylesheet" href="{{ asset('user/css/demo.css') }}">
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> --}}


    <style>

        .logo {
            max-width: 30%; /* ضمان عدم تجاوز عرض الصورة للحاوية */
            border-radius:50%;
        }
        .search{
            width: 60%;
            position: relative;
            align-content: center;
        }
        .inputsearch{
            width: 80%;
        }
    </style>
</head>

<body class="skin-orange">
    <header class="primary">
        <div class="firstbar" style="background-color: #f8f9fa; padding: 10px;">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-3 col-sm-12">
                        <a href="{{ route('UserHomePage') }}">
                            <img src="{{ asset('admin/assets/images/logo/رؤية تك.png') }}" alt="عين الأحداث Logo" class="logo img-fluid">
                        </a>
                    </div>
                    <div class="col-md-9 col-sm-12 text-end">
                        <form class="d-flex" action="#" method="GET" style="display: inline-block;">
                            <input class="form-control" type="search" placeholder="بحث" aria-label="Search" name="query" style="display: inline-flex; width: 70%; margin-right: 10px;">
                            <button class="btn btn-outline-success" type="submit" style="padding: 5px 10px;">بحث</button>
                        </form>
                        <a href="{{ route('login') }}" class="login-link" style=" text-decoration: none; color: #007bff; font-weight: bold; margin-top: 40px">تسجيل الدخول</a>
                    </div>
                </div>
            </div>
        </div>

        <nav class="menu">
            <div class="container">
                <div id="menu-list">
                    <ul class="nav-list">
                        <li><a href="{{ route('UserHomePage') }}">Home</a></li>
                        @if (isset($allcategories) && $allcategories->count() > 0)
                            @foreach ($allcategories as $cat)
                                <li class="dropdown magz-dropdown">
                                    <a href="{{ route('categories', $cat->name) }}">{{ $cat->name }} <i class="ion-ios-arrow-right"></i></a>
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
    </header>

    <br><br><br><br><br><br><br><br><br><br>
    <section class="home">
        <div class="container">
            @yield('content')
        </div>
    </section>

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="block">
                        <h1 class="block-title">Company Info</h1>
                        <p>Younis is a HTML5 & CSS3 magazine template.</p>
                        <a href="about.html" class="btn btn-younis">About Us <i class="ion-ios-arrow-thin-right"></i></a>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="block">
                        <h1 class="block-title">Newsletter</h1>
                        <form class="newsletter">
                            <div class="input-group">
                                <input type="email" class="form-control email" placeholder="Your email">
                                <button class="btn btn-primary">Subscribe</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="block">
                        <h1 class="block-title">Follow Us</h1>
                        <ul class="social">
                            <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                            <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                            <li><a href="#"><i class="ion-social-youtube"></i></a></li>
                            <li><a href="#"><i class="ion-social-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="{{ asset('user/js/jquery.js') }}"></script>
    <script src="{{ asset('user/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('user/scripts/owlcarousel/dist/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('user/scripts/sweetalert/dist/sweetalert.min.js') }}"></script>
    <script src="{{ asset('user/js/e-magz.js') }}"></script>
{{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script> --}}

</body>
</html>
