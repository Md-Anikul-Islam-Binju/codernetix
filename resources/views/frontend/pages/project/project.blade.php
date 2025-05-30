@extends('frontend.app')
@section('content')

<section class="cover-pic-header">
    <img src="{{URL::to('images/slider/1727969148.jpg')}}" class="h-100 w-100" alt="">
    <h1 class="text-center fw-bold text-uppercase display-5 position-absolute top-50 start-50 translate-middle">
        Project</h1>
</section>
<br><br><br>
<!-- Project Start -->
<div class="container-fluid blog pb-5">
    <div class="container pb-5">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <h4 class="text-primary">Our Project</h4>
            <h1 class="display-5 mb-4">Our Successfully Completed Projects</h1>
            <p class="mb-0">At Codernetix, we take pride in delivering innovative and high-quality IT solutions. Our completed projects showcase our expertise in transforming complex challenges into seamless, efficient systems that drive business success.
            </p>
        </div>
        <div class="owl-carousel blog-carousel wow fadeInUp" data-wow-delay="0.2s">
            @foreach($project as $projectData)
                <div class="blog-item p-4">
                    <div class="blog-img mb-4">
                        <img src="{{asset('images/project/'. $projectData->image )}}" class="img-fluid w-100 rounded"  style="height: 200px;" alt="">
                        <div class="blog-title">
                            <a href="{{$projectData->link}}" class="btn" target="_blank">Visit Site</a>
                        </div>
                    </div>
                    <a href="#" class="h4 d-inline-block mb-3">{{$projectData->title}}</a>
                    <p class="mb-4">{!! Str::limit($projectData->details, 150) !!}
                    </p>
                </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Clients Section -->
<section class="clients-section py-5" id="clients">
    <div class="container">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <h4 class="text-primary">Our Client</h4>
            <h1 class="display-5 mb-4">Your Future, Our Focus.</h1>
            <p class="mb-0">
                If you can provide more information about the client’s business, target audience, and unique selling points, Codernetix help you craft a more tailored tagline!
            </p>
        </div>
        <div class="inner-container margin-bottom">
            <div class="sponsors-outer">
                <!--Sponsors Carousel-->
                <ul class="sponsors-carousel owl-carousel owl-theme list-unstyled d-flex align-items-center">
                    @foreach($client as $clientData)
                        <li class="slide-item">
                            <figure class="image-box">
                                <a href="{{$clientData->link}}">
                                    <img src="{{asset('images/client/'. $clientData->logo )}}" alt="">
                                </a>
                            </figure>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>

@endsection
