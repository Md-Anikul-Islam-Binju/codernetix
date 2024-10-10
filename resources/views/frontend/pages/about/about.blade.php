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
                        <h1 class="display-5 mb-4">At Codernetix, we specialize in transforming visionary ideas into cutting-edge digital solutions. </h1>
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
                    <div class="bg-primary rounded position-relative overflow-hidden">
                        <div class="rounded-bottom">
                            <img src="{{URL::to('frontend/img/about.png')}}" class="img-fluid rounded-bottom w-100" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Work Flow -->
    <div class="container-fluid offer-section pb-5">
        <div class="container pb-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h4 class="text-primary">Our Workflow</h4>
                <h1 class="display-5 mb-4">Development Workflow</h1>
                <p class="mb-0">At Codernetix, our web application development process is designed to be efficient, streamlined, and environmentally conscious. We focus on minimizing waste and optimizing resources to ensure a sustainable and high-quality development cycle.
                </p>
            </div>
            <div class="row g-5 align-items-center">
                <div class="col-xl-12 wow fadeInRight" data-wow-delay="0.4s">
                    <div class="tab-content">
                        <div id="collapseOne" class="tab-pane fade show p-0 active">
                            <div class="row g-4">
                                <div class="col-md-7">
                                    <img src="{{URL::to('frontend/img/work_flow.png')}}" class="img-fluid w-100 rounded" alt="">
                                </div>
                                <div class="col-md-5">
                                    <h1 class="display-5 mb-4">The stock market provides a venue...</h1>
                                    <p class="mb-4">We begin by understanding your business needs, creating a tailored plan that prioritizes eco-friendly solutions. Our UI/UX design focuses on clean, optimized interfaces that minimize resource consumption. During development, we use lightweight frameworks and efficient coding practices to ensure high performance with reduced energy use.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
