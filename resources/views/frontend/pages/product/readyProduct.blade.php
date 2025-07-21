@extends('frontend.app')
@section('content')
    <section class="cover-pic-header">
        <img src="{{URL::to('images/slider/1727969148.jpg')}}" class="h-100 w-100" alt="">
        <h1 class="text-center fw-bold text-uppercase display-5 position-absolute top-50 start-50 translate-middle">
            Our Ready Product Details</h1>
    </section>
    <br><br><br>

    <!-- Title & Content Section -->
    <section class="container my-5">
        <div class="text-center">
            <h1 class="fw-bold text-uppercase display-5">
                Our Ready Product Details
            </h1>
            <p class="text-muted mt-3">
                Published on {{ date('F d, Y') }} | By Admin
            </p>
        </div>

        <div class="mt-5">
            <img src="{{ URL::to('frontend/img/offer-1.jpg') }}" class="img-fluid rounded mb-4" alt="Blog Image">
            <h2 class="fw-bold mb-3">The stock market provides a venue...</h2>
            <p class="mb-4">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis amet sequi molestiae tenetur eum mollitia, blanditiis, magnam illo magni error dolore unde perspiciatis tempore et totam corrupti dignissimos aut praesentium?
            </p>
            <a class="btn btn-primary rounded-pill py-2 px-4" href="#">Learn More</a>
        </div>
    </section>

@endsection


