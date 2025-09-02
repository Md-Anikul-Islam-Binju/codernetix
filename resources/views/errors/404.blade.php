@extends('frontend.app')
@section('content')
    <section class="cover-pic-header">
        <img src="{{URL::to('images/slider/1727969148.jpg')}}" class="h-100 w-100" alt="">
        <h1 class="text-center fw-bold text-uppercase display-5 position-absolute top-50 start-50 translate-middle">
            Page Not Found</h1>
    </section>

    <!-- 404 Start -->
    <div class="container-fluid bg-light py-5">
        <div class="container py-5 text-center">
            <div class="row justify-content-center">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <i class="far fa-frown-open display-1 text-primary mb-4" style="width: 80px; height: 80px;"></i>
                    <h1 class="display-1">404</h1>
                    <h1 class="mb-4">Page Not Found</h1>
                    <p class="mb-4">We’re sorry, the page you have looked for does not exist in our website! Maybe go to our home page or try to use a search?</p>
                    <a class="btn btn-primary rounded-pill py-3 px-5" href="/">Go Back To Home</a>
                </div>
            </div>
        </div>
    </div>
@endsection
