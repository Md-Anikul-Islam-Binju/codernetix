@php
    $slider = DB::table('sliders')->where('status',1)->get();
    $siteSetting = DB::table('site_settings')->first();
@endphp
<div class="header-carousel owl-carousel">
    @foreach($slider as $sliderData)
    <div class="header-carousel-item">
        <img src="{{asset('images/slider/'. $sliderData->image )}}" class="img-fluid w-100" alt="Image">
        <div class="carousel-caption">
            <div class="container">
                <div class="row gy-0 gx-5">
                    <div class="col-lg-0 col-xl-5"></div>
                    <div class="col-xl-7 animated fadeInLeft">
                        <div class="text-sm-center text-md-end">
                            <h2 class="text-primary fw-bold mb-4">Welcome To CoderNetix</h2>
                            <h1 class="display-4 text-white mb-4">{{$sliderData->title}}</h1>
                            <p class="mb-5 fs-5">{!! $sliderData->details !!}</p>
                            <div class="d-flex justify-content-center justify-content-md-end flex-shrink-0 mb-4">
                                <a class="btn btn-light rounded-pill py-3 px-4 px-md-5 me-2"
                                   href="https://wa.me/8801905256528"
                                   target="_blank">
                                    <i class="fab fa-whatsapp me-2"></i> WhatsApp
                                </a>
                                <a class="btn btn-primary rounded-pill py-3 px-4 px-md-5 ms-2" href="{{route('about')}}">Learn More</a>
                            </div>
                            <div class="d-flex align-items-center justify-content-center justify-content-md-end">
                                <h2 class="text-white me-2">Follow Us:</h2>
                                <div class="d-flex justify-content-end ms-2">
                                    <a class="btn btn-md-square btn-light rounded-circle me-2" href="{{$siteSetting->facebook_link}}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-md-square btn-light rounded-circle mx-2" href="{{$siteSetting->twitter_link}}" target="_blank"><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-md-square btn-light rounded-circle ms-2" href="{{$siteSetting->linkedin_link}}"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

