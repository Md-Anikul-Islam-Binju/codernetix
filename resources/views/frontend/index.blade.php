@extends('frontend.app')
@section('content')
@include('frontend.slider')


<!-- About Start -->
<div class="container-fluid about py-5">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-xl-7 wow fadeInLeft" data-wow-delay="0.2s">
                <div>
                    <h4 class="text-primary">About Us</h4>
                    <h3 class="display-6 mb-4">At Codernetix, we specialize in transforming visionary ideas into cutting-edge digital solutions. </h3>
                    <p class="mb-4">At Codernetix, we believe in harnessing the power of technology to turn ideas into reality while ensuring that our clients achieve their goals efficiently. From startups to established enterprises, we tailor our services to meet unique business needs, always delivering results that exceed expectations.
                    </p>
                    <div class="row g-4">
                        <div class="col-md-6 col-lg-6 col-xl-6">
                            <div class="d-flex">
                                <div><i class="fas fa-lightbulb fa-3x text-primary"></i></div>
                                <div class="ms-4">
                                    <h4>Innovative Solutions</h4>
                                    <p>We pride ourselves on staying ahead of the curve with the latest technologies.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-6">
                            <div class="d-flex">
                                <div><i class="bi bi-bookmark-heart-fill fa-3x text-primary"></i></div>
                                <div class="ms-4">
                                    <h4>Client-Centered Approach</h4>
                                    <p>Your success is our priority; we align our solutions with your business goals.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-6">
                            <div class="d-flex">
                                <div><i class="fas fa-lightbulb fa-3x text-primary"></i></div>
                                <div class="ms-4">
                                    <h4>Scalable and Secure</h4>
                                    <p>Our solutions are designed to grow with your business, maintaining top-tier security.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-6">
                            <div class="d-flex">
                                <div><i class="bi bi-bookmark-heart-fill fa-3x text-primary"></i></div>
                                <div class="ms-4">
                                    <h4>Expert Team</h4>
                                    <p>A team of highly skilled professionals committed to quality and efficiency.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-5 wow fadeInRight" data-wow-delay="0.2s">
                <div class="rounded position-relative overflow-hidden">
                    <div class="rounded-bottom">
                        <img src="{{URL::to('frontend/img/about12.png')}}" class="img-fluid rounded-bottom w-100" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Product Start -->
@if($product->count() > 0)
<div class="container-fluid service">
    <div class="container py-5">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <h4 class="text-primary">Our Ready Product</h4>
            <h1 class="display-5 mb-4">Ready Product Best Price</h1>
            <p class="mb-0"> CoderNetix delivers ready-to-use products and services. We ensure top quality at the best possible price.
                Our solutions are immediately deployable, saving you development time. Experience optimal value and rapid
                results with CoderNetix offerings.
            </p>
        </div>
        <div class="row g-4">
            @foreach($product as $productData)
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.2s">
                <div class="service-item">
                    <div class="service-img">
                        <img style="height: 250px;" src="{{asset('images/product/'. $productData->image )}}" class="img-fluid rounded-top w-100" alt="Image">
                    </div>
                    <div class="rounded-bottom p-4">
                        <a href="{{route('product.details',$productData->id)}}" class="h4 d-inline-block mb-4">{{$productData->title}}</a>
                       {{--<p class="mb-4">Lorem ipsum dolor sit amet consectetur</p>--}}
                        <a class="btn btn-primary rounded-pill py-2 px-4" href="{{route('product.details',$productData->id)}}">Learn Project Details</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif

<!-- Services Start -->
<div class="container-fluid feature pb-5">
    <div class="container pb-5">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <h4 class="text-primary">Our Services</h4>
            <h1 class="display-5 mb-4">Codernetix full range of offerings and highlights the company</h1>
            <p class="mb-0">At Codernetix, we offer a comprehensive suite of IT services designed to transform your business, streamline operations, and fuel innovation. Our solutions are customized to meet your specific needs, ensuring you get the most value out of your technology investments.
            </p>
        </div>
        <div class="row g-4">
            @foreach($service as $serviceData)
            <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">

                <div class="feature-item p-4">
                    <div class="feature-icon p-4 mb-4">
                        <img src="{{asset('images/service/'. $serviceData->image )}}" alt="Current Image" style="height: 80px; width: 90px;">
                    </div>
                    <h4>{{$serviceData->title}}</h4>
                    <p class="mb-4"> {!! $serviceData->details !!}
                    </p>
                    <a class="btn btn-primary rounded-pill py-2 px-4" href="{{route('privacy.policy')}}">Learn More</a>
                </div>

            </div>
            @endforeach
        </div>
    </div>
</div>

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

<!-- Technology section Start -->
<section class="Technology-section pb-120">
    <div class="container">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <h4 class="text-primary">Technology</h4>
            <h1 class="display-5 mb-4">Technology we Use</h1>
            <p class="mb-0">At Codernetix, we leverage cutting-edge technologies to deliver robust, scalable, and secure solutions.
            </p>
        </div>
        <div class="row align-items-center mt-md-5 justify-content-center gap-2 gap-md-4">
            @foreach($technology as $technologyData)
            <div class="col-5 col-md-4 col-lg-2 text-center p-3 rounded value-card">
                <div class="mb-1 fs-1">
                    <img
                        src="{{asset('images/technology/'. $technologyData->logo )}}"
                        alt="tech-product-1"
                        class="img-fluid object-fit-contain"
                    />
                </div>
                <h4 class="">{{$technologyData->name}}</h4>
            </div>
            @endforeach
        </div>
    </div>
</section>


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
