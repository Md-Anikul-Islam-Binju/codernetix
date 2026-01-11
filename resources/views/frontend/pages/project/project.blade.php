@extends('frontend.app')
@section('content')

    <div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Project</h4>
            <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active text-primary">Projects</li>
            </ol>
        </div>
    </div>

<!-- Project Start -->
<br><br><br>
<div class="container-fluid blog pb-5">
    <div class="container pb-5">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <h4 class="text-primary">Our Project</h4>
            <h1 class="display-5 mb-4">Our Successfully Completed Client Projects</h1>
            <p class="mb-0">At Codernetix, we take pride in delivering innovative, reliable, and high-quality IT solutions. Each project reflects our commitment to excellence—transforming complex challenges into seamless, scalable systems that empower businesses, enhance efficiency, and fuel long-term success
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
                    <p class="mb-4">{!! Str::limit($projectData->details, 250) !!}
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
                At Codernetix, we partner with businesses to understand their vision, audience, and unique strengths—crafting tailored digital solutions that drive growth and long-term success.
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
