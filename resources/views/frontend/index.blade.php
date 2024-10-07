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
                    <p class="mb-4"> {{$serviceData->details}}
                    </p>
                    <a class="btn btn-primary rounded-pill py-2 px-4" href="#">Learn More</a>
                </div>

            </div>
            @endforeach
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
            <div class="blog-item p-4">
                <div class="blog-img mb-4">
                    <img src="{{URL::to('frontend/img/service-1.jpg')}}" class="img-fluid w-100 rounded" alt="">
                    <div class="blog-title">
                        <a href="#" class="btn">Dividend Stocks</a>
                    </div>
                </div>
                <a href="#" class="h4 d-inline-block mb-3">Options Trading Business?</a>
                <p class="mb-4">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolore aut aliquam suscipit error corporis accusamus labore....
                </p>
            </div>
            <div class="blog-item p-4">
                <div class="blog-img mb-4">
                    <img src="{{URL::to('frontend/img/service-2.jpg')}}" class="img-fluid w-100 rounded" alt="">
                    <div class="blog-title">
                        <a href="#" class="btn">Non-Dividend Stocks</a>
                    </div>
                </div>
                <a href="#" class="h4 d-inline-block mb-3">Options Trading Business?</a>
                <p class="mb-4">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolore aut aliquam suscipit error corporis accusamus labore....
                </p>
            </div>
            <div class="blog-item p-4">
                <div class="blog-img mb-4">
                    <img src="{{URL::to('frontend/img/service-3.jpg')}}" class="img-fluid w-100 rounded" alt="">
                    <div class="blog-title">
                        <a href="#" class="btn">Dividend Stocks</a>
                    </div>
                </div>
                <a href="#" class="h4 d-inline-block mb-3">Options Trading Business?</a>
                <p class="mb-4">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolore aut aliquam suscipit error corporis accusamus labore....
                </p>
            </div>
            <div class="blog-item p-4">
                <div class="blog-img mb-4">
                    <img src="{{URL::to('frontend/img/service-4.jpg')}}" class="img-fluid w-100 rounded" alt="">
                    <div class="blog-title">
                        <a href="#" class="btn">Non-Dividend Stocks</a>
                    </div>
                </div>
                <a href="#" class="h4 d-inline-block mb-3">Options Trading Business?</a>
                <p class="mb-4">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolore aut aliquam suscipit error corporis accusamus labore....
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Team Start -->
<div class="container-fluid team pb-5">
    <div class="container pb-5">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <h4 class="text-primary">Our Team</h4>
            <h1 class="display-5 mb-4">This highlights our team's expertise and contribution to success.</h1>
            <p class="mb-0">At Codernetix, our team is the backbone of our success. Comprised of skilled developers, designers, and IT specialists, each team member brings unique expertise and a passion for innovation.
            </p>
        </div>
        <div class="row g-4">
            @foreach($team as $teamData)
            <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                <div class="team-item">
                    <div class="team-img">
                        <img src="{{asset('images/team/'. $teamData->image )}}" class="img-fluid" alt="">
                    </div>
                    <div class="team-title">
                        <h4 class="mb-0">{{$teamData->name}}</h4>
                        <p class="mb-0">{{$teamData->designation}}</p>
                    </div>
                    <div class="team-icon">
                        <a class="btn btn-primary btn-sm-square rounded-circle me-3" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-primary btn-sm-square rounded-circle me-3" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-primary btn-sm-square rounded-circle me-3" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Team End -->

<!-- Testimonial Start -->
<div class="container-fluid testimonial pb-5">
    <div class="container pb-5">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <h4 class="text-primary">Technology</h4>
            <h1 class="display-5 mb-4">Technology we Use</h1>
            <p class="mb-0">At Codernetix, we leverage cutting-edge technologies to deliver robust, scalable, and secure solutions.
            </p>
        </div>
        <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.2s">
            <div class="testimonial-item">
                <div class="testimonial-quote-left">
                    <i class="fas fa-quote-left fa-2x"></i>
                </div>
                <div class="testimonial-img">
                    <img src="{{URL::to('frontend/img/testimonial-1.jpg')}}" class="img-fluid" alt="Image">
                </div>
                <div class="testimonial-text">
                    <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis blanditiis excepturi quisquam temporibus voluptatum reprehenderit culpa, quasi corrupti laborum accusamus.
                    </p>
                </div>
                <div class="testimonial-title">
                    <div>
                        <h4 class="mb-0">Laravel</h4>
                    </div>
                    <div class="d-flex text-primary">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
                <div class="testimonial-quote-right">
                    <i class="fas fa-quote-right fa-2x"></i>
                </div>
            </div>
            <div class="testimonial-item">
                <div class="testimonial-quote-left">
                    <i class="fas fa-quote-left fa-2x"></i>
                </div>
                <div class="testimonial-img">
                    <img src="{{URL::to('frontend/img/testimonial-1.jpg')}}" class="img-fluid" alt="Image">
                </div>
                <div class="testimonial-text">
                    <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis blanditiis excepturi quisquam temporibus voluptatum reprehenderit culpa, quasi corrupti laborum accusamus.
                    </p>
                </div>
                <div class="testimonial-title">
                    <div>
                        <h4 class="mb-0">Person Name</h4>
                        <p class="mb-0">Profession</p>
                    </div>
                    <div class="d-flex text-primary">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
                <div class="testimonial-quote-right">
                    <i class="fas fa-quote-right fa-2x"></i>
                </div>
            </div>
            <div class="testimonial-item">
                <div class="testimonial-quote-left">
                    <i class="fas fa-quote-left fa-2x"></i>
                </div>
                <div class="testimonial-img">
                    <img src="{{URL::to('frontend/img/testimonial-1.jpg')}}" class="img-fluid" alt="Image">
                </div>
                <div class="testimonial-text">
                    <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis blanditiis excepturi quisquam temporibus voluptatum reprehenderit culpa, quasi corrupti laborum accusamus.
                    </p>
                </div>
                <div class="testimonial-title">
                    <div>
                        <h4 class="mb-0">Person Name</h4>
                        <p class="mb-0">Profession</p>
                    </div>
                    <div class="d-flex text-primary">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
                <div class="testimonial-quote-right">
                    <i class="fas fa-quote-right fa-2x"></i>
                </div>
            </div>
            <div class="testimonial-item">
                <div class="testimonial-quote-left">
                    <i class="fas fa-quote-left fa-2x"></i>
                </div>
                <div class="testimonial-img">
                    <img src="{{URL::to('frontend/img/testimonial-1.jpg')}}" class="img-fluid" alt="Image">
                </div>
                <div class="testimonial-text">
                    <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis blanditiis excepturi quisquam temporibus voluptatum reprehenderit culpa, quasi corrupti laborum accusamus.
                    </p>
                </div>
                <div class="testimonial-title">
                    <div>
                        <h4 class="mb-0">Person Name</h4>
                        <p class="mb-0">Profession</p>
                    </div>
                    <div class="d-flex text-primary">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
                <div class="testimonial-quote-right">
                    <i class="fas fa-quote-right fa-2x"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial End -->

@endsection
