<!DOCTYPE html>
<html class="side-header side-header-disable-offcanvas"
    data-style-switcher-options="{'changeLogo': false, 'colorPrimary': '#62AC6E', 'colorSecondary': '#e36159', 'colorTertiary': '#2baab1', 'colorQuaternary': '#383f48'}">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title') - {{ config('app.name', 'Laravel') }}</title>
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="VIP Landmark">
    <meta name="author" content="okler.net">

    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="img/apple-touch-icon.png') }}">

    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">

    <link
        href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800%7CShadows+Into+Light%7CPlayfair+Display:400&display=swap"
        rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="{{ asset('assets/frontend/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/vendor/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/vendor/animate/animate.compat.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/vendor/simple-line-icons/css/simple-line-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/vendor/owl.carousel/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/vendor/owl.carousel/assets/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/vendor/magnific-popup/magnific-popup.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/frontend/css/theme.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/theme-elements.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/theme-blog.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/theme-shop.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/skins/default.css') }}">

    <script src="{{ asset('assets/frontend/master/style-switcher/style.switcher.localstorage.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('assets/frontend/css/custom.css') }}">
    <script src="{{ asset('assets/frontend/vendor/modernizr/modernizr.min.js') }}"></script>

    <style>
        .overlay.overlay-op-9:hover:before,
        .overlay.overlay-op-9.overlay-show:before,
        .overlay.overlay-op-9.show:before {
            opacity: 0;
        }

        .thumb-info .thumb-info-wrapper-opacity-6:after {
            opacity: 0;
        }

    </style>

    @stack('style')
</head>

<body class="alternative-font-4 loading-overlay-showing" data-plugin-page-transition data-loading-overlay
    data-plugin-options="{'hideDelay': 500}">
    <div class="loading-overlay">
        <div class="bounce-loader">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>
    <div class="body">
        <header id="header" class="side-header header-dark d-flex">
            <div class="header-body border-top-0 box-shadow-none">
                <div class="header-container container d-flex h-100">
                    <div class="header-column flex-row flex-lg-column justify-content-center h-100">
                        <div class="header-row flex-row justify-content-start justify-content-lg-center py-lg-5">
                            <div class="header-logo">
                                <a href="{{ route('home') }}">
                                    <img alt="{{ config('app.name', 'Laravel') }} Logo" width="150" height="70"
                                        src="{{ asset('storage/' . $settings->logo) }}">
                                </a>
                            </div>
                        </div>
                        <div class="header-row header-row-side-header flex-row h-100 pb-lg-5">
                            <div
                                class="header-nav header-nav-links header-nav-links-side-header header-nav-links-vertical header-nav-links-vertical-dropdown header-nav-dropdowns-dark header-nav-light-text align-self-start">
                                <div
                                    class="header-nav-main header-nav-main-mobile-dark header-nav-main-square header-nav-main-dropdown-no-borders header-nav-main-effect-4 header-nav-main-sub-effect-1">
                                    <nav class="collapse">
                                        <ul class="nav nav-pills" id="mainNav">
                                            <li><a href="{{ route('home') }}">Home</a></li>
                                            @if (count($aboutUs) > 0)
                                                <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="#">
                                                        About Us </a>
                                                    <ul class="dropdown-menu">
                                                        @foreach ($aboutUs as $item)
                                                            <li><a class="dropdown-item"
                                                                    href="{{ route('about.us', [$item->id, Str::slug($item->page_title)]) }}">{{ $item->page_title }}</a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                            @endif
                                            @if (count($types) > 0)
                                                <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="#">
                                                        Project </a> 
                                                    <ul class="dropdown-menu">
                                                        @foreach ($types as $type)
                                                            <li><a class="dropdown-item" href="{{ route('project', [$type->id, Str::slug($type->name)]) }}">{{ $type->name }}</a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                            @endif
                                            <li><a href="{{ route('land.owner') }}">Land Owner</a></li>
                                            <li><a href="{{ route('client.requirements') }}">Send Requirements</a></li>
                                            <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="#">
                                                    Media </a>
                                                <ul class="dropdown-menu">

                                                    <li><a class="dropdown-item" href="{{ route('news') }}">News</a>
                                                    </li>
                                                    <li><a class="dropdown-item" href="{{ route('event') }}">Events</a>
                                                    </li>
                                                    <li><a class="dropdown-item" href="{{ route('blog') }}">Blog</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li><a href="{{ route('career') }}">Career</a></li>
                                            <li><a href="{{ route('contact.us') }}">Contact Us</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="header-row justify-content-end pb-lg-3">
                            <ul
                                class="header-social-icons social-icons d-none d-sm-block social-icons-clean social-icons-icon-light d-sm-0">
                                @if ($settings->facebook_url)
                                    <li class="social-icons-facebook"><a href="{{ $settings->facebook_url }}"
                                            target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                                @endif
                                @if ($settings->twitter_url)
                                    <li class="social-icons-twitter"><a href="{{ $settings->twitter_url }}"
                                            target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                                @endif
                                @if ($settings->linkedin_url)
                                    <li class="social-icons-linkedin"><a href="{{ $settings->linkedin_url }}"
                                            target="_blank" title="Linkedin"><i class="fab fa-linkedin-in"></i></a></li>
                                @endif
                            </ul>
                            <p class="d-none d-lg-block text-1 pt-3">©
                                {{ date('Y') . ' ' . config('app.name', 'Laravel') }}. All rights reserved
                            </p>
                            <button class="btn header-btn-collapse-nav" data-toggle="collapse"
                                data-target=".header-nav-main nav">
                                <i class="fas fa-bars"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div role="main" class="main">
            @yield('content')
        </div>
        <footer style="margin: 0" id="footer" class="appear-animation" data-appear-animation="fadeInUp" data-appear-animation-delay="0"
            data-appear-animation-duration="1s">
            <div class="container">
                <div class="row py-5 my-4">
                    <div class="col-md-9 mb-4 mb-lg-0">
                        <h5 class="text-3 mb-3">{{ $settings->footer_about_us_title }}</h5>

                        <p class="mt-2 mb-2">{{ $settings->footer_about_us_description }}</p>

                        <div class="row pt-3">
                            <div class="col-6 col-lg-3 mb-4 mb-lg-0">
                                <h5 class="text-3 mb-3">Project</h5>
                                <ul class="list list-icons list-icons-sm mb-0">
                                    @foreach ($footerProjects as $footerProject)
                                        <li><i class="fas fa-angle-right top-8"></i> <a class="link-hover-style-1"
                                                href="{{ route('project.details', [$footerProject->id, Str::slug($footerProject->title)]) }}">{{ $footerProject->title }}
                                            </a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="col-6 col-lg-3 mb-4 mb-lg-0">
                                <h5 class="text-3 mb-3">News</h5>
                                <ul class="list list-icons list-icons-sm mb-0">
                                    @foreach ($footerNews as $item)
                                        <li><i class="fas fa-angle-right top-8"></i> <a class="link-hover-style-1"
                                                href="{{ route('news.details', [$item->id, Str::slug($item->title)]) }}">{{ $item->title }}
                                            </a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="col-6 col-lg-3 mb-4 mb-lg-0">
                                <h5 class="text-3 mb-3">Event</h5>
                                <ul class="list list-icons list-icons-sm mb-0">
                                    @foreach ($footerEvents as $event)
                                        <li><i class="fas fa-angle-right top-8"></i> <a class="link-hover-style-1"
                                                href="{{ route('event.details', [$event->id, $event->title]) }}">{{ $event->title }}
                                            </a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="col-6 col-lg-3 mb-4 mb-lg-0">
                                <h5 class="text-3 mb-3">Blog</h5>
                                <ul class="list list-icons list-icons-sm mb-0">
                                    @foreach ($footerBlogs as $blog)
                                        <li><i class="fas fa-angle-right top-8"></i> <a class="link-hover-style-1"
                                                href="{{ route('blog.details', [$blog->id, $blog->title]) }}">{{ $blog->title }}
                                            </a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-4 mb-lg-0">
                        <h5 class="text-3 mb-3 pb-1">CONTACT US</h5>
                        <p class="text-8 text-color-light font-weight-bold">{{ $settings->mobile }}</p>
                        {{-- <p class="mb-2">International: (333) 456-6670</p>
                        --}}
                        {{-- <p class="mb-2">Fax: (222) 531-8999</p>
                        --}}
                        <ul class="list list-icons list-icons-lg">
                            @if ($settings->company_address)
                                <li class="mb-1"><i class="far fa-dot-circle text-color-primary"></i>
                                    <p class="m-0">{{ $settings->company_address }}</p>
                                </li>
                            @endif
                            @if ($settings->email)
                                <li class="mb-1"><i class="far fa-envelope text-color-primary"></i>
                                    <p class="m-0"><a href="mailto:mail@example.com">{{ $settings->email }}</a></p>
                                </li>
                            @endif
                        </ul>
                        <ul class="footer-social-icons social-icons mt-4">
                            @if ($settings->facebook_url)
                                <li class="social-icons-facebook"><a href="{{ $settings->facebook_url }}"
                                        target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                            @endif
                            @if ($settings->twitter_url)
                                <li class="social-icons-twitter"><a href="{{ $settings->twitter_url }}" target="_blank"
                                        title="Twitter"><i class="fab fa-twitter"></i></a></li>
                            @endif
                            @if ($settings->linkedin_url)
                                <li class="social-icons-linkedin"><a href="{{ $settings->linkedin_url }}"
                                        target="_blank" title="Linkedin"><i class="fab fa-linkedin-in"></i></a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-copyright">
                <div class="container py-2">
                    <div class="row py-4">
                        <div
                            class="col-lg-1 d-flex align-items-center justify-content-center justify-content-lg-start mb-2 mb-lg-0">
                            <a href="index.html" class="logo pr-0 pr-lg-3">
                                <img alt="{{ config('app.name', 'Laravel') }} logo" src="{{ asset('storage/' . $settings->logo) }}" height="45">
                            </a>
                        </div>
                        <div
                            class="col-lg-7 d-flex align-items-center justify-content-center justify-content-lg-start mb-4 mb-lg-0">
                            <p>© Copyright {{ date('Y') }}. All Rights Reserved.</p>
                        </div>
                        <div class="col-lg-4 d-flex align-items-center justify-content-center justify-content-lg-end">
                            <nav id="sub-menu">
                                <ul>
                                    <li><i class="fas fa-angle-right"></i><a href="{{ route('career') }}"
                                            class="ml-1 text-decoration-none"> Career</a></li>
                                    <li><i class="fas fa-angle-right"></i><a href="{{ route('contact.us') }}"
                                            class="ml-1 text-decoration-none"> Contact
                                            Us</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>


    <script src="{{ asset('assets/frontend/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/vendor/jquery.appear/jquery.appear.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/vendor/jquery.cookie/jquery.cookie.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/master/style-switcher/style.switcher.js') }}" id="styleSwitcherScript"
        data-base-path="" data-skin-src=""></script>
    <script src="{{ asset('assets/frontend/vendor/popper/umd/popper.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/vendor/common/common.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/vendor/jquery.validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/vendor/jquery.gmap/jquery.gmap.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/vendor/jquery.lazyload/jquery.lazyload.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/vendor/isotope/jquery.isotope.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/vendor/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/vendor/vide/jquery.vide.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/vendor/vivus/vivus.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/vendor/nanoscroller/jquery.nanoscroller.min.js') }}"></script>

    <script src="{{ asset('assets/frontend/js/theme.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/theme.init.js') }}"></script>

    @stack('script')
</body>

</html>
