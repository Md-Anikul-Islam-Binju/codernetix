@php
    // Existing database-driven site settings are preserved.
    $siteSetting = DB::table('site_settings')->first();

    $baseUrl = 'https://codernetix.com';
    $currentPath = request()->path();
    $canonicalUrl = $currentPath === '/' ? $baseUrl . '/' : $baseUrl . '/' . ltrim($currentPath, '/');

    // Each page can override these with @section('seo_title') etc.
    $pageSeo = [
        '/' => [
            'title' => 'CoderNetix | Software & IT Solutions Company in Bangladesh',
            'description' => 'CoderNetix is a software and IT solutions company in Bangladesh offering custom software, web and mobile app development, and AI/ML solutions.',
        ],
        'about' => [
            'title' => 'About CoderNetix | Software Development Company',
            'description' => 'Learn about CoderNetix, a Bangladesh-based IT solutions company delivering custom software, web applications, mobile apps, and AI/ML solutions.',
        ],
        'service' => [
            'title' => 'Software Development & IT Services | CoderNetix',
            'description' => 'Explore CoderNetix IT services, including custom software development, web and mobile applications, AI/ML solutions, and cloud migration.',
        ],
        'contact' => [
            'title' => 'Contact CoderNetix | IT & Software Solutions',
            'description' => 'Contact CoderNetix in Dhaka, Bangladesh to discuss your software, web development, mobile application, or AI/ML project.',
        ],
    ];
    $defaultSeo = $pageSeo[$currentPath] ?? [
        'title' => 'CoderNetix | Software & IT Solutions',
        'description' => 'Discover custom software, web application, mobile app, and AI/ML solutions from CoderNetix in Bangladesh.',
    ];
    $seoTitle = trim($__env->yieldContent('seo_title', $defaultSeo['title']));
    $seoDescription = trim($__env->yieldContent('seo_description', $defaultSeo['description']));

    // Choose a real, publicly accessible image URL from the database.
    $logoPath = trim((string) ($siteSetting->logo ?? ''), '/');
    $previewPath = trim((string) ($siteSetting->site_preview_image ?? ''), '/');
    $faviconPath = trim((string) ($siteSetting->favicon ?? ''), '/');
    $logoUrl = $logoPath !== '' ? url($logoPath) : null;
    $socialImageUrl = $previewPath !== '' ? url($previewPath) : $logoUrl;
    $faviconUrl = $faviconPath !== '' ? url($faviconPath) : null;

    $socialProfiles = array_values(array_filter([
        $siteSetting->facebook_link ?? null,
        $siteSetting->linkedin_link ?? null,
        $siteSetting->twitter_link ?? null,
    ], fn ($link) => is_string($link) && filter_var($link, FILTER_VALIDATE_URL)));

    $organizationSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'Organization',
        'name' => 'CoderNetix',
        'url' => $baseUrl . '/',
        'description' => $pageSeo['/']['description'],
    ];
    if ($logoUrl) {
        $organizationSchema['logo'] = $logoUrl;
    }
    if ($socialProfiles) {
        $organizationSchema['sameAs'] = $socialProfiles;
    }
@endphp
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- SEO: allow child pages to override title/description -->
    <title>{{ $seoTitle }}</title>
    <meta name="description" content="{{ $seoDescription }}">
    <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <link rel="canonical" href="{{ $canonicalUrl }}">

    <!-- Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="CoderNetix">
    <meta property="og:title" content="{{ $seoTitle }}">
    <meta property="og:description" content="{{ $seoDescription }}">
    <meta property="og:url" content="{{ $canonicalUrl }}">
    @if($socialImageUrl)
        <meta property="og:image" content="{{ $socialImageUrl }}">
        <meta name="twitter:image" content="{{ $socialImageUrl }}">
    @endif

    <!-- X / Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $seoTitle }}">
    <meta name="twitter:description" content="{{ $seoDescription }}">

    <!-- Favicon -->
    @if($faviconUrl)
        <link rel="icon" href="{{ $faviconUrl }}">
        <link rel="apple-touch-icon" href="{{ $faviconUrl }}">
    @endif

    <!-- Preload & Performance -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{asset('frontend/lib/animate/animate.min.css')}}"/>
    <link href="{{asset('frontend/lib/lightbox/css/lightbox.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <!-- Custom Styles -->
    <link href="{{asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/custom.css')}}" rel="stylesheet">

    <!-- Organization structured data. Social URLs come from current site settings. -->
    <script type="application/ld+json">
        @json($organizationSchema)
    </script>
    @stack('head')
</head>

<body>
<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>

<div class="container-fluid topbar bg-light px-5 d-none d-lg-block">
    <div class="row gx-0 align-items-center">
        <div class="col-lg-8 text-center text-lg-start mb-2 mb-lg-0">
            <div class="d-flex flex-wrap">
                <a href="tel:+88{{ $siteSetting->phone ?? '' }}" class="text-muted small me-4"><i class="fas fa-phone-alt text-primary me-2"></i>+88{{$siteSetting->phone}}</a>
                <a href="mailto:{{ $siteSetting->email ?? '' }}" class="text-muted small me-0"><i class="fas fa-envelope text-primary me-2"></i>{{$siteSetting->email}}</a>
            </div>
        </div>
        <div class="col-lg-4 text-center text-lg-end">
            <div class="d-inline-flex align-items-center" style="height: 45px;">
            </div>
        </div>
    </div>
</div>


<div class="container-fluid position-relative p-0">
    <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
        <a href="{{route('home')}}" class="navbar-brand p-0">
            <span class="logo-lg">
                <img src="{{URL::to('/'.$siteSetting->logo)}}" alt="CoderNetix logo" style="height: 80px;">
            </span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="{{ route('home') }}" class="nav-item nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
                <a href="{{ route('about') }}" class="nav-item nav-link {{ request()->routeIs('about') ? 'active' : '' }}">About</a>
                <a href="{{ route('service') }}" class="nav-item nav-link {{ request()->routeIs('service') ? 'active' : '' }}">Services</a>
                <a href="{{ route('project') }}" class="nav-item nav-link {{ request()->routeIs('project') ? 'active' : '' }}">Project</a>


                <div class="nav-item dropdown">
                    <a href="#" class="nav-link" data-bs-toggle="dropdown">
                        <span class="dropdown-toggle">Pages</span>
                    </a>
                    <div class="dropdown-menu m-0">
                        <a href="{{ route('product') }}" class="dropdown-item {{ request()->routeIs('product') ? 'active' : '' }}">Product</a>
                        <a href="{{ route('team') }}" class="dropdown-item {{ request()->routeIs('team') ? 'active' : '' }}">Team</a>
                        <a href="{{route('career')}}" class="dropdown-item">Career</a>
                        <a href="{{route('gallery')}}" class="dropdown-item">Gallery</a>



                    </div>
                </div>
            </div>
            <a href="{{ route('contact') }}" class="btn btn-primary rounded-pill py-2 px-4 my-3 my-lg-0 flex-shrink-0 {{ request()->routeIs('contact') ? 'active' : '' }}">Contact Us</a>
        </div>

    </nav>


</div>
<!-- Navbar & Hero End -->

@yield('content')

<!-- Footer Start -->
<div class="container-fluid footer py-5 wow fadeIn" data-wow-delay="0.2s">
    <div class="container py-5 border-start-0 border-end-0" style="border: 1px solid; border-color: rgb(255, 255, 255, 0.08);">
        <div class="row g-5">
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="footer-item">


                    <a href="{{ route('home') }}" class="p-0">
                        <h4 class="text-white">
                            <img src="{{URL::to('/'.$siteSetting->logo)}}" alt="CoderNetix logo" style="height: 50px;">

                        </h4>
                    </a>

                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-2">
                <div class="footer-item">
                    <h4 class="text-white mb-4">Quick Links</h4>
                    <a href="{{route('about')}}"><i class="fas fa-angle-right me-2"></i> About Us</a>
                    <a href="{{route('project')}}"><i class="fas fa-angle-right me-2"></i> Project</a>
                    <a href="{{route('service')}}"><i class="fas fa-angle-right me-2"></i> Service</a>
                    <a href="{{route('team')}}"><i class="fas fa-angle-right me-2"></i> Team</a>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="footer-item">
                    <h4 class="text-white mb-4">Support</h4>
                    <a href="{{route('privacy.policy')}}"><i class="fas fa-angle-right me-2"></i> Privacy Policy</a>
                    <a href="{{route('contact')}}"><i class="fas fa-angle-right me-2"></i> Contact us</a>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="footer-item">
                    <h4 class="text-white mb-4">Contact Info</h4>
                    <div class="d-flex align-items-center">
                        <i class="fas fa-map-marker-alt text-primary me-3"></i>
                        <p class="text-white mb-0">{{$siteSetting->address}}</p>
                    </div>
                    <div class="d-flex align-items-center">
                        <i class="fas fa-envelope text-primary me-3"></i>
                        <p class="text-white mb-0">{{$siteSetting->email}}</p>
                    </div>
                    <div class="d-flex align-items-center">
                        <i class="fa fa-phone-alt text-primary me-3"></i>
                        <p class="text-white mb-0">+88{{$siteSetting->phone}}</p>
                    </div>
                    <div class="d-flex">
                        <a class="btn btn-primary btn-sm-square rounded-circle me-3" href="{{ $siteSetting->facebook_link ?? '#' }}" target="_blank" rel="noopener noreferrer"><i class="fab fa-facebook-f text-white"></i></a>
                        <a class="btn btn-primary btn-sm-square rounded-circle me-3" href="{{ $siteSetting->twitter_link ?? '#' }}" target="_blank" rel="noopener noreferrer"><i class="fab fa-twitter text-white"></i></a>
                        <a class="btn btn-primary btn-sm-square rounded-circle me-0" href="{{ $siteSetting->linkedin_link ?? '#' }}" target="_blank" rel="noopener noreferrer"><i class="fab fa-linkedin-in text-white"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->

<!-- Back to Top -->
<a href="#" class="btn btn-primary btn-lg-square rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>
<!-- JavaScript Libraries -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('frontend/lib/wow/wow.min.js')}}"></script>
<script src="{{asset('frontend/lib/easing/easing.min.js')}}"></script>
<script src="{{asset('frontend/lib/waypoints/waypoints.min.js')}}"></script>
<script src="{{asset('frontend/lib/counterup/counterup.min.js')}}"></script>
<script src="{{asset('frontend/lib/lightbox/js/lightbox.min.js')}}"></script>
<script src="{{asset('frontend/lib/owlcarousel/owl.carousel.min.js')}}"></script>
<!-- Template Javascript -->
<script src="{{asset('frontend/js/main.js')}}"></script>
@stack('scripts')

</body>
</html>
