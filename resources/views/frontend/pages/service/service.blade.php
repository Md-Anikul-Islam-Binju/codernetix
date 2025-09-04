@extends('frontend.app')
@section('content')

<section class="cover-pic-header">
    <img src="{{URL::to('images/slider/1727969148.jpg')}}" class="h-100 w-100" alt="">
    <h1 class="text-center fw-bold text-uppercase display-5 position-absolute top-50 start-50 translate-middle  mt-5" >
        Service</h1>
</section>

<!-- Services Start -->
<br><br><br>
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
                        <p class="mb-4">{!! $serviceData->details !!}
                        </p>
                        <a class="btn btn-primary rounded-pill py-2 px-4" href="{{route('privacy.policy')}}">Learn More</a>
                    </div>

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
</section><br>

@endsection
