<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name') }}</title>

        <!--favicon-->
        <link rel="shortcut icon" href="{{ asset('backend/landing/images/favicon.ico')}}" />

        <!-- magnific popup -->
        <link rel="stylesheet" type="text/css" href="{{ asset('backend/landing/css/magnific-popup.css')}}" />

        <!-- Boxicon -->
        <link rel="stylesheet" type="text/css" href="{{ asset('backend/landing/css/boxicons.min.css')}}" />

        <!-- owl carousel -->
        <link rel="stylesheet" type="text/css" href="{{ asset('backend/landing/css/owl.carousel.min.css')}}" />
        <link rel="stylesheet" href="{{ asset('backend/landing/css/owl.theme.default.min.css')}}" />

        <!-- css -->
        <link href="{{ asset('backend/landing/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('backend/landing/css/style-dark.css')}}" id="app-css" rel="stylesheet" type="text/css" />

        <!-- Load CSS from Laravel -->
        <!-- <link rel="stylesheet" href="{{ mix('css/app.css') }}"> -->

        <!-- Load JS From Laravel -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>

    <body>

        <!-- light-dark mode button
        <a href="#" id="mode" mode="dark" class="p-3 text-white rounded-circle mode-btn">
            <i class='bx bx-moon font-size-24 mode-dark'></i>
            <i class='bx bx-sun font-size-24 bx-spin mode-light'></i>
        </a> -->

        <!-- Start navbar -->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top sticky">
            <div class="container">
                <a class="navbar-brand" href="index-1.html">
                    <img src="{{ asset('backend/landing/images/logo-light.png')}}" class="logo-light" alt="" height="20" />
                    <img src="{{ asset('backend/landing/images/logo-dark.png')}}" class="logo-dark" alt="" height="20" />
                </a>
                <a href="#" class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggle-icon"><i class="bx bx-menu"></i></span>
                </a>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">

                <!-- Session check -->
                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item">
                                <a class="nav-link">Welcome, {{Auth::user()->name}}</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ url('/dashboard') }}">Dashboard</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Login</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                                </li>
                            @endif
                        @endauth
                    @endif

                    </ul>
                </div>
            </div>
        </nav>
        <!-- end navbar -->

        <!-- start hero -->
        <section class="hero-2 position-relative" id="home" style="background-image: url({{ asset('backend/landing/images/hero-2-bg.png')}});">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5 col-md-5">
                        <span class="badge badge-lg badge-soft-primary">FATechID</span>
                        <h1 class="font-weight-medium my-4">Your Data Is Safe Here.</h1>
                        <p class="text-muted mb-4"> Files are stored on cloud hosting<br> We secure and encrypt your data, which makes it far harder for cybercriminals to access.</p>
                    </div>
                    <div class="col-lg-6 offset-lg-1 col-md-7">
                        <img class="img-fluid mt-sm-0 mt-5 pt-sm-0 pt-5" src="{{ asset('backend/landing/images/hero-2-img.png')}}" alt="" />
                    </div>
                </div>
            </div>
        </section>
        <!-- end hero -->

        <!-- start service -->
        <section class="section bg-light" id="services">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="text-center mb-5">
                            <h3 class="font-weight-medium mb-3">Best we provide</h3>
                            <p class="text-muted">we use an open source package that has been widely used in security.</p>
                        </div>
                    </div>
                    <!-- end-col -->
                </div>
                <!-- end row -->
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="card text-center hover-effect mb-4">
                            <div class="card-body px-4 py-5">
                                <img class="img-fluid mb-4 pb-2" src="{{ asset('backend/landing/images/icon-1.png')}}" alt="" />
                                <h5 class="font-weight-medium font-size-18 mb-3">Checklist</h5>
                                <p class="text-muted mb-3">Ensure the server's SSL/TLS configuration is up to date.</p>
                                <a href="https://www.websecurity.digicert.com/security-topics/what-is-ssl-tls-https">Learn More<i class="bx bx-right-arrow-alt align-middle font-size-18 icon ml-1"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                    <div class="col-lg-4 col-md-6">
                        <div class="card text-center hover-effect active mb-4">
                            <div class="card-body px-4 py-5 p-0">
                                <img class="img-fluid mb-4 pb-2" src="{{ asset('backend/landing/images/icon-2.png')}}" alt="" />
                                <h5 class="font-weight-medium font-size-18 mb-3">Protection</h5>
                                <p class="text-muted mb-3">Include HSTS, X-XSS-Protection, X-Frame-Options, and more.</p>
                                <a href="https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Strict-Transport-Security">Learn More<i class="bx bx-right-arrow-alt align-middle font-size-18 icon ml-1"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                    <div class="col-lg-4 col-md-6">
                        <div class="card text-center hover-effect mb-4">
                            <div class="card-body px-4 py-5 p-0">
                                <img class="img-fluid mb-4 pb-2" src="{{ asset('backend/landing/images/icon-3.png')}}" alt="" />
                                <h5 class="font-weight-medium font-size-18 mb-3">UUID</h5>
                                <p class="text-muted mb-3">We use a 128-bit Universally Unique Identifier for information from the user. </p>
                                <a href="https://uuid.ramsey.dev/en/stable/rfc4122.html">Learn More<i class="bx bx-right-arrow-alt align-middle font-size-18 icon ml-1"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </section>
        <!-- end services -->

        <script src="{{ asset('backend/landing/js/jquery-3.5.1.min.js')}}"></script>
        <script src="{{ asset('backend/landing/js/bootstrap.bundle.min.js')}}"></script>

        <!-- smooth link -->
        <script src="{{ asset('backend/landing/js/scrollspy.min.js')}}"></script>
        <script src="{{ asset('backend/landing/js/jquery.easing.min.js')}}"></script>

        <!-- owl carousel -->
        <script src="{{ asset('backend/landing/js/owl.carousel.min.js')}}"></script>

        <!-- magnific popup -->
        <script src="{{ asset('backend/landing/js/jquery.magnific-popup.min.js')}}"></script>
        <script src="{{ asset('backend/landing/js/magnific.init.js')}}"></script>

        <script src="{{ asset('backend/landing/js/app.js')}}"></script>
    </body>
</html>